@extends('layouts.master')

@section('content')
<div class="container mt-5">
   
   <h1>List Category</h1>
   <button class="btn btn-info btn-sm mt-4"  data-bs-toggle="modal" data-bs-target="#exampleModal" >+ Add Data</button>
   <?php $no=1; ?>
   <div class="row mt-3">
    <form class="inline" action="{{ base_url('category/search') }}">
      <div class="input-group mb-3">
        
        <input type="text" value="{{ (empty($_GET['np'])) ? '' : $_GET['np'] }}" class="form-control" name="np" placeholder="Nama Kategori" aria-label="nama Produk" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        
      </div>
    </form>
  </div>
   <table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Kategori</th>
        <th scope="col">Deskripsi Kategori</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
      <tr>
        <th> {{ $no++ }}</th>
      <td>{{ $item->nama_kategori }}</td>
      <td>{!! $item->deskripsi_kategori !!}</td>
      <td><a href="{{ base_url('category/edit').'?id_kategori='.$item->id_kategori }}" class="btn btn-primary btn-sm">Edit</a> | <a href="{{ base_url('category/delete').'?id_kategori='.$item->id_kategori }}" class="btn btn-danger btn-sm">Delete</a></td>
     
    </tr>
   @endforeach
</tbody>
</table>
<?= $link ?>
   
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ base_url('category/add_data') }}">
      <div class="modal-body">
        
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Nama Kategori</span>
            </div>
            <input type="text" class="form-control" name="nama" placeholder="Input Nama Kategori" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Deskripsi Kategori</span>
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