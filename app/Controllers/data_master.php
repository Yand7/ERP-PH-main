<?php

namespace App\Controllers;
use App\Models\M_user;
use App\Models\M_model;
use App\Models\RombelModel;

use App\Models\M_guru;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

use App\Models\M_siswa;
use App\Models\M_level;
use App\Models\M_website;
use App\Models\TahunModel; 
use App\Models\BlokModel; 
use App\Models\M_pendaftaran;
use App\Models\M_login;


class data_master extends BaseController
{

    public function index()
    {
        if(session()->get('id')>0) {
           $model=new M_login();
           $id=session()->get('id');
           $on='user.level=level.id_level';
           $where=array('user.id_user'=>$id);
           $data['jojo']=$model->joinlogin('user', 'level', $on, $where);
           $data['title']='Dashboard';

           echo view('partial_dashboard/header_dashboard', $data);
           echo view('partial/side_menu2');
           echo view('partial/top_menu');
           echo view('login/dashboard2', $data);
           echo view('partial_dashboard/footer_dashboard');

       }else{
        return redirect()->to('login');
       }
    }

    public function user()
    {
        if (session()->get('level') == 1 || session()->get('level') == 2) {
            $model = new M_user();
            $on = 'user.level=level.id_level';

            if (session()->get('level') == 2) {
            // Jika user memiliki level 2 (misalnya), maka hindari menampilkan data dengan level 1
                $data['jojo'] = $model->join2WithExcludedLevel('user', 'level', $on, 1);
            } else {
            // Tampilkan semua data
                $data['jojo'] = $model->join2('user', 'level', $on);
            }

            $data['title'] = 'Data User';
            echo view('partial/header_datatable', $data);
            echo view('partial/side_menu2');
            echo view('partial/top_menu');
            echo view('user/view', $data);
            echo view('partial/footer_datatable');
        } else {
            return redirect()->to('login');
        }
    }


    public function reset_password($id)
    {
        if(session()->get('level')== 1) {
            $model=new M_user();
            $where=array('id_user'=>$id);
            $user=array('password'=>md5('12345'));
            $model->qedit('user', $user, $where);

            echo view('partial/header_datatable');
            echo view('partial/side_menu2');
            echo view('partial/top_menu');
            echo view('partial/footer_datatable');

            return redirect()->to('user');
        }else {
            return redirect()->to('login');

        }
    }

    public function sekre()
    {
        $level = session()->get('level');
        $id_user = session()->get('id');

        $model = new M_model();
        $data['a'] = [];

        if ($level == 1 || $level == 2 || $level == 3) {
            if ($level == 3) {
                $data['a'] = $model->getAllRombelDet($id_user);
            } else {
                $data['a'] = $model->getAllPDatat();
            }
        }

        $data['title'] = 'Data Sekretaris';

        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('sekretaris/view', $data);
        echo view('partial/footer_datatable');
    }

    public function tambah_sekretaris()
    {
        $level = session()->get('level');
        $id_user = session()->get('id'); 

        $model = new M_model();
        $data['a'] = [];
        
        if ($level == 1 || $level == 2 || $level == 3) {
            if ($level == 3) {
                $data['a'] = $model->getAllRombelDetaial($id_user);
            } else {
                $data['a'] = $model->getAllPData();
            }
        }

        $data['title'] = 'Data Sekretaris';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('sekretaris/tambah', $data);
        echo view('partial/footer_datatable');
    }
    public function aksi_sekre()
    {
        $id_siswa = $this->request->getPost('sekretaris'); 
        $db = \Config\Database::connect();

        $tableUser = 'user';
        $tableSiswa = 'siswa';
        $columnToUpdate = 'level';
        $newLevelValue = 5;

        $sql = "UPDATE $tableUser AS u
        JOIN $tableSiswa AS s ON u.id_user = s.user
        SET u.$columnToUpdate = $newLevelValue
        WHERE s.id_siswa = ?";

        $db->query($sql, [$id_siswa]);
        return redirect()->to(base_url('/data_master/sekre'));
    }
    public function delete_sekre($id_siswa)
    {
        $db = \Config\Database::connect();

        $tableUser = 'user';
        $tableSiswa = 'siswa';
        $columnToUpdate = 'level';
        $newLevelValue = 4;

        $sql = "UPDATE $tableUser AS u
        JOIN $tableSiswa AS s ON u.id_user = s.user
        SET u.$columnToUpdate = $newLevelValue
        WHERE s.id_siswa = ?";

        $db->query($sql, [$id_siswa]);
        return redirect()->to(base_url('/data_master/sekre'));
    }

    public function naik()
    {
        $rombelModel = new RombelModel();

    // Mengambil semua entri rombel
        $allRombel = $rombelModel->findAll();

    // Menjalankan perulangan untuk memeriksa setiap entri rombel
        foreach ($allRombel as $rombel) {
        // Mengambil nilai ID kelas dari entri rombel
            $id_kelas = $rombel['kelas'];

        // Logika untuk memperbarui kelas sesuai kriteria yang diberikan
            switch ($id_kelas) {
                case 14:
                $new_kelas_id = 9;
                break;
                case 9:
                $new_kelas_id = 8;
                break;
                case 8:
                $new_kelas_id = 7;
                break;
                case 7:
                $new_kelas_id = 5;
                break;
                case 5:
                $new_kelas_id = 2;
                break;
                case 2:
                $new_kelas_id = 16;
                break;
                default:
                // Default jika tidak ada kriteria yang sesuai
                $new_kelas_id = 16;
                break;
            }

        // Update nilai kelas dalam entri rombel
            $data = [
                'kelas' => $new_kelas_id
            ];
        $rombelModel->update($rombel['id_rombel'], $data); // Menggunakan ID rombel dari setiap entri

        // Anda juga dapat menambahkan logika lainnya jika diperlukan

    }

    // Redirect kembali ke halaman sebelumnya atau ke halaman yang diinginkan
    return redirect()->to(base_url('/data_master/data_siswa')); // Ganti dengan halaman yang sesuai
}








public function data_guru()
    {
      if(session()->get('level')==1 ||  session()->get('level')==2){
        $model = new M_guru();
        $rombelDetails = $model->getAllRombelDetails();
        $data['a'] = $rombelDetails;
        $data['title']='Data Guru';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('data_guru/view',$data);
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}

public function tambah_guru()
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_guru();
        $rombelDetails = $model->getAllRombel();
        $data['a'] = $rombelDetails;
        $data['c'] = $model->tampil('jenjang');
        $data['title']='Data Guru';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo  view('data_guru/create',$data);
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}
public function aksi_tambah_guru()
{
    $nik= $this->request->getPost('nik');
    $nama= $this->request->getPost('nama');
    $jenjang= $this->request->getPost('jenjang');
    $rombel= $this->request->getPost('rombel');
    $a= $this->request->getPost('username');
    $b= $this->request->getPost('password');
    $foto = $this->request->getFile('foto');
    if ($foto->isValid() && !$foto->hasMoved()) {
        $imageName = $foto->getName();
        $foto->move('images/', $imageName);
    } else {
        $imageName = 'default.png';
    }

    $data1=array(
        'username'=>$a,
        'password'=>md5($b),
        'level'=>'3',
        'foto'=>$imageName,
        'jenjang'=>$jenjang,
        'created_at'=>date('Y-m-d H:i:s')

    );
    $darrel=new M_guru();  
    $darrel->simpan('user', $data1);
    $where=array('username'=>$a);
    $ae=$darrel->getWhere2('user', $where);
    $id = $ae['id_user'];
    $data2=array(
        'nik'=>$nik,
        'nama'=>$nama,
        'rombel'=>$rombel,
        'user'=>$id,
        'created_at'=>date('Y-m-d H:i:s')

    );
    $darrel->simpan('guru', $data2);

    return redirect()->to('/data_master/data_guru');
    
}
public function edit_guru($user)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_guru();
        $rombelDetails = $model->getAllRombel();
        $data['title']='Data Guru';
        $data['a'] = $rombelDetails;
        $data['c'] = $model->tampil('jenjang');
        $where=array('user'=>$user);
        $where2=array('id_user'=>$user);
        $data['jojo']=$model->getWhere('guru',$where);
        $data['rizkan']=$model->getWhere('user',$where2);
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('data_guru/edit',$data);
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}
public function aksi_edit_guru()
{
    $nik = $this->request->getPost('nik');
    $a = $this->request->getPost('username');
    $nama = $this->request->getPost('nama');
    $rombel= $this->request->getPost('rombel');
    $id = $this->request->getPost('id');
    $id2 = $this->request->getPost('id2');
    $jenjang= $this->request->getPost('jenjang');
    $foto = $this->request->getFile('foto');

    $imageName = null; 

    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $imageName = $foto->getName();
        $foto->move('images/', $imageName);
    }

    $where = array('id_user' => $id);
    $data1 = array(
        'username' => $a,
        'jenjang' => $jenjang
    );

    if ($imageName) {
        $data1['foto'] = $imageName;
    }

    $darrel = new M_guru();
    $darrel->qedit('user', $data1, $where);
    $where2 = array('user' => $id2);
    $data2 = array(
        'nik' => $nik,
        'nama' => $nama,
        'rombel' => $rombel
        
    );
    $darrel->qedit('guru', $data2, $where2);
    return redirect()->to('/data_master/data_guru');
}
public function delete_guru($id)
{
    $model=new M_guru();
    $where=array('user'=>$id);
    $where2=array('id_user'=>$id);
    $model->hapus('guru',$where);
    $model->hapus('user',$where2);
    return redirect()->to('/data_master/data_guru');
}

public function import_excel_guru()
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model = new M_guru();
        $file = $this->request->getFile('file_excel');
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        for ($row = 2; $row <= $highestRow; $row++) {

            $data1 = [
                'username' => $sheet->getCellByColumnAndRow(1, $row)->getValue(),
                'password' => md5($sheet->getCellByColumnAndRow(2, $row)->getValue()),
                'jenjang' => $sheet->getCellByColumnAndRow(3, $row)->getValue(),
                'level' => 3,
                'foto' => 'default.png',
                'created_at'=>date('Y-m-d H:i:s')
            ];

            $model->simpan('user', $data1);
            $where=array('username'=>$sheet->getCellByColumnAndRow(1, $row)->getValue());

            $user=$model->getWhere2('user', $where);
            $iduser = $user['id_user'];

            $data2=array(
                'nik'=>$sheet->getCellByColumnAndRow(4, $row)->getValue(),
                'nama'=>$sheet->getCellByColumnAndRow(5, $row)->getValue(),
                'rombel'=>$sheet->getCellByColumnAndRow(6, $row)->getValue(),
                'user'=>$iduser,
                'created_at'=>date('Y-m-d H:i:s')
            );
            $model->simpan('guru', $data2);
        }

        return redirect()->back()->with('success', 'Data Excel Telah Berhasil Diimport');
    }else {
        return redirect()->to('login');
    }
}






public function data_siswa()
{
   $level = session()->get('level');
   $id_user = session()->get('id');
   $data['title']='Data Siswa';

   $model = new M_siswa();
   $data['a'] = [];

   if ($level == 1 || $level == 2 || $level == 3) {
    if ($level == 3) {
        $data['a'] = $model->getAllRombelDetaial($id_user);
    } else {
        $data['a'] = $model->getAllPData();
    }
}

echo view('partial/header_datatable', $data);
echo view('partial/side_menu2');
echo view('partial/top_menu');
echo view('data_siswa/view', $data);
echo view('partial/footer_datatable');
}

public function tambah_siswa()
{
if(session()->get('level')==1 ||  session()->get('level')==2){
    $model = new M_siswa();
    $rombelDetails = $model->getAllRombel();
    $data['a'] = $rombelDetails;
    $data['c'] = $model->tampil('jenjang');
    $data['title']='Data Siswa';
    echo view('partial/header_datatable', $data);
    echo view('partial/side_menu2');
    echo view('partial/top_menu');
    echo view('data_siswa/create',$data);
    echo view('partial/footer_datatable');
}else{
    return redirect()->to('login');
}
}

public function aksi_tambah_siswa()
{
$nis= $this->request->getPost('nis');
$nama= $this->request->getPost('nama');
$rombel= $this->request->getPost('rombel');
$jenjang= $this->request->getPost('jenjang');
$a= $this->request->getPost('username');
$b= $this->request->getPost('password');
$foto = $this->request->getFile('foto');
if ($foto->isValid() && !$foto->hasMoved()) {
    $imageName = $foto->getName();
    $foto->move('images/', $imageName);
} else {
    $imageName = 'default.png';
}

$data1=array(
    'username'=>$a,
    'password'=>md5($b),
    'level'=>'4',
    'foto'=>$imageName,
    'jenjang'=>$jenjang,
    'created_at'=>date('Y-m-d H:i:s')

);
$darrel=new M_siswa();
$darrel->simpan('user', $data1);
$where=array('username'=>$a);
$ae=$darrel->getWhere2('user', $where);
$id = $ae['id_user'];
$data2=array(
    'nis'=>$nis,
    'nama_siswa'=>$nama,
    'rombel'=>$rombel,
    'user'=>$id,
    'created_at'=>date('Y-m-d H:i:s')

);
$darrel->simpan('siswa', $data2);

return redirect()->to('/data_master/data_siswa');

}
public function edit_siswa($user)
{
if(session()->get('level')==1 ||  session()->get('level')==2){
    $model=new M_siswa();
    $rombelDetails = $model->getAllRombel();
    $data['title']='Data Siswa';
    $data['a'] = $rombelDetails;
    $data['c'] = $model->tampil('jenjang');
    $where=array('user'=>$user);
    $where2=array('id_user'=>$user);
    $data['jojo']=$model->getWhere('siswa',$where);
    $data['rizkan']=$model->getWhere('user',$where2);
    echo view('partial/header_datatable', $data);
    echo view('partial/side_menu2');
    echo view('partial/top_menu');
    echo view('data_siswa/edit',$data);
    echo view('partial/footer_datatable');
}else{
    return redirect()->to('login');
}
}
public function aksi_edit_siswa()
{
$nis = $this->request->getPost('nis');
$a = $this->request->getPost('username');
$nama = $this->request->getPost('nama');
$rombel= $this->request->getPost('rombel');
$jenjang= $this->request->getPost('jenjang');
$id = $this->request->getPost('id');
$id2 = $this->request->getPost('id2');
$foto = $this->request->getFile('foto');

$imageName = null; 

if ($foto && $foto->isValid() && !$foto->hasMoved()) {
    $imageName = $foto->getName();
    $foto->move('images/', $imageName);
}

$where = array('id_user' => $id);
$data1 = array(
    'username' => $a,
    'jenjang' => $jenjang
);

if ($imageName) {
    $data1['foto'] = $imageName;
}

$darrel = new M_siswa();
$darrel->qedit('user', $data1, $where);
$where2 = array('user' => $id2);
$data2 = array(
    'nis' => $nis,
    'nama_siswa' => $nama,
    'rombel' => $rombel
    
);
$darrel->qedit('siswa', $data2, $where2);
return redirect()->to('/data_master/data_siswa');
}

public function delete_siswa($id)
{
$model=new M_siswa();
$where=array('user'=>$id);
$where2=array('id_user'=>$id);
$model->hapus('siswa',$where);
$model->hapus('user',$where2);
return redirect()->to('/data_master/data_siswa');
}

public function import_excel_siswa()
{
if(session()->get('level')==1 ||  session()->get('level')==2){
    $model = new M_siswa();
    $file = $this->request->getFile('file_excel');
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet();
    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();
    for ($row = 2; $row <= $highestRow; $row++) {

        $data1 = [
            'username' => $sheet->getCellByColumnAndRow(1, $row)->getValue(),
            'password' => md5($sheet->getCellByColumnAndRow(2, $row)->getValue()),
            'jenjang' => $sheet->getCellByColumnAndRow(3, $row)->getValue(),
            'level' => 4,
            'foto' => 'default.png',
            'created_at'=>date('Y-m-d H:i:s')
        ];

        $model->simpan('user', $data1);
        $where=array('username'=>$sheet->getCellByColumnAndRow(1, $row)->getValue());

        $user=$model->getWhere2('user', $where);
        $iduser = $user['id_user'];

        $data2=array(
            'nis'=>$sheet->getCellByColumnAndRow(4, $row)->getValue(),
            'nama_siswa'=>$sheet->getCellByColumnAndRow(5, $row)->getValue(),
            'rombel'=>$sheet->getCellByColumnAndRow(6, $row)->getValue(),
            'user'=>$iduser,
            'created_at'=>date('Y-m-d H:i:s')
        );
        $model->simpan('siswa', $data2);
    }

    return redirect()->back()->with('success', 'Data Excel Telah Berhasil Diimport');
}else {
    return redirect()->to('login');
}
}










public function data_level()
    {
       if(session()->get('level')== 1) {
        $model=new M_level();
        $data['jojo']=$model->tampil('level');
        $data['title']='Data Level';

        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('data_level/view', $data);
        echo view('partial/footer_datatable');
    }else {
        return redirect()->to('login');
    }
}

public function create()
{
    if(session()->get('level')== 1) {
        $model=new M_level();
        $data['jojo']=$model->tampil('level');
        $data['title']='Data Level';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('data_level/create', $data); 
        echo view('partial/footer_datatable');
    }else {
        return redirect()->to('login');
    }
}

public function aksi_create()
{ 
    if(session()->get('level')== 1) {
        $a= $this->request->getPost('level');
        date_default_timezone_set('Asia/Jakarta');

        //Yang ditambah ke user
        $data1=array(
            'nama_level'=>$a,
        );
        $model=new M_level();
        $model->simpan('level', $data1);
        echo view('partial/header_datatable');
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('partial/footer_datatable');
        return redirect()->to('/data_master/data_level');
    }else {
        return redirect()->to('login');
    }
}
public function edit($id)
{ 
    if(session()->get('level')== 1) {
        $model=new M_level();
        $where=array('id_level'=>$id);
        $data['jojo']=$model->getWhere('level',$where);
        $data['level']=$model->tampil('level');
        $data['title']='Data Level';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('data_level/edit',$data);
        echo view('partial/footer_datatable');    
    }else {
        return redirect()->to('home');
    }
}

public function aksi_edit()
{ 
    if(session()->get('level')== 1) {
     $a= $this->request->getPost('level');
     $id= $this->request->getPost('id');
     date_default_timezone_set('Asia/Jakarta');

    //Yang ditambah ke user
     $where=array('id_level'=>$id);
     $data1=array(
        'nama_level'=>$a,
        'updated_at'=>date('Y-m-d H:i:s')
    );
     $model=new M_level();
     $model->qedit('level', $data1, $where);
     return redirect()->to('/data_master/data_level');

 }else {
    return redirect()->to('login');
}
}

public function delete($id)
{ 
    if(session()->get('level')== 1) {
        $model=new M_level();
        $where=array('id_level'=>$id);

        $data=array(
            'deleted_at'=>date('Y-m-d H:i:s')
        );

        $model->qedit('level', $data, $where);
        return redirect()->to('/data_master/data_level');
    }else {
        return redirect()->to('login');
    }
}













public function data_website()
{
    if (session()->get('level') == 1) {
        $model = new M_website();
        $data['jojo'] = $model->tampil('website');
        $data['title'] = 'Data Website';

        // Menghitung jumlah data website
        $data['jumlah_data'] = count($data['jojo']);

        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('data_website/view', $data);
        echo view('partial/footer_datatable');
    } else {
        return redirect()->to('login');
    }
}


public function create_website()
{
    if(session()->get('level')== 1) {
        $model=new M_website();
        $data['darel']=$model->tampil('website');
        $data['title']='Data Website';        
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('data_website/create', $data); 
        echo view('partial/footer_datatable');
    }else {
        return redirect()->to('login');
    }
}

public function aksi_create_website()
{ 
    if(session()->get('level')== 1) {
        $a= $this->request->getPost('nama_perusahaan');
        date_default_timezone_set('Asia/Jakarta');

        $logo_perusahaan= $this->request->getFile('logo_perusahaan');
        if($logo_perusahaan && $logo_perusahaan->isValid() && ! $logo_perusahaan->hasMoved())
        {
            $imageName1 = $logo_perusahaan->getName();
            $logo_perusahaan->move('logo/logo_perusahaan',$imageName1);
        }else{
            $imageName1='logo_contoh.svg';
        }

        $logo_pdf= $this->request->getFile('logo_pdf');
        if($logo_pdf && $logo_pdf->isValid() && ! $logo_pdf->hasMoved())
        {
            $imageName2 = $logo_pdf->getName();
            $logo_pdf->move('logo/logo_pdf',$imageName2);
        }else{
            $imageName2='logo_pdf_contoh.svg';
        }

        $favicon= $this->request->getFile('favicon');
        if($favicon && $favicon->isValid() && ! $favicon->hasMoved())
        {
            $imageName3 = $favicon->getName();
            $favicon->move('logo/favicon',$imageName3);
        }else{
            $imageName3='favicon_contoh.svg';
        }

        //Yang ditambah ke user
        $data1=array(
            'nama_perusahaan'=>$a,
            'logo_perusahaan'=>$imageName1,
            'logo_pdf_perusahaan'=>$imageName2,
            'favicon_perusahaan'=>$imageName3,
        );
        $model=new M_website();
        $model->simpan('perusahaan', $data1);

        echo view('partial/header_datatable');
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('partial/footer_datatable');
        return redirect()->to('/data_master/data_website');
    }else {
        return redirect()->to('login');
    }
}
public function edit_website($id)
{ 
    if(session()->get('level')== 1) {
        $model=new M_website();
        $where=array('id_website'=>$id);
        $data['jojo']=$model->getWhere('website',$where);
        $data['title']='Data Website';        
        echo view('partial/header_datatable');
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('data_website/edit',$data);
        echo view('partial/footer_datatable');    
    }else {
        return redirect()->to('login');
    }
}

public function aksi_edit_website()
{ 
    if(session()->get('level')== 1) {
        $a= $this->request->getPost('nama_website');
        $id= $this->request->getPost('id');
        date_default_timezone_set('Asia/Jakarta');

        $logo_website= $this->request->getFile('logo_website');
        if (!empty($logo_website->getName())) {
            if ($logo_website->isValid() && !$logo_website->hasMoved()) {
                if (file_exists("logo/logo_website/" . $id)) {
                    unlink("logo/logo_website/" . $id);
                }
                $imageName1 = $logo_website->getName();
                $logo_website->move('logo/logo_website', $imageName1);
            }
        } else {
            $imageName1 = $this->request->getPost('old_logo_website');
        }

        $logo_pdf= $this->request->getFile('logo_pdf');
        if (!empty($logo_pdf->getName())) {
            if ($logo_pdf->isValid() && !$logo_pdf->hasMoved()) {
                if (file_exists("logo/logo_pdf/" . $id)) {
                    unlink("logo/logo_pdf/" . $id);
                }
                $imageName2 = $logo_pdf->getName();
                $logo_pdf->move('logo/logo_pdf', $imageName2);
            }
        } else {
            $imageName2 = $this->request->getPost('old_logo_pdf');
        }

        $favicon= $this->request->getFile('favicon');
        if (!empty($favicon->getName())) {
            if ($favicon->isValid() && !$favicon->hasMoved()) {
                if (file_exists("logo/favicon/" . $id)) {
                    unlink("logo/favicon/" . $id);
                }
                $imageName3 = $favicon->getName();
                $favicon->move('logo/favicon', $imageName3);
            }
        } else {
            $imageName3 = $this->request->getPost('old_favicon');
        }

        //Yang ditambah ke user
        $data1=array(
            'nama_website'=>$a,
            'logo_website'=>$imageName1,
            'logo_pdf'=>$imageName2,
            'favicon_website'=>$imageName3,
        );
        $where=array('id_website'=>$id);
        $model=new M_website();
        $model->qedit('website', $data1, $where);

        return redirect()->to('/data_master/data_website');
    }else {
        return redirect()->to('login');
    }
}
public function delete_website($id)
{ 
    if(session()->get('level')== 1) {
        $model=new M_website();
        $model->deletee($id);
        return redirect()->to('/data_master/data_website');
    }else {
        return redirect()->to('login');
    }
}











public function kelas()
{ 
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_model();
        $data['a'] = $model->tampil('kelas');
        $data['title']='Data Kelas';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('ruangan/v_kelas',$data);
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}
public function jurusan()
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_model();
        $data['title']='Data Jurusan';
        $data['a'] = $model->tampil('jurusan');
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('ruangan/v_jurusan',$data);
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}
public function jenjang()
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_model();
        $data['a'] = $model->tampil('jenjang');
        $data['title']='Data Jenjang';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('ruangan/v_jenjang',$data);
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}
public function rombel()
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_model();
        $on='rombel.kelas=kelas.id_kelas';
        $on2='rombel.jurusan=jurusan.id_jurusan';
        $data['a'] = $model->joinuser('rombel', 'kelas','jurusan',$on,$on2);
        $data['title']='Data Rombel';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('ruangan/v_rombel',$data);
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}
public function tambah_rombel()
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_model();
        $data['g'] = $model->tampil('kelas');
        $data['a'] = $model->tampil('jurusan');
        $data['title']='Tambah Rombel';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('ruangan/tambah_rombel',$data);
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}

public function aksi_tambah_rombel()
{
    $a=$this->request->getPost('kelas');
    $b=$this->request->getPost('jurusan');
    $c=$this->request->getPost('nama');

    $simpan=array(
        'kelas'=>$a,
        'jurusan'=>$b,
        'nama_r'=>$c,
        'created_at'=>date('Y-m-d H:i:s')
    );
    $model=new M_model();
    $model->simpan('rombel',$simpan);
    return redirect()->to('/data_master/rombel');
}
public function tambah_jurusan()
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_model();
        $data['title']='Jurusan';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('ruangan/tambah_jurusan');
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}
public function tambah_jenjang()
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_model();
        $data['title']='Tambah Jenjang';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('ruangan/tambah_jenjang');
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}

public function aksi_tambah_jurusan()
{
    $a=$this->request->getPost('nama_jurusan');

    $simpan=array(
        'nama_jurusan'=>$a,
        'created_at'=>date('Y-m-d H:i:s')
    );
    $model=new M_model();
    $model->simpan('jurusan',$simpan);
    return redirect()->to('/data_master/jurusan');
}
public function aksi_tambah_jenjang()
{
    $a=$this->request->getPost('nama_jenjang');

    $simpan=array(
        'nama_jenjang'=>$a,
        'created_at'=>date('Y-m-d H:i:s')
    );
    $model=new M_model();
    $model->simpan('jenjang',$simpan);
    return redirect()->to('/data_master/jenjang');
}
public function tambah_kelas()
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_model();
        $data['title']='Tambah Kelas';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('ruangan/tambah_kelas');
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}

public function aksi_tambah_kelas()
{
    $a=$this->request->getPost('nama_kelas');

    $simpan=array(
        'nama_kelas'=>$a,
        'created_at'=>date('Y-m-d H:i:s')
    );
    $model=new M_model();
    $model->simpan('kelas',$simpan);
    return redirect()->to('/data_master/kelas');
}
public function edit_kelas($id)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_model();
        $where=array('id_kelas'=>$id);
        $data['title']='Kelas';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        $data['jojo']=$model->getWhere('kelas',$where);
        echo  view('ruangan/edit_kelas',$data);
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}
public function edit_jenjang($id)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_model();
        $where=array('id_jenjang'=>$id);
        $data['title']='Edit Jenjang';
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        $data['jojo']=$model->getWhere('jenjang',$where);
        echo  view('ruangan/edit_jenjang',$data);
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }
}
public function aksi_edit_kelas()
{
    
    $id=$this->request->getPost('id');
    $a=$this->request->getPost('nama_kelas');


    $where=array('id_kelas'=>$id);
    $simpan=array(
        'nama_kelas'=>$a,
        
        
    );
    $model=new M_model();
    $model->qedit('kelas',$simpan, $where);
    return redirect()->to('/Ruangan');

}
public function aksi_edit_jenjang()
{
    
    $id=$this->request->getPost('id');
    $a=$this->request->getPost('nama_jenjang');


    $where=array('id_jenjang'=>$id);
    $simpan=array(
        'nama_jenjang'=>$a,
        
        
    );
    $model=new M_model();
    $model->qedit('jenjang',$simpan, $where);
    return redirect()->to('/data_master/jenjang');

}
public function delete_kelas($id)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new m_model();
        $where=array('id_kelas'=>$id);
        $model->hapus('kelas',$where);
        return redirect()->to('/data_master/kelas');
    }else{
        return redirect()->to('login');
    }
}
public function delete_jenjang($id)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new m_model();
        $where=array('id_jenjang'=>$id);
        $model->hapus('jenjang',$where);
        return redirect()->to('/data_master/jenjang');
    }else{
        return redirect()->to('login');
    }
}
public function edit_jurusan($id)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_model();
        $data['title']='Jurusan';
        $where=array('id_jurusan'=>$id);
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        $data['jojo']=$model->getWhere('jurusan',$where);
        echo  view('ruangan/edit_jurusan',$data);
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }

}
public function aksi_edit_jurusan()
{
    $id=$this->request->getPost('id');
    $a=$this->request->getPost('nama_jurusan');


    $where=array('id_jurusan'=>$id);
    $simpan=array(
        'nama_jurusan'=>$a
        
    );
    $model=new M_model();
    $model->qedit('jurusan',$simpan, $where);
    return redirect()->to('/data_master/jurusan');

}
public function delete_jurusan($id)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new m_model();
        $where=array('id_jurusan'=>$id);
        $model->hapus('jurusan',$where);
        return redirect()->to('/data_master/jurusan');
    }else{
        return redirect()->to('login');
    }
}
public function edit_rombel($id)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_model();
        $data['title']='Edit Rombel';
        $data['g']=$model->tampil('kelas');
        $data['a']=$model->tampil('jurusan');
        $where=array('id_rombel'=>$id);
        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        $data['jojo']=$model->getWhere('rombel',$where);
        echo  view('ruangan/edit_rombel',$data);
        echo view('partial/footer_datatable');
    }else{
        return redirect()->to('login');
    }

}
public function aksi_edit_rombel()
{
    $id=$this->request->getPost('id');
    $a=$this->request->getPost('kelas');
    $b=$this->request->getPost('jurusan');
    $c=$this->request->getPost('nama');


    $where=array('id_rombel'=>$id);
    $simpan=array(
        'kelas'=>$a,
        'jurusan'=>$b,
        'nama_r'=>$c
        
    );
    $model=new M_model();
    $model->qedit('rombel',$simpan, $where);
    return redirect()->to('/data_master/rombel');

}
public function delete_rombel($id)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new m_model();
        $where=array('id_rombel'=>$id);
        $model->hapus('rombel',$where);
        return redirect()->to('/data_master/rombel');
    }else{
        return redirect()->to('login');
    }
}






public function mapel()
    { 
		if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_model();
			$data['a'] = $model->tampil('mapel');
            $data['title']='Data Mapel';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu2');
			echo view('partial/top_menu');
			echo view('mapel/v_mapel',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('/Home');
		}
    }
    public function tambah_mapel()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
            $data['title']='Mapel';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu2');
			echo view('partial/top_menu');
			echo view('mapel/tambah_mapel');
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
    public function aksi_tambah_mapel()
	{
		$a=$this->request->getPost('nama_mapel');
        $b=$this->request->getPost('jenis');

		$simpan=array(
			'nama_mapel'=>$a,
            'jenis'=>$b,
			'created_at'=>date('Y-m-d H:i:s')
		);
		$model=new M_model();
		$model->simpan('mapel',$simpan);
		return redirect()->to('/data_master/mapel');
	}
    public function edit_mapel($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$where=array('id_mapel'=>$id);
			$data['title']='Mapel';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu2');
			echo view('partial/top_menu');
			$data['jojo']=$model->getWhere('mapel',$where);
			echo  view('mapel/edit_mapel',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function aksi_edit_mapel()
	{
		
		$id=$this->request->getPost('id');
		$a=$this->request->getPost('nama_mapel');
		$b=$this->request->getPost('jenis');


		$where=array('id_mapel'=>$id);
		$simpan=array(
			'nama_mapel'=>$a,
			'jenis'=>$b
			
			
		);
		$model=new M_model();
		$model->qedit('mapel',$simpan, $where);
		return redirect()->to('/data_master/mapel');

	}
	public function delete_mapel($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new m_model();
			$where=array('id_mapel'=>$id);
			$model->hapus('mapel',$where);
			return redirect()->to('/data_master/mapel');
		}else{
			return redirect()->to('login');
		}
	}







    public function tahun()
	{ 
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model = new M_model();
			$tahunModel = new TahunModel();
			$tahun = $tahunModel->findAll(); // Ambil semua data tahun dari model
			$data['a'] = $model->tampil('tahun');
			$isAktifExist = false; // Buat variabel untuk melacak apakah status 'Aktif' sudah ada sebelumnya
			foreach ($tahun as $item) {
				if ($item['status'] === 'Aktif') {
					$isAktifExist = true; // Jika ada yang 'Aktif', set variabel ke true
					break;
				}
			}

			$data['title']='Data Tahun';

			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu2');
			echo view('partial/top_menu');
			echo view('tahun/v_tahun',['a' => $data['a'], 'isAktifExist' => $isAktifExist, 'tahun' => $tahun]);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function tambah_tahun()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$data['title']='Data Tahun';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu2');
			echo view('partial/top_menu');
			echo view('tahun/tambah_tahun');
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	
	public function aksi_tambah_tahun()
	{
		$a=$this->request->getPost('nama_t');
		

		$simpan=array(
			'nama_t'=>$a,
			'status'=>"Tidak-Aktif",
			'created_at'=>date('Y-m-d H:i:s')
		);
		$model=new M_model();
		$model->simpan('tahun',$simpan);
		return redirect()->to('/data_master/tahun');
	}
	public function edit_tahun($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$where=array('id_tahun'=>$id);
			$data['title']='Data Tahun';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu2');
			echo view('partial/top_menu');
			$data['jojo']=$model->getWhere('tahun',$where);
			echo  view('tahun/edit_tahun',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function aksi_edit_tahun()
	{
		
		$id=$this->request->getPost('id');
		$a=$this->request->getPost('nama_t');


		$where=array('id_tahun'=>$id);
		$simpan=array(
			'nama_t'=>$a
			
			
		);
		$model=new M_model();
		$model->qedit('tahun',$simpan, $where);
		return redirect()->to('/data_master/tahun');

	}
	public function delete_tahun($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new m_model();
			$where=array('id_tahun'=>$id);
			$model->hapus('tahun',$where);
			return redirect()->to('/data_master/tahun');
		}else{
			return redirect()->to('login');
		}
	}
	public function aksi($id_tahun)
	{
		$model = new M_model();
		
        // Dapatkan informasi tahun berdasarkan ID
        $tahun = $model->gettahunById($id_tahun); // Implementasikan method ini sesuai dengan model Anda
        
        // Cek status tahun saat ini dan tentukan status berikutnya
        $newStatus = ($tahun->status === 'Aktif') ? 'Tidak-Aktif' : 'Aktif';
        
        // Update status tahun
        $data = array('status' => $newStatus);
        $where = array('id_tahun' => $id_tahun);
        $model->qedit('tahun', $data, $where);
        
        return redirect()->to('/data_master/tahun');
    }








    public function blok()
	{ 
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model = new M_model();
		    $blokModel = new BlokModel();
		    $blok = $blokModel->findAll(); // Ambil semua data blok dari model
		    $data['a'] = $model->tampil('blok');
		    $isAktifExist = false; // Buat variabel untuk melacak apakah status 'Aktif' sudah ada sebelumnya
		    foreach ($blok as $item) {
		        if ($item['statuss'] === 'Aktif') {
		            $isAktifExist = true; // Jika ada yang 'Aktif', set variabel ke true
		            break;
		        }
		    }
			$data['title']='Data Blok';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu2');
			echo view('partial/top_menu');
			echo view('blok/v_blok', ['a' => $data['a'], 'isAktifExist' => $isAktifExist, 'blok' => $blok]);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function tambah_blok()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$data['title']='Data Blok';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu2');
			echo view('partial/top_menu');
			echo view('blok/tambah_blok');
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	
	public function aksi_tambah_blok()
	{
		$a=$this->request->getPost('nama_b');
		

		$simpan=array(
			'nama_b'=>$a,
			'statuss'=>"Tidak-Aktif",
			'created_at'=>date('Y-m-d H:i:s')
		);
		$model=new M_model();
		$model->simpan('blok',$simpan);
		return redirect()->to('/data_master/blok');
	}
	public function edit_blok($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$where=array('id_blok'=>$id);
			$data['title']='Data Blok';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu2');
			echo view('partial/top_menu');
			$data['jojo']=$model->getWhere('blok',$where);
			echo  view('blok/edit_blok',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function aksi_edit_blok()
	{
		
		$id=$this->request->getPost('id');
		$a=$this->request->getPost('nama_b');


		$where=array('id_blok'=>$id);
		$simpan=array(
			'nama_b'=>$a
			
			
		);
		$model=new M_model();
		$model->qedit('blok',$simpan, $where);
		return redirect()->to('/data_master/blok');

	}
	public function delete_blok($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new m_model();
			$where=array('id_blok'=>$id);
			$model->hapus('blok',$where);
			return redirect()->to('/data_master/blok');
		}else{
			return redirect()->to('login');
		}
	}
	public function aksi_blok($id_blok)
	{
		$model = new M_model();
		
        // Dapatkan informasi blok berdasarkan ID
        $blok = $model->getblokById($id_blok); // Implementasikan method ini sesuai dengan model Anda
        
        // Cek status blok saat ini dan tentukan status berikutnya
        $newStatus = ($blok->statuss === 'Aktif') ? 'Tidak-Aktif' : 'Aktif';
        
        // Update status blok
        $data = array('statuss' => $newStatus);
        $where = array('id_blok' => $id_blok);
        $model->qedit('blok', $data, $where);
        
        return redirect()->to('/data_master/blok');
    }
    


















    public function pendaftaran()
    {
       if(session()->get('level')== 1) {
        $model=new M_pendaftaran();
        $data['jojo']=$model->getAllPData();
        $data['title']='Data Pendaftaran';

        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('data_pendaftaran/view', $data);
        echo view('partial/footer_datatable');
        }else {
            return redirect()->to('login');
        }
    }

    public function detail_siswa($id)
    {
       if(session()->get('level')== 1) {
        $model=new M_pendaftaran();
        $data['jojo']=$model->getAllPDataWhere($id);
        $data['title']='Data Pendaftaran';

        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('data_pendaftaran/detail_siswa', $data);
        echo view('partial/footer_datatable');
        }else {
            return redirect()->to('login');
        }
    }

    public function create_pendaftaran()
    {
        if(session()->get('level')== 1) {
            $model=new M_pendaftaran();

            $data['jojo']=$model->tampil('pendaftaran');
            $data['jk']=$model->tampil('jenis_kelamin');
            $data['agama']=$model->tampil('agama');
            $rombelDetails = $model->getAllRombelBaru();
            $data['rombel'] = $rombelDetails;
            $data['jenjang'] = $model->tampil('jenjang');


            $data['title']='Data Pendaftaran';
            echo view('partial/header_datatable', $data);
            echo view('partial/side_menu2');
            echo view('partial/top_menu');
            echo view('data_pendaftaran/create', $data); 
            echo view('partial/footer_datatable');
        }else {
            return redirect()->to('login');
        }
    }

    public function aksi_create_pendaftaran()
    { 
        if(session()->get('level')== 1) {
            $a= $this->request->getPost('nama');
            $b= $this->request->getPost('tempat_lahir');
            $c= $this->request->getPost('tanggal_lahir');
            $d= $this->request->getPost('jk');
            $e= $this->request->getPost('agama');
            $f= $this->request->getPost('telepon');
            $g= $this->request->getPost('alamat');
            $h= $this->request->getPost('jenjang');
            $i= $this->request->getPost('asal');
            $j= $this->request->getPost('nama_ayah');
            $k= $this->request->getPost('nama_ibu');
            $l= $this->request->getPost('pekerjaan_ortu');
            $m= $this->request->getPost('alamat_kantor');
            date_default_timezone_set('Asia/Jakarta');

            //Yang ditambah ke user
            $data1=array(
                'nama_lengkap'=>$a,
                'tempat_lahir'=>$b,
                'tanggal_lahir'=>$c,
                'jk'=>$d,
                'agama'=>$e,
                'no_hp'=>$f,
                'alamat'=>$g,
                'rombel'=>$h,
                'asal_sekolah'=>$i,
                'nama_ayah'=>$j,
                'nama_ibu'=>$k,
                'pekerjaan_ortu'=>$l,
                'alamat_kantor_ortu'=>$m,
            );
            $model=new M_pendaftaran();
            $model->simpan('pendaftaran', $data1);
            echo view('partial/header_datatable');
            echo view('partial/side_menu2');
            echo view('partial/top_menu');
            echo view('partial/footer_datatable');
            return redirect()->to('/data_master/pendaftaran');
        }else {
            return redirect()->to('login');
        }
    }

    public function siswa_diterima($id) 
    {
       if(session()->get('level')== 1) {
         $model=new M_pendaftaran();
         $pendaftaran = $model->getDataPendaftaranbyId($id);

         $a = $pendaftaran['nama_lengkap'];
         $b = $this->request->getPost('nis');
         $c = $pendaftaran['rombel'];

         $jenjang = $model->getDataJenjangbyId($c);
         $d = $jenjang['jenjang'];

         $imageName = 'default.png';

         $data1 = [
            'username'=>$b,
            'password'=>md5($b),
            'level'=>4,
            'foto'=>$imageName,
            'jenjang'=>$d,
            'pendaftaran'=>$id
        ];

        $model->simpan('user', $data1);
        $where=array('username'=>$b);
        $user=$model->getWhere2('user', $where);
        $iduser = $user['id_user'];

        $data2=array(
            'nis'=>$b,
            'nama_siswa'=>$a,
            'rombel'=>$c,
            'user'=>$iduser,
        );
        $model->simpan('siswa', $data2);

        $where2=array('id_pendaftaran'=>$id);
        $data3=array(
            'kondisi'=>1,
            'updated_at'=>date('Y-m-d H:i:s')
        );

        $model->qedit('pendaftaran', $data3, $where2);
        return redirect()->to('/data_master/pendaftaran'); 
    } else {
        return redirect()->to('login');
    }
}


    public function siswa_ditolak($id)
    { 
        if(session()->get('level')== 1) {
            $model=new M_pendaftaran();
            $where=array('id_pendaftaran'=>$id);

            $data=array(
                'kondisi'=>2,
                'updated_at'=>date('Y-m-d H:i:s')
                // 'deleted_at'=>date('Y-m-d H:i:s')
            );

            $model->qedit('pendaftaran', $data, $where);
            return redirect()->to('/data_master/pendaftaran');
        }else {
            return redirect()->to('login');
        }
    }

    // ==========================================================================================

    public function pendaftaran_baru()
    {
        $model=new M_pendaftaran();

        $data['jojo']=$model->tampil('pendaftaran');
        $data['jk']=$model->tampil('jenis_kelamin');
        $data['agama']=$model->tampil('agama');
        $rombelDetails = $model->getAllRombelBaru();
        $data['rombel'] = $rombelDetails;
        $data['jenjang'] = $model->tampil('jenjang');


        $data['title']='Data Pendaftaran';
        echo view('partial/header_datatable', $data);
        echo view('data_pendaftaran/pre_pendaftaran', $data); 
        echo view('partial/footer_datatable');
    }

    public function aksi_create_user()
    { 
        $a= $this->request->getPost('nama');
        $b= $this->request->getPost('tempat_lahir');
        $c= $this->request->getPost('tanggal_lahir');
        $d= $this->request->getPost('jk');
        $e= $this->request->getPost('agama');
        $f= $this->request->getPost('telepon');
        $g= $this->request->getPost('alamat');
        $h= $this->request->getPost('jenjang');
        $i= $this->request->getPost('asal');
        $j= $this->request->getPost('nama_ayah');
        $k= $this->request->getPost('nama_ibu');
        $l= $this->request->getPost('pekerjaan_ortu');
        $m= $this->request->getPost('alamat_kantor');
        $n= $this->request->getPost('nik');
        $o= $this->request->getPost('password');
        date_default_timezone_set('Asia/Jakarta');

        $data1=array(
            'nik'=>$n,
            'password'=>md5($o),
            'nama_lengkap'=>$a,
            'tempat_lahir'=>$b,
            'tanggal_lahir'=>$c,
            'jk'=>$d,
            'agama'=>$e,
            'no_hp'=>$f,
            'alamat'=>$g,
            'rombel'=>$h,
            'asal_sekolah'=>$i,
            'nama_ayah'=>$j,
            'nama_ibu'=>$k,
            'pekerjaan_ortu'=>$l,
            'alamat_kantor_ortu'=>$m,
        );
        $model=new M_pendaftaran();
        $model->simpan('pendaftaran', $data1);
        return redirect()->to('data_pendaftaran/pasca_pendaftaran');
    }

    public function pasca_pendaftaran()
    {
        $model=new M_pendaftaran();

        $data['title']='Data Pendaftaran';
        echo view('partial/header_datatable', $data);
        echo view('data_pendaftaran/pasca_pendaftaran', $data); 
        echo view('partial/footer_datatable');
    }


}