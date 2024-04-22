<?php

namespace App\Controllers;
use App\Models\M_model;
use App\Models\TahunModel; 

class Tahun extends BaseController
{
	public function index()
	{ 
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model = new M_model();
			$tahunModel = new TahunModel();
			$tahun = $tahunModel->findAll(); // Ambil semua data tahun dari model
			$data['a'] = $model->tampil('tahun');
			$isAktifExist = false; // Buat variabel untuk melacak apakah status 'Aktif' sudah ada sebelumnya
			foreach ($tahun as $item) {
				if ($item['status'] === 'Aktif') {
					$isAktifExist = true; // Jika ada yang 'Aktif', set variabel ke true
					break;
				}
			}

			$data['title']='Data Tahun';

			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('tahun/v_tahun',['a' => $data['a'], 'isAktifExist' => $isAktifExist, 'tahun' => $tahun]);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function tambah_tahun()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$data['title']='Data Tahun';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('tahun/tambah_tahun');
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	
	public function aksi_tambah_tahun()
	{
		$a=$this->request->getPost('nama_t');
		

		$simpan=array(
			'nama_t'=>$a,
			'status'=>"Tidak-Aktif",
			'created_at'=>date('Y-m-d H:i:s')
		);
		$model=new M_model();
		$model->simpan('tahun',$simpan);
		return redirect()->to('/tahun');
	}
	public function edit_tahun($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$where=array('id_tahun'=>$id);
			$data['title']='Data Tahun';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			$data['jojo']=$model->getWhere('tahun',$where);
			echo  view('tahun/edit_tahun',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function aksi_edit_tahun()
	{
		
		$id=$this->request->getPost('id');
		$a=$this->request->getPost('nama_t');


		$where=array('id_tahun'=>$id);
		$simpan=array(
			'nama_t'=>$a
			
			
		);
		$model=new M_model();
		$model->qedit('tahun',$simpan, $where);
		return redirect()->to('/tahun');

	}
	public function delete_tahun($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new m_model();
			$where=array('id_tahun'=>$id);
			$model->hapus('tahun',$where);
			return redirect()->to('/tahun');
		}else{
			return redirect()->to('login');
		}
	}
	public function aksi($id_tahun)
	{
		$model = new M_model();
		
        // Dapatkan informasi tahun berdasarkan ID
        $tahun = $model->gettahunById($id_tahun); // Implementasikan method ini sesuai dengan model Anda
        
        // Cek status tahun saat ini dan tentukan status berikutnya
        $newStatus = ($tahun->status === 'Aktif') ? 'Tidak-Aktif' : 'Aktif';
        
        // Update status tahun
        $data = array('status' => $newStatus);
        $where = array('id_tahun' => $id_tahun);
        $model->qedit('tahun', $data, $where);
        
        return redirect()->to('/tahun');
    }
}