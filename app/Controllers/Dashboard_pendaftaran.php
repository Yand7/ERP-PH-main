<?php

namespace App\Controllers;
use App\Models\M_login;
use App\Models\M_pendaftaran;

class Dashboard_pendaftaran extends BaseController
{
    // Controller Dashboard_pendaftaran
    public function index()
    {
        $id_pendaftar = session()->get('id_pendaftar');
        if ($id_pendaftar > 0) {
            $model = new M_login();
            $id = session()->get('id');
            $on = 'user.level=level.id_level';
            $where = array('user.id_user' => $id);
            $data['jojo'] = $model->joinlogin('user', 'level', $on, $where);
            $data['title'] = 'Dashboard';

        // Cek apakah gambar_akta_lahir, gambar_kk, dan gambar_ijazah sudah diunggah
            $modelPendaftaran = new M_pendaftaran();
            $pendaftaranData = $modelPendaftaran->find($id_pendaftar);

            if (!empty($pendaftaranData['gambar_akta_lahir']) && !empty($pendaftaranData['gambar_kk']) && !empty($pendaftaranData['gambar_ijazah']) && !empty($pendaftaranData['gambar_3x4']) && !empty($pendaftaranData['gambar_invoice'])) {
                return redirect()->to('dashboard_pendaftaran/pasca_dokumen');
            }

            echo view('partial_dashboard/header_dashboard', $data);
            echo view('login/dashboard_pendaftaran', $data);
            echo view('partial_dashboard/footer_dashboard');
        } else {
            return redirect()->to('login_pendaftaran');
        }
    }


    public function aksi_create_dokumen()
    { 
        if(session()->get('id_pendaftar') > 0) {
            $id = session()->get('id_pendaftar');
            date_default_timezone_set('Asia/Jakarta');

            $akta_lahir = $this->request->getFile('akta_lahir');
            if($akta_lahir && $akta_lahir->isValid() && ! $akta_lahir->hasMoved()) {
                $imageName1 = $akta_lahir->getName();
                $akta_lahir->move('dokumen_pendaftar/akta_lahir', $imageName1);

                $kartu_keluarga = $this->request->getFile('kartu_keluarga');
                if($kartu_keluarga && $kartu_keluarga->isValid() && ! $kartu_keluarga->hasMoved()) {
                    $imageName2 = $kartu_keluarga->getName();
                    $kartu_keluarga->move('dokumen_pendaftar/kartu_keluarga', $imageName2);

                    $ijazah = $this->request->getFile('ijazah');
                    if($ijazah && $ijazah->isValid() && ! $ijazah->hasMoved()) {
                        $imageName3 = $ijazah->getName();
                        $ijazah->move('dokumen_pendaftar/ijazah', $imageName3);

                        $foto_3x4 = $this->request->getFile('foto_3x4');
                        if($foto_3x4 && $foto_3x4->isValid() && ! $foto_3x4->hasMoved()) {
                            $imageName4 = $foto_3x4->getName();
                            $foto_3x4->move('dokumen_pendaftar/foto_3x4', $imageName4);

                            $invoice = $this->request->getFile('invoice');
                            if($invoice && $invoice->isValid() && ! $invoice->hasMoved()) {
                                $imageName5 = $invoice->getName();
                                $invoice->move('dokumen_pendaftar/invoice', $imageName5);

                                // Yang ditambah ke user
                                $data1 = array(
                                    'gambar_akta_lahir' => $imageName1,
                                    'gambar_kk' => $imageName2,
                                    'gambar_ijazah' => $imageName3,
                                    'gambar_3x4' => $imageName4,
                                    'gambar_invoice' => $imageName5
                                );

                                $where = array('id_pendaftaran' => $id);
                                $model = new M_pendaftaran();
                                $model->qedit('pendaftaran', $data1, $where);
                                return redirect()->to('dashboard_pendaftaran/pasca_dokumen');
                            } else {
                                return redirect()->to('login_pendaftaran');
                            }
                        }
                    }
                }
            }
        }
    }

    public function pasca_dokumen()
    {
        if (session()->get('id_pendaftar') > 0) {
            $model = new M_pendaftaran();
            $id_pendaftar = session()->get('id_pendaftar');

            // Ambil data pendaftar
            $data['pendaftar_data'] = $model->getPendaftarData($id_pendaftar);

            // Ambil data user berdasarkan id_pendaftar
            $data['user_data'] = $model->getUserData($id_pendaftar);

            $data['title'] = 'Dashboard';

            echo view('partial_dashboard/header_dashboard', $data);
            echo view('data_pendaftaran/pasca_dokumen', $data);
            echo view('partial_dashboard/footer_dashboard');
        } else {
            return redirect()->to('login_pendaftaran');
        }
    }

}
