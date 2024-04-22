<?php

namespace App\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Lnilai extends BaseController

{
    public function index()
    {
      if(session()->get('level')==1 ||  session()->get('level')==2){
         $model=new M_model();
         $kui['a'] = $model->tampil('tahun');
         $kui['c'] = $model->tampil('blok');
         $rombelDetails = $model->getAllRombel();
         $kui['e'] = $rombelDetails;
         $kui['kunci']='lap';
         $data['title'] = 'Data Nilai Blok';
         echo view('partial/header_datatable', $data);
         echo view('partial/side_menu');
         echo view('partial/top_menu');
         echo view('filter_nilai',$kui);
         echo view('partial/footer_datatable');
     }else{
         return redirect()->to('login');
     }
 }

 public function print_nilai()
 {
     if (session()->get('level') == 1 || session()->get('level') == 2) {
         $model = new M_model();
         $blok = $this->request->getPost('blok');
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
             $data['a'] = $model->getDataNilai($tahun, $blok, $rombel, $siswa->id_siswa);
             $data['absen'] = $model->getDataabsen($blok, $tahun, $rombel, $siswa->id_siswa);
             
             // Get data for header
             $blokInfo = $model->getBlokInfo($blok);
             $rombelInfo = $model->getRombelInfo($rombel);
             $tahunData = $model->getTahunInfo($tahun);
 
             // Data for header
             $data['blok'] = $blokInfo;
             $data['siswa'] = $siswa;
             $data['rombel'] = $rombelInfo;
             $data['tahun'] = $tahunData;
 
             // Load the view
             $html = view('nilai_blok', $data);
 
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