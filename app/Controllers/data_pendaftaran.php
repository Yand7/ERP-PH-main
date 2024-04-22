<?php

namespace App\Controllers;
use App\Models\M_pendaftaran;

class Data_pendaftaran extends BaseController
{
    public function index()
    {
       if(session()->get('level')== 1) {
        $model=new M_pendaftaran();
        $data['jojo']=$model->getAllPData();
        $data['title']='Data Pendaftaran';

        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu');
        echo view('partial/top_menu');
        echo view('data_pendaftaran/view', $data);
        echo view('partial/footer_datatable');
        }else {
            return redirect()->to('login');
        }
    }

    public function detail_siswa($id)
    {
       if(session()->get('level')== 1) {
        $model=new M_pendaftaran();
        $data['jojo']=$model->getAllPDataWhere($id);
        $data['title']='Data Pendaftaran';

        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu');
        echo view('partial/top_menu');
        echo view('data_pendaftaran/detail_siswa', $data);
        echo view('partial/footer_datatable');
        }else {
            return redirect()->to('login');
        }
    }

    public function create()
    {
        if(session()->get('level')== 1) {
            $model=new M_pendaftaran();

            $data['jojo']=$model->tampil('pendaftaran');
            $data['jk']=$model->tampil('jenis_kelamin');
            $data['agama']=$model->tampil('agama');
            $rombelDetails = $model->getAllRombelBaru();
            $data['rombel'] = $rombelDetails;
            $data['jenjang'] = $model->tampil('jenjang');


            $data['title']='Data Pendaftaran';
            echo view('partial/header_datatable', $data);
            echo view('partial/side_menu');
            echo view('partial/top_menu');
            echo view('data_pendaftaran/create', $data); 
            echo view('partial/footer_datatable');
        }else {
            return redirect()->to('login');
        }
    }

    public function aksi_create()
    { 
        if(session()->get('level')== 1) {
            $a= $this->request->getPost('nama');
            $b= $this->request->getPost('tempat_lahir');
            $c= $this->request->getPost('tanggal_lahir');
            $d= $this->request->getPost('jk');
            $e= $this->request->getPost('agama');
            $f= $this->request->getPost('telepon');
            $g= $this->request->getPost('alamat');
            $h= $this->request->getPost('jenjang');
            $i= $this->request->getPost('asal');
            $j= $this->request->getPost('nama_ayah');
            $k= $this->request->getPost('nama_ibu');
            $l= $this->request->getPost('pekerjaan_ortu');
            $m= $this->request->getPost('alamat_kantor');
            date_default_timezone_set('Asia/Jakarta');

            //Yang ditambah ke user
            $data1=array(
                'nama_lengkap'=>$a,
                'tempat_lahir'=>$b,
                'tanggal_lahir'=>$c,
                'jk'=>$d,
                'agama'=>$e,
                'no_hp'=>$f,
                'alamat'=>$g,
                'rombel'=>$h,
                'asal_sekolah'=>$i,
                'nama_ayah'=>$j,
                'nama_ibu'=>$k,
                'pekerjaan_ortu'=>$l,
                'alamat_kantor_ortu'=>$m,
            );
            $model=new M_pendaftaran();
            $model->simpan('pendaftaran', $data1);
            echo view('partial/header_datatable');
            echo view('partial/side_menu');
            echo view('partial/top_menu');
            echo view('partial/footer_datatable');
            return redirect()->to('data_pendaftaran');
        }else {
            return redirect()->to('login');
        }
    }

    public function siswa_diterima($id) 
    {
       if(session()->get('level')== 1) {
         $model=new M_pendaftaran();
         $pendaftaran = $model->getDataPendaftaranbyId($id);

         $a = $pendaftaran['nama_lengkap'];
         $b = $this->request->getPost('nis');
         $c = $pendaftaran['rombel'];

         $jenjang = $model->getDataJenjangbyId($c);
         $d = $jenjang['jenjang'];

         $imageName = 'default.png';

         $data1 = [
            'username'=>$b,
            'password'=>md5($b),
            'level'=>4,
            'foto'=>$imageName,
            'jenjang'=>$d,
            'pendaftaran'=>$id
        ];

        $model->simpan('user', $data1);
        $where=array('username'=>$b);
        $user=$model->getWhere2('user', $where);
        $iduser = $user['id_user'];

        $data2=array(
            'nis'=>$b,
            'nama_siswa'=>$a,
            'rombel'=>$c,
            'user'=>$iduser,
        );
        $model->simpan('siswa', $data2);

        $where2=array('id_pendaftaran'=>$id);
        $data3=array(
            'kondisi'=>1,
            'updated_at'=>date('Y-m-d H:i:s')
        );

        $model->qedit('pendaftaran', $data3, $where2);
        return redirect()->to('data_pendaftaran'); 
    } else {
        return redirect()->to('login');
    }
}


    public function siswa_ditolak($id)
    { 
        if(session()->get('level')== 1) {
            $model=new M_pendaftaran();
            $where=array('id_pendaftaran'=>$id);

            $data=array(
                'kondisi'=>2,
                'updated_at'=>date('Y-m-d H:i:s')
                // 'deleted_at'=>date('Y-m-d H:i:s')
            );

            $model->qedit('pendaftaran', $data, $where);
            return redirect()->to('data_pendaftaran');
        }else {
            return redirect()->to('login');
        }
    }

    // ==========================================================================================

    public function pendaftaran_baru()
    {
        $model=new M_pendaftaran();

        $data['jojo']=$model->tampil('pendaftaran');
        $data['jk']=$model->tampil('jenis_kelamin');
        $data['agama']=$model->tampil('agama');
        $rombelDetails = $model->getAllRombelBaru();
        $data['rombel'] = $rombelDetails;
        $data['jenjang'] = $model->tampil('jenjang');


        $data['title']='Data Pendaftaran';
        echo view('partial/header_datatable', $data);
        echo view('data_pendaftaran/pre_pendaftaran', $data); 
        echo view('partial/footer_datatable');
    }

    public function aksi_create_user()
    { 
        $a= $this->request->getPost('nama');
        $b= $this->request->getPost('tempat_lahir');
        $c= $this->request->getPost('tanggal_lahir');
        $d= $this->request->getPost('jk');
        $e= $this->request->getPost('agama');
        $f= $this->request->getPost('telepon');
        $g= $this->request->getPost('alamat');
        $h= $this->request->getPost('jenjang');
        $i= $this->request->getPost('asal');
        $j= $this->request->getPost('nama_ayah');
        $k= $this->request->getPost('nama_ibu');
        $l= $this->request->getPost('pekerjaan_ortu');
        $m= $this->request->getPost('alamat_kantor');
        $n= $this->request->getPost('nik');
        $o= $this->request->getPost('password');
        date_default_timezone_set('Asia/Jakarta');

        $data1=array(
            'nik'=>$n,
            'password'=>md5($o),
            'nama_lengkap'=>$a,
            'tempat_lahir'=>$b,
            'tanggal_lahir'=>$c,
            'jk'=>$d,
            'agama'=>$e,
            'no_hp'=>$f,
            'alamat'=>$g,
            'rombel'=>$h,
            'asal_sekolah'=>$i,
            'nama_ayah'=>$j,
            'nama_ibu'=>$k,
            'pekerjaan_ortu'=>$l,
            'alamat_kantor_ortu'=>$m,
        );
        $model=new M_pendaftaran();
        $model->simpan('pendaftaran', $data1);
        return redirect()->to('data_pendaftaran/pasca_pendaftaran');
    }

    public function pasca_pendaftaran()
    {
        $model=new M_pendaftaran();

        $data['title']='Data Pendaftaran';
        echo view('partial/header_datatable', $data);
        echo view('data_pendaftaran/pasca_pendaftaran', $data); 
        echo view('partial/footer_datatable');
    }

    }
