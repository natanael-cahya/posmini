<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class CategoryApi extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_category');
        $this->load->library('form_validation');
    }
    public function index_get()
    {
        $id_kategori = $this->get('id_kategori');
        if ($id_kategori == NULL) {
            $data = $this->M_product->getAPI();
            $this->response(['status' => true, 'data' => $data], RestController::HTTP_OK);
        } else {
            $data = $this->M_product->getAPI($id_kategori);
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
            'id_kategori'   => uniqid(),
            'nama_kategori' => $this->post('nama_kategori'),
            'deskripsi_kategori'   => $this->post('deskripsi_kategori'),

        ];
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|is_unique[produk.nama_kategori]');
        if ($this->form_validation->run() == FALSE) {
            $this->response(['status' => false, 'msg' => 'Nama Kategori telah digunakan'], RestController::HTTP_INTERNAL_ERROR);
        } else {
            $simpan = $this->M_category->addAPI($data);
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

            'nama_kategori' => $this->put('nama_kategori'),
            'deskripsi_kategori'   => $this->put('deskripsi_kategori'),

        ];


        $id_kategori = $this->put('id_kategori');
        if ($id_kategori === null) {
            $this->response(['status' => false, 'msg' => 'Masukkan Kode kategori yang akan diubah'], RestController::HTTP_INTERNAL_ERROR);
        }
        $simpan = $this->M_category->updateAPI($id_kategori, $data);
        if ($simpan['status']) {
            $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data telah Berhasil Diubah'], RestController::HTTP_OK);
        } else {
            $this->response(['status' => false, 'msg' => 'Data Gagal Diubah' . $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
        }
    }
    public function index_delete()
    {
        $id_kategori = $this->delete('id_kategori');
        if ($id_kategori === null) {
            $this->response(['status' => false, 'msg' => 'Masukkan Kode kategori yang akan dihapus'], RestController::HTTP_INTERNAL_ERROR);
        }
        $delete = $this->M_category->deleteAPI($id_kategori);
        if ($delete['status']) {
            $this->response(['status' => true, 'msg' => $delete['data'] . ' Data telah Berhasil Dihapus'], RestController::HTTP_OK);
        } else {
            $this->response(['status' => false, 'msg' => 'Data Gagal Dihapus' . $delete['msg']], RestController::HTTP_INTERNAL_ERROR);
        }
    }
}