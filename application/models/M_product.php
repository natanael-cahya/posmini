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
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori=kategori.id_kategori');
        $this->db->order_by('id_produk', "desc");
        $this->db->limit(5);

        return $this->db->get()->result();
    }
    public function get_all($number, $offset, $st = NULL)
    {
        if ($st == 'NIL') $st = "";
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori=kategori.id_kategori');
        $this->db->like('nama_produk', $st);
        $this->db->limit($number, $offset);

        return $this->db->get()->result();
    }
    public function getAPI($id_produk = null)
    {
        if ($id_produk === NULL) {
            $this->db->select('*');
            $this->db->from('produk');
            $this->db->join('kategori', 'produk.id_kategori=kategori.id_kategori');
            return $this->db->get()->result();
        } else {
            $this->db->select('*');
            $this->db->from('produk');
            $this->db->join('kategori', 'produk.id_kategori=kategori.id_kategori');
            $this->db->where('produk.id_produk=', $id_produk);
            return $this->db->get()->result();
        }
    }
    public function addAPI($data)
    {
        try {
            $this->db->insert('produk', $data);
            $error = $this->db->error();
            if ($error['code']) {
                throw new Exception('Error : ' . $error['message']);
                return false;
            }
            return ['status' => true, 'data' => $this->db->affected_rows()];
        } catch (Exception $ex) {
            return ['status' => false, 'message' => $ex->getMessage()];
        }
    }
    public function updateAPI($id_produk, $data)
    {
        try {
            $this->db->update('produk', $data, ['id_produk' => $id_produk]);
            $error = $this->db->error();
            if ($error['code']) {
                throw new Exception('Error : ' . $error['message']);
                return false;
            }
            return ['status' => true, 'data' => $this->db->affected_rows()];
        } catch (Exception $ex) {
            return ['status' => false, 'message' => $ex->getMessage()];
        }
    }
    public function deleteAPI($id_produk)
    {
        try {
            $this->db->delete('produk', ['id_produk' => $id_produk]);
            $error = $this->db->error();
            if ($error['code']) {
                throw new Exception('Error : ' . $error['message']);
                return false;
            }
            return ['status' => true, 'data' => $this->db->affected_rows()];
        } catch (Exception $ex) {
            return ['status' => false, 'message' => $ex->getMessage()];
        }
    }

    function get_one($params)
    {
        return $this->db->get_where('produk', ['id_produk' => $params])->row_array();
    }

    function jumlah_data($st = NULL)
    {
        if ($st == "NIL") $st = "";
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->like('nama_produk', $st);
        return $this->db->get()->num_rows();
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