<?php
namespace App\Models\landinpage;
use CodeIgniter\Model;

class U_model extends Model
{  
    public function getUser() {
        $query = $this->db->table('user')
            ->select('user.*, level.*, 
                    user.create_date AS user_create_date,
                    user.update_date AS user_update_date,
                    user.delete_date AS user_delete_date')
            ->join('level', 'level.id_level = user.level')
            ->where("user.delete_date IS NULL")
            ->orderBy('id_user', 'desc');

        return $query->get()->getResult();

    }
    
    public function getBinUser() {
        $query = $this->db->table('user')
            ->select('user.*, level.*, 
                    user.create_date AS user_create_date,
                    user.update_date AS user_update_date,
                    user.delete_date AS user_delete_date')
            ->join('level', 'level.id_level = user.level')
            ->where("user.delete_date IS NOT NULL")
            ->orderBy('id_user', 'desc');

        return $query->get()->getResult();

    }


    public function getUserSetting(){
        $query = $this->db->table('user')
            ->select('*')
            ->join('level', 'level.id_level = user.level')
            ->where('user.id_user', session()->get('id'));
    
        return $query->get()->getRow();
    }

    public function getLevel(){
        $query = $this->db->table('level')
        ->select('*');
        
        return $query->get()->getResult();
    }
}