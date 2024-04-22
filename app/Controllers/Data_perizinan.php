<?php

namespace App\Controllers;
use App\Models\M_perizinan;
use App\Models\Amodel;
use App\Models\BlokModel;
use App\Models\TahunModel;
use App\Models\SiswaModel;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Data_perizinan extends BaseController
{

    public function index()
    {
        if (session()->get('level') == 4 || session()->get('level') == 5) {
            $model = new M_perizinan();
            $on='perizinan.siswa=siswa.id_siswa';
            $on2='perizinan.status=keterangan_perizinan.kode_keterangan';

            $idSiswa = session()->get('id');
            $siswaData = $model->getSiswaData($idSiswa);

            if ($siswaData) {
                $siswa_id = $siswaData['id_siswa']; 
            }

             $tanggalSekarang = date('Y-m-d'); // Tanggal sekarang
             $izinSakitHariIni = $model->getIzinSakitHariIni($siswa_id, $tanggalSekarang);
             $data['izinSakitHariIni'] = $izinSakitHariIni;

             $data['jojo'] = $model->join3('perizinan', 'siswa', 'keterangan_perizinan', $on, $on2, $siswa_id);
             $data['title'] = 'Data Perizinan';

             echo view('partial/header_datatable', $data);
             echo view('partial/side_menu');
             echo view('partial/top_menu');
             echo view('data_perizinan/view', $data);
             echo view('partial/footer_datatable');
         } else {
            return redirect()->to('login');
        }
    }


    public function create()
    {
        if(session()->get('level')== 4 || session()->get('level') == 5) {
            $model=new M_perizinan();
            $data['title']='Data Perizinan';  
            $data['keterangan'] = $model->tampil('keterangan_perizinan');
            echo view('partial/header_datatable', $data);
            echo view('partial/side_menu');
            echo view('partial/top_menu');
            echo view('data_perizinan/create', $data); 
            echo view('partial/footer_datatable');
        }else {
            return redirect()->to('login');
        }
    }

    public function aksi_create()
    { 
        if(session()->get('level')== 4 || session()->get('level') == 5) {
            $a= $this->request->getPost('tanggal');
            $b= $this->request->getPost('status');
            $c= $this->request->getPost('alasan');
            date_default_timezone_set('Asia/Jakarta');

            $surat= $this->request->getFile('foto');
            if($surat && $surat->isValid() && ! $surat->hasMoved())
            {
                $imageName1 = $surat->getName();
                $surat->move('surat',$imageName1);
            }else{
                $imageName1='-';
            }

            $model=new M_perizinan();
            $idSiswa = session()->get('id');
            $siswaData = $model->getSiswaData($idSiswa);

            if ($siswaData) {
                $siswa_id = $siswaData['id_siswa']; 
                $rombel = $siswaData['rombel'];
            }

            $blokModel = new BlokModel();
            $blok = $blokModel->where('statuss', 'Aktif')->first();

            $tahunModel = new TahunModel();
            $tahun = $tahunModel->where('status', 'Aktif')->first();

        //Yang ditambah ke user
            $data1=array(
                'siswa'=>$siswa_id,
                'tanggal'=>$a,
                'status'=>$b,
                'alasan'=>$c,
                'foto'=>$imageName1,
                'rombel'=>$rombel,
                'blok'=>$blok['id_blok'],
                'tahun'=>$tahun['id_tahun']
            );
            $model->simpan('perizinan', $data1);

            // $persen = ($b == 'H') ? 1 : 0;

            // $data2=array(
            //     'siswa'=>$siswa_id,
            //     'tanggal'=>$a,
            //     'status'=>$b,
            //     'rombel'=>$rombel,
            //     'blok'=>$blok['id_blok'],
            //     'tahun'=>$tahun['id_tahun'],
            //     'persen'=>$persen,
            //     'perizinan'=>1
            // );
            // $model->simpan('absen', $data2);
            return redirect()->to('data_perizinan');
        }else {
            return redirect()->to('login');
        }
    }


    // public function edit($id)
    // { 
    //     if(session()->get('level')== 4) {
    //         $model=new M_perizinan();
    //         $where=array('id_perizinan'=>$id);
    //         $data['jojo']=$model->getWhere('perizinan',$where);
    //         $data['title']='Data Perizinan';        
    //         echo view('partial/header_datatable');
    //         echo view('partial/side_menu');
    //         echo view('partial/top_menu');
    //         echo view('data_perizinan/edit',$data);
    //         echo view('partial/footer_datatable');    
    //     }else {
    //         return redirect()->to('login');
    //     }
    // }

    // public function aksi_edit()
    // { 
    //     if(session()->get('level')== 4) {
    //         $a= $this->request->getPost('nama_website');
    //         $id= $this->request->getPost('id');
    //         date_default_timezone_set('Asia/Jakarta');

    //         $logo_website= $this->request->getFile('logo_website');
    //         if (!empty($logo_website->getName())) {
    //             if ($logo_website->isValid() && !$logo_website->hasMoved()) {
    //                 if (file_exists("logo/logo_website/" . $id)) {
    //                     unlink("logo/logo_website/" . $id);
    //                 }
    //                 $imageName1 = $logo_website->getName();
    //                 $logo_website->move('logo/logo_website', $imageName1);
    //             }
    //         } else {
    //             $imageName1 = $this->request->getPost('old_logo_website');
    //         }

    //         $logo_pdf= $this->request->getFile('logo_pdf');
    //         if (!empty($logo_pdf->getName())) {
    //             if ($logo_pdf->isValid() && !$logo_pdf->hasMoved()) {
    //                 if (file_exists("logo/logo_pdf/" . $id)) {
    //                     unlink("logo/logo_pdf/" . $id);
    //                 }
    //                 $imageName2 = $logo_pdf->getName();
    //                 $logo_pdf->move('logo/logo_pdf', $imageName2);
    //             }
    //         } else {
    //             $imageName2 = $this->request->getPost('old_logo_pdf');
    //         }

    //         $favicon= $this->request->getFile('favicon');
    //         if (!empty($favicon->getName())) {
    //             if ($favicon->isValid() && !$favicon->hasMoved()) {
    //                 if (file_exists("logo/favicon/" . $id)) {
    //                     unlink("logo/favicon/" . $id);
    //                 }
    //                 $imageName3 = $favicon->getName();
    //                 $favicon->move('logo/favicon', $imageName3);
    //             }
    //         } else {
    //             $imageName3 = $this->request->getPost('old_favicon');
    //         }

    //     //Yang ditambah ke user
    //         $data1=array(
    //             'nama_website'=>$a,
    //             'logo_website'=>$imageName1,
    //             'logo_pdf'=>$imageName2,
    //             'favicon_website'=>$imageName3,
    //         );
    //         $where=array('id_website'=>$id);
    //         $model=new M_perizinan();
    //         $model->qedit('website', $data1, $where);

    //         return redirect()->to('data_website');
    //     }else {
    //         return redirect()->to('login');
    //     }
    // }
    // public function delete($id)
    // { 
    //     if(session()->get('level')== 4) {
    //         $model=new M_perizinan();
    //         $model->deletee($id);
    //         return redirect()->to('data_website');
    //     }else {
    //         return redirect()->to('login');
    //     }
    // }

     public function menu_print()
    {
        if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) {
            $model=new M_perizinan();

            $data['blok'] = $model->tampil2('blok');
            $data['tahun'] = $model->tampil2('tahun');

            $rombelDetails = $model->getAllRombel();
            $data['rkj'] = $rombelDetails;

            $data['semester'] = $model->tampil2('semester');

            $title['title']='Print Data Perizinan';

            echo view('partial/header_datatable', $title);
            echo view('partial/side_menu');
            echo view('partial/top_menu');
            echo view('data_perizinan/menu_print_admin', $data);
            echo view('partial/footer_datatable');    
        }else {
            return redirect()->to('login');
        }

    }

    public function export_windows()
    {
        if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) {
            $model = new M_perizinan();

            $blok = $this->request->getPost('blok');
            $tahun = $this->request->getPost('tahun');
            $rombel = $this->request->getPost('rkj');
            $semester = $this->request->getPost('semester');


        // Get data perjalanan berdasarkan filter
            $data['perizinan'] = $model->getDataByFilter1($blok, $tahun, $rombel, $semester);
            $title['title'] = 'Data Perizinan';
            echo view('partial/header_datatable', $title);
            echo view('data_perizinan/print_windows_view', $data);
            echo view('partial/footer_datatable');  
        } else {
            return redirect()->to('login');
        }
    }

    public function export_pdf()
    {
        if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) {
            $model = new M_perizinan();

            $blok = $this->request->getPost('blok');
            $tahun = $this->request->getPost('tahun');
            $rombel = $this->request->getPost('rkj');
            $semester = $this->request->getPost('semester');


        // Get data perjalanan berdasarkan filter
            $data['perizinan'] = $model->getDataByFilter1($blok, $tahun, $rombel, $semester);

        // Load the dompdf library
            $dompdf = new Dompdf();

        // Set the HTML content for the PDF
            $data['title'] = 'Data Perizinan';
            $dompdf->loadHtml(view('data_perizinan/print_pdf_view',$data));
            $dompdf->setPaper('A4','potrait');
            $dompdf->render();
            $dompdf->stream('data-perizinan.pdf', ['Attachment' => 0]);
        } else {
            return redirect()->to('login');
        }
    }

    public function export_excel()
    {
        if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) {
            $model = new M_perizinan();

            $blok = $this->request->getPost('blok');
            $tahun = $this->request->getPost('tahun');
            $rombel = $this->request->getPost('rkj');
            $semester = $this->request->getPost('semester');


            $perizinan = $model->getDataByFilter1($blok, $tahun, $rombel, $semester);

            $spreadsheet = new Spreadsheet();

        // Get the active worksheet and set the default row height for header row
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->getDefaultRowDimension()->setRowHeight(20);

        // Set the title and period in merged cells
            $sheet->mergeCells('A1:H1');
            $sheet->setCellValue('A1', 'Laporan Perizinan Siswa');

        // Set the header row values
            $sheet->setCellValueByColumnAndRow(1, 4, 'No');
            $sheet->setCellValueByColumnAndRow(2, 4, 'Nama Siswa');
            $sheet->setCellValueByColumnAndRow(3, 4, 'Tanggal');
            $sheet->setCellValueByColumnAndRow(4, 4, 'Status');
            $sheet->setCellValueByColumnAndRow(5, 4, 'Alasan');
            $sheet->setCellValueByColumnAndRow(6, 4, 'Rombel');
            $sheet->setCellValueByColumnAndRow(7, 4, 'Blok');
            $sheet->setCellValueByColumnAndRow(8, 4, 'Tahun');

        // Fill the data into the worksheet
            $row = 5;
            $no = 1;
            foreach ($perizinan as $riz) {
                $sheet->setCellValueByColumnAndRow(1, $row, $no++);
                $sheet->setCellValueByColumnAndRow(2, $row, $riz['nama_siswa']);
                $sheet->setCellValueByColumnAndRow(3, $row, date('d F Y', strtotime($riz['tanggal'])));
                $sheet->setCellValueByColumnAndRow(4, $row, $riz['nama_keterangan']);
                $sheet->setCellValueByColumnAndRow(5, $row, $riz['alasan']);
                $sheet->setCellValueByColumnAndRow(6, $row, $riz['nama_kelas'] . '.' . $riz['nama_r'] . ' - ' . $riz['nama_jurusan']);
                $sheet->setCellValueByColumnAndRow(7, $row, 'Blok ' . $riz['nama_b']);
                $sheet->setCellValueByColumnAndRow(8, $row, $riz['nama_t']);

            // Apply background color based on the value of "Keterangan"
                $keterangan = $riz['nama_keterangan'];
                $color = '';
                switch ($keterangan) {
                    case 'Hadir':
                    $color = '92D050'; // Green
                    break;
                    case 'Izin':
                    $color = 'FFC000'; // Yellow
                    break;
                    case 'Sakit':
                    $color = '00B0F0'; // Blue
                    break;
                    case 'Alpa':
                    $color = 'C00000'; // Red
                    break;
                }

                if (!empty($color)) {
                    $sheet->getStyle('D' . $row)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB($color);
                }

                $row++;
            }

        // Apply the Excel styling
            $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A1')->getFont()->setSize(14)->setBold(true);
            $sheet->getStyle('A3')->getFont()->setBold(true);
            $sheet->getStyle('A1:H1')->getFont()->setBold(true);
            $sheet->getStyle('A1:H1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFFF00');

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'],
                    ],
                ],
            ];

        $lastRow = count($perizinan) + 4; // Add 4 for the header rows
        $sheet->getStyle('A4:H' . $lastRow)->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);

        // Create the Excel writer and save the file
        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan_perizinan.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    } else {
        return redirect()->to('login');
    }
}

}