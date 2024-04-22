<?php

namespace App\Controllers\agendapkl;
use App\Models\agendapkl\M_siswa;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


class Data_siswa extends BaseController
{
    public function index()
    {
       if(session()->get('level')== 1) {
        $model=new M_siswa();
        $on='data_siswa.jurusan=data_jurusan.id_jurusan';
        $data['jojo']=$model->join2('data_siswa', 'data_jurusan', $on);
        $data['title']='Data Siswa';

        echo view('agendapkl/partial/header_datatable', $data);
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_siswa/view', $data);
        echo view('agendapkl/partial/footer_datatable');
    }else {
        return redirect()->to('agendapkl');
    }
}

public function create()
{
    if(session()->get('level')== 1) {
        $model=new M_siswa();
        $data['guru']=$model->tampil_guru('data_guru');
        $data['kajur']=$model->tampil_kajur('data_guru');
        $data['instruktur']=$model->tampil('data_instruktur');
        $data['jurusan']=$model->tampil('data_jurusan');
        $data['title']='Data Siswa';
        echo view('agendapkl/partial/header_datatable', $data);
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_siswa/create', $data); 
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
        $e= $this->request->getPost('nama');
        $f= $this->request->getPost('nis');
        $g= $this->request->getPost('tanggal_lahir');
        $h= $this->request->getPost('tempat_lahir');
        $i= $this->request->getPost('jenis_kelamin');
        $j= $this->request->getPost('telpon');
        $k= $this->request->getPost('jurusan');
        $o= $this->request->getPost('kajur');
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
            'level'=>6,
            'user_create'=>session()->get('id')
        );
        $model=new M_siswa();
        $model->simpan('user', $data1);
        $where=array('username'=>$a);

        $user=$model->getWhere2('user', $where);
        $iduser = $user['id_user'];

        //Yang ditambah ke karyawan
        $data2=array(
            'nama_siswa'=>$e,
            'nis'=>$f,
            'tanggal_lahir'=>$g,
            'tempat_lahir'=>$h,
            'jenis_kelamin'=>$i,
            'telpon_siswa'=>$j,
            'jurusan'=>$k,
            'user_siswa'=>$iduser,
            'kajur'=>$o,
            'user_create'=>session()->get('id'),
            'created_at'=>date('Y-m-d H:i:s')
        );
        $model->simpan('data_siswa', $data2);
        echo view('agendapkl/partial/header_datatable');
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/partial/footer_datatable');
        return redirect()->to('agendapkl/data_siswa');
    }else {
        return redirect()->to('agendapkl');
    }
}
public function edit($id)
{ 
    if(session()->get('level')== 1 || session()->get('level')==7) {
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
        echo view('agendapkl/data_siswa/edit',$data);
        echo view('agendapkl/partial/footer_datatable');    
    }else {
        return redirect()->to('agendapkl/home');
    }
}

public function aksi_edit()
{ 
    if(session()->get('level')== 1 || session()->get('level')==7) {
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
        'kajur'=>$o,
        'user_update'=>session()->get('id'),
        'updated_at'=>date('Y-m-d H:i:s')
    );

    $model->qedit('data_siswa', $data2, $where2);
    if (session()->get('level')==1) {
        return redirect()->to('agendapkl/data_siswa');
    }else {
        return redirect()->to('agendapkl/data_siswa_all');
    }
    
}else {
    return redirect()->to('agendapkl');
}
}
public function delete($id)
{ 
    if(session()->get('level')== 1) {
        $model=new M_siswa();
        $where=array('user_siswa'=>$id);
        $where2=array('id_user'=>$id);

        $data=array(
            'user_delete'=>session()->get('id'),
            'deleted_at'=>date('Y-m-d H:i:s')
        );

        $model->qedit('data_siswa', $data, $where);
        $model->qedit('user', $data, $where2);
        return redirect()->to('agendapkl/data_siswa');
    }else {
        return redirect()->to('agendapkl');
    }
}


//==========================================================================================

public function import_excel()
{
    if(session()->get('level')== 1) {
        $model = new M_siswa();
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
                'level' => 6,
                'foto' => 'default.png',
                'user_create'=>session()->get('id')
            ];

            $model->simpan('user', $data1);
            $where=array('username'=>$sheet->getCellByColumnAndRow(1, $row)->getValue());

            $user=$model->getWhere2('user', $where);
            $iduser = $user['id_user'];

            $data2=array(
                'nama_siswa'=>$sheet->getCellByColumnAndRow(4, $row)->getValue(),
                'nis'=>$sheet->getCellByColumnAndRow(5, $row)->getValue(),
                'tanggal_lahir'=>$sheet->getCellByColumnAndRow(6, $row)->getValue(),
                'tempat_lahir'=>$sheet->getCellByColumnAndRow(7, $row)->getValue(),
                'jenis_kelamin'=>$sheet->getCellByColumnAndRow(8, $row)->getValue(),
                'telpon_siswa'=>$sheet->getCellByColumnAndRow(9, $row)->getValue(),
                'jurusan'=>$sheet->getCellByColumnAndRow(10, $row)->getValue(),
                'user_siswa'=>$iduser,
                'kajur'=>$sheet->getCellByColumnAndRow(11, $row)->getValue(),
                'user_create'=>session()->get('id'),
            );
            $model->simpan('data_siswa', $data2);
        }

        return redirect()->back()->with('success', 'Data Excel Telah Berhasil Diimport');
    }else {
        return redirect()->to('agendapkl');
    }
}


}