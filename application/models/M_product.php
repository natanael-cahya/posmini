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
}