<?php

namespace App\Controllers;
use App\Models\M_model;

class Ruangan extends BaseController
{
	public function index()
	{ 
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$data['a'] = $model->tampil('kelas');
			$data['title']='Data Kelas';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('ruangan/v_kelas',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function jurusan()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$data['title']='Data Jurusan';
			$data['a'] = $model->tampil('jurusan');
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('ruangan/v_jurusan',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function jenjang()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$data['a'] = $model->tampil('jenjang');
			$data['title']='Data Jenjang';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('ruangan/v_jenjang',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function rombel()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$on='rombel.kelas=kelas.id_kelas';
			$on2='rombel.jurusan=jurusan.id_jurusan';
			$data['a'] = $model->joinuser('rombel', 'kelas','jurusan',$on,$on2);
			$data['title']='Data Rombel';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('ruangan/v_rombel',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function tambah_rombel()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$data['g'] = $model->tampil('kelas');
			$data['a'] = $model->tampil('jurusan');
			$data['title']='Tambah Rombel';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('ruangan/tambah_rombel',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	
	public function aksi_tambah_rombel()
	{
		$a=$this->request->getPost('kelas');
		$b=$this->request->getPost('jurusan');
		$c=$this->request->getPost('nama');

		$simpan=array(
			'kelas'=>$a,
			'jurusan'=>$b,
			'nama_r'=>$c,
			'created_at'=>date('Y-m-d H:i:s')
		);
		$model=new M_model();
		$model->simpan('rombel',$simpan);
		return redirect()->to('/Ruangan/rombel');
	}
	public function tambah_jurusan()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('ruangan/tambah_jurusan');
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function tambah_jenjang()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$data['title']='Tambah Jenjang';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('ruangan/tambah_jenjang');
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	
	public function aksi_tambah_jurusan()
	{
		$a=$this->request->getPost('nama_jurusan');

		$simpan=array(
			'nama_jurusan'=>$a,
			'created_at'=>date('Y-m-d H:i:s')
		);
		$model=new M_model();
		$model->simpan('jurusan',$simpan);
		return redirect()->to('/Ruangan/jurusan');
	}
	public function aksi_tambah_jenjang()
	{
		$a=$this->request->getPost('nama_jenjang');

		$simpan=array(
			'nama_jenjang'=>$a,
			'created_at'=>date('Y-m-d H:i:s')
		);
		$model=new M_model();
		$model->simpan('jenjang',$simpan);
		return redirect()->to('/Ruangan/jenjang');
	}
	public function tambah_kelas()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$data['title']='Tambah Kelas';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('ruangan/tambah_kelas');
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	
	public function aksi_tambah_kelas()
	{
		$a=$this->request->getPost('nama_kelas');

		$simpan=array(
			'nama_kelas'=>$a,
			'created_at'=>date('Y-m-d H:i:s')
		);
		$model=new M_model();
		$model->simpan('kelas',$simpan);
		return redirect()->to('/Ruangan');
	}
	public function edit_kelas($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$where=array('id_kelas'=>$id);
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			$data['jojo']=$model->getWhere('kelas',$where);
			echo  view('ruangan/edit_kelas',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function edit_jenjang($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$where=array('id_jenjang'=>$id);
			$data['title']='Edit Jenjang';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			$data['jojo']=$model->getWhere('jenjang',$where);
			echo  view('ruangan/edit_jenjang',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function aksi_edit_kelas()
	{
		
		$id=$this->request->getPost('id');
		$a=$this->request->getPost('nama_kelas');


		$where=array('id_kelas'=>$id);
		$simpan=array(
			'nama_kelas'=>$a,
			
			
		);
		$model=new M_model();
		$model->qedit('kelas',$simpan, $where);
		return redirect()->to('/Ruangan');

	}
	public function aksi_edit_jenjang()
	{
		
		$id=$this->request->getPost('id');
		$a=$this->request->getPost('nama_jenjang');


		$where=array('id_jenjang'=>$id);
		$simpan=array(
			'nama_jenjang'=>$a,
			
			
		);
		$model=new M_model();
		$model->qedit('jenjang',$simpan, $where);
		return redirect()->to('/Ruangan/jenjang');

	}
	public function delete_kelas($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new m_model();
			$where=array('id_kelas'=>$id);
			$model->hapus('kelas',$where);
			return redirect()->to('/Ruangan');
		}else{
			return redirect()->to('login');
		}
	}
	public function delete_jenjang($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new m_model();
			$where=array('id_jenjang'=>$id);
			$model->hapus('jenjang',$where);
			return redirect()->to('/Ruangan/jenjang');
		}else{
			return redirect()->to('login');
		}
	}
	public function edit_jurusan($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$data['title']='Edit Jurusan';
			$where=array('id_jurusan'=>$id);
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			$data['jojo']=$model->getWhere('jurusan',$where);
			echo  view('ruangan/edit_jurusan',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}

	}
	public function aksi_edit_jurusan()
	{
		$id=$this->request->getPost('id');
		$a=$this->request->getPost('nama_jurusan');


		$where=array('id_jurusan'=>$id);
		$simpan=array(
			'nama_jurusan'=>$a
			
		);
		$model=new M_model();
		$model->qedit('jurusan',$simpan, $where);
		return redirect()->to('/Ruangan/jurusan');

	}
	public function delete_jurusan($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new m_model();
			$where=array('id_jurusan'=>$id);
			$model->hapus('jurusan',$where);
			return redirect()->to('/Ruangan/jurusan');
		}else{
			return redirect()->to('login');
		}
	}
	public function edit_rombel($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$data['title']='Edit Rombel';
			$data['g']=$model->tampil('kelas');
			$data['a']=$model->tampil('jurusan');
			$where=array('id_rombel'=>$id);
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			$data['jojo']=$model->getWhere('rombel',$where);
			echo  view('ruangan/edit_rombel',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}

	}
	public function aksi_edit_rombel()
	{
		$id=$this->request->getPost('id');
		$a=$this->request->getPost('kelas');
		$b=$this->request->getPost('jurusan');


		$where=array('id_rombel'=>$id);
		$simpan=array(
			'kelas'=>$a,
			'jurusan'=>$b
			
		);
		$model=new M_model();
		$model->qedit('rombel',$simpan, $where);
		return redirect()->to('/Ruangan/rombel');

	}
	public function delete_rombel($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new m_model();
			$where=array('id_rombel'=>$id);
			$model->hapus('rombel',$where);
			return redirect()->to('/Ruangan/rombel');
		}else{
			return redirect()->to('login');
		}
	}
	
}