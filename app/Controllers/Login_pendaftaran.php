<?php

namespace App\Controllers;
use App\Models\M_login;

class Login_pendaftaran extends BaseController
{

   protected function isLoggedIn()
   {
        return session()->has('id_pendaftar');
    }

    public function index()
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('dashboard_pendaftaran');
        }

        $data['title']='Login';
        echo view ('partial_login/header_login', $data);
        echo view('login/view_pendaftaran');
        echo view('partial_login/footer_login');
    }

    public function aksi_login()
    {
        $u=$this->request->getPost('username');
        $p=$this->request->getPost('password');

        // Tambahkan validasi jika field kosong
        if (empty($u) && empty($p)) {
            session()->setFlashdata('error', 'NIK dan password tidak boleh kosong');
            return redirect()->to('login_pendaftaran');
        }

        if (empty($u)) {
            session()->setFlashdata('error', 'NIK tidak boleh kosong');
            return redirect()->to('login_pendaftaran');
        }

        if (empty($p)) {
            session()->setFlashdata('error', 'Password tidak boleh kosong');
            return redirect()->to('login_pendaftaran');
        }

        // // Tambahkan validasi CAPTCHA
        $captcha_response = $this->request->getPost('g-recaptcha-response');

        if (empty($captcha_response)) {
            session()->setFlashdata('error', 'Harap isi CAPTCHA');
            return redirect()->to('login_pendaftaran');
        }

        // Verifikasi CAPTCHA menggunakan Google reCAPTCHA API
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => '6LcEfuojAAAAAHEty4frYz3AtlZ39sx7OsvHVT5K',
            'response' => $captcha_response,
        ];
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ],
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $result_json = json_decode($result, true);

        if ($result_json['success'] !== true) {
            session()->setFlashdata('error', 'CAPTCHA tidak valid');
            return redirect()->to('login_pendaftaran');
        }

        $model= new M_login();
        $data=array(
            'username'=>$u,
            'password'=>$p,

        );
        $cek=$model->getLoginNIK('pendaftaran', $u, $p);
        if ($cek !== null) {
            session()->set('id_pendaftar', $cek['id_pendaftaran']);
            session()->set('nik_pendaftar', $cek['nik']);
            session()->set('nama_pendaftar', $cek['nama_lengkap']);
            session()->set('kondisi_pendaftar', $cek['kondisi']);
            return redirect()->to('dashboard_pendaftaran');
        }else {
            // Tambahkan peringatan username atau password salah
            session()->setFlashdata('error', ' Username Anda tidak terdaftar');
            return redirect()->to('login_pendaftaran');
        }
    }

    public function log_out()
    {
        session()->destroy();
        return redirect()->to('login_pendaftaran');
    }
}