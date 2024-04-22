<?php 
namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $allowedFields = ['nis','nama_siswa', 'rombel','user'];

    public function getGuruData($idGuru)
    {
        return $this->db->table('guru')
        ->where('user', $idGuru)
        ->get()
        ->getRowArray();
    }

    public function getSiswaData($rombel)
    {
        return $this->db->table('siswa')
        ->where('rombel', $rombel)
        ->get()
        ->getResultArray();
    }

    public function getSekreData($idSiswa)
    {
        return $this->db->table('siswa')
        ->where('user', $idSiswa)
        ->get()
        ->getRowArray();
    }


}