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
        $this->form_validation->set_rules('user', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pass', 'password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            return view('login');
        } else {
            $this->login();
        }
    }

    function login()
    {
        $username = addslashes($this->input->post('user'));
        $password = $this->input->post('pass');


        $auth = $this->db->get_where('auth', ['username' => $username])->row_array();
        if (empty($auth)) {
            echo "<script>alert('Maaf Username/Password anda salah');location='../auth'</script>";
        }
        if (password_verify($password, $auth['password']) && $auth) {
            $sesi = [
                'id' => $auth['id'],
                'email' => $auth['email']
            ];
            $this->session->set_userdata($sesi);
            redirect('admin/');
        } else {
            echo "<script>alert('Maaf Password anda salah');location='../auth'</script>";
        }
    }
    function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');

        return view('login');
    }
}