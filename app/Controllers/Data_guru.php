<?php

namespace App\Controllers;
use App\Models\M_guru;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Data_guru extends BaseController
{

    public function index()
    {
      if(session()->get('level')==1 ||  session()->get('level')==2){
        $model = new M_guru();
        $rombelDetails = $model->getAllRombelDetails();
        $data['a'] = $rombelDetails;
        $data['title']='Data Guru';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu');
        echo view('partial/top_menu');
        echo view('data_guru/view',$data);
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}

public function tambah_guru()
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_guru();
        $rombelDetails = $model->getAllRombel();
        $data['a'] = $rombelDetails;
        $data['c'] = $model->tampil('jenjang');
        $data['title']='Data Guru';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu');
        echo view('partial/top_menu');
        echo  view('data_guru/create',$data);
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}
public function aksi_tambah_guru()
{
    $nik= $this->request->getPost('nik');
    $nama= $this->request->getPost('nama');
    $jenjang= $this->request->getPost('jenjang');
    $rombel= $this->request->getPost('rombel');
    $a= $this->request->getPost('username');
    $b= $this->request->getPost('password');
    $foto = $this->request->getFile('foto');
    if ($foto->isValid() && !$foto->hasMoved()) {
        $imageName = $foto->getName();
        $foto->move('images/', $imageName);
    } else {
        $imageName = 'default.png';
    }

    $data1=array(
        'username'=>$a,
        'password'=>md5($b),
        'level'=>'3',
        'foto'=>$imageName,
        'jenjang'=>$jenjang,
        'created_at'=>date('Y-m-d H:i:s')

    );
    $darrel=new M_guru();  
    $darrel->simpan('user', $data1);
    $where=array('username'=>$a);
    $ae=$darrel->getWhere2('user', $where);
    $id = $ae['id_user'];
    $data2=array(
        'nik'=>$nik,
        'nama'=>$nama,
        'rombel'=>$rombel,
        'user'=>$id,
        'created_at'=>date('Y-m-d H:i:s')

    );
    $darrel->simpan('guru', $data2);

    return redirect()->to('data_guru');
    
}
public function edit_guru($user)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_guru();
        $rombelDetails = $model->getAllRombel();
        $data['title']='Data Guru';
        $data['a'] = $rombelDetails;
        $data['c'] = $model->tampil('jenjang');
        $where=array('user'=>$user);
        $where2=array('id_user'=>$user);
        $data['jojo']=$model->getWhere('guru',$where);
        $data['rizkan']=$model->getWhere('user',$where2);
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu');
        echo view('partial/top_menu');
        echo view('data_guru/edit',$data);
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}
public function aksi_edit_guru()
{
    $nik = $this->request->getPost('nik');
    $a = $this->request->getPost('username');
    $nama = $this->request->getPost('nama');
    $rombel= $this->request->getPost('rombel');
    $id = $this->request->getPost('id');
    $id2 = $this->request->getPost('id2');
    $jenjang= $this->request->getPost('jenjang');
    $foto = $this->request->getFile('foto');

    $imageName = null; 

    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $imageName = $foto->getName();
        $foto->move('images/', $imageName);
    }

    $where = array('id_user' => $id);
    $data1 = array(
        'username' => $a,
        'jenjang' => $jenjang
    );

    if ($imageName) {
        $data1['foto'] = $imageName;
    }

    $darrel = new M_guru();
    $darrel->qedit('user', $data1, $where);
    $where2 = array('user' => $id2);
    $data2 = array(
        'nik' => $nik,
        'nama' => $nama,
        'rombel' => $rombel
        
    );
    $darrel->qedit('guru', $data2, $where2);
    return redirect()->to('data_guru');
}
public function delete_guru($id)
{
    $model=new M_guru();
    $where=array('user'=>$id);
    $where2=array('id_user'=>$id);
    $model->hapus('guru',$where);
    $model->hapus('user',$where2);
    return redirect()->to('data_guru');
}

public function import_excel()
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
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
                'jenjang' => $sheet->getCellByColumnAndRow(3, $row)->getValue(),
                'level' => 3,
                'foto' => 'default.png',
                'created_at'=>date('Y-m-d H:i:s')
            ];

            $model->simpan('user', $data1);
            $where=array('username'=>$sheet->getCellByColumnAndRow(1, $row)->getValue());

            $user=$model->getWhere2('user', $where);
            $iduser = $user['id_user'];

            $data2=array(
                'nik'=>$sheet->getCellByColumnAndRow(4, $row)->getValue(),
                'nama'=>$sheet->getCellByColumnAndRow(5, $row)->getValue(),
                'rombel'=>$sheet->getCellByColumnAndRow(6, $row)->getValue(),
                'user'=>$iduser,
                'created_at'=>date('Y-m-d H:i:s')
            );
            $model->simpan('guru', $data2);
        }

        return redirect()->back()->with('success', 'Data Excel Telah Berhasil Diimport');
    }else {
        return redirect()->to('login');
    }
}


}