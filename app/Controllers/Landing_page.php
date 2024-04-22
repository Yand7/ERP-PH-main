<?php

namespace App\Controllers;

class Landing_page extends BaseController
{
    public function index()
    {
        // $model=new M_level();
        // $data['jojo']=$model->tampil('level');
        $data['title']='Sekolah Permata Harapan';

        echo view('landing_page/partial/header', $data);
        echo view('landing_page/partial/top_menu');
        echo view('landing_page/dashboard/view');
        echo view('landing_page/partial/footer');
    }

}