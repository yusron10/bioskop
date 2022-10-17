@extends('layout.template')

@section ('title', 'Home')

@section('background')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}">

<h1 class="text-center mt-3" style="color: aliceblue;"><b>Halaman Home</b></h1>
<form action="">
  
  <select name="" id="">
    @foreach ($genres as $fi)
    <option value="{{ $fi->id }}">{{ $fi->name }}</option>
    @endforeach
  </select>
 
</form>
<div class="container-fluid">
  <div class="row">
    @foreach($films as $fs)
    
    
    
    <div class="col-md-4 mb-3 mt-4">
      <div class="card">
        <img src="{{ asset('storage/foto/'.$fs->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title" style="color: aliceblue;">{{ $fs->judul }}        <small class="font"><span class="badge bg-dark">  Tahun {{ $fs->tahun }}</span></small></h5>
          <p class="badge bg-danger">Genre : {{ $fs->genre->name }}</p>
          <p>
            <button class="btn btn-danger"
            style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .4rem; --bs-btn-font-size: .76rem;"
            type="button" data-bs-toggle="collapse" data-bs-target="#dekripsi-{{ $fs->id }}" aria-expanded="false" aria-controls="dekripsi-{{ $fs->id }}">
            Deksripsi
          </button>
          <div class="collapse" id="dekripsi-{{ $fs->id }}">
            <div class="card card-body text-white">
              {{ $fs->deskripsi }}
            </div>
          </div>
          <a href="#" class="nav-link badge bg-secondary">Detail</a></p>
        </div>
      </div>
    </div>
    @endforeach 
  </div>
</div>

@endsection