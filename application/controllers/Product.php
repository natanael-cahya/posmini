<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_product');
        $this->load->model('M_category');
        $this->load->library('form_validation');
    }

    public function index()
    {
        //echo $this->uri->segment(2);
        $judul = 'Product Page';
        $jumlah_data = $this->M_product->jumlah_data();

        $config['base_url'] = base_url() . '/product';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 4;

        $this->load->config('pagination');
        $config['query_string_segment'] = 'page';


        $this->pagination->initialize($config);
        $from = ($this->input->get('page')) ? (($this->input->get('page') - 1) * $config["per_page"]) : 0;
        $link = $this->pagination->create_links();

        $data = $this->M_product->get_all($config['per_page'], $from);
        $kategori = $this->M_category->get_data();

        return view('admin/product', ['id' => $this->session->userdata('id'), 'kategori' => $kategori, 'data' => $data, 'link' => $link, 'judul' => $judul]);
    }
    public function search()
    {
        $judul = 'Product Page';
        $jumlah_data = $this->M_product->jumlah_data();

        $config['base_url'] = base_url() . '/product';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;

        $this->load->config('pagination');
        $config['query_string_segment'] = array('page', 'np');


        $this->pagination->initialize($config);
        $search = ($this->input->get('np')) ? $this->input->get('np') : '';
        $from = ($this->input->get('page')) ? (($this->input->get('page') - 1) * $config["per_page"]) : 0;
        $link = $this->pagination->create_links();

        $data = $this->M_product->get_all($config['per_page'], $from, $search);
        $kategori = $this->M_category->get_data();

        return view('admin/product', ['id' => $this->session->userdata('id'), 'kategori' => $kategori, 'data' => $data, 'link' => $link, 'judul' => $judul]);
    }
    public function add_data()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'is_unique[produk.nama_produk]');

        if ($this->form_validation->run() == FALSE) {
            echo "<script>alert('Nama Produk Telah diGunakan');location='../product'</script>";
            return false;
        }
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $kat = $this->input->post('kat');
        // $img = $this->input->post('img');
        $desk = $this->input->post('isi');

        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';

        $config['encrypt_name']            = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('img');

        $data['nama_berkas'] = $this->upload->data("file_name");
        $nama_f = $data['nama_berkas'];

        $data = [
            'id_produk' => uniqid(),
            'nama_produk' => $nama,
            'deskripsi' => $desk,
            'harga' => $harga,
            'img' => $nama_f,
            'id_kategori' => $kat
        ];

        $cek = $this->M_product->save($data, 'produk');
        echo "<script>alert('Data berhasil disimpan');location='../product'</script>";
    }

    function edit()
    {
        $judul = 'Edit Data';

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['query_string_segment'] = 'id_produk';

        $kategori = $this->M_category->get_data();
        $params = $this->input->get('id_produk');
        $data = $this->M_product->get_one($params);
        return view('admin/editProduk', ['data' => $data, 'kategori' => $kategori, 'judul' => $judul]);
    }
    function update()
    {

        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $kat = $this->input->post('kat');
        $img = $this->input->post('img');
        $desk = $this->input->post('isi');

        if (empty($img)) {
            $data = [
                'nama_produk' => $nama,
                'deskripsi' => $desk,
                'harga' => $harga,

                'id_kategori' => $kat
            ];
            $where = ['id_produk' => $this->input->get('id_produk')];
            $this->M_product->update($where, $data, 'produk');
            echo "<script>alert('Data berhasil DiUbah');location='../product'</script>";
        } else {
            $params = $this->input->get('id_produk');
            $p = $this->db->get_where('produk', ['id_produk' => $params])->row_array();
            $par = $p['img'];
            $path  = './assets/img/' . $par;
            unlink($path);

            $config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'gif|jpg|png';

            $config['encrypt_name']            = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('img');

            $data['nama_berkas'] = $this->upload->data("file_name");
            $nama_f = $data['nama_berkas'];

            $data = [
                'nama_produk' => $nama,
                'deskripsi' => $desk,
                'harga' => $harga,
                'img' => $nama_f,
                'id_kategori' => $kat
            ];
            $where = ['id_produk' => $this->input->get('id_produk')];
            $this->M_product->update($where, $data, 'produk');
            echo "<script>alert('Data berhasil DiUbah');location='../product'</script>";
        }
    }

    function delete()
    {


        $params = $this->input->get('id_produk');
        $p = $this->db->get_where('produk', ['id_produk' => $params])->row_array();
        $par = $p['img'];
        $path  = './assets/img/' . $par;
        unlink($path);
        $this->M_product->delete(['id_produk' => $params], 'produk');
        echo "<script>alert('Data berhasil Dihapus');location='../product'</script>";
    }
}