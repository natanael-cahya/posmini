<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_data()
    {
        return $this->db->get('auth')->result();
    }
}