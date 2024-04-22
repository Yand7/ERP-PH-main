<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNilai extends Model
{
    protected $table = 'nilai'; 
    protected $primaryKey = 'id_nilai';

    protected $allowedFields = ['siswa', 'pengetahuan', 'keterampilan', 'blok', 'mapel', 'guru', 'rombel', 'tahun','created_at'];
}
