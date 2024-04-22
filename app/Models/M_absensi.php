<?php

namespace App\Models;
use CodeIgniter\Model;

class M_absensi extends Model
{		
	protected $table = 'absen';
    protected $primaryKey = 'id_absen';
    protected $allowedFields = ['siswa','tanggal', 'status', 'rombel', 'blok','tahun','persen'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

	
}