<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_category extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_data()
    {
        return $this->db->get('kategori')->result();
    }
    function jumlah_data($st = null)
    {
        if ($st == "NIL") $st = "";
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->like('nama_kategori', $st);
        return $this->db->get()->num_rows();
    }
    public function get_all($number, $offset, $st = NULL)
    {
        if ($st == 'NIL') $st = "";
        $this->db->select('*');
        $this->db->from('kategori');
        // $this->db->join('kategori', 'produk.id_kategori=kategori.id_kategori');
        $this->db->like('nama_kategori', $st);
        $this->db->limit($number, $offset);

        return $this->db->get()->result();
    }

    function get_one($params)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $params])->row_array();
    }
    function save($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}