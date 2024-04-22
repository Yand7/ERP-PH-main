<?php

namespace App\Controllers\voting;
use CodeIgniter\Controller;
use App\Models\voting\M_model;
use App\Models\voting\U_model;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class User extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new U_model();
    }
   // Di dalam controller
public function index()
{
    $model = new M_model();
    
    if (session()->get('level') == 1) {
        $on = 'user.level = level.id_level';
        $data['a'] = $model->join2('user', 'level', $on);
    } elseif (session()->get('level') == 2) {
        $data['a'] = $model->getUsersWithLevel2();
    } else {
        return redirect()->to('voting/Home');
    }

    echo view('voting/header');
    echo view('voting/menuutama');
    echo view('voting/v_user', $data);
    echo view('voting/footer');
}

    
    public function reset_password($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$where=array('id_user'=>$id);
			$user=array('password'=>md5('12345'));
			$model->qedit('user', $user, $where);
			return redirect()->to('voting/User/index');
		}else {
			return redirect()->to('home');

		}

	}
    public function tambah() {
        
            $model = new M_model();
            if (session()->get('level') == 1) {
                $data['a'] = $model->tampil('level');
            } elseif (session()->get('level') == 2) {
                $data['a'] = $model->getUsersWith();
            } else {
                return redirect()->to('voting/Home');
            }
            echo view('voting/header');
            echo view('voting/menuutama');
            echo view('voting/tambah_user', $data);
            echo view('voting/footer');
      
    }
    
    public function aksi_tambah()
    {
        if(session()->get('level')==1||  session()->get('level')==2){
        $Model= new U_model();
        $data = $this->request->getPost();
        $photo = $this->request->getFile('foto');
        $Model->insertt($data, $photo);
        return redirect()->to('voting/User/index/');
    }else{
        return redirect()->to('voting/Home');
    }
    }
    public function edit($id)
    {
        $userLevel = session()->get('level');
        
        if ($userLevel == 1 || $userLevel == 2) {
            $model = new U_Model();
            $model2 = new M_Model();
            $data['a'] = $model->getById($id); // Mendapatkan data pengguna berdasarkan $id
            
            if (!$data['a']) {
                return redirect()->to('voting/User/index');
            }
            
            if ($userLevel == 1) {
                $data['b'] = $model2->tampil('level');
            } elseif ($userLevel == 2) {
                $data['b'] = $model2->getUsersWith();
            }
           
            echo view('voting/header');
            echo view('voting/menuutama');
            echo view('voting/edit_user', $data);
            echo view('voting/footer');
        } else {
            return redirect()->to('voting/Home');
        }
    }
    
    
    public function update($id)
    {
        if(session()->get('level')==1||  session()->get('level')==2){
        $Model = new U_model();
        $data = $this->request->getPost();
        $photo = $this->request->getFile('foto');
    
       
        if ($photo->isValid() && ! $photo->hasMoved()) {
           
            $Model->updateP($id, $data, $photo);
        } else {
           
            $Model->update($id, $data);
        }
    
        return redirect()->to('voting/User/index');
    }else{
        return redirect()->to('voting/Home');
    }
    }

    public function delete($id)
    {
        if(session()->get('level')==1||  session()->get('level')==2){
        $Model = new U_model();
        $Model->deletee($id);
        return redirect()->to('voting/User/index/');
    }else{
        return redirect()->to('voting/Home');
    }
}
public function excel()
	{
		if(session()->get('level')==1||  session()->get('level')==2){
			
			echo view('voting/header');
			echo view('voting/menuutama');
			echo  view('voting/excel');
			echo view('voting/footer');
		}else{
			return redirect()->to('voting/Home');
		}
    }
public function import()
{
    if(session()->get('level')==1||  session()->get('level')==2){
    $file = $this->request->getFile('file');
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet();
    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();
    for ($row = 2; $row <= $highestRow; $row++) {

        $data = [
            'nama' => $sheet->getCellByColumnAndRow(1, $row)->getValue(),
            'username' => $sheet->getCellByColumnAndRow(2, $row)->getValue(),
            'password' => md5($sheet->getCellByColumnAndRow(3, $row)->getValue()),
            'level' => $sheet->getCellByColumnAndRow(4, $row)->getValue(),
            'foto' => 'tidaktahu.png'
        ];

        $this->model->insert($data);
    }

    return redirect()->to(base_url('voting/User'));
}else{
    return redirect()->to('voting/Home');
}
}
public function store()
	{
		if(session()->get('level')==1){
            $model=new M_model();
                $on='user.level=level.id_level';
                $data['a'] = $model->jointes('user', 'level',$on);
                echo view('voting/header');
                echo view('voting/menuutama');
                echo view('voting/store_user',$data);
                echo view('voting/footer');
            }else{
                return redirect()->to('voting/Home');
    
            }
        }
        public function balik($id_user) {
            if(session()->get('level')==1){
            $model = new M_model();
            $data = ['deleted_at' => null]; 
        
           
            $model->updateData($id_user, $data);
        
            return redirect()->to(base_url('voting/User')); 
        }else{
            return redirect()->to('voting/Home');

        }
        }
        public function hilang() {
            if(session()->get('level')==1){
            $model = new M_model(); 
            $where = "deleted_at IS NOT NULL"; 
        
          
            $model->hapus('user', $where);
        
            return redirect()->to('voting/User/store');
        }else{
            return redirect()->to('voting/Home');

        }
        }
    
        public function generateExcel()
        {
            if (session()->get('id') > 0) {
                $spreadsheet = new Spreadsheet();
        
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Username')
                    ->setCellValue('B1', 'Password')
                    ->setCellValue('C1', 'Level');
        
                // Tambahkan catatan di sebelah judul kolom
                $spreadsheet->getActiveSheet()->setCellValue('E1', 'Isi Username dan Password sesuai yang diinginkan. Terdapat 2 level yaitu Masukkan angka 3 untuk Guru dan angka 4 untuk Siswa.');
                $spreadsheet->getActiveSheet()->getStyle('E1')->getFont()->setItalic(true);
        
                // Simpan file Excel ke dalam variabel
                $writer = new Xlsx($spreadsheet);
                $fileName = 'Template.xlsx';
        
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="' . $fileName . '"');
                header('Cache-Control: max-age=0');
        
                $writer->save('php://output');
            } else {
                return redirect()->to('voting/Home');
            }
        }
        
    	public function ganti_pass()
	{
		if(session()->get('id')>0) {
		echo view('voting/header');
		echo view('voting/menuutama');
		echo view('voting/ganti_password');
		echo view('voting/footer');
    }else{
        return redirect()->to('voting/Home');

    }
	}
    public function aksi_ganti_pass()
    {
        $model = new M_model();
        $where = array('id_user' => session()->get('id'));
        $k = $this->request->getPost('pswd');
        $data = array('password' => md5($k));
        $model->qedit('user', $data, $where);
    
        
        session()->setFlashdata('success_message', 'Password berhasil Diubah');
    
        return redirect()->to('voting/Home/dashboard');
    }
    
}
