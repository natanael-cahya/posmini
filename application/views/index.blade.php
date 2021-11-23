@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1>Product</h1>
    <div class="row mt-4">
        @foreach ($posts as $item)
        <div class="col-lg-3 col-md-6 text-center">
            <div class="card" style="width: 18rem;">
                <img src="{{ base_url().'assets/img/'.$item['img'] }}" class="card-img-top" alt="{{ $item['nama'] }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $item['nama'] }}</h5>
                  <p class="card-text"> {{ $item['deskripsi'] }}</p>
                  <a href="#" class="btn btn-primary btn-sm mx-auto">Beli</a>
                </div>
              </div>
        </div>
            
        @endforeach
    </div>
</div>
    
@endsection