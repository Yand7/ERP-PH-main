<?php 
namespace App\Models\piketm;
use CodeIgniter\Model;

class P_model extends Model
{  

    protected $table = 'piket'; // Replace with your table name
    protected $primaryKey = 'id_piket'; // Replace with your primary key
    // protected $db;

    // public function __construct()
    // {
    //     parent::__construct();

    //     // Menggunakan koneksi dbpiket
    //     $this->db = db_connect('dbpiket');
    // }


    public function getAverageNilaiByRombelAndWeek()
    {
        // Calculate the start and end dates of the current week (Monday to Friday)
        $currentDate = date('Y-m-d');
        $currentWeekStart = date('Y-m-d', strtotime('last monday', strtotime($currentDate)));
        $currentWeekEnd = date('Y-m-d', strtotime('next friday', strtotime($currentDate)));

        // Query to calculate the average nilai by rombel and within the current week
        $this->select('rombel, AVG(nilai) as average_nilai');
        $this->where('tanggal >=', $currentWeekStart);
        $this->where('tanggal <=', $currentWeekEnd);
        $this->groupBy('rombel');

        return $this->findAll(); // Replace with your data retrieval logic
    }

    private function calculateAverages($data) {
        $averages = [];
    
        foreach ($data as $row) {
            $rombel = $row->rombel;
            $nilai = $row->nilai;
    
            if (!isset($averages[$rombel])) {
                $averages[$rombel] = [];
            }
    
            $averages[$rombel][] = $nilai;
        }
    
        // Calculate averages
        foreach ($averages as &$values) {
            $values = array_sum($values) / count($values);
        }
    
        return $averages;
    }
}