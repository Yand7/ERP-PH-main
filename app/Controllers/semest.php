<?php

namespace App\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class semest extends BaseController

{

 public function index()
    {
      if(session()->get('level')==1 ||  session()->get('level')==2){
         $model=new M_model();
         $kui['a'] = $model->tampil('tahun');
         $rombelDetails = $model->getAllRombel();
         $kui['e'] = $rombelDetails;
         $kui['kunci']='semes';
         $data['title'] = 'Data Nilai Semester';
         echo view('partial/header_datatable', $data);
         echo view('partial/side_menu');
         echo view('partial/top_menu');
         echo view('filter_semes',$kui);
         echo view('partial/footer_datatable');
     }else{
         return redirect()->to('login');
     }
 }
 public function semester()
{
    if (session()->get('level') == 1 || session()->get('level') == 2) {
        $model = new M_model();
        $semester = $this->request->getPost('semester');
        $tahun = $this->request->getPost('tahun');
        $rombel = $this->request->getPost('rombel');
        $siswaList = $model->getSiswaInfo($rombel);

        // Initialize Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);

        // HTML string to store content for all students
        $allStudentsHTML = '';

        foreach ($siswaList as $siswa) {
            // Pass the student ID to getDataNilai
            $data['a'] = $model->getDataNilai2($tahun, $semester, $rombel, $siswa->id_siswa);

            // Get data for header
           
            $rombelInfo = $model->getRombelInfo($rombel);
            $tahunData = $model->getTahunInfo($tahun);

            // Data for header
            
            $data['siswa'] = $siswa;
            $data['rombel'] = $rombelInfo;
            $data['tahun'] = $tahunData;

            // Add semester information for the header
            $data['semesterText'] = ($semester == 1) ? 'Ganjil' : 'Genap';

            // Load the view
            $html = view('nilai_semester', $data);

            // Append HTML for this student to the overall HTML string
            $allStudentsHTML .= $html;
        }

        // Load combined HTML to Dompdf
        $dompdf->loadHtml($allStudentsHTML);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Download the combined PDF
        $dompdf->stream('KHS_All_Students.pdf', array('Attachment' => false));
        exit();
    } else {
        return redirect()->to('/Home');
    }
}

}
