<?php 

namespace App\Models\voting;

use CodeIgniter\Model;

class V_model extends Model
{
    protected $table = 'vote';
    protected $primaryKey = 'id';
    protected $allowedFields = ['periode', 'p_mulai', 'p_selesai','status'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

   
    public function getPeriodesWithStatus()
    {
        $current_date = date('Y-m-d H:i:s');
        $builder = $this->db->table('vote');
        $builder->select('vote.*, 
                          CASE WHEN vote.p_mulai <= "' . $current_date . '" AND vote.p_selesai >= "' . $current_date . '" THEN "Aktif"
                               ELSE "Tidak-Aktif" END AS status', FALSE);
        $builder->where('deleted_at IS NULL');
        $query = $builder->get();
    
        
        $result = $query->getResult();
        foreach ($result as $row) {
            $this->db->table('vote')
                     ->where('id', $row->id)
                     ->update(['status' => $row->status]);
        }
    
        return $result;
    }
    public function getPeriodesWithStatuss()
    {
        $current_date = date('Y-m-d H:i:s');
        $builder = $this->db->table('vote');
        $builder->select('vote.*, 
                          CASE WHEN vote.p_mulai <= "' . $current_date . '" AND vote.p_selesai >= "' . $current_date . '" THEN "Aktif"
                               ELSE "Tidak-Aktif" END AS status', FALSE);
        $builder->where('deleted_at IS NOT NULL');
        $query = $builder->get();
    
        
        $result = $query->getResult();
        foreach ($result as $row) {
            $this->db->table('vote')
                     ->where('id', $row->id)
                     ->update(['status' => $row->status]);
        }
    
        return $result;
    }
    public function insertData($data)
{
    return $this->insert($data);
}
public function getById($id)
    {
        $data = $this->find($id);
        if (!$data) {
            throw new \Exception('Data not found');
        }
        return $data;
    }
    public function updateP($id, $data)
{
    return $this->update($id, $data);
}
public function deleteD($id)
{
    return $this->delete($id);
}
public function getStatusSelesai()
{
    $query = $this->db->query("SELECT status FROM vote ORDER BY id DESC LIMIT 1");
    $row = $query->getRow();
    return $row->status;
}


public function getStatus2Selesai()
{
    $query = $this->db->table('kandidat')
        ->select('status2')
        ->join('vote', 'kandidat.periode_id = vote.id', 'left')
        ->get();
    
    $row = $query->getRow();
    
    if ($row) {
        return $row->status2;
    }
    
    return 'Tidak-Aktif'; 
}

public function updateData($id, $data) {
    return $this->db->table('vote') // Gantilah nama_tabel_anda dengan nama tabel yang sesuai
        ->where('id', $id)
        ->update($data);
}

}