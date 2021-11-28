<?php
class Cari_prestasi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function search($keyword)
    {
        $this->db->like('nim', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('departemen', $keyword);
        $this->db->or_like('program_studi', $keyword);
        $this->db->or_like('nama_lomba', $keyword);
        $this->db->or_like('tingkat', $keyword);
        $this->db->or_like('juara', $keyword);
        $this->db->or_like('penyelenggara', $keyword);
        $this->db->or_like('tahun', $keyword);
        $query  =   $this->db->get('prestasi');
        return $query->result();
    }
}
