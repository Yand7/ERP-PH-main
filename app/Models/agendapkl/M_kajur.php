<?php

namespace App\Models\agendapkl;
use CodeIgniter\Model;

class M_kajur extends Model
{		
	protected $table      = 'data_guru';
	protected $primaryKey = 'id_guru';
	protected $allowedFields = ['nama_guru', 'nik', 'tgl_lahir', 'tmpt_lahir', 'no_hp', 'jabatan', 'user'];
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;

	public function tampil($table1)	
	{
		return $this->db->table($table1)->get()->getResult();
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
		->where('data_guru.deleted_at', null)
		->where('jabatan', 3)
		->get()
		->getResult();
	}
	public function join3($table1, $table2, $table3, $on, $on2)
	{
		return $this->db->table($table1)
		->join($table2, $on, 'left')
		->join($table3, $on2, 'left')
		->where('data_guru.deleted_at', null)
		->where('jabatan', 3)
		->get()
		->getResult();
	}
	public function join_gaji($table1, $table2, $table3, $on, $on2, $where)
	{
		return $this->db->table($table1)
		->join($table2, $on, 'left')
		->join($table3, $on2, 'left')
		->where($where)
		->where('gaji.deleted_at', null)
		->get()
		->getResult();
	}

	//CI4 Model
	public function deletee($id)
	{
		return $this->delete($id);
	}
}