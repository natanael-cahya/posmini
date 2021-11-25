@extends('layouts.master')

@section('content')
<div class="container mt-5">
   
   <h1>5 Produk Terakhir Ditambahkan</h1>
   <?php $no=1; ?>
   
   <table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Harga</th>
        <th scope="col">Foto</th>
        <th scope="col">Kategori</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
      <tr>
        <th> {{ $no++ }}</th>
      <td>{{ $item->nama_produk; }}</td>
      <td>{!! $item->deskripsi; !!}</td>
      <td>Rp.{{ number_format("$item->harga", 0, ",", ".") }}</td>
      <td><img src="{{ base_url('assets/img/').$item->img }}" width="100px" height="100px"></td>
      <td>{{ $item->nama_kategori; }}</td>
    </tr>
   @endforeach
</tbody>
</table>
</div>
    
@endsection