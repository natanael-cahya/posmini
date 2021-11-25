<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $this->form_validation->set_rules('user', 'username', 'required|trim');
        $this->form_validation->set_rules('pass', 'password', 'required|trim');

        // var_dump($this->form_validation->error_array());

        if ($this->form_validation->run() == FALSE) {

            $judul = 'Admin Login Page';

            return view('login', ['judul' => $judul]);
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $username = addslashes($this->input->post('user'));
        $password = $this->input->post('pass');


        $this->db->select(['id', 'username', 'password']);
        $this->db->where('username=', $username);
        $auth = $this->db->get('auth')->row_array();

        if (empty($auth)) {
            echo "<script>alert('Maaf Username/Password anda salah');location='auth'</script>";
        }
        if (password_verify($password, $auth['password']) && $auth) {
            $sesi = [
                'id' => $auth['id'],
                'username' => $auth['username']
            ];
            $this->session->set_userdata($sesi);
            echo "<script>alert('Welcome Admin');location='admin'</script>";
        } else {
            echo "<script>alert('Maaf Password anda salah');location='auth'</script>";
        }
    }
    function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');

        echo "<script>alert('Thank You');location='../auth'</script>";
    }
}