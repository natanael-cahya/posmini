@extends('layouts.master')

@section('content')
<div class="container mt-5">
   <h1>Edit Product Data</h1>
   <form enctype="multipart/form-data" method="POST" action="{{ base_url('product/update').'?id_produk='.$data['id_produk'] }}">
      <div class="row mt-4">
        <div class="col">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Nama Produk</span>
          </div>
          <input type="text" name="nama" class="form-control" value="{{ $data['nama_produk'] }}" placeholder="Input Nama Produk" aria-label="Nama Produk" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Harga Produk</span>
          </div>
          <input type="number" name="harga"  value="{{ $data['harga'] }}" class="form-control" placeholder="Input Harga Produk" aria-label="harga" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Kategori Produk</label>
          </div>
          <select name="kat" class="custom-select form-control" id="inputGroupSelect01">
            <option selected>Pilih Opsi...</option>
            @foreach ($kategori as $itemz)
            <option {{ ($itemz->id_kategori == $data['id_kategori'] ? 'selected':'') }} value="{{ $itemz->id_kategori }}">{{ $itemz->nama_kategori }}</option>    
            @endforeach
            
          </select>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Foto Produk Saat ini</span>
          </div>
          
            <img src="{{ base_url('assets/img/').$data['img'] }}" width="100px" height="100px">

        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Ganti Foto Produk</span>
          </div>
          
            <input type="file" name="img" class="custom-file-input form-control" id="inputGroupFile01">

        </div>
        
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Deskripsi Produk</span>
          </div>
          <textarea class="form-control" class="editor" id="isi" name="isi">{{ $data['deskripsi'] }}</textarea>
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