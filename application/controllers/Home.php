<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
    }
    public function index()
    {


        $data['info_lomba'] = $this->db->get('info_lomba')->result();

        $this->load->view('layout/v_head');
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_nav');
        $this->load->view('v_home', $data);
        $this->load->view('layout/v_footer');


        /*$this->load->view('layout/v_wrapper', $data, FALSE);*/
    }

    //PRESTASI

    public function prestasi()
    {
        $data = array(
            'title' => 'Prestasi Mahasiswa',
            'isi' => 'v_prestasi',
            'prestasi' => $this->db->query('select * from prestasi')->result()
        );
        /*$this->load->view('layout/v_wrapper', $data, FALSE);*/

        $this->load->view('layout/v_head');
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_nav');
        $this->load->view('v_prestasi', $data);
        $this->load->view('layout/v_footer');
    }

    public function detail_prestasi($id)
    {

        $detail_prestasi = $this->db->get_where('prestasi', array('id' => $id))->row();
        $data['detail'] = $detail_prestasi;

        $this->load->view('layout/v_head');
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_nav');
        $this->load->view('detail_prestasi', $data);
        $this->load->view('layout/v_footer');
    }


    //KEWIRAUSAHAAN

    public function kewirausahaan()
    {
        $data = array(
            'title' => 'Kewirausahaan Mahasiswa',
            'isi' => 'v_kewirausahaan',
            'kewirausahaan' => $this->db->query('select * from kewirausahaan')->result()
        );
        /*$this->load->view('layout/v_wrapper', $data, FALSE);*/

        $this->load->view('layout/v_head');
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_nav');
        $this->load->view('v_kewirausahaan', $data);
        $this->load->view('layout/v_footer');
    }

    public function detail_kwu($id_kwu)
    {

        $detail_kwu = $this->db->get_where('kewirausahaan', array('id_kwu' => $id_kwu))->row();
        $data['detail'] = $detail_kwu;

        $this->load->view('layout/v_head');
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_nav');
        $this->load->view('detail_kwu', $data);
        $this->load->view('layout/v_footer');
    }

    /*public function berita_home()
    {
        $data['infolomba'] = $this->db->get('info_lomba')->result();

        $this->load->view('layout/v_head');
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_nav');
        $this->load->view('v_home', $data);
        $this->load->view('layout/v_footer');
    }*/

    public function list_infolomba()
    {

        $data['info_lomba'] = $this->db->get('info_lomba')->result();

        $this->load->view('layout/v_head');
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_nav');
        $this->load->view('list_infolomba', $data);
        $this->load->view('layout/v_footer');
    }

    public function detail_info($id)
    {
        $detail_info = $this->db->get_where('info_lomba', array('id' => $id))->row();
        $data['detail'] = $detail_info;

        $this->load->view('layout/v_head');
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_nav');
        $this->load->view('detail_info', $data);
        $this->load->view('layout/v_footer');
    }
}
