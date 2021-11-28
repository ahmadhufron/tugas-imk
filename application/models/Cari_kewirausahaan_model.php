<?php
class Cari_kewirausahaan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function search($keyword)
    {
        $this->db->like('nama', $keyword);
        $this->db->or_like('nim', $keyword);
        $this->db->or_like('departemen', $keyword);
        $this->db->or_like('program_studi', $keyword);
        $this->db->or_like('nama_usaha', $keyword);
        $this->db->or_like('jenis_usaha', $keyword);
        $query  =   $this->db->get('kewirausahaan');
        return $query->result();
    }
}
