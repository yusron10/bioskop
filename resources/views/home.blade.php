@extends('layout.template')

@section ('title', 'Home')

@section('background')

<style>
  .font{
    font-size: 14px;
    
  }

  .card{
    background-color: black;
  }

  h1 {
    font-family: 'Gill Sans MT';
    text-decoration: underline;
  }

</style>

<h1 class="text-center mt-3" style="color: aliceblue;"><b>Halaman Home</b></h1>
<div class="container-fluid">
  <div class="row">
    @foreach($films as $fs)
    
    
    <div class="col-md-4 mb-3 mt-4">
      <div class="card">
        <img src="image/horor.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title" style="color: aliceblue;">{{ $fs->judul }}        <small class="font"><span class="badge bg-dark">  Tahun {{ $fs->tahun }}</span></small></h5>
          <p class="badge bg-danger">Genre : {{ $fs->genre->name }}</p>
          {{-- <p class="card-text" style="color: aliceblue;">{{ $fs->deskripsi }}</p> --}}
          <p>
            <button class="btn btn-danger"
            style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .4rem; --bs-btn-font-size: .70rem;"
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

    {{-- <div class="col-md-4 mb-3">

      <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Judul <small class="font">Tahun : 2022</small></h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="text-decoration-none">Detail</a>
        </div>
      </div>
    </div> --}}
  </div>
</div>

@endsection