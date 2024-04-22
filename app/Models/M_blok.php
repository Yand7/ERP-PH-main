<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_blok extends Model
{
    protected $table = 'blok';
    protected $primaryKey = 'id_blok';
    protected $allowedFields = ['nama_b','statuss'];
    


}