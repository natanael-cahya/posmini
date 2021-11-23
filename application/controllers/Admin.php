<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_product');
    }

    public function index()
    {
        $judul = 'Admin Page';
        $data = $this->M_product->get_data_limit()->result();
        return view('admin/home', ['id' => $this->session->userdata('id'), 'data' => $data, 'judul' => $judul]);
    }
}