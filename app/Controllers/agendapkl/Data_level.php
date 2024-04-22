<?php

namespace App\Controllers\agendapkl;
use App\Models\agendapkl\M_level;

class Data_level extends BaseController
{
    public function index()
    {
       if(session()->get('level')== 1) {
        $model=new M_level();
        $data['jojo']=$model->tampil('level');
        $data['title']='Data Level';

        echo view('agendapkl/partial/header_datatable', $data);
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_level/view', $data);
        echo view('agendapkl/partial/footer_datatable');
    }else {
        return redirect()->to('agendapkl');
    }
}

public function create()
{
    if(session()->get('level')== 1) {
        $model=new M_level();
        $data['jojo']=$model->tampil('level');
        $data['title']='Data Level';
        echo view('agendapkl/partial/header_datatable', $data);
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_level/create', $data); 
        echo view('agendapkl/partial/footer_datatable');
    }else {
        return redirect()->to('agendapkl');
    }
}

public function aksi_create()
{ 
    if(session()->get('level')== 1) {
        $a= $this->request->getPost('level');
        date_default_timezone_set('Asia/Jakarta');

        //Yang ditambah ke user
        $data1=array(

            'nama_level'=>$a,
            'user_create'=>session()->get('id')
        );
        $model=new M_level();
        $model->simpan('level', $data1);
        echo view('agendapkl/partial/header_datatable');
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/partial/footer_datatable');
        return redirect()->to('agendapkl/data_level');
    }else {
        return redirect()->to('agendapkl');
    }
}
public function edit($id)
{ 
    if(session()->get('level')== 1 || session()->get('level')==7) {
        $model=new M_level();
        $where=array('id_level'=>$id);
        $data['jojo']=$model->getWhere('level',$where);
        $data['level']=$model->tampil('level');
        $data['title']='Data Level';
        echo view('agendapkl/partial/header_datatable', $data);
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_level/edit',$data);
        echo view('agendapkl/partial/footer_datatable');    
    }else {
        return redirect()->to('agendapkl/home');
    }
}

public function aksi_edit()
{ 
    if(session()->get('level')== 1 || session()->get('level')==7) {
     $a= $this->request->getPost('level');
     $id= $this->request->getPost('id');
     date_default_timezone_set('Asia/Jakarta');

    //Yang ditambah ke user
     $where=array('id_level'=>$id);
     $data1=array(
        'nama_level'=>$a,
        'user_update'=>session()->get('id'),
        'updated_at'=>date('Y-m-d H:i:s')
    );
     $model=new M_level();
     $model->qedit('level', $data1, $where);
     return redirect()->to('agendapkl/data_level');

 }else {
    return redirect()->to('agendapkl');
}
}

public function delete($id)
{ 
    if(session()->get('level')== 1) {
        $model=new M_level();
        $where=array('id_level'=>$id);

        $data=array(
            'user_delete'=>session()->get('id'),
            'deleted_at'=>date('Y-m-d H:i:s')
        );

        $model->qedit('level', $data, $where);
        return redirect()->to('agendapkl/data_level');
    }else {
        return redirect()->to('agendapkl');
    }
}

}