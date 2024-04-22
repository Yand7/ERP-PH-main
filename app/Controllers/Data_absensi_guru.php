<?php

namespace App\Controllers;

use App\Models\Amodel;
use App\Models\BlokModel;
use App\Models\TahunModel;
use App\Models\SiswaModel;
use App\Models\PerizinanModel;

class Data_absensi_guru extends BaseController
{
    public function index()
    {
        if (session()->get('level') == 3) {
            $model = new Amodel();

            if ($this->request->getMethod() === 'post') {
                $tanggal = $this->request->getPost('tanggal');

                // Ambil data blok yang aktif
                $blokModel = new BlokModel();
                $blok = $blokModel->where('statuss', 'Aktif')->first();

                // Ambil data tahun yang aktif
                $tahunModel = new TahunModel();
                $tahun = $tahunModel->where('status', 'Aktif')->first();

                // Ambil semua data siswa
                $siswaModel = new SiswaModel();

                $idGuru = session()->get('id');
                $guruData = $siswaModel->getGuruData($idGuru);
                $guru_id = $guruData['id_guru'];
                $rombel = $guruData['rombel'];

                $siswaData = $siswaModel->getSiswaData($rombel);

                // Ambil data status dari tabel Perizinan sesuai dengan tanggal
                $perizinanModel = new PerizinanModel();
                $statusPerizinan = $perizinanModel->getStatusPerizinan($tanggal);

                // Inisialisasi status pada array $siswaData dengan nilai default 'H'
                foreach ($siswaData as &$siswa) {
                    $siswa['status'] = 'H';
                }
                unset($siswa); // Hapus referensi terakhir ke elemen array

                // Simpan data absen untuk setiap siswa
                foreach ($siswaData as $siswa) {
                    $status = $this->request->getPost('status')[$siswa['id_siswa']];

                    // Cek apakah ada status dari tabel Perizinan untuk siswa dan tanggal tersebut
                    // Jika ada, maka gunakan status dari Perizinan
                    foreach ($statusPerizinan as $perizinan) {
                        if ($perizinan['siswa'] == $siswa['id_siswa']) {
                            $status = $perizinan['status'];
                            break;
                        }
                    }

                    // Hitung persen berdasarkan status
                    if ($status == 'H') {
                        $persen = 2;
                    } elseif ($status == 'I' || $status == 'S') {
                        $persen = 1;
                    } else {
                        $persen = 0;
                    }

                    $data = [
                        'siswa' => $siswa['id_siswa'],
                        'tanggal' => date('Y-m-d'),
                        'status' => $status,
                        'rombel' => $siswa['rombel'], 
                        'blok' => $blok['id_blok'], 
                        'tahun' => $tahun['id_tahun'],
                        'persen' => $persen,
                    ];

                    $model->insert($data);
                }

                return redirect()->to('data_absensi_guru');
            }

            // Ambil data siswa
            $siswaModel = new SiswaModel();

            $idGuru = session()->get('id');
            $guruData = $siswaModel->getGuruData($idGuru);
            $guru_id = $guruData['id_guru'];
            $rombel = $guruData['rombel'];

            $siswaData = $siswaModel->getSiswaData($rombel);

            $data['title'] = 'Data Absensi';

            echo view('partial/header_datatable', $data);
            echo view('partial/side_menu');
            echo view('partial/top_menu');
            echo view('absen/absen_guru', ['siswaData' => $siswaData]);
            echo view('partial/footer_datatable');
        } else {
            return redirect()->to('login');
        }
    }

    public function get_status_by_date()
    {
    // Ambil data tanggal dan id_siswa yang dikirimkan melalui AJAX
        $requestData = $this->request->getJSON();

    // Ambil tanggal dan id_siswa dari data yang dikirimkan
        $tanggal = $requestData->tanggal;
        $idSiswa = $requestData->id_siswa;

    // Panggil model untuk mengambil status dari tabel perizinan
        $perizinanModel = new PerizinanModel();
        $statusPerizinan = $perizinanModel->getStatusPerizinanByDateAndIdSiswa($tanggal, $idSiswa);

    // Mengubah data status perizinan menjadi format yang sesuai
        $statusData = [];
        foreach ($statusPerizinan as $perizinan) {
            $statusData[] = [
                'id_siswa' => $perizinan['siswa'],
                'status' => $perizinan['status']
            ];
        }


    // Mengirim data status kembali ke view dalam format JSON
        return $this->response->setJSON($statusData);

    }

    

}
