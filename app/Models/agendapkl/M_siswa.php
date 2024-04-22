<?php

namespace App\Models\agendapkl;
use CodeIgniter\Model;

class M_siswa extends Model
{		
	protected $table      = 'data_siswa';
	protected $primaryKey = 'id_siswa';
	protected $allowedFields = ['nama_siswa', 'nis', 'tanggal_lahir', 'tempat_lahir', 'jenis_kelamin', 'telpon', 'jurusan', 'nama_pt', 'user', 'guru_pembimbing', 'instruktur'];
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;

	public function tampil($table1)	
	{
		return $this->db->table($table1)->where('deleted_at', null)->get()->getResult();
	}
	public function tampil_guru($table1)
	{
		return $this->db->table($table1)
		->where('deleted_at', null)
        ->where('jabatan', 4) 
        ->get()
        ->getResult();
    }
    public function tampil_kajur($table1)
	{
		return $this->db->table($table1)
		->where('deleted_at', null)
        ->where('jabatan', 3) 
        ->get()
        ->getResult();
    }
    public function hapus($table, $where)
    {
    	return $this->db->table($table)->delete($where);
    }
    public function simpan($table, $data)
    {
    	return $this->db->table($table)->insert($data);
    }
    public function qedit($table, $data, $where)
    {
    	return $this->db->table($table)->update($data, $where);
    }
    public function getWhere($table, $where)
    {
    	return $this->db->table($table)->getWhere($where)->getRow();
    }
    public function getWhere2($table, $where)
    {
    	return $this->db->table($table)->getWhere($where)->getRowArray();
    }
    public function join2($table1, $table2, $on)
    {
    	return $this->db->table($table1)
    	->join($table2, $on, 'left')
    	->where('data_siswa.deleted_at', null)
    	->get()
    	->getResult();
    }
    public function join2w($table1, $table2, $on, $where)
    {
        return $this->db->table($table1)
        ->join($table2, $on, 'left')
        ->where('data_siswa.jurusan', $where)
        ->where('data_siswa.deleted_at', null)
        ->get()
        ->getResult();
    }
    public function join3($table1, $table2, $table3, $on, $on2)
    {
    	return $this->db->table($table1)
    	->join($table2, $on, 'left')
    	->join($table3, $on2, 'left')
    	->where('data_siswa.deleted_at', null)
    	->get()
    	->getResult();
    }
    public function join4($table1, $table2, $table3, $table4, $on, $on2, $on3)
    {
        return $this->db->table($table1)
        ->join($table2, $on, 'left')
        ->join($table3, $on2, 'left')
        ->join($table4, $on3, 'left')
        ->where('data_siswa.deleted_at', null)
        ->get()
        ->getResult();
    }
    public function join4w($table1, $table2, $table3, $table4, $on, $on2, $on3, $where)
    {
    	return $this->db->table($table1)
    	->join($table2, $on.' AND '.$table2.'.deleted_at IS NULL', 'left')
        ->join($table3, $on2.' AND '.$table3.'.deleted_at IS NULL', 'left')
        ->join($table4, $on3.' AND '.$table4.'.deleted_at IS NULL', 'left')
        ->select($table1.'.*,' 
                .$table1.'.jenis_kelamin as jenis_kelamin_siswa,'
                .$table1.'.tanggal_lahir as tanggal_lahir_siswa,'
                .$table1.'.tempat_lahir as tempat_lahir_siswa,'
                .$table2.'.*,' 
                .$table3.'.*,' 
                .$table4.'.*,' 
            )

        ->where('data_siswa.jurusan', $where)
    	->where('data_siswa.deleted_at', null)
    	->get()
    	->getResult();
    }

	//CI4 Model
    public function insertt($data)
    {
        return $this->insert($data);
    }
    
    public function deletee($id)
    {
    	return $this->delete($id);
    }
}