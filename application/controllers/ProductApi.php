<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class ProductApi extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_product');
        $this->load->library('form_validation');
    }
    public function index_get()
    {
        $id_produk = $this->get('id_produk');
        if ($id_produk == NULL) {
            $data = $this->M_product->getAPI();
            $this->response(['status' => true, 'data' => $data], RestController::HTTP_OK);
        } else {
            $data = $this->M_product->getAPI($id_produk);
            if ($data) {
                $this->response(['status' => true, 'data' => $data], RestController::HTTP_OK);
            } else {
                $this->response(['status' => false, 'data' => 'Data Tidak ditemukan'], RestController::HTTP_NOT_FOUND);
            }
        }
    }
    public function index_post()
    {
        $data = [
            'id_produk'   => uniqid(),
            'nama_produk' => $this->post('nama_produk'),
            'deskripsi'   => $this->post('deskripsi'),
            'harga'       => $this->post('harga'),
            'img'         => 'default.png',
            'id_kategori' => $this->post('id_kategori')
        ];
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|is_unique[produk.nama_produk]');
        if ($this->form_validation->run() == FALSE) {
            $this->response(['status' => false, 'msg' => 'Nama Produk telah digunakan'], RestController::HTTP_INTERNAL_ERROR);
        } else {
            $simpan = $this->M_product->addAPI($data);
            if ($simpan['status']) {
                $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data telah Berhasil Disimpan'], RestController::HTTP_CREATED);
            } else {
                $this->response(['status' => false, 'msg' => 'Data Gagal Disimpan' . $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
            }
        }
    }
    public function index_put()
    {
        $data = [

            'nama_produk' => $this->put('nama_produke'),
            'deskripsi'   => $this->put('deskripsi'),
            'harga'       => $this->put('harga'),
            'img'         => 'default.png',
            'id_kategori' => $this->put('id_kategori')
        ];


        $id_produk = $this->get('id_produk');
        $simpan = $this->M_product->updateAPI($id_produk, $data);
        if ($simpan['status']) {
            $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data telah Berhasil Diubah'], RestController::HTTP_OK);
        } else {
            $this->response(['status' => false, 'msg' => 'Data Gagal Diubah' . $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
        }
    }
}