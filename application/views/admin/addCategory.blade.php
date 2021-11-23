@extends('layouts.master')

@section('content')
<div class="container mt-5">
   
   <h1>List Category</h1>
   <a class="btn btn-info btn-sm mt-4" href="#">+ Add Data</a>
   <?php $no=1; ?>
   
   <table class="table mt-2">
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
   
</div>
    
@endsection