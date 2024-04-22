<?php 

namespace App\Models\voting;

use CodeIgniter\Model;

class U_model extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['foto','nama', 'username', 'password', 'level'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    public function tampil($table){
		return $this->db->table($table)->get()->getResult();
	}
    public function getById($id)
    {
        $data = $this->find($id);
        if (!$data) {
            throw new \Exception('Data not found');
        }
        return $data;
    }

    public function updatet($id, $data)
    {
        return $this->update($id, $data);
    }
    public function insertt($data, $photo)
{
    if ($photo && $photo->isValid()) {
        $imageName = $photo->getName();
        $photo->move(ROOTPATH . 'public/images', $imageName);
        $data['foto'] = $imageName;
    } else {
        $data['foto'] = 'tidaktahu.png'; 
    }
    $data['password'] = md5($data['password']);
    return $this->insert($data);
}
    public function updateP($id, $data, $photo)
    {
        $findd = $this->find($id);
        $currentImage = $findd['foto'];
        if ($photo != null) {
            $newImageName = $photo->getName();
            $photo->move(ROOTPATH . 'public/images', $newImageName);
            $data['foto'] = $newImageName;
        } else {
            $data['foto'] = $currentImage;
        }
        return $this->update($id, $data);
    }

    public function deletee($id)
    {
        return $this->delete($id);
    }
    public function getWhere($table, $where){
		return $this->db->table($table)->getWhere($where)->getRow();
	}
  

}