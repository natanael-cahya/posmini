<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_category');
    }

    public function index()
    {
        $judul = 'Category Page';
        $jumlah_data = $this->M_category->jumlah_data();

        $config['base_url'] = base_url() . '/category';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;

        //Navigasi Custom
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

        //paramscustom
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';

        $this->pagination->initialize($config);
        $from = ($this->input->get('page')) ? (($this->input->get('page') - 1) * $config["per_page"]) : 0;
        $link = $this->pagination->create_links();

        $data = $this->M_category->get_all($config['per_page'], $from);
        return view('admin/category', ['data' => $data, 'id' => $this->session->userdata('id'), 'link' => $link, 'judul' => $judul]);
    }
    public function add_data()
    {
        $nama = $this->input->post('nama');
        $desk = $this->input->post('isi');

        $data = [
            'id_kategori' => uniqid(),
            'nama_kategori' => $nama,
            'deskripsi_kategori' => $desk
        ];

        $cek = $this->M_category->save($data, 'kategori');
        echo "<script>alert('Data berhasil disimpan');location='../category'</script>";
    }
    function edit()
    {
        $judul = 'Edit Data';

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['query_string_segment'] = 'id_produk';


        $params = $this->input->get('id_kategori');
        $data = $this->M_category->get_one($params);
        return view('admin/editCategory', ['data' => $data, 'judul' => $judul]);
    }
    function update()
    {

        $nama = $this->input->post('nama');
        $desk = $this->input->post('isi');

        $data = [
            'nama_kategori' => $nama,
            'deskripsi_kategori' => $desk
        ];
        $where = ['id_kategori' => $this->input->get('id_kategori')];
        $this->M_category->update($where, $data, 'kategori');
        echo "<script>alert('Data berhasil DiUbah');location='../category'</script>";
    }

    function delete()
    {
        $params = $this->input->get('id_kategori');
        $this->M_category->delete(['id_kategori' => $params], 'kategori');
        echo "<script>alert('Data berhasil Dihapus');location='../category'</script>";
    }
}