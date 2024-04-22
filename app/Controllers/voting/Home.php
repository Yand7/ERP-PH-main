<?php

namespace App\Controllers\voting;
use App\Models\voting\M_model;

class Home extends BaseController
{
	protected function isLoggedIn()
    {
        return session()->has('id');
    }
    public function index()
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('voting/Home/dashboard');
        }   
    }
	 
	public function logout()
	{
		session()->destroy();
		return redirect()->to('voting/Home');
	}
	public function dashboard()
	{
		$userLevel = session()->get('level');
		
		if ($userLevel == 3 || $userLevel == 4 || $userLevel == 5) {
			echo view('voting/header');
			echo view('voting/Dashboard2');
			echo view('voting/menuutama');
			echo view('voting/footer');
		} elseif ($userLevel == 1 || $userLevel == 2) {
			echo view('voting/header');
			echo view('voting/Dashboard');
			echo view('voting/menuutama');
			echo view('voting/footer');
		} else {
			return redirect()->to('voting/Home'); // Redirect ke halaman Home untuk level lainnya
		}
	}
	
   
   
}