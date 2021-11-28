<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wadek extends CI_Controller
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
        $this->load->view('wadek/index', $data);
        $this->load->view('templates/footer');
    }

    public function data_pengajuan_lomba()
    {
        $data['title'] = 'Daftar Pengajuan Lomba';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        /*$data['data'] = $this->db->get('pengajuan_lomba')->result();*/

        $data['data'] = $this->db->query("SELECT pengajuan_lomba.id, pengajuan_lomba.nama, pengajuan_lomba.nim, pengajuan_lomba.departemen, pengajuan_lomba.program_studi, pengajuan_lomba.semester, pengajuan_lomba.alamat, pengajuan_lomba.no_hp, pengajuan_lomba.nama_lomba, pengajuan_lomba.penyelenggara, pengajuan_lomba.tgl_mulai_lomba, pengajuan_lomba.tgl_selesai_lomba  FROM pengajuan_lomba
			WHERE pengajuan_lomba.nim
			AND pengajuan_lomba.status_wd1 = '0'
			AND pengajuan_lomba.status_tu = '0'
            AND pengajuan_lomba.status_prodi = '3'")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wadek/data_pengajuan_lomba', $data);
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
        $this->load->view('wadek/detail_data', $data);
        $this->load->view('templates/footer');
    }

    public function setuju()

    {

        $cek = $this->uri->segment(3);

        $this->db->set('status_wd1', '3');
        $this->db->where('id', $cek);
        $query = $this->db->update('pengajuan_lomba');


        if ($query) {
            echo 'sukses';
            if ($cek != "") {
                redirect(base_url('Wadek/data_pengajuan_lomba'), 'refresh');
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


        $this->form_validation->set_rules('ket_tolak_wd1', 'ket_tolak_wd1', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wadek/data_pengajuan_lomba', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/auth_footer');
        } else {


            $data = [

                'ket_tolak_wd1' => $this->input->post('ket_tolak_wd1'),

            ];

            $this->db->set('status_wd1', '1');
            $this->db->where('id', $cek);
            $query = $this->db->update('pengajuan_lomba', $data);
        }


        if ($query) {
            echo 'sukses';
            if ($cek != "") {
                redirect(base_url('Wadek/data_pengajuan_lomba'), 'refresh');
            } else {
                redirect(base_url('index'), 'refresh');
            }
        } else {
            echo 'Menolak gagal';
            redirect(base_url('index'), 'refresh');
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil di tolak </div>');
        redirect('wadek/data_pengajuan_lomba');
    }


    /*public function revisi($id)
    {

        $data = $this->db->query("SELECT pengajuan_lomba.id, pengajuan_lomba.nama, pengajuan_lomba.nim, pengajuan_lomba.departemen, pengajuan_lomba.program_studi, pengajuan_lomba.semester, pengajuan_lomba.alamat, pengajuan_lomba.no_hp, pengajuan_lomba.nama_lomba, pengajuan_lomba.penyelenggara, pengajuan_lomba.tgl_mulai_lomba, pengajuan_lomba.tgl_selesai_lomba, pengajuan_lomba.id_prodi  FROM pengajuan_lomba
        WHERE 
     pengajuan_lomba.id = $id")->result();;


        $this->form_validation->set_rules('ket_tolak_wd1', 'ket_tolak_wd1', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wadek/status', $data);
            $this->load->view('templates/footer');
        } else {


            $data = [

                'ket_tolak_wd1' => $this->input->post('ket_tolak_wd1'),

            ];

            $this->db->where('id', $id);
            $this->db->update('pengajuan_lomba', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Revisi Berhasil ditambahkan </div>');
        redirect('wadek/status');
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
        $this->load->view('wadek/status', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/auth_footer');
    }

    public function prestasi()
    {
        $data['title'] = 'Prestasi Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['prestasi'] = $this->db->get('prestasi')->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wadek/prestasi', $data);
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
        $this->load->view('wadek/detail_prestasi', $data);
        $this->load->view('templates/footer');
    }


    //KEWIRAUSAHAAN

    public function kewirausahaan()
    {
        $data['title'] = 'Kewirausahaan Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kewirausahaan'] = $this->db->get('kewirausahaan')->result();

        /*$data['kewirausahaan'] = $this->db->get('kewirausahaan')->result();*/

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wadek/kewirausahaan', $data);
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
        $this->load->view('wadek/detail_kwu', $data);
        $this->load->view('templates/footer');
    }
}
