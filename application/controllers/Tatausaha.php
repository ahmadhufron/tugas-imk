<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tatausaha extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        /*$this->load->library('word');*/

        $this->load->library('dompdf_gen');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tatausaha/index', $data);
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
			AND pengajuan_lomba.status_tu = '0'
			AND pengajuan_lomba.status_prodi = '3'
            AND pengajuan_lomba.status_wd1 = '3'")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tatausaha/data_pengajuan_lomba', $data);
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
        $this->load->view('tatausaha/detail_data', $data);
        $this->load->view('templates/footer');
    }

    public function setuju()

    {

        $cek = $this->uri->segment(3);

        $this->db->set('status_tu', '3');
        $this->db->where('id', $cek);
        $query = $this->db->update('pengajuan_lomba');


        if ($query) {
            echo 'sukses';
            if ($cek != "") {
                redirect(base_url('Tatausaha/data_pengajuan_lomba'), 'refresh');
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


        $this->form_validation->set_rules('ket_tolak_tu', 'ket_tolak_tu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tatausaha/data_pengajuan_lomba', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/auth_footer');
        } else {


            $data = [

                'ket_tolak_tu' => $this->input->post('ket_tolak_tu'),

            ];
        }


        $this->db->set('status_tu', '1');
        $this->db->where('id', $cek);
        $query = $this->db->update('pengajuan_lomba', $data);


        if ($query) {
            echo 'sukses';
            if ($cek != "") {
                redirect(base_url('Tatausaha/data_pengajuan_lomba'), 'refresh');
            } else {
                redirect(base_url('index'), 'refresh');
            }
        } else {
            echo 'Menolak gagal';
            redirect(base_url('index'), 'refresh');
        }
    }

    public function no_surat($cek)

    {

        $cek = $this->uri->segment(3);

        $data = $this->db->query("SELECT pengajuan_lomba.id, pengajuan_lomba.nama, pengajuan_lomba.nim, pengajuan_lomba.departemen, pengajuan_lomba.program_studi, pengajuan_lomba.semester, pengajuan_lomba.alamat, pengajuan_lomba.no_hp, pengajuan_lomba.nama_lomba, pengajuan_lomba.penyelenggara, pengajuan_lomba.tgl_mulai_lomba, pengajuan_lomba.tgl_selesai_lomba, pengajuan_lomba.id_prodi  FROM pengajuan_lomba
        WHERE 
     pengajuan_lomba.id = $cek")->result();;


        $this->form_validation->set_rules('no_surat', 'no_surat', 'required');
        $this->form_validation->set_rules('tgl_surat', 'tgl_surat', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tatausaha/data_pengajuan_lomba', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/auth_footer');
        } else {


            $data = [


                'no_surat' => $this->input->post('no_surat'),
                'tgl_buat' => date('Y-m-d'),
                'tgl_surat' => $this->input->post('tgl_surat')

            ];
        }


        $this->db->set('status_tu', '3');
        $this->db->where('id', $cek);
        $query = $this->db->update('pengajuan_lomba', $data);


        if ($query) {
            echo 'sukses';
            if ($cek != "") {
                redirect(base_url('Tatausaha/data_pengajuan_lomba'), 'refresh');
            } else {
                redirect(base_url('index'), 'refresh');
            }
        } else {
            echo 'Menolak gagal';
            redirect(base_url('index'), 'refresh');
        }
    }

    /*public function revisi($id)
    {

        $data = $this->db->query("SELECT pengajuan_lomba.id, pengajuan_lomba.nama, pengajuan_lomba.nim, pengajuan_lomba.departemen, pengajuan_lomba.program_studi, pengajuan_lomba.semester, pengajuan_lomba.alamat, pengajuan_lomba.no_hp, pengajuan_lomba.nama_lomba, pengajuan_lomba.penyelenggara, pengajuan_lomba.tgl_mulai_lomba, pengajuan_lomba.tgl_selesai_lomba, pengajuan_lomba.id_prodi  FROM pengajuan_lomba
        WHERE 
     pengajuan_lomba.id = $id")->result();;


        $this->form_validation->set_rules('ket_tolak_tu', 'ket_tolak_tu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tatausaha/status', $data);
            $this->load->view('templates/footer');
        } else {


            $data = [

                'ket_tolak_tu' => $this->input->post('ket_tolak_tu'),

            ];

            $this->db->where('id', $id);
            $this->db->update('pengajuan_lomba', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Revisi Berhasil ditambahkan </div>');
        redirect('tatausaha/status');
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
        $this->load->view('tatausaha/status', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/auth_footer');
    }

    public function suratkeluar()
    {
        $data['title'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tatausaha/suratkeluar', $data);
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
        $tgl_surat = $_POST['tgl_surat'];
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
        $document = str_replace("%TGL%", $tgl_surat, $document);

        // header untuk membuka file output RTF dengan MS. Word
        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=suratIjin.doc");
        header("Content-length: " . strlen($document));
        echo $document;




        $PHPWord = $this->word; // New Word Document
        $section = $PHPWord->createSection(); // New portrait section
        // Add text elements

        $PHPWord->addFontStyle('rStyle1', array('bold' => true, 'italic' => false, 'size' => 14));
        $PHPWord->addParagraphStyle('pStyle1', array('align' => 'center', 'spaceAfter' => 1, 0));
        $section->addText('Jalan Prof. H. Soedarto, S.H. Tembalang Semarang 50275', 'rStyle1', 'pStyle1');
        $section->addText('Telepon/Faksimile: (024) 7471379 laman: http://www.vokasi.undip.ac.id/', 'rStyle1', 'pStyle1');

        $section->addText('Hello World!');
        $section->addTextBreak(2);
        $section->addText('Mohammad Rifqi Sucahyo.', array('name' => 'Verdana', 'color' => '006699'));
        $section->addTextBreak(2);
        $PHPWord->addFontStyle('rStyle', array('bold' => true, 'italic' => true, 'size' => 16));
        $PHPWord->addParagraphStyle('pStyle', array('align' => 'center', 'spaceAfter' => 100));
        // Save File / Download (Download dialog, prompt user to save or simply open it)
        $section->addText('Ini Adalah Demo PHPWord untuk CI', 'rStyle', 'pStyle');

        $filename = 'just_some_random_name.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');
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


    public function prestasi()
    {
        $data['title'] = 'Prestasi Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['prestasi'] = $this->db->get('prestasi')->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tatausaha/prestasi', $data);
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
        $this->load->view('tatausaha/detail_prestasi', $data);
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
        $this->load->view('tatausaha/kewirausahaan', $data);
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
        $this->load->view('tatausaha/detail_kwu', $data);
        $this->load->view('templates/footer');
    }

    /*public function counter_tahun($tahun)
    {
        $tahun_saiki = date('Y');
        $data_counter = $this->db->get_where('counter_tahun', array('tahun' => $tahun))->row();
        $data['detail'] = $data_counter;
        $temp = null;;
        if ($data_counter == null) {
            $temp = [
                'tahun' => $tahun_saiki,
                'jumlah_surat' => $data_counter->jumlah_surat++,
            ];
            $this->db->insert('counter_tahun', $temp);
        } else {
            if ($data_counter->tahun != $tahun_saiki) {
                $temp = [
                    'tahun' => $tahun_saiki,
                    'jumlah_surat' => $data_counter->jumlah_surat++,
                ];
                $this->db->insert('counter_tahun', $temp);
            } else {
                $temp = [
                    'jumlah_surat' => $data_counter->jumlah_surat++,
                ];
                $this->db->update('counter_tahun', $temp);
            }
        }
    }

    public function get_counter_tahun($tahun)
    {
        $data_counter = $this->db->get_where('counter_tahun', array('tahun' => $tahun))->row();
        if (!$data_counter) {
            echo 1;
        } else {
            echo $data_counter->jumlah_surat;
        }
    }*/
}
