<?php

namespace App\Controllers\agendapkl;
use App\Models\agendapkl\M_login;

class Dashboard extends BaseController
{

    public function index()
    {
        if(session()->get('id')>0) {
           $model=new M_login();
           $id=session()->get('id');
           $on='user.level=level.id_level';
           $where=array('user.id_user'=>$id);
           $data['jojo']=$model->joinlogin('user', 'level', $on, $where);
           $data['title']='Dashboard';

           echo view('agendapkl/partial_dashboard/header_dashboard', $data);
           echo view('agendapkl/partial/side_menu');
           echo view('agendapkl/partial/top_menu');
           echo view('agendapkl/login/dashboard', $data);
           echo view('agendapkl/partial_dashboard/footer_dashboard');

       }else{
        return redirect()->to('agendapkl');
    }
}

}