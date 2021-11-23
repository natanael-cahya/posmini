<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        return view('admin/product', ['id' => $this->session->userdata('id')]);
    }
}