<?php

namespace App\Controllers\uangkas;

use CodeIgniter\Controller;
use App\Models\uangkas\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{
    protected function isLoggedIn()
    {
        return session()->has('id');
    }
    public function index()
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('uangkas/Home/dashboard');
        }
    }

    // public function forgot_pass()
    // {
    //     if(session()->get('id')>0 ) {
    //         return redirect()->to('/uangkas/dashboard');
    //     }else{

    //     $model=new M_model();
    //     echo view('forgot_pass');
    //     }    
    // }

    // public function aksi_pw_login()
    // {
    //     $n=$this->request->getPost('email'); 
    //     $model= new M_model();
    //     $data=array(
    //         'email'=>$n, 
    //     );
    //     $cek=$model->getarray('pengguna', $data);
    //     if ($cek>0) {

    //         session()->set('id', $cek['id_pengguna']);
    //         session()->set('email', $cek['email']);
    //         session()->set('level', $cek['level']);
    //         return redirect()->to('/uangkas/dashboard');

    //     }else {
    //     return redirect()->to('/');
    // }
    // }

    public function profile()
    {
        if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5) {

            $id = session()->get('id');
            $where2 = array('id_user' => $id);
            $where = array('id_user_user' => $id);
            $model = new M_model();
            $pakif['users'] = $model->edit_pp('siswa', $where);
            $pakif['use'] = $model->edit_pp('user', $where2);

            $kui['foto'] = $model->getRow('user', $where2);

            $id = session()->get('id');


            echo view('header', $kui);
            echo view('menu');
            echo view('profile', $pakif);
            echo view('footer');
        } else {
            return redirect()->to('/');
        }
    }

    public function aksi_change_profile()
    {
        // print_r($this->request->getPost());
        $model = new M_model();
        $id = session()->get('id');
        $where = array('id_user' => $id);
        $photo = $this->request->getFile('foto');
        $kui = $model->getRow('user', $where);
        if ($photo != '') {
        } elseif ($photo != '' && file_exists(PUBLIC_PATH . "/assets/images/profile/" . $kui->foto)) {
            unlink(PUBLIC_PATH . "/assets/images/profile/" . $kui->foto);
        } elseif ($photo == '') {
            $username = $this->request->getPost('username');
            $nik = $this->request->getPost('nik');
            $email = $this->request->getPost('email');
            $nama = $this->request->getPost('nama');
            $jk = $this->request->getPost('jk');
            $alamat = $this->request->getPost('alamat');
            $ttl = $this->request->getPost('ttl');

            $user = array(
                'username' => $username,
            );
            $model->edit('user', $user, $where);
            $where2 = array('id_user_user' => $id);

            $pengguna = array(
                'nik' => $nik,
                'email' => $email,
                'nama' => $nama,
                'jk' => $jk,
                'alamat' => $alamat,
                'ttl' => $ttl,
            );
            $model->edit('pengguna', $pengguna, $where2);
            return redirect()->to('/uangkas/profile');
        }

        $username = $this->request->getPost('username');
        $nik = $this->request->getPost('nik');
        $email = $this->request->getPost('email');
        $nama = $this->request->getPost('nama');
        $jk = $this->request->getPost('jk');
        $alamat = $this->request->getPost('alamat');
        $ttl = $this->request->getPost('ttl');

        $img = $photo->getRandomName();
        $photo->move(PUBLIC_PATH . '/assets/images/profile/', $img);
        $user = array(
            'username' => $username,
            'foto' => $img
        );
        $model = new M_model();
        $model->edit('user', $user, $where);

        $pengguna = array(
            'nik' => $nik,
            'email' => $email,
            'nama' => $nama,
            'jk' => $jk,
            'alamat' => $alamat,
            'ttl' => $ttl,
        );
        $where2 = array('id_user_user' => $id);
        // print_r($pengguna);
        // print_r($user);
        $model->edit('pengguna', $pengguna, $where2);

        return redirect()->to('/uangkas/profile');
    }

    public function change_pw()
    {
        if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5) {

            $id = session()->get('id');
            $where2 = array('id_user' => $id);
            $model = new M_model();
            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);
            $pakif['use'] = $model->getRow('user', $where2);

            $id = session()->get('id');
            $where = array('id_user' => $id);

            echo view('header', $kui);
            echo view('menu', $pakif);
            echo view('change_pw', $pakif);
            echo view('footer');
        } else {
            return redirect()->to('/');
        }
    }

    public function aksi_change_pw()
    {
        $pass = $this->request->getPost('password');
        $id = session()->get('id');
        $model = new M_model();

        $data = array(
            'password' => md5($pass)
        );

        $where = array('id_user' => $id);
        $model->edit('user', $data, $where);
        return redirect()->to('/');
    }

    public function log_out()
    {
        if (session()->get('id') > 0) {

            session()->destroy();
            return redirect()->to('/uangkas');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function dashboard()
    {
        if (session()->get('id') > 0) {

            $model = new M_model();
            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            $kui['p'] = $model->tampil('uangkas');
            $kui['f'] = $model->tampil('denda');
            $kui['e'] = $model->tampil('pengeluaran');
            $kui['pengguna'] = $model->tampil('user');

            echo view('uangkas/header', $kui);
            echo view('uangkas/menu');
            echo view('uangkas/dashboard');
            echo view('uangkas/footer');
        } else {
            return redirect()->to('/');
        }
    }

    public function users()
    {
        if (session()->get('level') == 1) {

            $model = new M_model();
            $on = 'siswa.id_kelas=kelas.id_kelas';
            $on2 = 'siswa.maker_pgu=user.id_user';
            $kui['duar'] = $model->superOderBy('siswa', 'kelas', 'user', $on, $on2, 'tanggal_pgu');

            $id = session()->get('id');
            $where = array('id_user' => $id);

            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            echo view('uangkas/header', $kui);
            echo view('uangkas/menu');
            echo view('uangkas/user');
            echo view('uangkas/footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function detail_users($id)
    {
        if (session()->get('level') == 1) {

            $model = new M_model();
            $where2 = array('siswa.id_user_user' => $id);
            $on = 'siswa.id_kelas=kelas.id_kelas';
            $on2 = 'siswa.id_user_user=user.id_user';
            $kui['gas'] = $model->ultraRows('siswa', 'kelas', 'user', $on, $on2, $where2);

            $id = session()->get('id');
            $where = array('id_user' => $id);
            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            echo view('uangkas/header', $kui);
            echo view('uangkas/menu');
            echo view('uangkas/detail_users');
            echo view('uangkas/footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function add_users()
    {
        if (session()->get('level') == 1) {

            $model = new M_model();
            $on = 'siswa.id_kelas=kelas.id_kelas';
            $on2 = 'siswa.maker_pgu=user.id_user';
            $kui['duar'] = $model->superOderBy('siswa', 'kelas', 'user', $on, $on2, 'tanggal_pgu');

            $id = session()->get('id');
            $where = array('id_user' => $id);

            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            $kui['duar'] = $model->tampil('kelas');

            echo view('header', $kui);
            echo view('menu');
            echo view('add_users');
            echo view('footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function aksi_add_users()
    {
        $model = new M_model();

        $kelas = $this->request->getPost('id_kelas');
        $nik = $this->request->getPost('nik');
        $email = $this->request->getPost('email');
        $nama = $this->request->getPost('nama');
        $usia = $this->request->getPost('usia');
        $jk = $this->request->getPost('jk');
        $alamat = $this->request->getPost('alamat');
        $ttl = $this->request->getPost('ttl');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $level = $this->request->getPost('level');
        $maker_pgu = session()->get('id');

        $user = array(
            'username' => $username,
            'password' => md5($password),
            'level' => $level,
        );

        $model = new M_model();
        $model->simpan('user', $user);
        $where = array('username' => $username);
        $id = $model->getarray('user', $where);
        $iduser = $id['id_user'];

        $siswa = array(
            'id_kelas' => $kelas,
            'nik' => $nik,
            'email' => $email,
            'nama' => $nama,
            'usia' => $usia,
            'jk' => $jk,
            'alamat' => $alamat,
            'ttl' => $ttl,
            'id_user_user' => $iduser,
            'maker_pgu' => $maker_pgu,
            // 'tanggal_pgu'=>date('Y-m-d')
        );
        // print_r($pengguna);
        $model->simpan('siswa', $siswa);
        return redirect()->to('/uangkas/users');
    }

    public function reset_p($id)
    {
        if (session()->get('level') == 1) {

            $model = new M_model();
            $where = array('id_user' => $id);
            $data = array(
                'password' => md5('123456789')
            );
            $model->edit('user', $data, $where);
            return redirect()->to('/uangkas/users');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function edit_users($id)
    {
        if (session()->get('level') == 1) {

            $model = new M_model();
            $where2 = array('siswa.id_user_user' => $id);
            $on = ('siswa.id_user_user=user.id_user');
            $on2 = ('siswa.id_kelas=kelas.id_kelas');
            $kui['duar'] = $model->ultraRows('siswa', 'user', 'kelas', $on, $on2, $where2);
            $kui['ok'] = $model->tampil('kelas');

            $id = session()->get('id');
            $where = array('id_user' => $id);
            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            echo view('uangkas/header', $kui);
            echo view('uangkas/menu');
            echo view('uangkas/edit_users');
            echo view('uangkas/footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function aksi_edit_users()
    {
        $id = $this->request->getPost('id');
        $kelas = $this->request->getPost('id_kelas');
        $username = $this->request->getPost('username');
        $level = $this->request->getPost('level');
        $nik = $this->request->getPost('nik');
        $email = $this->request->getPost('email');
        $nama = $this->request->getPost('nama');
        $usia = $this->request->getPost('usia');
        $jk = $this->request->getPost('jk');
        $alamat = $this->request->getPost('alamat');
        $ttl = $this->request->getPost('ttl');
        $maker_pgu = session()->get('id');

        $where = array('id_user' => $id);
        $where2 = array('id_user_user' => $id);
        if ($password != '') {
            $user = array(
                'username' => $username,
                'level' => $level,
            );
        } else {
            $user = array(
                'username' => $username,
                'level' => $level,
            );
        }

        $model = new M_model();
        $model->edit('user', $user, $where);

        $siswa = array(
            'id_kelas' => $kelas,
            'nik' => $nik,
            'email' => $email,
            'nama' => $nama,
            'usia' => $usia,
            'jk' => $jk,
            'alamat' => $alamat,
            'ttl' => $ttl,
            'maker_pgu' => $maker_pgu
        );
        // print_r($user);
        // print_r($pengguna);
        $model->edit('siswa', $siswa, $where2);
        return redirect()->to('/uangkas/home/users');
    }

    public function delete_users($id)
    {
        if (session()->get('level') == 1) {

            $model = new M_model();
            $where2 = array('id_user' => $id);
            $where = array('id_user_user' => $id);
            $model->hapus('siswa', $where);
            $model->hapus('user', $where2);
            return redirect()->to('/uangkas/users');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    //----------------------------------------------------TABLE KELAS---------------------------------------------------------
    public function class ()
    {
        if (session()->get('level') == 1) {

            $model = new M_model();
            // $kui['duar']=$model->tampil('dta_departement');
            $on = 'kelas.id_kelas=user.id_user';
            $kui['duar'] = $model->fusionOderBy('kelas', 'user', $on, 'tanggal_k');

            $id = session()->get('id');
            $where = array('id_user' => $id);
            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            echo view('uangkas/header', $kui);
            echo view('uangkas/menu');
            echo view('uangkas/kelas');
            echo view('uangkas/footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function add_class()
    {
        if (session()->get('level') == 1) {

            $model = new M_model();
            $on = 'kelas.id_kelas=user.id_user';
            $kui['duar'] = $model->fusion('kelas', 'user', $on);

            $id = session()->get('id');
            $where = array('id_user' => $id);
            $kui['foto'] = $model->getRow('user', $where);

            echo view('uangkas/header', $kui);
            echo view('uangkas/menu', $kui);
            echo view('uangkas/add_class', $kui);
            echo view('uangkas/footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function aksi_add_class()
    {
        $model = new M_model();
        $nama_kelas = $this->request->getPost('nama_kelas');
        $total_siswa = $this->request->getPost('total_siswa');
        $wali_kelas = $this->request->getPost('wali_kelas');
        $remark_k = $this->request->getPost('remark_k');
        $maker_kelas = session()->get('id');
        $data = array(

            'nama_kelas' => $nama_kelas,
            'total_siswa' => $total_siswa,
            'wali_kelas' => $wali_kelas,
            'remark_k' => $remark_k,
            'maker_kelas' => $maker_kelas
        );
        // print_r($data);
        $model->simpan('kelas', $data);
        return redirect()->to('/uangkas/home/class');
    }

    public function edit_class($id)
    {
        if (session()->get('level') == 1) {

            $model = new M_model();
            $where = array('id_kelas' => $id);
            $kui['duar'] = $model->getRow('kelas', $where);

            $id = session()->get('id');
            $where = array('id_user' => $id);

            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            echo view('uangkas/header', $kui);
            echo view('uangkas/menu');
            echo view('uangkas/edit_class');
            echo view('uangkas/footer');

        } else {
            return redirect()->to('/uangkas/home/dashboard');
        }
    }

    public function aksi_edit_class()
    {
        $model = new M_model();
        $id = $this->request->getPost('id');
        $nama_kelas = $this->request->getPost('nama_kelas');
        $total_siswa = $this->request->getPost('total_siswa');
        $wali_kelas = $this->request->getPost('wali_kelas');
        $remark_k = $this->request->getPost('remark_k');
        $maker_kelas = session()->get('id');
        $data = array(
            'nama_kelas' => $nama_kelas,
            'total_siswa' => $total_siswa,
            'wali_kelas' => $wali_kelas,
            'remark_k' => $remark_k,
            'maker_kelas' => $maker_kelas
        );
        // print_r($data);
        $where = array('id_kelas' => $id);
        $model->edit('kelas', $data, $where);
        return redirect()->to('/uangkas/home/class');
    }

    public function delete_class($id)
    {
        if (session()->get('level') == 1) {

            $model = new M_model();
            $where = array('id_kelas' => $id);
            $model->hapus('kelas', $where);
            return redirect()->to('/uangkas/home/class');

        } else {
            return redirect()->to('/uangkas/home/dashboard');
        }
    }


    //--------------------------------------------------TABLE UANGKAS---------------------------------------------------------
    public function petty_cash()
    {
        if (!session()->get('id') > 0) {
            return redirect()->to('/uangkas/home/dashboard');
        }

        if (session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 5) {

            $model = new M_model();
            $where = array('uangkas.id_kelas' => session()->get('id_kelas'));
            $on = 'uangkas.id_kelas=kelas.id_kelas';
            $on2 = 'uangkas.maker_uk=user.id_user';
            $kui['duar'] = $model->superOderByWhere('uangkas', 'kelas', 'user', $on, $on2, 'tanggal_uk', $where);

            // $where2=array('persetujuan_uk'=>"Not Approved",
            //     'id_kelas'=>session()->get('id_kelas')
            // );
            // $kui['cek']=count($model->getwhere('uangkas',$where2));
        }

        if (session()->get('level') == 4) {
            $model = new M_model();
            $where = array('nama_bayar' => session()->get('nama_siswa'));
            $on = 'uangkas.id_kelas=kelas.id_kelas';
            $on2 = 'uangkas.maker_uk=user.id_user';
            $kui['duar'] = $model->superOderByWhere('uangkas', 'kelas', 'user', $on, $on2, 'tanggal_uk', $where);
        }

        $id = session()->get('id');
        $where = array('id_user' => $id);
        $where = array('id_user' => session()->get('id'));
        $kui['foto'] = $model->getRow('user', $where);

        echo view('uangkas/header', $kui);
        echo view('uangkas/menu');
        echo view('uangkas/uangkas', $kui);
        echo view('uangkas/footer');
        // print_r($kui['duar']);
        // print_r(session()->get('nama_siswa'));

    }

    public function add_petty_cash()
    {
        if (session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) {

            $model = new M_model();
            // $kui['duar']=$model->tampil('dta_jabatan');
            $on = 'uangkas.maker_uk=user.id_user';
            $kui['duar'] = $model->fusionOderBy('uangkas', 'user', $on, 'tanggal_uk');

            $id = session()->get('id');
            $where = array('id_user' => $id);

            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            $kui['duar'] = $model->tampil('kelas');

            echo view('uangkas/header', $kui);
            echo view('uangkas/menu');
            echo view('uangkas/add_petty_cash');
            echo view('uangkas/footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function aksi_add_petty_cash()
    {
        $model = new M_model();

        $kelas = $this->request->getPost('id_kelas');
        $nama_bayar = $this->request->getPost('nama_bayar');
        $pembayar_per = $this->request->getPost('pembayar_per');
        $jenis_transaksi = $this->request->getPost('jenis_transaksi');
        $mata_uang = $this->request->getPost('mata_uang');
        $nominal = $this->request->getPost('nominal');
        // $total_uang=$this->request->getPost('total_uang');
        $maker_uk = session()->get('id');

        $data = array(
            'id_kelas' => $kelas,
            'nama_bayar' => $nama_bayar,
            'pembayar_per' => $pembayar_per,
            'jenis_transaksi' => $jenis_transaksi,
            'mata_uang' => $mata_uang,
            'nominal' => $nominal,
            'persetujuan_uk' => 'Not Approved',
            'maker_uk' => $maker_uk
        );
        // print_r($data);
        $model->simpan('uangkas', $data);
        return redirect()->to('/uangkas/home/petty_cash');
    }

    public function edit_petty_cash($id)
    {
        if (session()->get('level') == 2 || session()->get('level') == 4) {

            $model = new M_model();
            $where = array('id_uangkas' => $id);

            $on = 'uangkas.id_kelas=kelas.id_kelas';
            $on2 = 'uangkas.maker_uk=user.id_user';
            $kui['duar'] = $model->ultraRows('uangkas', 'kelas', 'user', $on, $on2, $where);

            // $kui['duar']=$model->getRow('dta_jabatan',$where);
            $kui['ok'] = $model->tampil('kelas');

            $id = session()->get('id');
            $where = array('id_user' => $id);

            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            echo view('header', $kui);
            echo view('menu');
            echo view('edit_petty_cash');
            echo view('footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function aksi_edit_petty_cash()
    {
        $model = new M_model();
        $id = $this->request->getPost('id');
        $nama_kelas = $this->request->getPost('id_kelas');
        $nama_bayar = $this->request->getPost('nama_bayar');
        $pembayar_per = $this->request->getPost('pembayar_per');
        $jenis_transaksi = $this->request->getPost('jenis_transaksi');
        $mata_uang = $this->request->getPost('mata_uang');
        $nominal = $this->request->getPost('nominal');
        $maker_uk = session()->get('id');
        $data = array(
            'id_kelas' => $nama_kelas,
            'nama_bayar' => $nama_bayar,
            'pembayar_per' => $pembayar_per,
            'jenis_transaksi' => $jenis_transaksi,
            'mata_uang' => $mata_uang,
            'nominal' => $nominal,
            'maker_uk' => $maker_uk
        );
        // print_r($data);
        $where = array('id_uangkas' => $id);
        $model->edit('uangkas', $data, $where);
        return redirect()->to('/uangkas/petty_cash');
    }

    public function edit_petty_cash_b($id)
    {
        if (session()->get('level') == 3) {

            $model = new M_model();
            $where = array('id_uangkas' => $id);

            $on = 'uangkas.id_kelas=kelas.id_kelas';
            $on2 = 'uangkas.maker_uk=user.id_user';
            $kui['duar'] = $model->ultraRows('uangkas', 'kelas', 'user', $on, $on2, $where);

            // $kui['duar']=$model->getRow('dta_jabatan',$where);
            $kui['ok'] = $model->tampil('kelas');

            $id = session()->get('id');
            $where = array('id_user' => $id);

            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            echo view('header', $kui);
            echo view('menu');
            echo view('edit_petty_cash_b');
            echo view('footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function aksi_edit_petty_cash_b()
    {
        $model = new M_model();
        $id = $this->request->getPost('id');
        $nama_kelas = $this->request->getPost('id_kelas');
        $nama_bayar = $this->request->getPost('nama_bayar');
        $pembayar_per = $this->request->getPost('pembayar_per');
        $jenis_transaksi = $this->request->getPost('jenis_transaksi');
        $mata_uang = $this->request->getPost('mata_uang');
        $nominal = $this->request->getPost('nominal');
        $persetujuan_uk = $this->request->getPost('persetujuan_uk');
        $maker_uk = session()->get('id');
        $data = array(
            // 'id_kelas'=>$nama_kelas,
            // 'nama_bayar'=>$nama_bayar,
            // 'pembayar_per'=>$pembayar_per,
            // 'jenis_transaksi'=>$jenis_transaksi,
            // 'mata_uang'=>$mata_uang,
            // 'nominal'=>$nominal,
            'persetujuan_uk' => $persetujuan_uk,
            'maker_uk' => $maker_uk
        );
        // print_r($data);
        $where = array('id_uangkas' => $id);
        $model->edit('uangkas', $data, $where);
        return redirect()->to('/uangkas/petty_cash');
    }

    public function check_petty_cash($id)
    {
        if (session()->get('level') == 3) {

            $model = new M_model();
            $where = array('id_uangkas' => $id);
            $data = array(
                'persetujuan_uk' => "Approved"
            );
            $model->edit('uangkas', $data, $where);
            return redirect()->to('uangkas/petty_cash');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function delete_petty_cash($id)
    {
        if (session()->get('level') == 2) {

            $model = new M_model();
            $where = array('id_uangkas' => $id);
            $model->hapus('uangkas', $where);
            return redirect()->to('uangkas/petty_cash');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }


    //----------------------------------------------------TABLE DENDA---------------------------------------------------------
    public function fine()
    {
        if (!session()->get('id') > 0) {
            return redirect()->to('/uangkas/dashboard');
        }

        if (session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 5) {

            $model = new M_model();
            $where = array('denda.id_kelas' => session()->get('id_kelas'));
            $on = 'denda.id_kelas=kelas.id_kelas';
            $on2 = 'denda.maker_denda=user.id_user';
            $kui['duar'] = $model->superOderByWhere('denda', 'kelas', 'user', $on, $on2, 'tanggal_denda', $where);
        }

        if (session()->get('level') == 4) {
            $model = new M_model();
            $where = array('nama_denda' => session()->get('nama'));
            $on = 'denda.id_kelas=kelas.id_kelas';
            $on2 = 'denda.maker_denda=user.id_user';
            $kui['duar'] = $model->superOderByWhere('denda', 'kelas', 'user', $on, $on2, 'tanggal_denda', $where);
        }

        $id = session()->get('id');
        $where = array('id_user' => $id);
        $where = array('id_user' => session()->get('id'));
        $kui['foto'] = $model->getRow('user', $where);

        echo view('uangkas/header', $kui);
        echo view('uangkas/menu');
        echo view('uangkas/denda');
        echo view('uangkas/footer');

    }

    public function add_fine()
    {
        if (session()->get('level') == 2 || session()->get('level') == 3) {

            $model = new M_model();
            // $kui['duar']=$model->tampil('dta_jabatan');
            $on = 'denda.maker_denda=user.id_user';
            $kui['duar'] = $model->fusionOderBy('denda', 'user', $on, 'tanggal_denda');

            $id = session()->get('id');
            $where = array('id_user' => $id);

            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            $kui['duar'] = $model->tampil('kelas');

            echo view('header', $kui);
            echo view('menu');
            echo view('add_fine');
            echo view('footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function aksi_add_fine()
    {
        $model = new M_model();

        $kelas = $this->request->getPost('id_kelas');
        $nama_denda = $this->request->getPost('nama_denda');
        $denda = $this->request->getPost('denda');
        $jenis_transaksi = $this->request->getPost('jenis_transaksi');
        $mata_uang = $this->request->getPost('mata_uang');
        $nominal = $this->request->getPost('nominal');
        $remark_denda = $this->request->getPost('remark_denda');
        $maker_denda = session()->get('id');

        $data = array(
            'id_kelas' => $kelas,
            'nama_denda' => $nama_denda,
            'denda' => $denda,
            // 'jenis_transaksi'=>$jenis_transaksi,
            // 'mata_uang'=>$mata_uang,
            // 'nominal'=>$nominal,
            'remark_denda' => $remark_denda,
            'persetujuan_k' => 'Not Approved',
            'maker_denda' => $maker_denda
        );
        // print_r($data);
        $model->simpan('denda', $data);
        return redirect()->to('/uangkas/fine');
    }

    public function edit_fine($id)
    {
        if (session()->get('level') == 2) {

            $model = new M_model();
            $where = array('id_denda' => $id);

            $on = 'denda.id_kelas=kelas.id_kelas';
            $on2 = 'denda.maker_denda=user.id_user';
            $kui['duar'] = $model->ultraRows('denda', 'kelas', 'user', $on, $on2, $where);

            // $kui['duar']=$model->getRow('dta_jabatan',$where);
            $kui['ok'] = $model->tampil('kelas');

            $id = session()->get('id');
            $where = array('id_user' => $id);

            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            echo view('header', $kui);
            echo view('menu');
            echo view('edit_fine');
            echo view('footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function aksi_edit_fine()
    {
        $model = new M_model();
        $id = $this->request->getPost('id');
        $nama_kelas = $this->request->getPost('id_kelas');
        $nama_denda = $this->request->getPost('nama_denda');
        $jenis_transaksi = $this->request->getPost('jenis_transaksi');
        $mata_uang = $this->request->getPost('mata_uang');
        $nominal = $this->request->getPost('nominal');
        $remark_denda = $this->request->getPost('remark_denda');
        $persetujuan_k = $this->request->getPost('persetujuan_k');
        $maker_denda = session()->get('id');
        $data = array(
            // 'id_kelas'=>$nama_kelas,
            // 'nama_denda'=>$nama_denda,
            'jenis_transaksi' => $jenis_transaksi,
            'mata_uang' => $mata_uang,
            'nominal' => $nominal,
            // 'remark_denda'=>$remark_denda,
            // 'persetujuan_k'=>$persetujuan_k,
            // 'maker_denda'=>$maker_denda
        );
        // print_r($data);
        $where = array('id_denda' => $id);
        $model->edit('denda', $data, $where);
        return redirect()->to('/uangkas/fine');
    }

    public function edit_fine_b($id)
    {
        if (session()->get('level') == 3 || session()->get('level') == 4) {

            $model = new M_model();
            $where = array('id_denda' => $id);

            $on = 'denda.id_kelas=kelas.id_kelas';
            $on2 = 'denda.maker_denda=user.id_user';
            $kui['duar'] = $model->ultraRows('denda', 'kelas', 'user', $on, $on2, $where);

            // $kui['duar']=$model->getRow('dta_jabatan',$where);
            $kui['ok'] = $model->tampil('kelas');

            $id = session()->get('id');
            $where = array('id_user' => $id);

            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            echo view('header', $kui);
            echo view('menu');
            echo view('edit_fine_b');
            echo view('footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function aksi_edit_fine_b()
    {
        $model = new M_model();
        $id = $this->request->getPost('id');
        $nama_kelas = $this->request->getPost('id_kelas');
        $nama_denda = $this->request->getPost('nama_denda');
        $jenis_transaksi = $this->request->getPost('jenis_transaksi');
        $mata_uang = $this->request->getPost('mata_uang');
        $nominal = $this->request->getPost('nominal');
        $remark_denda = $this->request->getPost('remark_denda');
        $maker_denda = session()->get('id');
        $data = array(
            // 'id_kelas'=>$nama_kelas,
            // 'nama_denda'=>$nama_denda,
            'jenis_transaksi' => $jenis_transaksi,
            'mata_uang' => $mata_uang,
            'nominal' => $nominal,
            // 'remark_denda'=>$remark_denda,
            // 'maker_denda'=>$maker_denda
        );
        // print_r($data);
        $where = array('id_denda' => $id);
        $model->edit('denda', $data, $where);
        return redirect()->to('/uangkas/fine');
    }

    public function check_fine($id)
    {
        if (session()->get('level') == 2) {

            $model = new M_model();
            $where = array('id_denda' => $id);
            $data = array(
                'persetujuan_k' => "Approved"
            );
            $model->edit('denda', $data, $where);
            return redirect()->to('uangkas/fine');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function delete_fine($id)
    {
        if (session()->get('level') == 2) {

            $model = new M_model();
            $where = array('id_denda' => $id);
            $model->hapus('denda', $where);
            return redirect()->to('/uangkas/fine');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }


    //------------------------------------------------TABLE PENGELUARAN-------------------------------------------------------
    public function expenditure()
    {

        if (session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5) {

            $model = new M_model();
            $where = array('pengeluaran.id_kelas' => session()->get('id_kelas'));
            $on = 'pengeluaran.id_kelas=kelas.id_kelas';
            $on2 = 'pengeluaran.maker_p=user.id_user';
            $kui['duar'] = $model->superOderByWhere('pengeluaran', 'kelas', 'user', $on, $on2, 'tanggal_p', $where);

            $id = session()->get('id');
            $where = array('id_user' => $id);
            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            echo view('uangkas/header', $kui);
            echo view('uangkas/menu');
            echo view('uangkas/pengeluaran');
            echo view('uangkas/footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function add_expenditure()
    {
        if (session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) {

            $model = new M_model();
            // $kui['duar']=$model->tampil('dta_jabatan');
            $on = 'pengeluaran.maker_p=user.id_user';
            $kui['duar'] = $model->fusionOderBy('pengeluaran', 'user', $on, 'tanggal_p');

            $id = session()->get('id');
            $where = array('id_user' => $id);

            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            $kui['duar'] = $model->tampil('kelas');

            echo view('header', $kui);
            echo view('menu');
            echo view('add_expenditure');
            echo view('footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function aksi_add_expenditure()
    {
        $model = new M_model();

        $kelas = $this->request->getPost('id_kelas');
        $jenis_transaksi = $this->request->getPost('jenis_transaksi');
        $mata_uang = $this->request->getPost('mata_uang');
        $nominal = $this->request->getPost('nominal');
        $remark_p = $this->request->getPost('remark_p');
        $maker_p = session()->get('id');

        $data = array(
            'id_kelas' => $kelas,
            'jenis_transaksi' => $jenis_transaksi,
            'mata_uang' => $mata_uang,
            'nominal' => $nominal,
            'remark_p' => $remark_p,
            'persetujuan_k' => "Not Approved",
            'maker_p' => $maker_p
        );
        // print_r($data);
        $model->simpan('pengeluaran', $data);
        return redirect()->to('/uangkas/expenditure');
    }

    //     public function edit_expenditure($id)
// {
//         if(session()->get('level')== 3 || session()->get('level')== 4) {

    //         $model=new M_model();
//         $where=array('id_pengeluaran'=>$id);

    //         $on='pengeluaran.id_kelas=kelas.id_kelas';
//         $on2='pengeluaran.maker_p=user.id_user';
//         $kui['duar']=$model->ultraRows('pengeluaran', 'kelas', 'user', $on, $on2,$where);

    //         // $kui['duar']=$model->getRow('dta_jabatan',$where);
//         $kui['ok']=$model->tampil('kelas');

    //         $id=session()->get('id');
//         $where=array('id_user'=>$id);

    //         $where=array('id_user' => session()->get('id'));
//         $kui['foto']=$model->getRow('user',$where);

    //         echo view('header',$kui);
//         echo view('menu');
//         echo view('edit_expenditure');
//         echo view('footer');

    //     }else{
//         return redirect()->to('/uangkas/dashboard');
//     }
// }

    //     public function aksi_edit_expenditure()
// {
//     $model=new M_model();
//     $id=$this->request->getPost('id');
//     $nama_kelas=$this->request->getPost('id_kelas');
//     $jenis_transaksi=$this->request->getPost('jenis_transaksi');
//     $mata_uang=$this->request->getPost('mata_uang');
//     $nominal=$this->request->getPost('nominal');
//     $remark_p=$this->request->getPost('remark_p');
//     $maker_p=session()->get('id');
//     $data=array(
//         'id_kelas'=>$nama_kelas,
//         'jenis_transaksi'=>$jenis_transaksi,
//         'mata_uang'=>$mata_uang,
//         'nominal'=>$nominal,
//         'remark_p'=>$remark_p,
//         'maker_p'=>$maker_p
//     );
//     // print_r($data);
//     $where=array('id_pengeluaran'=>$id);
//     $model->edit('pengeluaran',$data,$where);
//     return redirect()->to('/uangkas/expenditure');
// }

    public function edit_expenditure_k($id)
    {
        if (session()->get('level') == 2) {

            $model = new M_model();
            $where = array('id_pengeluaran' => $id);

            $on = 'pengeluaran.id_kelas=kelas.id_kelas';
            $on2 = 'pengeluaran.maker_p=user.id_user';
            $kui['duar'] = $model->ultraRows('pengeluaran', 'kelas', 'user', $on, $on2, $where);

            // $kui['duar']=$model->getRow('dta_jabatan',$where);
            $kui['ok'] = $model->tampil('kelas');

            $id = session()->get('id');
            $where = array('id_user' => $id);

            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            echo view('header', $kui);
            echo view('menu');
            echo view('edit_expenditure_k');
            echo view('footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function aksi_edit_expenditure_k()
    {
        $model = new M_model();
        $id = $this->request->getPost('id');
        $nama_kelas = $this->request->getPost('id_kelas');
        $jenis_transaksi = $this->request->getPost('jenis_transaksi');
        $mata_uang = $this->request->getPost('mata_uang');
        $nominal = $this->request->getPost('nominal');
        $remark_p = $this->request->getPost('remark_p');
        $persetujuan_k = $this->request->getPost('persetujuan_k');
        $maker_p = session()->get('id');
        $data = array(
            // 'id_kelas'=>$nama_kelas,
            // 'jenis_transaksi'=>$jenis_transaksi,
            // 'mata_uang'=>$mata_uang,
            // 'nominal'=>$nominal,
            // 'remark_p'=>$remark_p,
            'persetujuan_k' => $persetujuan_k,
            'maker_p' => $maker_p
        );
        // print_r($data);
        $where = array('id_pengeluaran' => $id);
        $model->edit('pengeluaran', $data, $where);
        return redirect()->to('/uangkas/expenditure');
    }

    public function check_expenditure($id)
    {
        if (session()->get('level') == 2) {

            $model = new M_model();
            $where = array('id_pengeluaran' => $id);
            $data = array(
                'persetujuan_k' => "Approved"
            );
            $model->edit('pengeluaran', $data, $where);
            return redirect()->to('uangkas/expenditure');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function delete_expenditure($id)
    {
        if (session()->get('level') == 2) {

            $model = new M_model();
            $where = array('id_pengeluaran' => $id);
            $model->hapus('pengeluaran', $where);
            return redirect()->to('uangkas/expenditure');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    //--------------------------------------------LAPORAN P,F,E-------------------------------------------------------
    public function petty_cash_report()
    {
        if (session()->get('level') == 3) {

            $model = new M_model();
            $kui['kunci'] = 'view_petty_cash';

            $id = session()->get('id');
            $where = array('id_user' => $id);
            $kui['foto'] = $model->getRow('user', $where);

            echo view('uangkas/header', $kui);
            echo view('uangkas/menu', $kui);
            echo view('uangkas/filter', $kui);
            echo view('uangkas/footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }
    public function cari_petty_cash()
    {
        if (session()->get('level') == 3) {

            $model = new M_model();
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');
            $kui['duar'] = $model->filter_p('uangkas', $awal, $akhir);
            $img = file_get_contents(
                'C:\xampp\htdocs\laporan_keuangan\public\assets\images\KOP_PH.jpg'
            );

            $kui['foto'] = base64_encode($img);

            echo view('c_p', $kui);

        } else {
            return redirect()->to('/uangkas/home/dashboard');
        }
    }
    public function pdf_petty_cash()
    {
        if (session()->get('level') == 3) {

            $model = new M_model();
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');
            $kui['duar'] = $model->filter_p('uangkas', $awal, $akhir);
            $img = file_get_contents(
                'C:\xampp\htdocs\laporan_keuangan\public\assets\images\KOP_PH.jpg'
            );

            $kui['foto'] = base64_encode($img);

            $dompdf = new \Dompdf\Dompdf();
            $dompdf->loadHtml(view('c_p', $kui));
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('my.pdf', array('Attachment' => 0));

        } else {
            return redirect()->to('/uangkas/home/dashboard');
        }
    }
    public function excel_petty_cash()
    {
        if (session()->get('level') == 3) {

            $model = new M_model();
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');
            $data = $model->filter_p('uangkas', $awal, $akhir);

            $spreadsheet = new Spreadsheet();

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Student Name')
                ->setCellValue('B1', 'Class Name')
                ->setCellValue('C1', 'Payment Per')
                ->setCellValue('D1', 'Transaction Type')
                ->setCellValue('E1', 'Currency')
                ->setCellValue('F1', 'Nominal')
                ->setCellValue('G1', 'Approval By The Treasurer')
                ->setCellValue('H1', 'Maker')
                ->setCellValue('I1', 'Date');


            $column = 2;

            foreach ($data as $data) {
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $data->nama_bayar)
                    ->setCellValue('B' . $column, $data->nama_kelas)
                    ->setCellValue('C' . $column, $data->pembayar_per)
                    ->setCellValue('D' . $column, $data->jenis_transaksi)
                    ->setCellValue('E' . $column, $data->mata_uang)
                    ->setCellValue('F' . $column, $data->nominal)
                    ->setCellValue('G' . $column, $data->persetujuan_uk)
                    ->setCellValue('H' . $column, $data->username)
                    ->setCellValue('I' . $column, $data->tanggal_uk);
                $column++;
            }
            $writer = new XLsx($spreadsheet);
            $fileName = 'Petty Cash Report - Petty Cash';

            header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename=' . $fileName . '.xls');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } else {
            return redirect()->to('/uangkas/home/dashboard');
        }
    }


    public function fine_report()
    {
        if (session()->get('level') == 3) {

            $model = new M_model();
            $kui['kunci'] = 'view_fine';

            $id = session()->get('id');
            $where = array('id_user' => $id);
            $kui['foto'] = $model->getRow('user', $where);

            echo view('uangkas/header', $kui);
            echo view('uangkas/menu', $kui);
            echo view('uangkas/filter', $kui);
            echo view('uangkas/footer');

        } else {
            return redirect()->to('/uangkas/home/dashboard');
        }
    }
    public function cari_fine()
    {
        if (session()->get('level') == 3) {

            $model = new M_model();
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');
            $kui['duar'] = $model->filter_f('denda', $awal, $akhir);
            $img = file_get_contents(
                'C:\xampp\htdocs\laporan_keuangan\public\assets\images\KOP_PH.jpg'
            );

            $kui['foto'] = base64_encode($img);

            echo view('c_f', $kui);

        } else {
            return redirect()->to('/uangkas/home/dashboard');
        }
    }
    public function pdf_fine()
    {
        if (session()->get('level') == 3) {

            $model = new M_model();
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');
            $kui['duar'] = $model->filter_f('denda', $awal, $akhir);
            $img = file_get_contents(
                'C:\xampp\htdocs\laporan_keuangan\public\assets\images\KOP_PH.jpg'
            );

            $kui['foto'] = base64_encode($img);

            $dompdf = new \Dompdf\Dompdf();
            $dompdf->loadHtml(view('c_f', $kui));
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('my.pdf', array('Attachment' => 0));

        } else {
            return redirect()->to('/uangkas/home/dashboard');
        }
    }
    public function excel_fine()
    {
        if (session()->get('level') == 3) {

            $model = new M_model();
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');
            $data = $model->filter_f('denda', $awal, $akhir);

            $spreadsheet = new Spreadsheet();

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Student Name')
                ->setCellValue('B1', 'Class Name')
                ->setCellValue('C1', 'Transaction Type')
                ->setCellValue('D1', 'Currency')
                ->setCellValue('E1', 'Nominal')
                ->setCellValue('F1', 'Remark')
                ->setCellValue('G1', 'Approval By Class Leader')
                ->setCellValue('H1', 'Maker')
                ->setCellValue('I1', 'Date');


            $column = 2;

            foreach ($data as $data) {
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $data->nama_denda)
                    ->setCellValue('B' . $column, $data->nama_kelas)
                    ->setCellValue('C' . $column, $data->jenis_transaksi)
                    ->setCellValue('D' . $column, $data->mata_uang)
                    ->setCellValue('E' . $column, $data->nominal)
                    ->setCellValue('F' . $column, $data->remark_denda)
                    ->setCellValue('G' . $column, $data->persetujuan_k)
                    ->setCellValue('H' . $column, $data->username)
                    ->setCellValue('I' . $column, $data->tanggal_denda);
                $column++;
            }
            $writer = new XLsx($spreadsheet);
            $fileName = 'Fine Report - Petty Cash';

            header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename=' . $fileName . '.xls');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } else {
            return redirect()->to('/uangkas/home/dashboard');
        }
    }



    public function expenditure_report()
    {
        if (session()->get('level') == 3) {

            $model = new M_model();
            $kui['kunci'] = 'view_expenditure';

            $id = session()->get('id');
            $where = array('id_user' => $id);
            $kui['foto'] = $model->getRow('user', $where);

            echo view('uangkas/header', $kui);
            echo view('uangkas/menu', $kui);
            echo view('uangkas/filter', $kui);
            echo view('uangkas/footer');

        } else {
            return redirect()->to('/uangkas/home/dashboard');
        }
    }
    public function cari_expenditure()
    {
        if (session()->get('level') == 3) {

            $model = new M_model();
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');
            $kui['duar'] = $model->filter_e('pengeluaran', $awal, $akhir);
            $img = file_get_contents(
                'C:\xampp\htdocs\laporan_keuangan\public\assets\images\KOP_PH.jpg'
            );

            $kui['foto'] = base64_encode($img);

            echo view('c_e', $kui);

        } else {
            return redirect()->to('/uangkas/home/dashboard');
        }
    }
    public function pdf_expenditure()
    {
        if (session()->get('level') == 3) {

            $model = new M_model();
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');
            $kui['duar'] = $model->filter_e('pengeluaran', $awal, $akhir);
            $img = file_get_contents(
                'C:\xampp\htdocs\laporan_keuangan\public\assets\images\KOP_PH.jpg'
            );

            $kui['foto'] = base64_encode($img);

            $dompdf = new \Dompdf\Dompdf();
            $dompdf->loadHtml(view('c_e', $kui));
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('my.pdf', array('Attachment' => 0));

        } else {
            return redirect()->to('/uangkas/home/dashboard');
        }
    }
    public function excel_expenditure()
    {
        if (session()->get('level') == 3) {

            $model = new M_model();
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');
            $data = $model->filter_e('pengeluaran', $awal, $akhir);

            $spreadsheet = new Spreadsheet();

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Class Name')
                ->setCellValue('B1', 'Transaction Type')
                ->setCellValue('C1', 'Currency')
                ->setCellValue('D1', 'Nominal')
                ->setCellValue('E1', 'Remark')
                ->setCellValue('F1', 'Approval By Class Leader')
                ->setCellValue('G1', 'Maker')
                ->setCellValue('H1', 'Date');


            $column = 2;

            foreach ($data as $data) {
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $data->nama_kelas)
                    ->setCellValue('B' . $column, $data->jenis_transaksi)
                    ->setCellValue('C' . $column, $data->mata_uang)
                    ->setCellValue('D' . $column, $data->nominal)
                    ->setCellValue('E' . $column, $data->remark_p)
                    ->setCellValue('F' . $column, $data->persetujuan_k)
                    ->setCellValue('G' . $column, $data->username)
                    ->setCellValue('H' . $column, $data->tanggal_p);
                $column++;
            }
            $writer = new XLsx($spreadsheet);
            $fileName = 'Expenditure Report - Petty Cash';

            header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename=' . $fileName . '.xls');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } else {
            return redirect()->to('/uangkas/home/dashboard');
        }
    }

    public function class_fs()
    {
        if (session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5) {

            $model = new M_model();
            $where = array('id_kelas' => session()->get('id_kelas'));
            $on = 'kelas.maker_kelas=user.id_user';
            $kui['duar'] = $model->fusionOderByWhere('kelas', 'user', $on, 'tanggal_k', $where);

            $id = session()->get('id');
            $where = array('id_user' => $id);
            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            echo view('uangkas/header', $kui);
            echo view('uangkas/menu');
            echo view('uangkas/kelas_fs');
            echo view('uangkas/footer');

            // print_r($where);
        } else {
            return redirect()->to('/uangkas/home/dashboard');
        }
    }

    public function detail_class($id)
    {
        if (session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5) {

            $model = new M_model();
            $where2 = array('pengguna.id_kelas' => $id);
            $on = 'pengguna.id_kelas=kelas.id_kelas';
            $kui['gass'] = $model->fusion_where('pengguna', 'kelas', $on, $where2);

            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            echo view('uangkas/header', $kui);
            echo view('uangkas/menu');
            echo view('uangkas/detail_class');
            echo view('uangkas/footer');

        } else {
            return redirect()->to('/uangkas/home/dashboard');
        }
    }

    public function edit_fs($id)
    {
        if (session()->get('level') == 3) {

            $model = new M_model();
            $where2 = array('pengguna.id_user_user' => $id);
            $on = ('pengguna.id_user_user=user.id_user');
            $on2 = ('pengguna.id_kelas=kelas.id_kelas');
            $kui['duar'] = $model->ultraRows('pengguna', 'user', 'kelas', $on, $on2, $where2);
            $kui['ok'] = $model->tampil('kelas');

            $id = session()->get('id');
            $where = array('id_user' => $id);
            $where = array('id_user' => session()->get('id'));
            $kui['foto'] = $model->getRow('user', $where);

            echo view('uangkas/header', $kui);
            echo view('uangkas/menu');
            echo view('uangkas/edit_fs');
            echo view('uangkas/footer');

        } else {
            return redirect()->to('/uangkas/dashboard');
        }
    }

    public function aksi_edit_fs()
    {
        $id = $this->request->getPost('id');
        $kelas = $this->request->getPost('id_kelas');
        $username = $this->request->getPost('username');
        $level = $this->request->getPost('level');
        $nik = $this->request->getPost('nik');
        $email = $this->request->getPost('email');
        $nama = $this->request->getPost('nama');
        $usia = $this->request->getPost('usia');
        $jk = $this->request->getPost('jk');
        $alamat = $this->request->getPost('alamat');
        $ttl = $this->request->getPost('ttl');
        $uangkas = $this->request->getPost('uangkas');
        $maker_pgu = session()->get('id');

        $where = array('id_user' => $id);
        $where2 = array('id_user_user' => $id);
        if ($password != '') {
            $user = array(
                // 'username'=>$username,
                // 'level'=>$level,
            );
        } else {
            $user = array(
                // 'username'=>$username,
                // 'level'=>$level,
            );
        }

        $model = new M_model();
        $model->edit('user', $user, $where);

        $pengguna = array(
            // 'id_kelas'=>$kelas,
            // 'nik'=>$nik,
            // 'email'=>$email,
            // 'nama'=>$nama,
            // 'usia'=>$usia,
            // 'jk'=>$jk,
            // 'alamat'=>$alamat,
            // 'ttl'=>$ttl,
            'uangkas' => $uangkas,
            // 'maker_pgu'=>$maker_pgu
        );
        // print_r($user);
        // print_r($pengguna);
        $model->edit('pengguna', $pengguna, $where2);
        return redirect()->to('/uangkas/class_fs');
    }

}
