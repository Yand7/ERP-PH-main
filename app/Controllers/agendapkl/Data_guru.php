<?php

namespace App\Controllers\agendapkl;
use App\Models\agendapkl\M_guru;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Data_guru extends BaseController
{
    public function index()
    {
       if(session()->get('level')== 1) {
        $model=new M_guru();
        $on='data_guru.jabatan=level.id_level';
        $on2='data_guru.jurusan=data_jurusan.id_jurusan';
        $data['jojo']=$model->join3('data_guru', 'level', 'data_jurusan', $on, $on2);
        $data['title']='Data Guru';

        echo view('agendapkl/partial/header_datatable', $data);
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_guru/view', $data);
        echo view('agendapkl/partial/footer_datatable');
    }else {
        return redirect()->to('agendapkl');
    }
}

public function create()
{
    if(session()->get('level')== 1) {
        $model=new M_guru();
        $data['jurusan']=$model->tampil('data_jurusan');
        $data['title']='Data Guru';
        echo view('agendapkl/partial/header_datatable', $data);
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_guru/create', $data); 
        echo view('agendapkl/partial/footer_datatable');
    }else {
        return redirect()->to('agendapkl');
    }
}

public function aksi_create()
{ 
    if(session()->get('level')== 1) {
        $a= $this->request->getPost('username');
        $b= $this->request->getPost('password');
        $c= $this->request->getPost('email');
        $e= $this->request->getPost('nik');
        $f= $this->request->getPost('nama');
        $g= $this->request->getPost('telpon');
        $h= $this->request->getPost('jenis_kelamin');
        $i= $this->request->getPost('tempat_lahir');
        $j= $this->request->getPost('tanggal_lahir');
        $k= $this->request->getPost('jurusan');
        date_default_timezone_set('Asia/Jakarta');
        
        $foto= $this->request->getFile('foto');
        if($foto && $foto->isValid() && ! $foto->hasMoved())
        {
            $imageName = $foto->getName();
            $foto->move('images/',$imageName);
        }else{
            $imageName='default.png';
        }

        //Yang ditambah ke user
        $data1=array(

            'username'=>$a,
            'password'=>md5($b),
            'email'=>$c,
            'foto'=>$imageName,
            'level'=>4,
            'user_create'=>session()->get('id')
        );
        $model=new M_guru();
        $model->simpan('user', $data1);
        $where=array('username'=>$a);

        $m=$model->getWhere2('user', $where);
        $iduser = $m['id_user'];

        //Yang ditambah ke karyawan
        $data2=array(
            'nik'=>$e,
            'nama_guru'=>$f,
            'telpon'=>$g,
            'jenis_kelamin'=>$h,
            'tempat_lahir'=>$i,
            'tanggal_lahir'=>$j,
            'jabatan'=>4,
            'jurusan'=>$k,
            'user_guru'=>$iduser,
            'user_create'=>session()->get('id'),
            'created_at'=>date('Y-m-d H:i:s')
        );
        $model->simpan('data_guru', $data2);
        echo view('agendapkl/partial/header_datatable');
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/partial/footer_datatable');
        return redirect()->to('agendapkl/data_guru');
    }else {
        return redirect()->to('agendapkl');
    }
}
public function edit($id)
{ 
    if(session()->get('level')== 1) {
        $model=new M_guru();
        $where=array('user_guru'=>$id);
        $where2=array('id_user'=>$id);
        $data['jurusan']=$model->tampil('data_jurusan');
        $data['darel']=$model->tampil('level');
        $data['user']=$model->tampil('level');
        $data['jojo']=$model->getWhere('data_guru',$where);
        $data['rizkan']=$model->getWhere('user',$where2);
        $data['title']='Data Guru';
        echo view('agendapkl/partial/header_datatable', $data);
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_guru/edit',$data);
        echo view('agendapkl/partial/footer_datatable');    
    }else {
        return redirect()->to('agendapkl/home');
    }
}

public function aksi_edit()
{ 
    if(session()->get('level')== 1) {
        $a= $this->request->getPost('username');
        $b= $this->request->getPost('password');
        $c= $this->request->getPost('email');
        $e= $this->request->getPost('nik');
        $f= $this->request->getPost('nama');
        $g= $this->request->getPost('telpon');
        $h= $this->request->getPost('jenis_kelamin');
        $i= $this->request->getPost('tempat_lahir');
        $j= $this->request->getPost('tanggal_lahir');
        $k= $this->request->getPost('jurusan');
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
            'level'=>4,
            'user_update'=>session()->get('id')
        );
        $model=new M_guru();
        $model->qedit('user', $data1, $where);

        //Yang ditambah ke karyawan
        $where2=array('user_guru'=>$id2);
        $data2=array(
            'nik'=>$e,
            'nama_guru'=>$f,
            'telpon'=>$g,
            'jenis_kelamin'=>$h,
            'tempat_lahir'=>$i,
            'tanggal_lahir'=>$j,
            'jabatan'=>4,
            'jurusan'=>$k,
            'user_update'=>session()->get('id'),
            'updated_at'=>date('Y-m-d H:i:s')
        );

        $model->qedit('data_guru', $data2, $where2);
        return redirect()->to('agendapkl/data_guru');
    }else {
        return redirect()->to('agendapkl');
    }
}
public function delete($id)
{ 
    if(session()->get('level')== 1) {
        $model=new M_guru();
        $where=array('user_guru'=>$id);
        $where2=array('id_user'=>$id);

        $data=array(
            'user_delete'=>session()->get('id'),
            'deleted_at'=>date('Y-m-d H:i:s')
        );

        $model->qedit('data_guru', $data, $where);
        $model->qedit('user', $data, $where2);
        return redirect()->to('agendapkl/data_guru');
    }else {
        return redirect()->to('agendapkl');
    }
}

// =============================================================================================

public function import_excel()
{
    if(session()->get('level')== 1) {
        $model = new M_guru();
        $file = $this->request->getFile('file_excel');
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        for ($row = 2; $row <= $highestRow; $row++) {

            $data1 = [
                'username' => $sheet->getCellByColumnAndRow(1, $row)->getValue(),
                'password' => md5($sheet->getCellByColumnAndRow(2, $row)->getValue()),
                'email' => $sheet->getCellByColumnAndRow(3, $row)->getValue(),
                'level' => 4,
                'foto' => 'default.png',
                'user_create'=>session()->get('id')
            ];

            $model->simpan('user', $data1);
            $where=array('username'=>$sheet->getCellByColumnAndRow(1, $row)->getValue());

            $user=$model->getWhere2('user', $where);
            $iduser = $user['id_user'];

            $data2=array(
                'nama_guru'=>$sheet->getCellByColumnAndRow(4, $row)->getValue(),
                'nik'=>$sheet->getCellByColumnAndRow(5, $row)->getValue(),
                'tanggal_lahir'=>$sheet->getCellByColumnAndRow(6, $row)->getValue(),
                'tempat_lahir'=>$sheet->getCellByColumnAndRow(7, $row)->getValue(),
                'jenis_kelamin'=>$sheet->getCellByColumnAndRow(8, $row)->getValue(),
                'telpon'=>$sheet->getCellByColumnAndRow(9, $row)->getValue(),
                'jabatan'=>$sheet->getCellByColumnAndRow(10, $row)->getValue(),
                'jurusan'=>$sheet->getCellByColumnAndRow(11, $row)->getValue(),
                'user_guru'=>$iduser,
                'user_create'=>session()->get('id'),
            );
            $model->simpan('data_guru', $data2);
        }

        return redirect()->back()->with('success', 'Data Excel Telah Berhasil Diimport');
    }else {
        return redirect()->to('agendapkl');
    }
}

}