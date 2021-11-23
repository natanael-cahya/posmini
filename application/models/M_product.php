<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_product extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_data_limit()
    {
        return $this->db->select('*')->order_by('id_produk', "desc")->limit(5)->get('produk');
    }
    public function get_all($number, $offset)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori=kategori.id_kategori');
        $this->db->limit($number, $offset);

        return $this->db->get()->result();
    }

    function jumlah_data()
    {
        return $this->db->get('produk')->num_rows();
    }
    function save($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}