<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_tahun extends Model
{
    protected $table = 'tahun';
    protected $primaryKey = 'id_tahun';
    protected $allowedFields = ['nama_t','status'];
 


}