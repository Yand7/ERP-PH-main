<?php

namespace App\Models\agendapkl;
use CodeIgniter\Model;

class M_agenda_guru extends Model
{		
	protected $table      = 'data_agenda';
	protected $primaryKey = 'id_agenda';
	protected $allowedFields = ['siswa', 'tanggal', 'jam_masuk', 'jam_keluar', 'renper_1', 'renper_2', 'renper_3', 'renper_4', 'renper_5', 'reape_1', 'renper_2', 'renper_3', 'reape_4', 'reape_5', 'pk_1', 'pk_2', 'pk_3', 'pm_1', 'pm_2', 'pm_3', 'senyum', 'keramahan', 'penampilan', 'komunikasi', 'realisasi_kerja', 'catatan_1', 'catatan_2', 'catatan_3'];
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;

	public function tampil($table1)	
	{
		return $this->db->table($table1)->get()->getResult();
	}
	public function tampil_siswa($table1, $idGuru)
	{
		return $this->db->table($table1)
		->where('guru_pembimbing', $idGuru)
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
		->where('data_agenda.deleted_at', null)
		->get()
		->getResult();
	}
	public function join2w($table1, $table2, $on, $where)
	{
		return $this->db->table($table1)
		->join($table2, $on, 'left')
		->where('data_agenda.deleted_at', null)
		->getWhere($where)
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