<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dekan extends CI_Controller
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
        $this->load->view('dekan/index', $data);
        $this->load->view('templates/footer');
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
        $this->load->view('dekan/prestasi', $data);
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
        $this->load->view('dekan/detail_prestasi', $data);
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
        $this->load->view('dekan/kewirausahaan', $data);
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
        $this->load->view('dekan/detail_kwu', $data);
        $this->load->view('templates/footer');
    }
}
