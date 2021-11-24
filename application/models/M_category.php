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
    public function jumlah_data()
    {
        return $this->db->get('kategori')->num_rows();
    }
    function get_all($number, $offset)
    {
        return $this->db->get('kategori', $number, $offset)->result();
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