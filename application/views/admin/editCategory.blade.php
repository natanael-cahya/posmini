@extends('layouts.master')

@section('content')
<div class="container mt-5">
   <h1>Edit Product Data</h1>
   <form enctype="multipart/form-data" method="POST" action="{{ base_url('category/update').'?id_kategori='.$data['id_kategori'] }}">
      <div class="row mt-4">
        <div class="col">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Nama Produk</span>
          </div>
          <input type="text" name="nama" class="form-control" value="{{ $data['nama_kategori'] }}" placeholder="Input Nama Produk" aria-label="Nama Produk" aria-describedby="basic-addon1">
        </div>
        
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Deskripsi Produk</span>
          </div>
          <textarea class="form-control" class="editor" id="isi" name="isi">{{ $data['deskripsi_kategori'] }}</textarea>
        </div>
    
    <div class="modal-footer">
      <a href="{{ base_url('product') }}" class="btn btn-secondary">Close</a>
      <button type="submit" class="btn btn-primary">Edit Data</button>
    </div>
  </form>
</div>
</div>
   
</div>
    
@endsection