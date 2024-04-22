<?php

namespace App\Controllers;
use App\Models\M_perizinan;
use App\Models\M_model;

class Data_absensi_siswa extends BaseController
{

    public function index()
    {
        if (session()->get('level') == 4 || session()->get('level') == 5) {
            $model = new M_model();
            $model2 = new M_perizinan();

            $blok = $this->request->getPost('blok');
            $tahun = $this->request->getPost('tahun');
            $rombel = $this->request->getPost('rombel');
            $semester = $this->request->getPost('semester');

            $idSiswa = session()->get('id');
            $siswaData = $model2->getSiswaData($idSiswa);

            if ($siswaData) {
                $siswa_id = $siswaData['id_siswa']; 
            }

            $data['a'] = $model->getDataByFilter3($blok, $tahun, $rombel, $semester, $siswa_id);
            $data['title'] = 'Data Absensi';

            echo view('partial/header_datatable', $data);
            echo view('partial/side_menu');
            echo view('partial/top_menu');
            echo view('data_absensi_siswa/view', $data);
            echo view('partial/footer_datatable');
        } else {
            return redirect()->to('login');
        }
    }

    public function menu()
    {
        if (session()->get('level') == 4 || session()->get('level') == 5) {
            $model=new M_perizinan();

            $data['blok'] = $model->tampil2('blok');
            $data['tahun'] = $model->tampil2('tahun');

            $rombelDetails = $model->getAllRombel();
            $data['rkj'] = $rombelDetails;

            $data['semester'] = $model->tampil2('semester');

            $title['title']='Filter Data Absensi';

            echo view('partial/header_datatable', $title);
            echo view('partial/side_menu');
            echo view('partial/top_menu');
            echo view('data_absensi_siswa/menu', $data);
            echo view('partial/footer_datatable');    
        }else {
            return redirect()->to('login');
        }

    }

}