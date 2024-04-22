<?php namespace App\Models\voting;

use CodeIgniter\Model;

class M_model extends Model
{
	public function tampil($table){
		return $this->db->table($table)->get()->getResult();
	}
	public function geta()
    {
        return $this->findAll();
    }

	public function simpan($table, $data){
		return $this->db->table($table)->insert($data);
	}
	public function getWhere($table, $where){
		return $this->db->table($table)->getWhere($where)->getRow();
	}
	public function qedit($table, $data, $where){
		return $this->db->table($table)->update($data, $where);
	}
	
	public function join2($table1, $table2, $on){
    return $this->db->table($table1)
                    ->join($table2, $on, 'left')
                    ->where('user.deleted_at', null) 
                    ->get()
                    ->getResult();
}
public function getUsersWithLevel2()
{
    return $this->db->table('user')
        ->join('level', 'user.level = level.id_level', 'left')
        ->where('user.level >', 1)
        ->where('user.deleted_at', null)
        ->get()
        ->getResult();
}
public function getUsersWith()
{
    return $this->db->table('level')
        ->where('id_level >', 1)
        ->get()
        ->getResult();
}

public function jointes($table1, $table2, $on){
    return $this->db->table($table1)
                    ->join($table2, $on, 'left')
					->where("$table1.deleted_at IS NOT NULL")
                    ->get()
                    ->getResult();
}
	public function getWhere2($table, $where){
		return $this->db->table($table)->getWhere($where)->getRowArray();
	}
	public function join3($table1, $table2,$table3, $on,$on1,$where){
		return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on1, 'left')->getWhere($where)->getResult();
	}
	public function updateData($id_user, $data) {
		return $this->db->table('user') // Gantilah nama_tabel_anda dengan nama tabel yang sesuai
			->where('id_user', $id_user)
			->update($data);
	}
	public function hapus($table, $where){
		return $this->db->table($table)->delete($where);
	}

  
}