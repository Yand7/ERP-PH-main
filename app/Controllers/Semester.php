<?php

namespace App\Controllers;
use App\Models\M_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Semester extends BaseController

{
    public function index()
    {
      if(session()->get('level')==1 ||  session()->get('level')==2){
         $model=new M_model();
         $kui['a'] = $model->tampil('tahun');
         $rombelDetails = $model->getAllRombel();
         $kui['e'] = $rombelDetails;
         $kui['kunci']='lap';
         $data['title'] = 'Data Absensi';
         echo view('partial/header_datatable', $data);
         echo view('partial/side_menu');
         echo view('partial/top_menu');
         echo view('filter2',$kui);
         echo view('partial/footer_datatable');
     }else{
         return redirect()->to('login');
     }
 }
 public function print_in()
 {
    if (session()->get('level') == 1 || session()->get('level') == 2) {
        $model = new M_model();
        $semester = $this->request->getPost('semester');
        $tahun = $this->request->getPost('tahun');
        $rombel = $this->request->getPost('rombel');

        // Get data perjalanan berdasarkan filter
        $data['a'] = $model->getDataByFilter($semester, $tahun, $rombel);
        echo view('semes', $data);
    } else {
        return redirect()->to('login');
    }
}

public function pdf_in()
{
  if(session()->get('level')==1 ||  session()->get('level')==2  ||  session()->get('level')==3 ||  session()->get('level')==4){
    $model = new M_model();
    $blok = $this->request->getPost('blok');
    $tahun = $this->request->getPost('tahun');
    $rombel = $this->request->getPost('rombel');

        // Get data perjalanan berdasarkan filter
    $data['a'] = $model->getDataByFilter($blok, $tahun, $rombel);
    $dompdf = new\Dompdf\Dompdf();
    $dompdf->loadHtml(view('aaa',$data));
    $dompdf->setPaper('A4','landscape');
    $dompdf->render();
    $dompdf->stream('my.pdf', array('Attachment'=>0));
}else{
  return redirect()->to('login');
}
}
public function excel_in()
{
    if (session()->get('level') == 1 || session()->get('level') == 2) {
        $model = new M_model();
        $blok = $this->request->getPost('blok');
        $tahun = $this->request->getPost('tahun');
        $rombel = $this->request->getPost('rombel');

        $data = $model->getDataByFilter($blok, $tahun, $rombel);

        // Load the PHPExcel library
        $spreadsheet = new Spreadsheet();

        // Set the active sheet and headers
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Nama Siswa')
        ->setCellValue('B1', 'Hadir')
        ->setCellValue('C1', 'Sakit')
        ->setCellValue('D1', 'Izin')
        ->setCellValue('E1', 'Tanpa Keterangan')
        ->setCellValue('F1', 'Persen');


        $column = 2;

        // Iterate through the data and add to the spreadsheet
        foreach ($data as $row) {
            $total = $row['hadir'] + $row['sakit'] + $row['izin'] + $row['tanpa_keterangan'];
            $persen = ($total > 0) ? ($row['hadir'] / $total) * 100 : 0;

            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A' . $column, $row['nama_siswa'])
            ->setCellValue('B' . $column, $row['hadir'])
            ->setCellValue('C' . $column, $row['sakit'])
            ->setCellValue('D' . $column, $row['izin'])
            ->setCellValue('E' . $column, $row['tanpa_keterangan'])
            ->setCellValue('F' . $column, $persen . '%');

            $column++;
        }

        // Create a new Excel Writer
        $writer = new Xlsx($spreadsheet);

        $fileName = 'Data Absensi';

        // Set headers for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');

        // Save the Excel file to output
        $writer->save('php://output');
    } else {
        return redirect()->to('login');
    }
}



}
