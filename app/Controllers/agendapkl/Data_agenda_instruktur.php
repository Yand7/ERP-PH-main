<?php

namespace App\Controllers\agendapkl;
use App\Models\agendapkl\M_agenda;
use Dompdf\Dompdf;

class Data_agenda_instruktur extends BaseController
{

    public function index()
    {
        if (session()->get('level')==8) {
            $model = new M_agenda();

            $idInstruktur = session()->get('id');
            $data['jojo'] = $model->tampil_siswa('data_siswa', $idInstruktur);
            $data['title'] = 'Data Agenda';

            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_instruktur/view', $data);
            echo view('agendapkl/partial/footer_datatable');
        } else {
            return redirect()->to('agendapkl');
        }
    }

    public function detail($id)
    {
        if(session()->get('level')==8 ) {
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
            echo view('agendapkl/data_agenda_instruktur/view_agenda', $data);
            echo view('agendapkl/partial/footer_datatable');
        }else {
            return redirect()->to('agendapkl');
        }
    }

    public function agenda($id)
    {
        if(session()->get('level')==8) {
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
            echo view('agendapkl/data_agenda_instruktur/agenda', $data);
            echo view('agendapkl/partial/footer_datatable');
        }else {
            return redirect()->to('agendapkl');
        }
    }

    public function edit($id)
    { 
        if(session()->get('level')==8) {
            $model=new M_agenda();
            $where=array('id_agenda'=>$id);
            $data['jojo']=$model->getWhere('data_agenda',$where);
            $data['title']='Data Agenda';
            echo view('agendapkl/partial/header_datatable', $data);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_instruktur/edit',$data);
            echo view('agendapkl/partial/footer_datatable');    
        }else {
            return redirect()->to('agendapkl/home');
        }
    }

    public function aksi_edit()
    { 
        if(session()->get('level')==8) {
            $pm1= $this->request->getPost('pm1');
            $pm2= $this->request->getPost('pm2');
            $pm3= $this->request->getPost('pm3');
            $senyum= $this->request->getPost('senyum');
            $keramahan= $this->request->getPost('keramahan');
            $penampilan= $this->request->getPost('penampilan');
            $komunikasi= $this->request->getPost('komunikasi');
            $realisasi_kerja= $this->request->getPost('realisasi_kerja');
            $catatan= $this->request->getPost('catatan');
            $id= $this->request->getPost('id');
            $id2= $this->request->getPost('id2');
            date_default_timezone_set('Asia/Jakarta');

            $model=new M_agenda();

            //Yang ditambah ke karyawan
            $where=array('user_siswa'=>$id2);
            $data1=array(
                'siswa'=>$where,
                'tanggal'=>date('Y-m-d H:i:s'),
                'keterangan'=>'1',
                'user_create'=>session()->get('id'),
                'created_at'=>date('Y-m-d H:i:s')
            );

            $model->simpan('data_absensi_kantor', $data1);

            $where2=array('id_agenda'=>$id);
            $data2=array(
                'pm_1'=>$pm1,
                'pm_2'=>$pm2,
                'pm_3'=>$pm3,
                'senyum'=>$senyum,
                'keramahan'=>$keramahan,
                'penampilan'=>$penampilan,
                'komunikasi'=>$komunikasi,
                'realisasi_kerja'=>$realisasi_kerja,
                'catatan'=>$catatan,
                'user_update'=>session()->get('id'),
                'updated_at'=>date('Y-m-d H:i:s')
            );
            $model->qedit('data_agenda', $data2, $where2);
            return redirect()->to('agendapkl/data_agenda_instruktur/detail/'. $id2);
        }else {
            return redirect()->to('agendapkl');
        }
    }
    public function delete($id)
    { 
        if(session()->get('level')==8) {
            $model=new M_agenda();
            $where=array('id_agenda'=>$id);

            $data=array(
                'user_delete'=>session()->get('id'),
                'deleted_at'=>date('Y-m-d H:i:s')
            );

            $model->qedit('data_agenda', $data, $where);
            return redirect()->to('agendapkl/data_agenda_instruktur');
        }else {
            return redirect()->to('agendapkl');
        }
    }

// ==========================================================================================================

    public function menu_print_agenda()
    {
        if(session()->get('level')==8) {
            $model=new M_agenda();

            $idInstruktur = session()->get('id');
            $data['nama'] = $model->tampil_siswa('data_siswa', $idInstruktur);
            $title['title']='Menu Agenda';

            echo view('agendapkl/partial/header_datatable', $title);
            echo view('agendapkl/partial/side_menu');
            echo view('agendapkl/partial/top_menu');
            echo view('agendapkl/data_agenda_instruktur/menu_print', $data);
            echo view('agendapkl/partial/footer_datatable');    
        }else {
            return redirect()->to('agendapkl');
        }

    }

    public function export_pdf()
    {
        if (session()->get('level')==8) {
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
            $dompdf->loadHtml(view('data_agenda_instruktur/print_pdf_view',$data));
            $dompdf->setPaper('A4','potrait');
            $dompdf->render();
            $dompdf->stream('agenda_pkl.pdf', ['Attachment' => 0]);
        } else {
            return redirect()->to('agendapkl');
        }
    }

}