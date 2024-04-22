<?php

namespace App\Models\agendapkl;
use CodeIgniter\Model;

class M_absensi_kantor extends Model
{		
	protected $table      = 'data_absensi_kantor';
	protected $primaryKey = 'id_absensi';
	protected $allowedFields = ['siswa', 'tanggal', 'keterangan'];
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;

	public function tampil($table1)	
	{
		return $this->db->table($table1)
		->where('deleted_at', null)
		->get()
		->getResult();
	}
	public function tampil_siswa($table1, $idInstruktur)
	{
		return $this->db->table($table1)
		->where('instruktur', $idInstruktur)
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
		->where('data_absensi_kantor.deleted_at', null)
		->get()
		->getResult();
	}
	public function join3($table1, $table2, $table3, $on, $on2)
	{
		return $this->db->table($table1)
		->join($table2, $on, 'left')
		->join($table3, $on2, 'left')
		->where('data_absensi_kantor.deleted_at', null)
		->get()
		->getResult();
	}
	public function join3w($table1, $table2, $table3, $on, $on2, $where)
	{
		return $this->db->table($table1)
		->join($table2, $on, 'left')
		->join($table3, $on2, 'left')
		->where('data_absensi_kantor.deleted_at', null)
		->where($where)
		->get()
		->getResult();
	}


	//Filter print
	public function getDataByFilter($idSiswa, $awal, $akhir)
	{
		$builder = $this->db->table('data_absensi_kantor');

    // Join dengan tabel data_siswa
		$builder->join('data_siswa', 'data_siswa.user_siswa = data_absensi_kantor.siswa');

    // Join dengan tabel data_keterangan
		$builder->join('data_keterangan', 'data_keterangan.id_keterangan = data_absensi_kantor.keterangan');

    // Menambahkan kondisi filter berdasarkan id siswa dan rentang tanggal
		$builder->where('data_absensi_kantor.siswa', $idSiswa);
		$builder->where('data_absensi_kantor.tanggal >=', $awal);
		$builder->where('data_absensi_kantor.tanggal <=', $akhir);
		$builder->where('data_absensi_kantor.deleted_at', null); 

		$query = $builder->get();

		return $query->getResultArray();
	}



	//CI4 Model
	public function deletee($id)
	{
		return $this->delete($id);
	}
}