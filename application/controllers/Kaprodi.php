<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaprodi extends CI_Controller
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

        $data['nama_prodi'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();

        $id_prodi = $_SESSION['id_prodi'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        if ($id_prodi == '1') {
            $this->load->view('kaprodi/index1', $data);
        } else if ($id_prodi == '2') {
            $this->load->view('kaprodi/index2', $data);
        } else if ($id_prodi == '3') {
            $this->load->view('kaprodi/index3', $data);
        } else if ($id_prodi == '4') {
            $this->load->view('kaprodi/index4', $data);
        } else if ($id_prodi == '5') {
            $this->load->view('kaprodi/index5', $data);
        } else if ($id_prodi == '6') {
            $this->load->view('kaprodi/index6', $data);
        } else if ($id_prodi == '7') {
            $this->load->view('kaprodi/index7', $data);
        } else if ($id_prodi == '8') {
            $this->load->view('kaprodi/index8', $data);
        } else if ($id_prodi == '9') {
            $this->load->view('kaprodi/index9', $data);
        } else if ($id_prodi == '10') {
            $this->load->view('kaprodi/index10', $data);
        } else if ($id_prodi == '11') {
            $this->load->view('kaprodi/index11', $data);
        } else if ($id_prodi == '12') {
            $this->load->view('kaprodi/index12', $data);
        } else if ($id_prodi == '13') {
            $this->load->view('kaprodi/index13', $data);
        } else if ($id_prodi == '14') {
            $this->load->view('kaprodi/index14', $data);
        } else if ($id_prodi == '15') {
            $this->load->view('kaprodi/index15', $data);
        } else if ($id_prodi == '16') {
            $this->load->view('kaprodi/index16', $data);
        }

        $this->load->view('templates/footer');
    }

    public function data_pengajuan_lomba()
    {
        $data['title'] = 'Daftar Pengajuan Lomba';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['data'] = $this->db->query("SELECT pengajuan_lomba.id, pengajuan_lomba.nama, pengajuan_lomba.nim, pengajuan_lomba.departemen, pengajuan_lomba.program_studi, pengajuan_lomba.semester, pengajuan_lomba.alamat, pengajuan_lomba.no_hp, pengajuan_lomba.nama_lomba, pengajuan_lomba.penyelenggara, pengajuan_lomba.tgl_mulai_lomba, pengajuan_lomba.tgl_selesai_lomba, pengajuan_lomba.id_prodi  FROM pengajuan_lomba
        WHERE 
     pengajuan_lomba.status_prodi = '0'
        AND pengajuan_lomba.status_wd1 = '0'
        AND pengajuan_lomba.status_tu = '0'")->result();;

        /*$data['data'] = $this->db->get('pengajuan_lomba')->result();*/
        /*switch ($id_prodi) {
            case 1:
                $data['data'] = $this->db->query("SELECT pengajuan_lomba.id, pengajuan_lomba.nama, pengajuan_lomba.nim, pengajuan_lomba.departemen, pengajuan_lomba.program_studi, pengajuan_lomba.semester, pengajuan_lomba.alamat, pengajuan_lomba.no_hp, pengajuan_lomba.nama_lomba, pengajuan_lomba.penyelenggara, pengajuan_lomba.tgl_mulai_lomba, pengajuan_lomba.tgl_selesai_lomba  FROM pengajuan_lomba
    WHERE pengajuan_lomba.program_studi='D3-Akuntansi'
    AND pengajuan_lomba.status_prodi = 'N'
    AND pengajuan_lomba.status_tu = 'N'
    AND pengajuan_lomba.status_wd1 = 'N'
    AND pengajuan_lomba.status_keuangan = 'Y'")->result();
                break;

            case 2:
                $data['data'] = $this->db->query("SELECT pengajuan_lomba.id, pengajuan_lomba.nama, pengajuan_lomba.nim, pengajuan_lomba.departemen, pengajuan_lomba.program_studi, pengajuan_lomba.semester, pengajuan_lomba.alamat, pengajuan_lomba.no_hp, pengajuan_lomba.nama_lomba, pengajuan_lomba.penyelenggara, pengajuan_lomba.tgl_mulai_lomba, pengajuan_lomba.tgl_selesai_lomba  FROM pengajuan_lomba
    WHERE pengajuan_lomba.program_studi='D3-Hubungan Masyarakat'
    AND pengajuan_lomba.status_prodi = 'N'
    AND pengajuan_lomba.status_tu = 'N'
    AND pengajuan_lomba.status_wd1 = 'N'
    AND pengajuan_lomba.status_keuangan = 'Y'")->result();
                break;
        }*/

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kaprodi/data_pengajuan_lomba', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/auth_footer');
    }

    public function detail_data($id)
    {
        $data['title'] = 'Detail Pengajuan Lomba';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $detail_data = $this->db->get_where('pengajuan_lomba', array('id' => $id))->row();
        $data['detail'] = $detail_data;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kaprodi/detail_data', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/auth_footer');
    }

    public function setuju()

    {

        $cek = $this->uri->segment(3);

        $this->db->set('status_prodi', '3');
        $this->db->where('id', $cek);
        $query = $this->db->update('pengajuan_lomba');


        if ($query) {
            echo 'sukses';
            if ($cek != "") {
                redirect(base_url('Kaprodi/data_pengajuan_lomba'), 'refresh');
            } else {
                redirect(base_url('index'), 'refresh');
            }
        } else {
            echo 'Menyetujui gagal';
            redirect(base_url('index'), 'refresh');
        }
    }

    public function tolak($cek)

    {

        $cek = $this->uri->segment(3);

        $data = $this->db->query("SELECT pengajuan_lomba.id, pengajuan_lomba.nama, pengajuan_lomba.nim, pengajuan_lomba.departemen, pengajuan_lomba.program_studi, pengajuan_lomba.semester, pengajuan_lomba.alamat, pengajuan_lomba.no_hp, pengajuan_lomba.nama_lomba, pengajuan_lomba.penyelenggara, pengajuan_lomba.tgl_mulai_lomba, pengajuan_lomba.tgl_selesai_lomba, pengajuan_lomba.id_prodi  FROM pengajuan_lomba
        WHERE 
     pengajuan_lomba.id = $cek")->result();;


        $this->form_validation->set_rules('ket_tolak_prodi', 'ket_tolak_prodi', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kaprodi/data_pengajuan_lomba', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/auth_footer');
        } else {


            $data = [

                'ket_tolak_prodi' => $this->input->post('ket_tolak_prodi'),

            ];

            $this->db->set('status_prodi', '1');
            $this->db->where('id', $cek);
            $query = $this->db->update('pengajuan_lomba', $data);
        }


        if ($query) {
            echo 'sukses';
            if ($cek != "") {
                redirect(base_url('Kaprodi/data_pengajuan_lomba'), 'refresh');
            } else {
                redirect(base_url('index'), 'refresh');
            }
        } else {
            echo 'Menolak gagal';
            redirect(base_url('index'), 'refresh');
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil di tolak </div>');
        redirect('kaprodi/data_pengajuan_lomba');
    }

    /* public function revisi($id)
    {

        $data = $this->db->query("SELECT pengajuan_lomba.id, pengajuan_lomba.nama, pengajuan_lomba.nim, pengajuan_lomba.departemen, pengajuan_lomba.program_studi, pengajuan_lomba.semester, pengajuan_lomba.alamat, pengajuan_lomba.no_hp, pengajuan_lomba.nama_lomba, pengajuan_lomba.penyelenggara, pengajuan_lomba.tgl_mulai_lomba, pengajuan_lomba.tgl_selesai_lomba, pengajuan_lomba.id_prodi  FROM pengajuan_lomba
        WHERE 
     pengajuan_lomba.id = $id")->result();;


        $this->form_validation->set_rules('ket_tolak_prodi', 'ket_tolak_prodi', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kaprodi/status', $data);
            $this->load->view('templates/footer');
        } else {


            $data = [

                'ket_tolak_prodi' => $this->input->post('ket_tolak_prodi'),

            ];

            $this->db->where('id', $id);
            $this->db->update('pengajuan_lomba', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Revisi Berhasil ditambahkan </div>');
        redirect('kaprodi/status');
    }*/


    public function status()
    {
        $data['title'] = 'Status Pengajuan Lomba';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        //$this->load->view('surat/header');
        $data['data'] = $this->db->get('pengajuan_lomba')->result();
        //$this->load->view('surat/footer');
        // //$this->load->view('surat/footer');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kaprodi/status', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/auth_footer');
    }

    //PRESTASI 

    public function prestasi()
    {
        $data['title'] = 'Prestasi Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['prestasi'] = $this->db->get('prestasi')->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kaprodi/prestasi', $data);
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
        $this->load->view('kaprodi/detail_prestasi', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/auth_footer');
    }

    /*public function save_prestasi()
    {

        $data['title'] = 'Prestasi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['prestasi'] = $this->db->get('prestasi')->result_array();

        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama', 'required');
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
            $this->load->view('templates/auth_footer');
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
                        'nim' => $this->input->post('nim'),
                        'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
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

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Prestasi Mahasiswa Berhasil ditambahkan </div>');
            redirect('user/prestasi');
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Prestasi Mahasiswa Berhasil ditambahkan </div>');
        redirect('kaprodi/prestasi');
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
            $this->load->view('kaprodi/prestasi', $data1);
            $this->load->view('templates/footer');
            $this->load->view('templates/auth_footer');
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

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kaprodi/prestasi', $data);
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
                'tahun' => $this->input->post('tahun')

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
                    'bukti' => $bukti

                ];
            }

            $this->db->where('id', $data['id']);
            $this->db->update('prestasi', $data);


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Prestasi Mahasiswa Berhasil di Edit </div>');
            redirect('kaprodi/prestasi');
        }
    }



    //Kewirausahaan 

    public function kewirausahaan()
    {
        $data['title'] = 'Kewirausahaan Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['kewirausahaan'] = $this->db->get('kewirausahaan')->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kaprodi/kewirausahaan', $data);
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
        $this->load->view('kaprodi/detail_kwu', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/auth_footer');
    }

    public function save_kewirausahaan()
    {

        $data['title'] = 'Kewirausahaan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['kewirausahaan'] = $this->db->get('kewirausahaan')->result_array();

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
            $this->load->view('templates/auth_footer');
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
                        'nama' => $this->input->post('nama'),
                        'nim' => $this->input->post('nim'),
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
        redirect('kaprodi/kewirausahaan');
    }

    public function delete_kwu($id_kwu = null)
    {
        if (!isset($id_kwu)) show_404();
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
            $this->load->view('kaprodi/kewirausahaan', $data1);
            $this->load->view('templates/footer');
            $this->load->view('templates/auth_footer');
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
            $this->load->view('templates/auth_footer');
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
            redirect('kaprodi/kewirausahaan');
        }
    }
}
