<?php 

namespace App\Models\voting;

use CodeIgniter\Model;

class K_model extends Model
{
    protected $table = 'kandidat';
    protected $primaryKey = 'id';
    protected $allowedFields = ['foto', 'ketua', 'wakil', 'wakil2','visimisi','periode_id','suara','status2'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;


    public function tampil($table){
		return $this->db->table($table)->get()->getResult();
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
    return $this->insert($data);
    }
    public function updateP($id, $photo, $data)
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
    public function join2($table1, $table2, $on)
    {
        return $this->db->table($table1)
            ->select($table1 . '.*, ketua.nama as ketua_username, wakil.nama as wakil_username, wakil2.nama as wakil2_username')
            ->join($table2 . ' as ketua', 'ketua.id_user = ' . $table1 . '.ketua', 'left')
            ->join($table2 . ' as wakil', 'wakil.id_user = ' . $table1 . '.wakil', 'left')
            ->join($table2 . ' as wakil2', 'wakil2.id_user = ' . $table1 . '.wakil2', 'left')
            ->where('kandidat.deleted_at', null)
            ->get()
            ->getResult();
    }
    public function joinla($table1, $table2, $on)
    {
        return $this->db->table($table1)
            ->select($table1 . '.*, ketua.nama as ketua_username, wakil.nama as wakil_username, wakil2.nama as wakil2_username')
            ->join($table2 . ' as ketua', 'ketua.id_user = ' . $table1 . '.ketua', 'left')
            ->join($table2 . ' as wakil', 'wakil.id_user = ' . $table1 . '.wakil', 'left')
            ->join($table2 . ' as wakil2', 'wakil2.id_user = ' . $table1 . '.wakil2', 'left')
            ->where("$table1.deleted_at IS NOT NULL")
            ->get()
            ->getResult();
    }
public function getById($id)
    {
        $data = $this->find($id);
        if (!$data) {
            throw new \Exception('Data not found');
        }
        return $data;
    }
   
    public function getKandidatByPeriode($periode_id)
    {
        $builder = $this->db->table('kandidat');
        $builder->select('kandidat.*, ketua.nama as ketua_username, wakil.nama as wakil_username, wakil2.nama as wakil2_username');
        $builder->join('user as ketua', 'ketua.id_user = kandidat.ketua', 'left');
        $builder->join('user as wakil', 'wakil.id_user = kandidat.wakil', 'left');
        $builder->join('user as wakil2', 'wakil2.id_user = kandidat.wakil2', 'left');
        $builder->where('periode_id', $periode_id);
        $builder->where('kandidat.deleted_at', null);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function getKandidatWithUsername($periode_id)
    {
        $builder = $this->db->table('kandidat');
        $builder->select('kandidat.*, ketua.nama as ketua_username, wakil.nama as wakil_username, wakil2.nama as wakil2_username');
        $builder->join('user as ketua', 'ketua.id_user = kandidat.ketua', 'left');
        $builder->join('user as wakil', 'wakil.id_user = kandidat.wakil', 'left');
        $builder->join('user as wakil2', 'wakil2.id_user = kandidat.wakil2', 'left');
        $builder->where('periode_id', $periode_id);
        $builder->where('kandidat.deleted_at', null);
        $builder->groupBy('kandidat.id');
        return $builder->get()->getResultArray();
    }
    public function getAllKandidatWithUsername()
    {
        $builder = $this->db->table('kandidat');
        $builder->select('kandidat.*, ketua.nama as ketua_username, wakil.nama as wakil_username, wakil2.nama as wakil2_username');
        $builder->join('user as ketua', 'ketua.id_user = kandidat.ketua', 'left');
        $builder->join('user as wakil', 'wakil.id_user = kandidat.wakil', 'left');
        $builder->join('user as wakil2', 'wakil2.id_user = kandidat.wakil2', 'left');
        $builder->where('kandidat.deleted_at', null);
        $builder->groupBy('kandidat.id');
        return $builder->get()->getResultArray();
    }

    public function getData($level)
    {
        $query = $this->db->table($this->table)
            ->select('kandidat.id, kandidat.ketua, ketua.nama as ketua_username, kandidat.wakil, wakil.nama as wakil_username, kandidat.wakil2, wakil2.nama as wakil2_username, kandidat.visimisi, COUNT(hasil_vote.kandidat_id) as total_vote')
            ->join('hasil_vote', 'hasil_vote.kandidat_id = kandidat.id', 'left')
            ->join('user as ketua', 'ketua.id_user = kandidat.ketua', 'inner')
            ->join('user as wakil', 'wakil.id_user = kandidat.wakil', 'inner')
            ->join('user as wakil2', 'wakil2.id_user = kandidat.wakil2', 'inner')
            ->where('kandidat.deleted_at', null);
    
        if ($level != 1 && $level != 2) {
            $query->where('kandidat.status2', 'Tampil');
        }
    
        $query->groupBy('kandidat.id');
        return $query->get()->getResultArray();
    }
    
    
    
   public function getDataa($level)
{
    $query = $this->db->table($this->table)
        ->select('kandidat.id, kandidat.ketua, ketua.nama as ketua_username, kandidat.wakil, wakil.nama as wakil_username, kandidat.wakil2, wakil2.nama as wakil2_username, kandidat.visimisi, COUNT(hasil_vote.kandidat_id) as total_vote')
        ->join('hasil_vote', 'hasil_vote.kandidat_id = kandidat.id', 'left')
        ->join('user as ketua', 'ketua.id_user = kandidat.ketua', 'inner')
        ->join('user as wakil', 'wakil.id_user = kandidat.wakil', 'inner')
        ->join('user as wakil2', 'wakil2.id_user = kandidat.wakil2', 'inner')
        ->where('kandidat.deleted_at', null);

    if ($level != 1 && $level != 2) {
        // Hanya terapkan kondisi where jika level pengguna bukan 1 atau 2
        $query->where('kandidat.status2', 'Tampil');
    }

    $query->groupBy('kandidat.id');
    return $query->get()->getResultArray();
}

   
   // Di dalam K_model
public function updateVoteByPeriodeId($periode_id, $data)
{
    return $this->db->table($this->table)
        ->where('periode_id', $periode_id)
        ->update($data);
}
public function getAllKandidatByPeriodeId($periode_id)
{
    return $this->db->table('kandidat')
        ->where('periode_id', $periode_id)
        ->get()
        ->getResultArray();
}
public function updateData($id, $data) {
    return $this->db->table('kandidat') // Gantilah nama_tabel_anda dengan nama tabel yang sesuai
        ->where('id', $id)
        ->update($data);
}

}
