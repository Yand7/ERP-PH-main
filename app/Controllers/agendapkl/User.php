<?php

namespace App\Controllers\agendapkl;
use App\Models\agendapkl\M_user;

class User extends BaseController
{
    public function index()
    {
        if(session()->get('level')== 1) {
            $model=new M_user();
            $on='user.level=level.id_level';
            $data['jojo']=$model->join2('user', 'level', $on);
            $data['title']='User';
            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/user/view', $data);
            echo view('agendapkl/partial/footer_datatable');
        }else {
            return redirect()->to('agendapkl');

        }
    }

    public function reset_password($id)
    {
        if(session()->get('level')== 1) {
            $model=new M_user();
            $where=array('id_user'=>$id);
            $user=array('password'=>md5('12345'));
            $model->qedit('user', $user, $where);

            echo view('agendapkl/partial/header_datatable');
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/partial/footer');

            return redirect()->to('agendapkl/user');
        }else {
            return redirect()->to('agendapkl');

        }
    }

}