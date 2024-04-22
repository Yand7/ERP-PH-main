<?php

namespace App\Controllers\agendapkl;
use App\Models\agendapkl\M_agenda_guru;
use App\Models\agendapkl\M_absensi_sekolah;
use App\Models\agendapkl\M_agenda;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Data_agenda_guru extends BaseController
{

    public function index()
    {
        if (session()->get('level') == 4) {
            $model = new M_agenda_guru();

            $idGuru = session()->get('id');
            $data['jojo'] = $model->tampil_siswa('data_siswa', $idGuru);
            $data['title'] = 'Data Agenda';

            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_guru/index', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('agendapkl');
        }
    }

    public function view($id)
    {
        if(session()->get('level')==3 ) {
            $model = new M_agenda_guru();

            $wheree = array('siswa'=>$id);
            $m=$model->getWhere2('data_agenda', $wheree);
            $iduser = $m['user_siswa'];
            $where=array('data_siswa.user_siswa'=>$iduser);

            session()->set('id_balik_agenda_guru', $id);

            $on='data_agenda.siswa=data_siswa.user_siswa';
            $data['jojo']=$model->join2w('data_agenda', 'data_siswa', $on, $wheree);
            $data['title'] = 'Data Agenda';

            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_guru/view', $data);
            echo view('agendapkl/partial/footer_datatable');
        }else {
            return redirect()->to('agendapkl');
        }
    }

    public function detail($id)
    {
        if(session()->get('level')==3 ) {
            $model = new M_agenda_guru();

            $wheree = array('id_agenda'=>$id);
            $m=$model->getWhere2('data_agenda', $wheree);
            $iduser = $m['id_agenda'];
            $where=array('data_agenda.id_agenda'=>$iduser);

            $on='data_agenda.siswa=data_siswa.user_siswa';
            $data['jojo']=$model->join2w('data_agenda', 'data_siswa', $on, $wheree);
            $data['title'] = 'Data Agenda';

            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_guru/detail', $data);
            echo view('agendapkl/partial/footer_datatable');
        }else {
            return redirect()->to('agendapkl');
        }
    }

    public function approve_g($id)
    { 
        if(session()->get('level')==3) {
            date_default_timezone_set('Asia/Jakarta');

            $model=new M_agenda_guru();

            $where2=array('id_agenda'=>$id);
            $data2=array(
                'approve_g'=>'1'
            );
            $model->qedit('data_agenda', $data2, $where2);
            return redirect()->to('agendapkl/data_agenda_guru/view/'. session()->get('id_balik_agenda_guru'));
        }else {
            return redirect()->to('agendapkl');
        }
    }

    // ======================================================================================

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
            echo view('agendapkl/data_agenda_guru/menu_print', $data);
            echo view('agendapkl/partial/footer_datatable');    
        }else {
            return redirect()->to('agendapkl');
        }
    }

    public function export_pdf()
    {
        if (session()->get('level') == 4) {
            $model = new M_agenda();

            $idSiswa = $this->request->getPost('nama');
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');

            // Get data absensi kantor berdasarkan filter
            $data['agenda'] = $model->getDataByFilter($idSiswa, $awal, $akhir);

            // Load the dompdf library
            $dompdf = new Dompdf();

            // Set the HTML content for the PDF
            $data['title'] = 'Agenda PKL';
            $dompdf->loadHtml(view('data_agenda_guru/print_pdf_view',$data));
            $dompdf->setPaper('A4','potrait');
            $dompdf->render();
            $dompdf->stream('agenda_pkl.pdf', ['Attachment' => 0]);
        } else {
            return redirect()->to('agendapkl');
        }
    }

    public function export_excel()
    {
        if (session()->get('level') == 4) {
            $model = new M_agenda();

            $idSiswa = $this->request->getPost('nama');
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');

            $absensi = $model->getDataByFilter($idSiswa, $awal, $akhir);

            $spreadsheet = new Spreadsheet();

        // Get the active worksheet and set the default row height for header row
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->getDefaultRowDimension()->setRowHeight(20);

        // Set document properties
            $sheet->setTitle('Daily Report');

        // Set SEKOLAH GT and Daily Report PRAKERIND header
            $sheet->setCellValue('A1', 'SEKOLAH GT');
            $sheet->setCellValue('A2', 'Daily Report PRAKERIND');

        // Merge cells for headers
            $sheet->mergeCells('A1:E1');
            $sheet->mergeCells('A2:E2');

        // Set styles for headers
            $headerStyle = [
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
            ];
            $sheet->getStyle('A1:E2')->applyFromArray($headerStyle);

        // Set column headers
            $sheet->setCellValue('A4', 'Tanggal');
            $sheet->setCellValue('B4', 'Jam Masuk');
            $sheet->setCellValue('C4', 'Jam Keluar');

        // Set data for Tanggal, Jam Masuk, and Jam Keluar
            $row = 5;
            foreach ($absensi as $agenda) {
                $sheet->setCellValue('A' . $row, $agenda['tanggal']);
                $sheet->setCellValue('B' . $row, date('H:i', strtotime($agenda['jam_masuk'])));
                $sheet->setCellValue('C' . $row, date('H:i', strtotime($agenda['jam_keluar'])));
                $row++;
            }

        // Set column headers
            $sheet->setCellValue('A7', 'Rencana Pekerjaan');
            $sheet->setCellValue('A10', 'Realisasi Pekerjaan');
            $sheet->setCellValue('A13', 'Penugasan Khusus dari Atasan');
            $sheet->setCellValue('A16', 'Penilaian Harian (Diisi Pembimbing)');

            $sheet->setCellValue('A17', 'Senyum');
            $sheet->setCellValue('B17', 'Keramahan');
            $sheet->setCellValue('C17', 'Penampilan');
            $sheet->setCellValue('D17', 'Komunikasi');
            $sheet->setCellValue('E17', 'Realisasi Kerja');

            $sheet->setCellValue('A20', 'Catatan untuk Diingat');

            $sheet->mergeCells('A7:E7');
            $sheet->mergeCells('A10:E10');
            $sheet->mergeCells('A13:E13');
            $sheet->mergeCells('A16:E16');
            $sheet->mergeCells('A21:E23');
            $sheet->mergeCells('A20:E20');

            foreach ($absensi as $agenda) {
                $sheet->setCellValue('A8', $agenda['renper_1']);
                $sheet->setCellValue('B8', $agenda['renper_2']);
                $sheet->setCellValue('C8', $agenda['renper_3']);
                $sheet->setCellValue('D8', $agenda['renper_4']);
                $sheet->setCellValue('E8', $agenda['renper_5']);

                $sheet->setCellValue('A11', $agenda['reape_1']);
                $sheet->setCellValue('B11', $agenda['reape_2']);
                $sheet->setCellValue('C11', $agenda['reape_3']);
                $sheet->setCellValue('D11', $agenda['reape_4']);
                $sheet->setCellValue('E11', $agenda['reape_5']);

                $sheet->setCellValue('A14', $agenda['pk_1']);
                $sheet->setCellValue('B14', $agenda['pk_2']);
                $sheet->setCellValue('C14', $agenda['pk_3']);
                $sheet->setCellValue('D14', $agenda['pk_4']);
                $sheet->setCellValue('E14', $agenda['pk_5']);

                $sheet->setCellValue('A18', $agenda['senyum']);
                $sheet->setCellValue('B18', $agenda['keramahan']);
                $sheet->setCellValue('C18', $agenda['penampilan']);
                $sheet->setCellValue('D18', $agenda['komunikasi']);
                $sheet->setCellValue('E18', $agenda['realisasi_kerja']);

                $sheet->setCellValue('A21', $agenda['catatan']);
            }

        // Set styles for "Rencana Pekerjaan" section
            $sheet->getStyle('A7:E8')->applyFromArray($headerStyle);
            $sheet->getStyle('A10:E11')->applyFromArray($headerStyle);
            $sheet->getStyle('A13:E14')->applyFromArray($headerStyle);
            $sheet->getStyle('A16:E18')->applyFromArray($headerStyle);
            $sheet->getStyle('A20:E20')->applyFromArray($headerStyle);

        // Set border for merged cells A21:E23
            $cellA21 = 'A21';
            $cellE23 = 'E23';
            $mergeRange = $cellA21 . ':' . $cellE23;
            $sheet->mergeCells($mergeRange);

        // Style for merged cells A21:E23
            $styleArray = [
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER],
                'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
            ];

            $sheet->getStyle($mergeRange)->applyFromArray($styleArray);

            foreach (range('A', $sheet->getHighestDataColumn()) as $column) {
                $sheet->getColumnDimension($column)->setAutoSize(true);
            }

        // Create the Excel writer and save the file
            $writer = new Xlsx($spreadsheet);
            $filename = 'laporan_absensi_kantor.xlsx';
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
        } else {
            return redirect()->to('agendapkl');
        }
    }

}