<?php
class Cariprestasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('cari_prestasi_model');
    }

    function search_keyword()
    {
        $data = array(
            'title' => 'Prestasi Mahasiswa',
            'isi' => 'v_prestasi',
            'prestasi' => $this->db->query('select * from prestasi')->result()
        );

        $keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->cari_prestasi_model->search($keyword);
        $this->load->view('layout/v_head');
        $this->load->view('layout/v_header');
        $this->load->view('layout/v_nav');
        $this->load->view('result_prestasi', $data);
        $this->load->view('layout/v_footer');
    }
}
