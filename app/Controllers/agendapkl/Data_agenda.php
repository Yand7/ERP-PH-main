<?php

namespace App\Controllers\agendapkl;
use App\Models\agendapkl\M_agenda;

class Data_agenda extends BaseController
{

    public function index($id)
    {
       if(session()->get('level')==4 ) {
        $model=new M_agenda();

        $wheree = array('siswa'=>$id);
        $m=$model->getWhere2('data_agenda', $wheree);
        $iduser = $m['user_siswa'];
        $where=array('data_siswa.user_siswa'=>$iduser);

        $on='data_agenda.siswa=data_siswa.user_siswa';
        $data['jojo']=$model->join2w('data_agenda', 'data_siswa', $on, $wheree);
        $data['title']='Data Agenda';

        echo view('agendapkl/partial/header_datatable', $data);
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_agenda/view', $data);
        echo view('agendapkl/partial/footer_datatable');
    }else {
        return redirect()->to('agendapkl');
    }
}

public function agenda($id)
{
    if(session()->get('level')==4) {
        $model = new M_agenda();

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
        echo view('agendapkl/data_agenda/agenda', $data);
        echo view('agendapkl/partial/footer_datatable');
    }else {
        return redirect()->to('agendapkl');
    }
}

public function aksi_tambah()
{ 
    if(session()->get('level')==4) {
        date_default_timezone_set('Asia/Jakarta');

        $model=new M_agenda();

        //Yang ditambah ke agenda
        $data2=array(
            'siswa'=>session()->get('id'),
            'tanggal'=>date('Y-m-d H:i:s'),
            'jam_masuk'=>date('H:i:s'),
            'user_create'=>session()->get('id'),
            'created_at'=>date('Y-m-d H:i:s')
        );
        $model->simpan('data_agenda', $data2);
        echo view('agendapkl/partial/header_datatable');
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/partial/footer_datatable');
        return redirect()->to('agendapkl/data_agenda/index/'. session()->get('id'));
    }else {
        return redirect()->to('agendapkl');
    }
}

public function create($id)
{
    if(session()->get('level')==4) {
        $model=new M_agenda();
        $where=array('id_agenda'=>$id);
        $data['jojo']=$model->getWhere('data_agenda',$where);
        $data['title']='Data Agenda';
        echo view('agendapkl/partial/header_datatable', $data);
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/data_agenda/create', $data); 
        echo view('agendapkl/partial/footer_datatable');
    }else {
        return redirect()->to('agendapkl');
    }
}

public function aksi_create()
{ 
    if(session()->get('level')==4) {
        $renper1= $this->request->getPost('rencana1');
        $renper2= $this->request->getPost('rencana2');
        $renper3= $this->request->getPost('rencana3');
        $renper4= $this->request->getPost('rencana4');
        $renper5= $this->request->getPost('rencana5');
        $reape1= $this->request->getPost('realisasi1');
        $reape2= $this->request->getPost('realisasi2');
        $reape3= $this->request->getPost('realisasi3');
        $reape4= $this->request->getPost('realisasi4');
        $reape5= $this->request->getPost('realisasi5');
        $pk1= $this->request->getPost('penugasan1');
        $pk2= $this->request->getPost('penugasan2');
        $pk3= $this->request->getPost('penugasan3');
        $pm1= $this->request->getPost('pm1');
        $pm2= $this->request->getPost('pm2');
        $pm3= $this->request->getPost('pm3');
        $id= $this->request->getPost('id');
        date_default_timezone_set('Asia/Jakarta');

        $model=new M_agenda();
        $where2=array('id_agenda'=>$id);

        //Yang ditambah ke agenda
        $data2=array(
            'renper_1'=>$renper1,
            'renper_2'=>$renper2,
            'renper_3'=>$renper3,
            'renper_4'=>$renper4,
            'renper_5'=>$renper5,
            'reape_1'=>$reape1,
            'reape_2'=>$reape2,
            'reape_3'=>$reape3,
            'reape_4'=>$reape4,
            'reape_5'=>$reape5,
            'pk_1'=>$pk1,
            'pk_2'=>$pk2,
            'pk_3'=>$pk3,
            'pm_1'=>$pm1,
            'pm_2'=>$pm2,
            'pm_3'=>$pm3,
        );
        $model->qedit('data_agenda', $data2, $where2);
        echo view('agendapkl/partial/header_datatable');
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/partial/footer_datatable');
        return redirect()->to('agendapkl/data_agenda/index/'. session()->get('id'));
    }else {
        return redirect()->to('agendapkl');
    }
}

public function aksi_logout($id)
{ 
    if(session()->get('level')==4) {
        date_default_timezone_set('Asia/Jakarta');

        $model=new M_agenda();
        $where2=array('id_agenda'=>$id);

        //Yang ditambah ke agenda
        $data2=array(
            'jam_keluar'=>date('H:i:s'),
            'kondisi'=>'1'
        );
        $model->qedit('data_agenda', $data2, $where2);
        echo view('agendapkl/partial/header_datatable');
        echo view('agendapkl/partial/side_menu');
        echo view('agendapkl/partial/top_menu');
        echo view('agendapkl/partial/footer_datatable');
        return redirect()->to('agendapkl/data_agenda/index/'. session()->get('id'));
    }else {
        return redirect()->to('agendapkl');
    }
}


// ===========================================================================================================

public function printpdf($id)
{
    if (session()->get('level')==4) {
        $model = new M_agenda();

        $wheree = array('id_agenda' => $id);
        $m = $model->getWhere2('data_agenda', $wheree);
        $iduser = $m['id_agenda'];
        $where = array('data_agenda.id_agenda' => $iduser);

        $on = 'data_agenda.siswa=data_siswa.user_siswa';
        $data['jojo'] = $model->join2w('data_agenda', 'data_siswa', $on, $wheree);
        $data['title'] = 'Data Agenda';

        // create new PDF document
        $pdf = new TCPDF('p', 'mm', 'A4');

        // Set document properties
        $pdf->SetCreator('GT - Penggajian Karyawan');
        $pdf->SetAuthor('GT - Penggajian Karyawan');
        $pdf->SetTitle('Slip Gaji');
        $pdf->SetSubject('Slip Gaji');

        // Set Margin
        $pdf->SetMargins(20, 20, 20);

        // Remove header and footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Add a page 
        $pdf->AddPage();

        //Data Perusahaan
        $logopdf = $model->getLogoPDF();
        $dataPerusahaan = $model->getPerusahaan();

        // Logo PT
        foreach ($logopdf as $logo) {
            $pdf->Image('logo/logo_pdf/' . $logo['logo_pdf_perusahaan'], 22, 8, 25);
        }

        foreach ($dataPerusahaan as $perusahaan) { 
        // Alamat dan nama PT
            $pdf->SetFont('helvetica', 'B', 16);
            $pdf->Cell(0, 10, $perusahaan['nama_perusahaan'], 0, 1, 'C');
            $pdf->SetFont('helvetica', '', 12);
            $pdf->Cell(0, 8, $perusahaan['komplek_perusahaan'] . ', ' . $perusahaan['jalan_perusahaan'], 0, 1, 'C');
            $pdf->Cell(0, 8, $perusahaan['kelurahan_perusahaan'] . ', ' . $perusahaan['kecamatan_perusahaan'], 0, 1, 'C');
            $pdf->Cell(0, 8, $perusahaan['kota_perusahaan']. ' ' .$perusahaan['kode_pos_perusahaan'], 0, 1, 'C');
        }

        // Add horizontal line
        $pdf->SetLineWidth(0.5);
        $pdf->Line(20, 55, 190, 55);

        // Add heading
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 10, 'Slip Gaji', 0, 1, 'C');

        // HTML content for the PDF layout
        $html = '<h3>' . $data['title'] . '</h3>';
        foreach ($data['jojo'] as $riz) {
            $pdf->SetFont('helvetica', '', 12);
            $html .= '<h4>Jam Masuk: ' . date('H:i', strtotime($riz->jam_masuk)) . '</h4>';
            $html .= '<h4>Jam Keluar: ' . date('H:i', strtotime($riz->jam_keluar)) . '</h4>';

            $html .= '<h4>Rencana Pekerjaan 1: ' . $riz->renper_1 . '</h4>';
            $html .= '<h4>Rencana Pekerjaan 2: ' . $riz->renper_2 . '</h4>';
            $html .= '<h4>Rencana Pekerjaan 3: ' . $riz->renper_3 . '</h4>';
            $html .= '<h4>Rencana Pekerjaan 4: ' . $riz->renper_4 . '</h4>';
            $html .= '<h4>Rencana Pekerjaan 5: ' . $riz->renper_5 . '</h4>';

            $html .= '<h4>Realisasi Pekerjaan 1: ' . $riz->reape_1 . '</h4>';
            $html .= '<h4>Realisasi Pekerjaan 2: ' . $riz->reape_2 . '</h4>';
            $html .= '<h4>Realisasi Pekerjaan 3: ' . $riz->reape_3 . '</h4>';
            $html .= '<h4>Realisasi Pekerjaan 4: ' . $riz->reape_4 . '</h4>';
            $html .= '<h4>Realisasi Pekerjaan 5: ' . $riz->reape_5 . '</h4>';

            $html .= '<h4>Penugasan Khusus 1: ' . $riz->pk_1 . '</h4>';
            $html .= '<h4>Penugasan Khusus 2: ' . $riz->pk_2 . '</h4>';
            $html .= '<h4>Penugasan Khusus 3: ' . $riz->pk_3 . '</h4>';

            $html .= '<h4>Penemuan Masalah 1: ' . $riz->pm_1 . '</h4>';
            $html .= '<h4>Penemuan Masalah 2: ' . $riz->pm_2 . '</h4>';
            $html .= '<h4>Penemuan Masalah 3: ' . $riz->pm_3 . '</h4>';

            $html .= '<h4>Senyum: ' . $riz->senyum . '</h4>';
            $html .= '<h4>Keramahan: ' . $riz->keramahan . '</h4>';
            $html .= '<h4>Penampilan: ' . $riz->penampilan . '</h4>';
            $html .= '<h4>Komunikasi: ' . $riz->komunikasi . '</h4>';
            $html .= '<h4>Realisasi Kerja: ' . $riz->realisasi_kerja . '</h4>';

            $html .= '<h4>Catatan 1: ' . $riz->catatan_1 . '</h4>';
            $html .= '<h4>Catatan 2: ' . $riz->catatan_2 . '</h4>';
            $html .= '<h4>Catatan 3: ' . $riz->catatan_3 . '</h4>';
        }

        // Close and output PDF document
        $this->response->setContentType('application/pdf');
        $pdf->Output("Agenda-pkl.pdf", 'I');

    } else {
        return redirect()->to('agendapkl');
    }
}

}