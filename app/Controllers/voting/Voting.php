<?php

namespace App\Controllers\voting;

use App\Models\voting\K_model;
use App\Models\voting\V_model;
use App\Models\voting\H_model;

class Voting extends BaseController
{
    
    public function index()
{
    if(session()->get('id')>0) {
        $kandidatModel = new K_model();
        $periodeModel = new V_model();
        $level = session()->get('level');
        
        if ($level == 1 || $level == 2) {
           
            $data['kandidat'] = $kandidatModel->getAllKandidatWithUsername();
            echo view('voting/header');
            echo view('voting/menuutama'); 
            echo view('voting/voting', $data);
            echo view('voting/footer');
        } else {
          
            $periode = $periodeModel->where('status', 'Aktif')->first();

            if ($periode) {
                $periode_id = $periode['id'];
                $data['kandidat'] = $kandidatModel->getKandidatWithUsername($periode_id);
                echo view('voting/header');
                echo view('voting/menuutama'); 
                echo view('voting/voting', $data);
                echo view('voting/footer');
            } else {
                echo view('voting/header');
                echo view('voting/menuutama');
                echo view('voting/no_periode');
                echo view('voting/footer');
            }
        }
    }else{
        return redirect()->to('/voting/Home');
    }
}

public function vote()
{
    if(session()->get('id')>0) {
    $voteModel = new H_model();
    $kandidatModel = new K_model();
    $userId = session()->get('id');
    $kandidatId = $this->request->getPost('kandidatId');

    $existingVote = $voteModel->where('user_id', $userId)->first();
    if ($existingVote) {
        return redirect()->to('/voting/Voting/s_memilih');
    } else {
        $voteModel->savee([
            'user_id' => $userId,
            'kandidat_id' => $kandidatId
        ]);

       
        $kandidatModel->where('id', $kandidatId)->increment('suara');

        return redirect()->to('/voting/Voting/success');
    }
}else{
    return redirect()->to('/voting/Home');
}
}

public function success()
{
    if(session()->get('id')>0) {
    echo view('voting/header');
    echo view('voting/menuutama');
    echo view('voting/vote_success');
    echo view('voting/footer');
}else{
    return redirect()->to('/voting/Home');
}
}
public function s_memilih()
{
    if(session()->get('id')>0) {
    echo view('voting/header');
    echo view('voting/menuutama');
    echo view('voting/s_memilih');
    echo view('voting/footer');
}else{
    return redirect()->to('/voting/Home');
}
}
}
