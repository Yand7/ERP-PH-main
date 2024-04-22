<?php
namespace App\Controllers\piket;
use CodeIgniter\Controller;
use App\Models\piketm\M_model;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Dompdf\Dompdf;

class Home extends BaseController
{
	protected function isLoggedIn()
    {
        return session()->has('id');
    }
    public function index()
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('piket/Home/mpg');
        }   
    }

	public function log_out(){
		$model= new M_model();
		session()->destroy();

		$id = session()->get('id');
		$data3=array(
			'user'=>$id,
			'aktivitas'=>"User ". $id." Logout",
			'tanggal'=>date('Y-m-d H:i:s')
			);

		// print_r($data2);	
		$model->simpan('log',$data3);

    	return redirect()->to('/piket/Home');
	}

	public function mpg(){
		if(session()->get('level')== 1 || session()->get('level')== 10 || session()->get('level')== 3) {
			echo view('/piketv/header');
			echo view('/piketv/menu');
			echo view('/piketv/isi');
			echo view('/piketv/footer');
		}else if(session()->get('level')== 5 || session()->get('level')== 4) {
			$model = new M_model();
			$id = session()->get('id');
			$a = $model->useRow("SELECT * from siswa where user='{$id}'");
			
			$data['aaa'] = $model->useResult("SELECT * from notif where murid='{$a->id_siswa}'");
			
        	echo view('/piketv/header');
        	echo view('/piketv/menu');
        	echo view('/piketv/isi', $data);
        	echo view('/piketv/footer');
		}else{
			return redirect()->to ('/piket/Home');
		}
    }

	public function menilai(){
	if(session()->get('level')== 1 || session()->get('level')== 10 || session()->get('level')== 3) {
		$model=new M_model();
		$data['kls'] = $model->getRombel();

		echo view('/piketv/header');
		echo view('/piketv/menu');
		echo view('/piketv/menilai', $data);
		echo view('/piketv/footer');
	}else{
		return redirect()->to ('/piket/Home');
	}
	}
	
	public function menilai2(){
	if(session()->get('level')== 1 || session()->get('level')== 10 || session()->get('level')== 3) {
		$a = $this->request->getPost('hri');
		$b = $this->request->getPost('kls');
		$c = date('Y-m-d');
		
		$model=new M_model();
		$data['kls'] = $model->getRombelW($b);
		
		$data['tgl'] = $c;
		$data['hri'] = $a;

		echo view('/piketv/header');
		echo view('/piketv/menu');
		echo view('/piketv/menilai2', $data);
		echo view('/piketv/footer');		
	}else{
		return redirect()->to ('/piket/Home');
	}
	}

	public function output_menilai(){
		$a = $this -> request-> getPost('rmbl');
		$b = $this -> request-> getPost('tgl');
		$c = $this -> request-> getPost('hri');
		$d = $this -> request-> getPost('n');
		
		$model=new M_model();

		$mr = $model->useResult("SELECT * from siswa where rombel='{$a}' and jadwal_piket='{$c}'");
		// print_r($mr);

		for ($i = 0; $i < count($mr); $i++) {
			$data2[] = [
				'murid' => $mr[$i]->id_siswa,
				'isi' => "Anda Mendapatkan Nilai " . $d . " ",
				'tanggal' => $b
			];
		}

		foreach ($data2 as $notifData) {
			$model->simpan('notif', $notifData);
		}
		
		$data = array(
			'tanggal' => $b,
			'rombel' => $a,
			'nilai' => $d,
			'hari' => $c
		);

		$model->simpan('piket',$data);		

		return redirect()->to ('/piket/Home/menilai');
	}
	
	public function cek(){
	if(session()->get('level')== 1 || session()->get('level')== 10 || session()->get('level')== 3) {
		$model=new M_model();
		$data['kls'] = $model->getRombel();

		echo view('/piketv/header');
		echo view('/piketv/menu');
		echo view('/piketv/cek', $data);
		echo view('/piketv/footer');
	}else{
		return redirect()->to ('/piket/Home');
	}
	}

	public function output_cek(){
		$a = $this->request->getPost('k');
		$b = $this->request->getPost('tgl');

		$model = new M_model();
		$data['n'] = $model->useRow("SELECT * from piket where rombel='{$a}' and tanggal='{$b}'");
		$data['r'] = $model->getRombelW($a);

		$data['kls'] = $model->getRombel();

		echo view('/piketv/header');
		echo view('/piketv/menu');
		echo view('/piketv/o_cek', $data);
		echo view('/piketv/footer');
	}
	
	public function print(){
	if(session()->get('level')== 1 || session()->get('level')== 10 || session()->get('level')== 3) {
		$model=new M_model();
		$data['kls'] = $model->getRombel();

		echo view('/piketv/header');
		echo view('/piketv/menu');
		echo view('/piketv/pdf', $data);
		echo view('/piketv/footer');
	}else if(session()->get('level')== 5) {
		$model=new M_model();
		$id = session()->get('id');

		$a = $model->useRow("SELECT * from siswa where user='{$id}'");

		$data['kls'] = $model->getRombelW($a->rombel);
		
		echo view('/piketv/header');
		echo view('/piketv/menu');
		echo view('/piketv/pdf', $data);
		echo view('/piketv/footer');
	}else{
		return redirect()->to ('/piket/Home');
	}
	}

	public function pdf() {
	if(session()->get('level')== 1 || session()->get('level')== 10 || session()->get('level')== 3 || session()->get('level')== 5) {
		$model = new M_model();
		$a = $this->request->getPost('tgl');
		$b = $this->request->getPost('kls');
	
		if ($b == "all") {
			$kui['duar'] = $model->useResult("SELECT piket.*, rombel.nama_r, rombel.id_rombel,kelas.nama_kelas, jurusan.nama_jurusan from piket left join rombel on piket.rombel = rombel.id_rombel left join kelas on rombel.kelas = kelas.id_kelas left join jurusan on rombel.jurusan = jurusan.id_jurusan where piket.tanggal='{$a}'");
			$kui['tgl'] = $a;
			// print_r($kui['tgl']);
			$dompdf = new Dompdf();
			$dompdf->loadHtml(view('/piketv/pdf_print', $kui));
			$dompdf->setPaper('A4', 'landscape');
			$dompdf->render();
			$dompdf->stream('my.pdf', array('Attachment' => 0));
		} else if ($b != "all") {
			$kui['duar'] = $model->useResult("SELECT piket.*, rombel.nama_r, rombel.id_rombel,kelas.nama_kelas, jurusan.nama_jurusan from piket left join rombel on piket.rombel = rombel.id_rombel left join kelas on rombel.kelas = kelas.id_kelas left join jurusan on rombel.jurusan = jurusan.id_jurusan where piket.tanggal='{$a}' and piket.rombel='{$b}'");
			$kui['tgl'] = $a;
			// print_r($kui['tgl']);
			$dompdf = new Dompdf();
			$dompdf->loadHtml(view('/piketv/pdf_print', $kui));
			$dompdf->setPaper('A4', 'landscape');
			$dompdf->render();
			$dompdf->stream('my.pdf', array('Attachment' => 0));
		}
	}else{
		return redirect()->to ('/piket/Home');
	}
	}

	public function find(){
	if(session()->get('level')== 1 || session()->get('level')== 10 || session()->get('level')== 3 || session()->get('level')== 4) {
		$model = new M_model();
		$tgl = $this->request->getPost('tgl');

		// $on="piket.rombel=rombel.id_rombel";

		$kui['duar'] = $model->useResult("SELECT piket.*, rombel.nama_r, rombel.id_rombel,kelas.nama_kelas, jurusan.nama_jurusan from piket left join rombel on piket.rombel = rombel.id_rombel left join kelas on rombel.kelas = kelas.id_kelas left join jurusan on rombel.jurusan = jurusan.id_jurusan where piket.tanggal='{$tgl}'");
		// Assuming you have the filtered data in $data['f']

		$averageData = []; // Array to store rombels with their average nilai
		foreach ($kui['duar'] as $piket) {
			$id_rombel = $piket->nama_jurusan.' '.$piket->nama_kelas.' '.$piket->nama_r;
			$nilai = $piket->nilai;
		
			// Initialize if it doesn't exist
			if (!isset($averageData[$id_rombel])) {
				$averageData[$id_rombel] = [
					'count' => 0, // To count the number of values
					'total' => 0, // To sum the values
				];
			}
		
			// Update counts and totals
			$averageData[$id_rombel]['count']++;
			if ($nilai === "Baik") {
				$averageData[$id_rombel]['total'] += 1; // You can adjust this if "Baik" has a different weight
			} elseif ($nilai === "Tidak Baik") {
				$averageData[$id_rombel]['total'] += 0; // You can adjust this if "Tidak Baik" has a different weight
			}
		}
		
		// Calculate average nilai for each rombel
		foreach ($averageData as $id_rombel => $values) {
			$count = $values['count'];
			$total = $values['total'];
		
			if ($count > 0) {
				// Calculate the average based on your weightage
				$average = $total / $count;
		
				// Classify as "Baik" or "Tidak Baik" based on your threshold
				$classification = ($average >= 0.5) ? "Baik" : "Tidak Baik";
		
				// Store the results
				$averageData[$id_rombel]['average'] = $average;
				$averageData[$id_rombel]['classification'] = $classification;
			}
		}
		
		// Separate data into "Baik" and "Tidak Baik" categories
		$averageBaik = [];
		$averageTidakBaik = [];
		foreach ($averageData as $id_rombel => $values) {
			$classification = $values['classification'];
			$average = $values['average'];
		
			if ($classification === "Baik") {
				$averageBaik[$id_rombel] = $average;
			} elseif ($classification === "Tidak Baik") {
				$averageTidakBaik[$id_rombel] = $average;
			}
		}
		
		$data['averageBaik'] = $averageBaik;
		$data['averageTidakBaik'] = $averageTidakBaik;
		
		echo view('/piketv/header');
		echo view('/piketv/menu');
		echo view('/piketv/find', $data);
		echo view('/piketv/footer');
	}else{
		return redirect()->to('/piket/Home');
	}	
	}

	public function jadwal(){
	if(session()->get('level')== 1 || session()->get('level')== 10 || session()->get('level')== 3 || session()->get('level')== 4) {
		$model = new M_model();

		$id = session()->get('id');
		$a = $model->useRow("SELECT * from guru where user='{$id}'");

		
		$data['mrd'] = $model->useResult("SELECT * from siswa left join hari on siswa.jadwal_piket=hari.id_hari where rombel='{$a->rombel}'");
		
		echo view('/piketv/header');
		echo view('/piketv/menu');
		echo view('/piketv/jadwal', $data);
		echo view('/piketv/footer');
	}else{
		return redirect()->to('/piket/Home');
	}	
	}

	public function e_jadwal($id){
	if(session()->get('level')== 1 || session()->get('level')== 10 || session()->get('level')== 3 || session()->get('level')== 4) {
		$model = new M_model();

        $where = array('id_siswa'=>$id);
        $data['ss'] = $model->getWhere('siswa', $where);
        
        $data['hri'] = $model->tampil('hari');

        echo view('/piketv/header');
		echo view('/piketv/menu');
		echo view('/piketv/e_jadwal', $data);
		echo view('/piketv/footer');
	}else{
		return redirect()->to('/piket/Home');
	}	
	}

	public function output_jadwal(){
		$id = $this -> request-> getPost('ide');
		$b = $this -> request-> getPost('hri');

		$model = new M_Model();
		$where=array('id_siswa'=>$id);
		$data = array(
			'jadwal_piket' => $b,
			'updated_at' => date('Y-m-d H:i:s')
		);
		
		// print_r($data2);
		$model->qedit('siswa', $data,$where);

		return redirect()->to ('/piket/home/jadwal');
	}
}