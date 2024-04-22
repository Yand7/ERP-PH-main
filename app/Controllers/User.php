<?php

namespace App\Controllers;
use App\Models\M_user;
use App\Models\M_model;
use App\Models\RombelModel;

class User extends BaseController
{

    public function index()
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
            echo view('partial/side_menu');
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
            echo view('partial/side_menu');
            echo view('partial/top_menu');
            echo view('partial/footer');

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
        echo view('partial/side_menu');
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
        echo view('partial/side_menu');
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
        return redirect()->to(base_url('/User/sekre'));
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
        return redirect()->to(base_url('/User/sekre'));
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
    return redirect()->to(base_url('data_siswa')); // Ganti dengan halaman yang sesuai
}

}