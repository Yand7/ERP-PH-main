<?php

namespace App\Controllers\agendapkl;
use App\Models\agendapkl\M_siswa;

class Data_siswa_all extends BaseController
{
    public function index()
    {
     if(session()->get('level')==7) {
        $model=new M_siswa();

        $db = \Config\Database::connect();
        $id_user = session()->get('id');
        $query = $db->table('data_guru')
        ->select('jurusan')
        ->where('user_guru', $id_user)
        ->get();

        if ($query->getNumRows() > 0) {
            $row = $query->getRow();
            $jurusan = $row->jurusan;

            $on='data_siswa.guru_pembimbing=data_guru.user_guru';
            $on2='data_siswa.instruktur=data_instruktur.user_instruktur';
            $on3='data_siswa.jurusan=data_jurusan.id_jurusan';
            $data['jojo']=$model->join4w('data_siswa', 'data_guru', 'data_instruktur', 'data_jurusan', $on, $on2, $on3, $jurusan);
            $data['title']='Data Siswa';

            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_siswa_all/view', $data);
            echo view('agendapkl/partial/footer_datatable');
        }else {
            return redirect()->to('agendapkl');
        }
    }
}

public function edit($id)
{ 
    if(session()->get('level')==7) {
        $model=new M_siswa();
        $where=array('user_siswa'=>$id);
        $where2=array('id_user'=>$id);
        $data['jojo']=$model->getWhere('data_siswa',$where);
        $data['rizkan']=$model->getWhere('user',$where2);
        $data['guru']=$model->tampil_guru('data_guru');
        $data['kajur']=$model->tampil_kajur('data_guru');
        $data['instruktur']=$model->tampil('data_instruktur');
        $data['jurusan']=$model->tampil('data_jurusan');
        $data['title']='Data Siswa';
        echo view('agendapkl/partial/header_datatable', $data);
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_siswa_all/edit',$data);
        echo view('agendapkl/partial/footer_datatable');    
    }else {
        return redirect()->to('agendapkl/home');
    }
}

public function aksi_edit()
{ 
    if(session()->get('level')==7) {
       $a= $this->request->getPost('username');
       $b= $this->request->getPost('password');
       $c= $this->request->getPost('email');
       $e= $this->request->getPost('nama');
       $f= $this->request->getPost('nis');
       $g= $this->request->getPost('tanggal_lahir');
       $h= $this->request->getPost('tempat_lahir');
       $i= $this->request->getPost('jenis_kelamin');
       $j= $this->request->getPost('telpon');
       $k= $this->request->getPost('jurusan');
       $l= $this->request->getPost('nama_pt');
       $m= $this->request->getPost('guru_pembimbing');
       $n= $this->request->getPost('instruktur');
       $o= $this->request->getPost('kajur');
       $id= $this->request->getPost('id');
       $id2= $this->request->getPost('id2');
       date_default_timezone_set('Asia/Jakarta');

       $foto= $this->request->getFile('foto');
       if (!empty($foto->getName())) {
        if ($foto->isValid() && !$foto->hasMoved()) {
            if (file_exists("images/" . $id)) {
                unlink("images/" . $id);
            }
            $imageName = $foto->getName();
            $foto->move('images/', $imageName);
        }
    } else {
        $imageName = $this->request->getPost('old_foto');
    }


    //Yang ditambah ke user
    $where=array('id_user'=>$id);
    $data1=array(
        'username'=>$a,
        'email'=>$c,
        'foto'=>$imageName,
        'level'=>6,
        'user_update'=>session()->get('id')
    );
    $model=new M_siswa();
    $model->qedit('user', $data1, $where);

    //Yang ditambah ke karyawan
    $where2=array('user_siswa'=>$id2);
    $data2=array(
        'nama_siswa'=>$e,
        'nis'=>$f,
        'tanggal_lahir'=>$g,
        'tempat_lahir'=>$h,
        'jenis_kelamin'=>$i,
        'telpon_siswa'=>$j,
        'jurusan'=>$k,
        'nama_pt'=>$l,
        'guru_pembimbing'=>$m,
        'instruktur'=>$n,
        'kajur'=>$o,
        'user_update'=>session()->get('id'),
        'updated_at'=>date('Y-m-d H:i:s')
    );

    $model->qedit('data_siswa', $data2, $where2);
    return redirect()->to('agendapkl/data_siswa_all');
}else {
    return redirect()->to('agendapkl');
}
}


}