<?php

namespace App\Controllers\landinpage;

use App\Models\landinpage\M_model;
use App\Models\landinpage\U_model;
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
            return redirect()->to('landinpage/home/dashboard');
        }
        // echo view('landinpage/header');
        // echo view('landinpage/menu');
        echo view('landinpage/login');
        // echo view('landinpage/footer');
    }

    public function aksi_login()
    {
        $u=$this->request->getPost('username');
        $p=$this->request->getPost('password');
        $model= new M_model();
        $data=array(
            'username'=>$u,
            'password'=>md5($p)

        );
        $cek=$model->getWhere2('user', $data);
        if ($cek>0) {
            session()->set('id', $cek['id_user']);
            session()->set('username', $cek['username']);
            session()->set('level', $cek['level']);
            session()->set('nama', $cek['nama']);
            return redirect()->to('landinpage/Home/dashboard');
        }else {
            return redirect()->to('landinpage/Home');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('landinpage/Home');
    }
    public function dashboard()
    {
        if(session()->get('id')>0) {
            echo view('landinpage/dashboard');
        }else{
            return redirect()->to('landinpage/Home');
        }
    }

    public function user_s(){
        if(session()->get('level')>0) {
            $model = new U_model(); 
    
            $data['us'] = $model->getUserSetting();
    
            echo view('/landinpage/header');
            echo view('/landinpage/v_us', $data);
            echo view('/landinpage/footer');
        }else{
            return redirect()->to('/landinpage/home/dashboard');
        }
        }
    
        public function cpass(){
        if(session()->get('level')>0) {
            $model = new M_model();
            // $on = 'user.level=level.id_level';
            $id = session()->get('id');
            $where=array('id_user'=>$id);
            $data['pp'] = $model->getWhere('user', $where);
    
            echo view('/landinpage/header');
            echo view('/landinpage/cpass', $data);
            echo view('/landinpage/footer');
            }else{
                return redirect()->to('/landinpage/home/dashboard');
            }
        }
    
        public function checkPassword() {
            $p=$this->request->getPost('pw');
            $u=session()->get('id');
            $model= new M_model();
            $pw = md5($p);

            $cek=$model->useRow("SELECT * from user where `password`='{$pw}' and id_user='{$u}'");
            if ($cek->id_user==session()->get('id')) {
                return redirect()->to('/landinpage/home/cpass');
            }else {
                return redirect()->to('/landinpage/home/user_s');
            }
        }
    
        public function output_cpass(){
            $id = $this -> request-> getPost('ide');
            $a = $this -> request-> getPost('p2');
            
            $model=new M_model();
            $where=array('id_user'=>$id);
            $data = array(
                'password' => md5($a)
            );
    
            // print_r($data);
            $model->qedit('user',$data,$where);		
    
            return redirect()->to ('/landinpage/home/user_s');
        }
    
        public function output_selfuser(){
            $id = $this -> request-> getPost('ide');
            $b = $this -> request-> getPost('nm');
            $c = $this -> request-> getPost('nama');
            
            $model=new M_model();
            $where=array('id_user'=>$id);
            $data = array(
                'username' => $b,
                'nama' => $c
            );
            
            $model->qedit('user',$data,$where);		
    
            return redirect()->to ('/landinpage/home/user_s');
        }
}