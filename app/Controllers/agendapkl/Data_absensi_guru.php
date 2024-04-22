<?php

namespace App\Controllers\agendapkl;
use App\Models\agendapkl\M_absensi_sekolah;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Data_absensi_guru extends BaseController
{

    public function index()
    {
     if(session()->get('level')==3) {
        $model=new M_absensi_sekolah();

        $idGuru = session()->get('id');
        $data['jojo'] = $model->tampil_siswa('data_siswa', $idGuru);
        $data['title']='Data Absensi Sekolah';

        echo view('agendapkl/partial/header_datatable', $data);
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_absensi_guru/view', $data);
        echo view('agendapkl/partial/footer_datatable');
    }else {
        return redirect()->to('agendapkl');
    }
}

public function menu_print()
{
    if(session()->get('level')==3) {
        $model=new M_absensi_sekolah();

        $idGuru = session()->get('id');
        $data['nama'] = $model->tampil_siswa('data_siswa', $idGuru);
        $title['title']='Menu Absensi Sekolah';

        echo view('agendapkl/partial/header_datatable', $title);
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_absensi_guru/menu_print', $data);
        echo view('agendapkl/partial/footer_datatable');    
    }else {
        return redirect()->to('agendapkl');
    }
}

public function export_windows()
{
    if (session()->get('level') == 4) {
        $model = new M_absensi_sekolah();

        $idSiswa = $this->request->getPost('nama');
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');

        // Get data absensi kantor berdasarkan filter
        $data['absensi'] = $model->getDataByFilter($idSiswa, $awal, $akhir);
        $title['title'] = 'Laporan Absensi Kantor';
        echo view('agendapkl/partial/header_datatable', $title);
        echo view('agendapkl/data_absensi_guru/print_windows_view', $data);
        echo view('agendapkl/partial/footer_datatable');  
    } else {
        return redirect()->to('agendapkl');
    }
}

public function export_pdf()
{
    if (session()->get('level') == 4) {
        $model = new M_absensi_sekolah();

        $idSiswa = $this->request->getPost('nama');
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');

            // Get data absensi kantor berdasarkan filter
        $data['absensi'] = $model->getDataByFilter($idSiswa, $awal, $akhir);

            // Load the dompdf library
        $dompdf = new Dompdf();

            // Set the HTML content for the PDF
        $data['title'] = 'Laporan Absensi Sekolah';
        $dompdf->loadHtml(view('data_absensi_guru/print_pdf_view',$data));
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('laporan_absensi_sekolah.pdf', ['Attachment' => 0]);
    } else {
        return redirect()->to('agendapkl');
    }
}

public function export_excel()
{
    if (session()->get('level') == 4) {
        $model = new M_absensi_sekolah();

        $idSiswa = $this->request->getPost('nama');
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');

        $absensi = $model->getDataByFilter($idSiswa, $awal, $akhir);

        $spreadsheet = new Spreadsheet();

        // Get the active worksheet and set the default row height for header row
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getDefaultRowDimension()->setRowHeight(20);

        // Set the title and period in merged cells
        $sheet->mergeCells('A1:E1');
        $sheet->setCellValue('A1', 'Laporan Absensi Sekolah');
        $sheet->mergeCells('A3:D3');
        $sheet->setCellValue('A3', 'Periode: ' . $awal . ' - ' . $akhir);

        // Set the header row values
        $sheet->setCellValueByColumnAndRow(1, 4, 'No');
        $sheet->setCellValueByColumnAndRow(2, 4, 'NIS');
        $sheet->setCellValueByColumnAndRow(3, 4, 'Nama Siswa');
        $sheet->setCellValueByColumnAndRow(4, 4, 'Tanggal');
        $sheet->setCellValueByColumnAndRow(5, 4, 'Keterangan');

        // Fill the data into the worksheet
        $row = 5;
        $no = 1;
        foreach ($absensi as $riz) {
            $sheet->setCellValueByColumnAndRow(1, $row, $no++);
            $sheet->setCellValueByColumnAndRow(2, $row, $riz['nis']);
            $sheet->setCellValueByColumnAndRow(3, $row, $riz['nama_siswa']);
            $sheet->setCellValueByColumnAndRow(4, $row, date('d F Y', strtotime($riz['tanggal'])));
            $sheet->setCellValueByColumnAndRow(5, $row, $riz['nama_keterangan']);

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
                // Add more cases for other values if needed
                }

                if (!empty($color)) {
                    $sheet->getStyle('E' . $row)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB($color);
                }

                $row++;
            }

        // Apply the Excel styling
            $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A1')->getFont()->setSize(14)->setBold(true);
            $sheet->getStyle('A3')->getFont()->setBold(true);
            $sheet->getStyle('A1:E1')->getFont()->setBold(true);
            $sheet->getStyle('A1:E1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFFF00');

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'],
                    ],
                ],
            ];

        $lastRow = count($absensi) + 4; // Add 4 for the header rows
        $sheet->getStyle('A4:E' . $lastRow)->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);

        // Create the Excel writer and save the file
        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan_absensi_sekolah.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    } else {
        return redirect()->to('agendapkl');
    }
}


}