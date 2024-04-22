<?php
namespace App\Models\piketm;
use CodeIgniter\Model;

class U_model extends Model
{  
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'email', 'password', 'level'];
    // protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    // protected $db;

    // public function __construct()
    // {
    //     parent::__construct();

    //     // Menggunakan koneksi dbpiket
    //     $this->db = db_connect('dbpiket');
    // }
}