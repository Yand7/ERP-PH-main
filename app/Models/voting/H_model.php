<?php 
namespace App\Models\voting;

use CodeIgniter\Model;

class H_model extends Model
{
    protected $table      = 'hasil_vote';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['user_id', 'kandidat_id','created_at'];

    public function savee($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        return parent::save($data);
    }
    
}
