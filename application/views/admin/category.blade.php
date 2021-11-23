@extends('layouts.master')

@section('content')
<div class="container mt-5">
   
   <h1>List Category</h1>
   <button class="btn btn-info btn-sm mt-4"  data-bs-toggle="modal" data-bs-target="#exampleModal" >+ Add Data</button>
   <?php $no=1; ?>
   <div class="row mt-3">
     <div class="col-md-3">
  Search : <input type="text" class="form-control">
     </div>
  </div>
   <table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Kategori</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
      <tr>
        <th> {{ $no++ }}</th>
      <td>{{ $item->nama_kategori }}</td>
      <td><a href="#" class="btn btn-primary btn-sm">Edit</a> | <a href="#" class="btn btn-danger btn-sm">Delete</a></td>
     
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
      <div class="modal-body">
        <form>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Nama Kategori</span>
            </div>
            <input type="text" class="form-control" placeholder="Input Nama Kategori" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Deskripsi Kategori</span>
            </div>
            <textarea class="form-control" id="ckeditor" name="isi"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>
    
@endsection