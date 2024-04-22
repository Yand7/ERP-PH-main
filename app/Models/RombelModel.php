<?php 
namespace App\Models;

use CodeIgniter\Model;

class RombelModel extends Model
{
    protected $table = 'rombel';
    protected $primaryKey = 'id_rombel';
    protected $allowedFields = ['kelas','jurusan'];
    
}