<?php

namespace App\Controllers\voting;
use CodeIgniter\Controller;
use App\Models\voting\M_model;
use App\Models\voting\V_model;
use App\Models\voting\K_model;

class Vote extends BaseController
{
    public function index()
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model = new V_model();
        $periodes = $model->getPeriodesWithStatus();
        $data['periodes'] = $periodes;
        echo view('voting/header');
        echo view('voting/menuutama');
        echo view('voting/v_vote', $data);
        echo view('voting/footer');
    } else {
        return redirect()->to('/Home');
    }
}

    public function detail($id)
    {
        if(session()->get('level')==1 ||  session()->get('level')==2){
        $periodeModel = new V_Model();
        $kandidatModel = new K_Model();

        
        $periode = $periodeModel->find($id);

       
        $kandidat = $kandidatModel->getKandidatByPeriode($periode['id']);

        echo view('voting/header');
        echo view('voting/menuutama');
        echo view('voting/detail', [
            'periode' => $periode,
            'kandidat' => $kandidat
        ]);
        echo view('voting/footer');
    }else{
        return redirect()->to('voting//Home');
    }
    }
    public function tambah()
    {
        if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new m_model();
            echo view('voting/header');
			echo view('voting/menuutama');
			echo  view('voting/tambah_vote');
			echo view('voting/footer');
        }else{
            return redirect()->to('voting//Home');
        }
    }
    public function aksi_tambah()
    {
        if(session()->get('level')==1 ||  session()->get('level')==2){
        $Model= new V_model();
        $data = $this->request->getPost();
        $Model->insertData($data);
        return redirect()->to('voting/Vote/index/');
    }else{
        return redirect()->to('voting/Home');
    }
    }
    public function edit($id)
    {
    if(session()->get('level')==1 ||  session()->get('level')==2){
    $Model = new V_Model();
    $data['a'] = $Model->getById($id);
    if(!$data['a']){
        return redirect()->to('voting/Vote/index');
    }
    echo view('voting/header');
    echo view('voting/menuutama');
    echo view('voting/edit_vote', $data);
    echo view('voting/footer');
}else{
    return redirect()->to('/Home');
}
}
public function aksi_edit($id)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
    $model = new V_model();
    $data = $this->request->getPost();   
    $model->updateP($id, $data);
    return redirect()->to('voting/Vote/index');
}else{
    return redirect()->to('voting/Home');
}
}
public function delete($id)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
    $Model = new V_model();
    $Model->deleteD($id);
    return redirect()->to('voting/Vote/index/');
}else{
    return redirect()->to('voting/Home');
}
}
public function aksi($periode_id)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
    $model = new K_model();
    
    // Misalnya, Anda ingin mengubah status2 menjadi 'Tampil' hanya untuk kandidat dengan periode_id yang sesuai
    $data = ['status2' => 'Tampil'];
    
    // Kemudian Anda dapat menggunakan model untuk melakukan pembaruan sesuai periode_id yang dipilih
    $model->updateVoteByPeriodeId($periode_id, $data);
    
    return redirect()->to(base_url('voting/Vote')); 
}else{
    return redirect()->to('voting/Home');
}
}
public function matikanHasil($periode_id)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
    $model = new K_model();
    
    // Misalnya, Anda ingin mengubah status2 menjadi null hanya untuk kandidat dengan periode_id yang sesuai
    $data = ['status2' => null];
    
    // Kemudian Anda dapat menggunakan model untuk melakukan pembaruan sesuai periode_id yang dipilih
    $model->updateVoteByPeriodeId($periode_id, $data);
    
    return redirect()->to(base_url('voting/Vote')); 
}else{
    return redirect()->to('voting/Home');
}
}

public function store()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
            $model = new V_model();
            $periodes = $model->getPeriodesWithStatuss();
            $data['periodes'] = $periodes;
            echo view('voting/header');
            echo view('voting/menuutama');
            echo view('voting/store_vote', $data);
            echo view('voting/footer');
        } else {
            return redirect()->to('voting/Home');
        }
        }
        public function balik($id) {
            if(session()->get('level')==1 ||  session()->get('level')==2){
            $model = new V_model(); // Gantilah NamaModelAnda dengan nama model yang sesuai
            $data = ['deleted_at' => null]; // Data yang akan diupdate
        
            // Lakukan update data berdasarkan id_user
            $model->updateData($id, $data);
        
            return redirect()->to(base_url('voting/Vote'));
        }else{
            return redirect()->to('voting/Home');
        } // Redirect ke halaman awal atau halaman yang sesuai
        }
        public function hilang() {
            if(session()->get('level')==1 ||  session()->get('level')==2){
            $model = new M_model(); // Gantilah dengan nama model yang sesuai
            $where = "deleted_at IS NOT NULL"; // Kondisi untuk menghapus data dengan deleted_at terisi
        
            // Hapus data berdasarkan kondisi
            $model->hapus('vote', $where);
        
            return redirect()->to('voting/Vote');
        }else{
            return redirect()->to('voting/Home');
        }
        }
}


