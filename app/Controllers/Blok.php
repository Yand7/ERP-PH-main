<?php

namespace App\Controllers;
use App\Models\M_model;
use App\Models\BlokModel; 

class Blok extends BaseController
{
	public function index()
	{ 
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model = new M_model();
		    $blokModel = new BlokModel();
		    $blok = $blokModel->findAll(); // Ambil semua data blok dari model
		    $data['a'] = $model->tampil('blok');
		    $isAktifExist = false; // Buat variabel untuk melacak apakah status 'Aktif' sudah ada sebelumnya
		    foreach ($blok as $item) {
		        if ($item['statuss'] === 'Aktif') {
		            $isAktifExist = true; // Jika ada yang 'Aktif', set variabel ke true
		            break;
		        }
		    }
			$data['title']='Data Blok';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('blok/v_blok', ['a' => $data['a'], 'isAktifExist' => $isAktifExist, 'blok' => $blok]);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function tambah_blok()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$data['title']='Data Blok';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('blok/tambah_blok');
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	
	public function aksi_tambah_blok()
	{
		$a=$this->request->getPost('nama_b');
		

		$simpan=array(
			'nama_b'=>$a,
			'statuss'=>"Tidak-Aktif",
			'created_at'=>date('Y-m-d H:i:s')
		);
		$model=new M_model();
		$model->simpan('blok',$simpan);
		return redirect()->to('/blok');
	}
	public function edit_blok($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$where=array('id_blok'=>$id);
			$data['title']='Data Blok';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			$data['jojo']=$model->getWhere('blok',$where);
			echo  view('blok/edit_blok',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function aksi_edit_blok()
	{
		
		$id=$this->request->getPost('id');
		$a=$this->request->getPost('nama_b');


		$where=array('id_blok'=>$id);
		$simpan=array(
			'nama_b'=>$a
			
			
		);
		$model=new M_model();
		$model->qedit('blok',$simpan, $where);
		return redirect()->to('/blok');

	}
	public function delete_blok($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new m_model();
			$where=array('id_blok'=>$id);
			$model->hapus('blok',$where);
			return redirect()->to('/blok');
		}else{
			return redirect()->to('login');
		}
	}
	public function aksi($id_blok)
	{
		$model = new M_model();
		
        // Dapatkan informasi blok berdasarkan ID
        $blok = $model->getblokById($id_blok); // Implementasikan method ini sesuai dengan model Anda
        
        // Cek status blok saat ini dan tentukan status berikutnya
        $newStatus = ($blok->statuss === 'Aktif') ? 'Tidak-Aktif' : 'Aktif';
        
        // Update status blok
        $data = array('statuss' => $newStatus);
        $where = array('id_blok' => $id_blok);
        $model->qedit('blok', $data, $where);
        
        return redirect()->to('/blok');
    }
    
}