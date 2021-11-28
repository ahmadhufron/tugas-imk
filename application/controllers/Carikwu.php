<?php
class Carikwu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('cari_kewirausahaan_model');
    }

    function search_keyword()
    {
        $data = array(
            'title' => 'Kewirausahaan Mahasiswa',
            'isi' => 'v_kewirausahaan',
            'kewirausahaan' => $this->db->query('select * from kewirausahaan')->result()
        );

        $keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->cari_kewirausahaan_model->search($keyword);
        $this->load->view('layout/v_head');
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_nav');
        $this->load->view('result_kewirausahaan', $data);
        $this->load->view('layout/v_footer');
    }
}
