<?php

namespace App\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Ledger extends BaseController

{
    public function index()
    {
      if(session()->get('level')==1 ||  session()->get('level')==2){
         $model=new M_model();
         $kui['a'] = $model->tampil('tahun');
         $kui['c'] = $model->tampil('blok');
         $rombelDetails = $model->getAllRombel();
         $kui['e'] = $rombelDetails;
         $kui['kunci']='la';
         $data['title'] = 'Data Ledger Blok';
         echo view('partial/header_datatable', $data);
         echo view('partial/side_menu');
         echo view('partial/top_menu');
         echo view('filter_Ledger',$kui);
         echo view('partial/footer_datatable');
     }else{
         return redirect()->to('login');
     }
 }
 public function print_nilai()
{
    $model = new M_model();
    $blok = $this->request->getPost('blok');
    $tahun = $this->request->getPost('tahun');
    $rombel = $this->request->getPost('rombel');
    $siswaList = $model->getSiswaInfo($rombel);
    $blokInfo = $model->getBlokInfo($blok);
    $rombelInfo = $model->getRombelInfo($rombel);
    $tahunData = $model->getTahunInfo($tahun);

    // Data for header
    $data['blok'] = $blokInfo;
    $data['rombel'] = $rombelInfo;
    $data['tahun'] = $tahunData;

    $allStudentsData = [];

    foreach ($siswaList as $siswa) {
        $data['a'] = $model->getDataNilailah($tahun, $blok, $rombel, $siswa->id_siswa);
        $allStudentsData[$siswa->nis] = $data['a'];
    }

    $data['allStudentsData'] = $allStudentsData;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Header
    $sheet->setCellValue('A1', 'Laporan Nilai Seluruh Siswa');
    $sheet->setCellValue('A2', 'Blok ' . $blok->nama_b . ' Semester ' . (($blok->semester == 1) ? 'Ganjil' : 'Genap') . ' TP. ' . $tahun->nama_t);
    $sheet->setCellValue('A3', 'Rombel: ' . $rombel->nama_kelas . '.' . $rombel->nama_r . ' - ' . $rombel->nama_jurusan);

    // Table Header
    $sheet->setCellValue('A5', 'No');
    $sheet->setCellValue('B5', 'NIS');
    $sheet->setCellValue('C5', 'Nama Siswa');

    // Merge cells untuk Nama Mapel
    $sheet->mergeCells('D5:F5');
    $sheet->setCellValue('D5', 'Nama Mapel');

    // P dan K di bawah Nama Mapel
    $sheet->setCellValue('D6', 'P');
    $sheet->setCellValue('E6', 'K');

    // Nilai kolom
    $sheet->setCellValue('F6', 'Pengetahuan');
    $sheet->setCellValue('G6', 'Keterampilan');

    // Table Content
    $row = 7; // Mulai dari baris ke-7 untuk data
    $no = 1;

    foreach ($allStudentsData as $nis => $nilaiPerSiswa) {
        foreach ($nilaiPerSiswa as $nilai) {
            $sheet->setCellValue('A' . $row, $no);
            if ($currentNIS !== $nis) {
                $sheet->setCellValue('B' . $row, $nis);
                $sheet->setCellValue('C' . $row, $nilai->nama_siswa);
                $currentNIS = $nis;
            }
            $sheet->setCellValue('D' . $row, $nilai->nama_mapel);
            $sheet->setCellValue('E' . $row, ''); // Cell kosong untuk P
            $sheet->setCellValue('F' . $row, ($nilai->pengetahuan < 75) ? $nilai->pengetahuan : '');
            $sheet->setCellValue('G' . $row, ($nilai->keterampilan < 75) ? $nilai->keterampilan : '');

            // Beri warna merah untuk nilai di bawah 75
            if ($nilai->pengetahuan < 75) {
                $sheet->getStyle('F' . $row)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF0000');
            }

            if ($nilai->keterampilan < 75) {
                $sheet->getStyle('G' . $row)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF0000');
            }

            $row++;
            $no++;
        }
    }

    // Simpan sebagai file Excel
    $writer = new Xlsx($spreadsheet);
    $filename = 'laporan_nilai_' . date('YmdHis') . '.xlsx';
    $writer->save($filename);

    // Download file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    readfile($filename);

    // Hapus file setelah didownload
    unlink($filename);
    exit();
}

 

 
}