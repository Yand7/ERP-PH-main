<?php
namespace App\Models\piketm;
use CodeIgniter\Model;

class M_model extends Model
{  
    public function tampil($table){
        return $this->db->table($table)->get()->getResult();
    }
    public function tampil2($table){
        return $this->db->table($table)->get()->getRow();
    }
    public function tampil1($table,$where){
        return $this->db->table($table)->getWhere($where)->getResult();
    }
    
    public function hapus($table, $where){
        return $this->db->table($table)->delete($where);
    }

    public function simpan($table, $data){
        return $this->db->table($table)->insert($data);
    }

    public function getWhere($table, $where){
        return $this->db->table($table)->getWhere($where)->getRow();
    }

    public function getWhere2($table, $where){
		return $this->db->table($table)->getWhere($where)->getRowArray();
	}

    public function qedit($table, $data, $where){
        return $this->db->table($table)->update($data, $where);
    }
    
    public function join2($table1, $table2, $on){
        return $this->db->table($table1)->join($table2, $on, 'left')->get()->getResult();
    }
    public function join3($table1, $table2, $table3, $on, $on2){
        return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->get()->getResult();
    }
    public function join4($table1, $table2, $table3, $table4, $on, $on2, $on3){
        return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->join($table4, $on3, 'left')->get()->getResult();
    }
    // public function joinW($table1, $table2, $table3, $table4, $on, $on2, $on3, $where){
    //     return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->join($table4, $on3, 'left')->getWhere($where)->getResult();
    // }
   
    public function joinW($table1, $table2, $on, $where){
        return $this->db->table($table1)->join($table2, $on, 'left')->getWhere($where)->getRow();
    }
   
    public function joinW2($table1, $table2,$table3, $on, $on2, $where){
        return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->getWhere($where)->getRow();
    }
    
    public function join5($table1, $table2, $table3, $table4, $table5, $on, $on2, $on3, $on4){
        return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->join($table4, $on3, 'left')->join($table5, $on4, 'left')->get()->getResult();
    }

    public function getRombel(){
        return $this->db->table('rombel')
        ->select('rombel.nama_r, rombel.id_rombel,kelas.nama_kelas, jurusan.nama_jurusan')
        ->join('kelas', 'kelas.id_kelas = rombel.kelas')
        ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
        ->get()
        ->getResult();
    }
   
    public function getRombelW($id){
        return $this->db->table('rombel')
        ->select('rombel.nama_r, rombel.id_rombel,kelas.nama_kelas, jurusan.nama_jurusan')
        ->join('kelas', 'kelas.id_kelas = rombel.kelas')
        ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
        ->where('rombel.id_rombel', $id)
        ->get()
        ->getRow();
    }

    public function useResult($query, $str = false){
        if ($str){
            return $query;
        }
        return $this->db->query($query)->getResult();

        //how to use
        // $p = $model->use("SELECT count(*) count, sum(nominal) total 
        // FROM sasa b left join user u  on b.inputBy = u.id_user WHERE b.deleteBy IS NULL AND status2 <>  'Pending' 
        // {$whr} and (u.username like '%{$search}%' or first_number like '%{$search}%' or second_number like '%{$search}%' 
        // or status3 like '%{$search}%') ;");

    }
    
    public function useRow($query, $str = false){
        if ($str){
            return $query;
        }
        return $this->db->query($query)->getRow();

        //how to use
        // $p = $model->use("SELECT count(*) count, sum(nominal) total 
        // FROM sasa b left join user u  on b.inputBy = u.id_user WHERE b.deleteBy IS NULL AND status2 <>  'Pending' 
        // {$whr} and (u.username like '%{$search}%' or first_number like '%{$search}%' or second_number like '%{$search}%' 
        // or status3 like '%{$search}%') ;");

    }
}