@extends('layouts.master')

@section('content')
<div class="container mt-5">
   
   <h1>List Product</h1>
   <button class="btn btn-info btn-sm mt-4"  data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add Data</button>
   <div class="row mt-3">
    <div class="col-md-3">
 Search : <input type="text" class="form-control">
    </div>
 </div>
   <?php $no=1;?>
   <table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Harga</th>
        <th scope="col">Foto</th>
        <th scope="col">Kategori</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        
      <tr>
        <th> {{ $no++ }}</th>
      <td>{{ $item->nama_produk }}</td>
      <td>{!! $item->deskripsi !!}</td>
      <td>{{ $item->harga }}</td>
      <td>{{ $item->img }}</td>
      <td>{{ $item->nama_kategori }}</td>
      <td><a href="#" class="btn btn-primary btn-sm">Edit</a> | <a href="{{ base_url('product/delete') .'?id_produk='.$item->id_produk }}" class="btn btn-danger btn-sm">Delete</a></td>
    </tr>
   @endforeach
</tbody>
</table>
<?=  $link ?>
<BR>
   
</div>
    
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form enctype="multipart/form-data" method="POST" action="{{ base_url('product/add_data') }}">
      <div class="modal-body">
        
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Nama Produk</span>
            </div>
            <input type="text" name="nama" class="form-control" placeholder="Input Nama Produk" aria-label="Nama Produk" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Harga Produk</span>
            </div>
            <input type="number" name="harga" class="form-control" placeholder="Input Harga Produk" aria-label="harga" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Kategori Produk</label>
            </div>
            <select name="kat" class="custom-select form-control" id="inputGroupSelect01">
              <option selected>Pilih Opsi...</option>
              @foreach ($kategori as $item)
              <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>    
              @endforeach
              
            </select>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Foto Produk</span>
            </div>
            
              <input type="file" name="img" class="custom-file-input form-control" id="inputGroupFile01">

          </div>
          
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Deskripsi Produk</span>
            </div>
            <textarea class="form-control" id="ckeditor" name="isi"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </form>
    </div>
  </div>
</div>
    
@endsection