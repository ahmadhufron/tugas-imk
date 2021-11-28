<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function profil()
    {
        $data['title'] = 'My Profil';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profil', $data);
        $this->load->view('templates/footer');
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $uploaded = FALSE;
        $this->form_validation->set_rules('name', 'Full name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {

            /*$name = $this->input->post('name');
            $email = $this->input->post('email');

            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './upload/user';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }*/
            $email = $this->input->post('email');

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']   = './upload/user';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                /*$error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);*/
                //redirect('user/prestasi/', 'refresh');
            } else {
                $uploaded = TRUE;

                $image_path = './upload/user/'; // your image path
                $_get_image = $this->db->get_where('user', array('email' => $email));

                foreach ($_get_image->result() as $record) {
                    $filename = $image_path . $record->image;
                    if (file_exists($filename)) {
                        delete_files($filename);
                        unlink($filename);
                    }
                }

                $upload_data = $this->upload->data();
                $bukti = $upload_data['file_name'];
            }

            $data = [
                'email' => $email,
                'name' => $this->input->post('name')

            ];


            if ($uploaded) {

                $data = [
                    'email' => $email,
                    'name' => $this->input->post('name'),
                    'image' => $bukti
                ];
            }

            /*$this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');*/

            $this->db->where('email', $data['email']);
            $this->db->update('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }
    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }


    public function menang($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['prestasi'] = $this->db->get_where('pengajuan_lomba', ['nim' =>
        $this->session->userdata('nim')])->result();

        $win = $this->db->get_where('pengajuan_lomba', array('id' => $id))->row();
        $data['win'] = $win;

        $temp = [
            'id' => $win->id,
            'nama' => $win->nama,
            'nim' => $win->nim,
            'departemen' => $win->departemen,
            'program_studi' => $win->program_studi,
            'semester' => $win->semester,
            'alamat' => $win->alamat,
            'no_hp' => $win->no_hp,
            'nama_lomba' => $win->nama_lomba,
            'penyelenggara' => $win->penyelenggara,
            'tingkat' => $win->tingkat,
            'tgl_mulai_lomba' => $win->tgl_mulai_lomba,
            'tgl_selesai_lomba' => $win->tgl_selesai_lomba,
            'id_prodi' => $win->id_prodi,
            'tahun' => $win->tahun
        ];

        $this->db->insert('prestasi', $temp);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Prestasi Mahasiswa Berhasil ditambahkan </div>');
        redirect('user/prestasi');
    }
    //PRESTASI 

    public function prestasi()
    {
        $data['title'] = 'Prestasi Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['prestasi'] = $this->db->get_where('prestasi', ['nim' =>
        $this->session->userdata('nim')])->result();

        /*$data['prestasi'] = $this->db->get('prestasi')->result();*/


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/prestasi', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/auth_footer');
    }

    public function detail_prestasi($id)
    {
        $data['title'] = 'Detail Prestasi Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $detail_prestasi = $this->db->get_where('prestasi', array('id' => $id))->row();
        $data['detail'] = $detail_prestasi;

        /*$data['prestasi'] = $this->db->get('prestasi')->result();*/


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail_prestasi', $data);
        $this->load->view('templates/footer');
    }


    /*public function save_prestasi()
    {

        $data['title'] = 'Prestasi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $name = (string) $this->session->userdata('name');
        $nim = (string) $this->session->userdata('nim');

        $data['prestasi'] = $this->db->get('prestasi')->result_array();


        $this->form_validation->set_rules('departemen', 'Departemen', 'required');
        $this->form_validation->set_rules('program_studi', 'Program Studi', 'required');
        $this->form_validation->set_rules('juara_gelar', 'Juara/Gelar', 'required');
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun ', 'required');



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/prestasi', $data);
            $this->load->view('templates/footer');
        } else {
            $file = $_FILES["file"];
            if ($file = '') {
            } else {
                $config['upload_path']          = './upload/data';
                $config['allowed_types']        = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    //redirect('user/prestasi/', 'refresh');
                } else {
                    $bukti = $this->upload->data('file_name');

                    $data = [
                        'nim' => $nim,
                        'nama_mahasiswa' => $name,
                        'departemen' => $this->input->post('departemen'),
                        'program_studi' => $this->input->post('program_studi'),
                        'juara_gelar' => $this->input->post('juara_gelar'),
                        'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                        'tingkat' => $this->input->post('tingkat'),
                        'tempat' => $this->input->post('tempat'),
                        'tahun' => $this->input->post('tahun'),
                        'bukti' => $this->upload->data('file_name')
                    ];

                    switch ($data['program_studi']) {
                        case "D4-Rekayasa Perancangan Mekanik":
                            $data['id_prodi'] = '1';
                            break;
                        case "D4-Teknologi Rekayasa Kimia Industri":
                            $data['id_prodi'] = '2';
                            break;
                        case "D4-Teknologi Rekayasa Otomasi":
                            $data['id_prodi'] = '3';
                            break;
                        case "D4-Teknologi Rekayasa Konstruksi Perkapalan":
                            $data['id_prodi'] = '4';
                            break;
                        case "D4-Teknik Infrastruktur Sipil Dan Perancangan":
                            $data['id_prodi'] = '5';
                            break;
                        case "D4-Perencanaan Tata Ruang Dan Pertanahan":
                            $data['id_prodi'] = '6';
                            break;
                        case "D4-Teknik Listrik Industri":
                            $data['id_prodi'] = '7';
                            break;
                        case "D4-Manajemen Dan Administrasi":
                            $data['id_prodi'] = '8';
                            break;
                        case "D4-Informasi Dan Hubungan Masyarakat":
                            $data['id_prodi'] = '9';
                            break;
                        case "D4-Akuntansi Perpajakan":
                            $data['id_prodi'] = '10';
                            break;
                        case "D4-Bahasa Asing Terapan":
                            $data['id_prodi'] = '11';
                            break;
                        case "D3-Teknologi Perencanaan Wilayah Dan Kota":
                            $data['id_prodi'] = '12';
                            break;
                        case "D3-Hubungan Masyarakat":
                            $data['id_prodi'] = '13';
                            break;
                        case "D3-Akuntansi":
                            $data['id_prodi'] = '14';
                            break;
                        case "D3-Manajemen Perusahaan":
                            $data['id_prodi'] = '15';
                            break;
                        case "D3-Administrasi Pajak":
                            $data['id_prodi'] = '16';
                            break;
                    }
                    $this->db->insert('prestasi', $data);
                }
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Prestasi Mahasiswa Berhasil ditambahkan </div>');
        redirect('user/prestasi');
    }*/

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        else {

            $image_path = './upload/data/'; // your image path
            $_get_image = $this->db->get_where('prestasi', array('id' => $id));

            foreach ($_get_image->result() as $record) {
                $filename = $image_path . $record->bukti;
                if (file_exists($filename)) {
                    delete_files($filename);
                    unlink($filename);
                }
            }

            $this->db->delete('prestasi', array("id" => $id));

            $data['title'] = 'Prestasi';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data1['prestasi'] = $this->db->query('select * from prestasi')->result();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/prestasi', $data1);
            $this->load->view('templates/footer');
        }
    }



    public function update_prestasi($id)
    {

        $data['title'] = 'Prestasi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $bukti = NULL;

        $uploaded = FALSE;
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('departemen', 'Departemen', 'required');
        $this->form_validation->set_rules('program_studi', 'Program Studi', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('nama_lomba', 'Nama Lomba', 'required');
        $this->form_validation->set_rules('penyelenggara', 'Penyelenggara', 'required');
        $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
        $this->form_validation->set_rules('tgl_mulai_lomba', 'Tanggal Mulai Lomba', 'required');
        $this->form_validation->set_rules('tgl_selesai_lomba', 'Tanggal Selesai Lomba', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('juara', 'Juara', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/prestasi', $data);
            $this->load->view('templates/footer');
        } else {

            $config['upload_path']          = './upload/data';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                /*$error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);*/
                //redirect('user/prestasi/', 'refresh');
            } else {
                $uploaded = TRUE;

                $image_path = './upload/data/'; // your image path
                $_get_image = $this->db->get_where('prestasi', array('id' => $id));

                foreach ($_get_image->result() as $record) {
                    $filename = $image_path . $record->bukti;
                    if (file_exists($filename)) {
                        delete_files($filename);
                        unlink($filename);
                    }
                }

                $upload_data = $this->upload->data();
                $bukti = $upload_data['file_name'];
            }

            $data = [
                'id' => $id,
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'departemen' => $this->input->post('departemen'),
                'program_studi' => $this->input->post('program_studi'),
                'semester' => $this->input->post('semester'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_lomba' => $this->input->post('nama_lomba'),
                'penyelenggara' => $this->input->post('penyelenggara'),
                'tingkat' => $this->input->post('tingkat'),
                'tgl_mulai_lomba' => $this->input->post('tgl_mulai_lomba'),
                'tgl_selesai_lomba' => $this->input->post('tgl_selesai_lomba'),
                'tahun' => $this->input->post('tahun'),
                'juara' => $this->input->post('juara')

            ];

            if ($uploaded) {

                $data = [
                    'id' => $id,
                    'nama' => $this->input->post('nama'),
                    'nim' => $this->input->post('nim'),
                    'departemen' => $this->input->post('departemen'),
                    'program_studi' => $this->input->post('program_studi'),
                    'semester' => $this->input->post('semester'),
                    'alamat' => $this->input->post('alamat'),
                    'no_hp' => $this->input->post('no_hp'),
                    'nama_lomba' => $this->input->post('nama_lomba'),
                    'penyelenggara' => $this->input->post('penyelenggara'),
                    'tingkat' => $this->input->post('tingkat'),
                    'tgl_mulai_lomba' => $this->input->post('tgl_mulai_lomba'),
                    'tgl_selesai_lomba' => $this->input->post('tgl_selesai_lomba'),
                    'tahun' => $this->input->post('tahun'),
                    'juara' => $this->input->post('juara'),
                    'bukti' => $bukti

                ];
            }

            $this->db->where('id', $data['id']);
            $this->db->update('prestasi', $data);


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Prestasi Mahasiswa Berhasil di Edit </div>');
            redirect('user/prestasi');
        }
    }

    //KEWIRAUSAHAAN

    public function kewirausahaan()
    {
        $data['title'] = 'Kewirausahaan Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kewirausahaan'] = $this->db->get_where('kewirausahaan', ['nim' =>
        $this->session->userdata('nim')])->result();

        /*$data['kewirausahaan'] = $this->db->get('kewirausahaan')->result();*/

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/kewirausahaan', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/auth_footer');
    }

    public function detail_kwu($id_kwu)
    {
        $data['title'] = 'Detail Kewirausahaan Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $detail_kwu = $this->db->get_where('kewirausahaan', array('id_kwu' => $id_kwu))->row();
        $data['detail'] = $detail_kwu;

        /*$data['prestasi'] = $this->db->get('prestasi')->result();*/


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail_kwu', $data);
        $this->load->view('templates/footer');
    }

    public function save_kewirausahaan()
    {

        $data['title'] = 'Kewirausahaan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $name = (string) $this->session->userdata('name');
        $nim = (string) $this->session->userdata('nim');

        $data['kewirausahaan'] = $this->db->get('kewirausahaan')->result_array();

        /*$this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');*/
        $this->form_validation->set_rules('departemen', 'Departemen', 'required');
        $this->form_validation->set_rules('program_studi', 'Program Studi', 'required');
        $this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'required');
        $this->form_validation->set_rules('jenis_usaha', 'Jenis Usaha', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/kewirausahaan', $data);
            $this->load->view('templates/footer');
        } else {
            $file = $_FILES["file"];
            if ($file = '') {
            } else {
                $config['upload_path']          = './upload/kewirausahaan';
                $config['allowed_types']        = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    //redirect('user/prestasi/', 'refresh');
                } else {
                    $bukti = $this->upload->data('file_name');

                    $data = [
                        'nama' => $name,
                        'nim' => $nim,
                        'departemen' => $this->input->post('departemen'),
                        'program_studi' => $this->input->post('program_studi'),
                        'nama_usaha' => $this->input->post('nama_usaha'),
                        'jenis_usaha' => $this->input->post('jenis_usaha'),
                        'bukti' => $this->upload->data('file_name')
                    ];

                    switch ($data['program_studi']) {
                        case "D4-Rekayasa Perancangan Mekanik":
                            $data['id_prodi'] = '1';
                            break;
                        case "D4-Teknologi Rekayasa Kimia Industri":
                            $data['id_prodi'] = '2';
                            break;
                        case "D4-Teknologi Rekayasa Otomasi":
                            $data['id_prodi'] = '3';
                            break;
                        case "D4-Teknologi Rekayasa Konstruksi Perkapalan":
                            $data['id_prodi'] = '4';
                            break;
                        case "D4-Teknik Infrastruktur Sipil Dan Perancangan":
                            $data['id_prodi'] = '5';
                            break;
                        case "D4-Perencanaan Tata Ruang Dan Pertanahan":
                            $data['id_prodi'] = '6';
                            break;
                        case "D4-Teknik Listrik Industri":
                            $data['id_prodi'] = '7';
                            break;
                        case "D4-Manajemen Dan Administrasi":
                            $data['id_prodi'] = '8';
                            break;
                        case "D4-Informasi Dan Hubungan Masyarakat":
                            $data['id_prodi'] = '9';
                            break;
                        case "D4-Akuntansi Perpajakan":
                            $data['id_prodi'] = '10';
                            break;
                        case "D4-Bahasa Asing Terapan":
                            $data['id_prodi'] = '11';
                            break;
                        case "D3-Teknologi Perencanaan Wilayah Dan Kota":
                            $data['id_prodi'] = '12';
                            break;
                        case "D3-Hubungan Masyarakat":
                            $data['id_prodi'] = '13';
                            break;
                        case "D3-Akuntansi":
                            $data['id_prodi'] = '14';
                            break;
                        case "D3-Manajemen Perusahaan":
                            $data['id_prodi'] = '15';
                            break;
                        case "D3-Administrasi Pajak":
                            $data['id_prodi'] = '16';
                            break;
                    }
                    $this->db->insert('kewirausahaan', $data);
                }
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kewirausahaan Mahasiswa Berhasil ditambahkan </div>');
        redirect('user/kewirausahaan');
    }

    public function delete_kwu($id_kwu = null)
    {
        if (!isset($id_kwu)) show_404(); //jika id_kwu belum di set maka akan muncul 404
        else {

            $image_path = './upload/kewirausahaan/'; // your image path
            $_get_image = $this->db->get_where('kewirausahaan', array('id_kwu' => $id_kwu));

            foreach ($_get_image->result() as $record) {
                $filename = $image_path . $record->bukti;
                if (file_exists($filename)) {
                    delete_files($filename);
                    unlink($filename);
                }
            }

            $this->db->delete('kewirausahaan', array("id_kwu" => $id_kwu));

            $data['title'] = 'Kewirausahaan';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data1['kewirausahaan'] = $this->db->query('select * from kewirausahaan')->result();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/kewirausahaan', $data1);
            $this->load->view('templates/footer');
        }
    }


    public function update_kwu($id_kwu)
    {

        $data['title'] = 'Kewirausahaan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $uploaded = FALSE;
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('departemen', 'Departemen', 'required');
        $this->form_validation->set_rules('program_studi', 'Program Studi', 'required');
        $this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'required');
        $this->form_validation->set_rules('jenis_usaha', 'Jenis Usaha', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/kewirausahaan', $data);
            $this->load->view('templates/footer');
        } else {

            $config['upload_path']          = './upload/kewirausahaan';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                /*$error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);*/
                //redirect('user/prestasi/', 'refresh');
            } else {
                $uploaded = TRUE;

                $image_path = './upload/kewirausahaan/'; // your image path
                $_get_image = $this->db->get_where('kewirausahaan', array('id_kwu' => $id_kwu));

                foreach ($_get_image->result() as $record) {
                    $filename = $image_path . $record->bukti;
                    if (file_exists($filename)) {
                        delete_files($filename);
                        unlink($filename);
                    }
                }

                $upload_data = $this->upload->data();
                $bukti = $upload_data['file_name'];
            }

            $data = [
                'id_kwu' => $id_kwu,
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'departemen' => $this->input->post('departemen'),
                'program_studi' => $this->input->post('program_studi'),
                'nama_usaha' => $this->input->post('nama_usaha'),
                'jenis_usaha' => $this->input->post('jenis_usaha')
            ];

            if ($uploaded) {

                $data = [
                    'id_kwu' => $id_kwu,
                    'nama' => $this->input->post('nama'),
                    'nim' => $this->input->post('nim'),
                    'departemen' => $this->input->post('departemen'),
                    'program_studi' => $this->input->post('program_studi'),
                    'nama_usaha' => $this->input->post('nama_usaha'),
                    'jenis_usaha' => $this->input->post('jenis_usaha'),
                    'bukti' => $bukti

                ];
            }


            $this->db->where('id_kwu', $data['id_kwu']);
            $this->db->update('kewirausahaan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kewirausahaan Mahasiswa Berhasil di Edit </div>');
            redirect('user/kewirausahaan');
        }
    }


    // PENGAJUAN LOMBA

    public function pengajuanlomba()
    {
        $data['title'] = 'Pengajuan Lomba';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pengajuan_lomba'] = $this->db->get('pengajuan_lomba')->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/pengajuanlomba', $data);
        $this->load->view('templates/footer');
    }



    public function save_pengajuanlomba()
    {
        $data['title'] = 'Pengajuan Lomba';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $name = (string) $this->session->userdata('name');
        $nim = (string) $this->session->userdata('nim');
        $tahun = date('Y');

        $data['pengajuan_lomba'] = $this->db->get('pengajuan_lomba')->result_array();


        /*$this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');*/
        $this->form_validation->set_rules('departemen', 'Departemen', 'required');
        $this->form_validation->set_rules('program_studi', 'Program Studi', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('nama_lomba', 'Nama Lomba', 'required');
        $this->form_validation->set_rules('penyelenggara', 'Penyelenggara', 'required');
        $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
        $this->form_validation->set_rules('tgl_mulai_lomba', 'Tanggal Mulai Lomba', 'required');
        $this->form_validation->set_rules('tgl_selesai_lomba', 'Tanggal Selesai Lomba', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/pengajuanlomba', $data);
            $this->load->view('templates/footer');
        } else {
            $file = $_FILES["file"];
            if ($file = '') {
            } else {
                $config['upload_path']          = './upload/proposal';
                $config['allowed_types']        = 'docx|pdf';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    //redirect('user/prestasi/', 'refresh');
                } else {
                    $upload = $this->upload->data('file_name');


                    $data = [
                        'nama' => $name,
                        'nim' => $nim,
                        'departemen' => $this->input->post('departemen'),
                        'program_studi' => $this->input->post('program_studi'),
                        'semester' => $this->input->post('semester'),
                        'alamat' => $this->input->post('alamat'),
                        'no_hp' => $this->input->post('no_hp'),
                        'nama_lomba' => $this->input->post('nama_lomba'),
                        'penyelenggara' => $this->input->post('penyelenggara'),
                        'tingkat' => $this->input->post('tingkat'),
                        'tgl_mulai_lomba' => $this->input->post('tgl_mulai_lomba'),
                        'tgl_selesai_lomba' => $this->input->post('tgl_selesai_lomba'),
                        'tahun' => $tahun,
                        'upload' => $this->upload->data('file_name'),
                        'bukti' => 'default.jpg'


                    ];

                    switch ($data['program_studi']) {
                        case "D4-Rekayasa Perancangan Mekanik":
                            $data['id_prodi'] = '1';
                            break;
                        case "D4-Teknologi Rekayasa Kimia Industri":
                            $data['id_prodi'] = '2';
                            break;
                        case "D4-Teknologi Rekayasa Otomasi":
                            $data['id_prodi'] = '3';
                            break;
                        case "D4-Teknologi Rekayasa Konstruksi Perkapalan":
                            $data['id_prodi'] = '4';
                            break;
                        case "D4-Teknik Infrastruktur Sipil Dan Perancangan":
                            $data['id_prodi'] = '5';
                            break;
                        case "D4-Perencanaan Tata Ruang Dan Pertanahan":
                            $data['id_prodi'] = '6';
                            break;
                        case "D4-Teknik Listrik Industri":
                            $data['id_prodi'] = '7';
                            break;
                        case "D4-Manajemen Dan Administrasi":
                            $data['id_prodi'] = '8';
                            break;
                        case "D4-Informasi Dan Hubungan Masyarakat":
                            $data['id_prodi'] = '9';
                            break;
                        case "D4-Akuntansi Perpajakan":
                            $data['id_prodi'] = '10';
                            break;
                        case "D4-Bahasa Asing Terapan":
                            $data['id_prodi'] = '11';
                            break;
                        case "D3-Teknologi Perencanaan Wilayah Dan Kota":
                            $data['id_prodi'] = '12';
                            break;
                        case "D3-Hubungan Masyarakat":
                            $data['id_prodi'] = '13';
                            break;
                        case "D3-Akuntansi":
                            $data['id_prodi'] = '14';
                            break;
                        case "D3-Manajemen Perusahaan":
                            $data['id_prodi'] = '15';
                            break;
                        case "D3-Administrasi Pajak":
                            $data['id_prodi'] = '16';
                            break;
                    }

                    $this->db->insert('pengajuan_lomba', $data);
                }
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Permohonan Lomba Berhasil ditambahkan </div>');
        redirect('user/pengajuanlomba');
    }

    public function status()
    {
        $data['title'] = 'Status Pengajuan Lomba';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('pengajuan_lomba', ['nim' =>
        $this->session->userdata('nim')])->result();
        //$this->load->view('surat/header');
        /*$data['data'] = $this->db->get('pengajuan_lomba')->result();*/

        /*$data['data'] = $this->db->get_where('pengajuan_lomba', 'nim' => $nim)->row();*/
        //$this->load->view('surat/footer');
        // //$this->load->view('surat/footer');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/status', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/auth_footer');
    }

    public function detail_data($id)
    {
        $data['title'] = 'Detail Data Pengajuan Lomba';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $detail_data = $this->db->get_where('pengajuan_lomba', array('id' => $id))->row();
        $data['detail'] = $detail_data;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail_data', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/auth_footer');
    }


    /*public function surat()
    {

        // membaca data dari form
        $no_surat = $_POST['no_surat'];
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $program_studi = $_POST['program_studi'];
        $nama_lomba = $_POST['nama_lomba'];
        $tgl_mulai_lomba = $_POST['tgl_mulai_lomba'];
        $tgl_selesai_lomba = $_POST['tgl_selesai_lomba'];
        $penyelenggara = $_POST['penyelenggara'];
        // memanggil dan membaca template dokumen yang telah kita buat
        $document = file_get_contents("surat.rtf");
        // isi dokumen dinyatakan dalam bentuk string
        $document = str_replace("%%NOMOR%%", $no_surat, $document);
        $document = str_replace("%%NAMA%%", $nama, $document);
        $document = str_replace("%%NIM%%", $nim, $document);
        $document = str_replace("%%PROGRAM_STUDI%%", $program_studi, $document);
        $document = str_replace("%%NAMA_LOMBA%%", $nama_lomba, $document);
        $document = str_replace("%%TGL_MULAI_LOMBA%%", $tgl_mulai_lomba, $document);
        $document = str_replace("%TGL_SELESAI_LOMBA%", $tgl_selesai_lomba, $document);
        $document = str_replace("%%PENYELENGGARA%%", $penyelenggara, $document);
        // header untuk membuka file output RTF dengan MS. Word
        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=suratIjin.doc");
        header("Content-length: " . strlen($document));
        echo $document;
    }*/

    public function cetak($id)
    {

        /*$data['data'] = $this->db->get('pengajuan_lomba')->result();*/

        $detail_data = $this->db->get_where('pengajuan_lomba', array('id' => $id))->row();
        $data['detail'] = $detail_data;

        $this->load->view('suratijin', $data);

        /*$paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("suratIjin.pdf", array('Attachment' => false));*/
    }
}
