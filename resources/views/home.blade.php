@extends('layout.template')

@section ('title', 'Home')

@section('background')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}">

<h1 class="text-center mt-3" style="color: aliceblue;"><b>Halaman Home</b></h1>



<form action="" method="get">
  <div class="input-group">
    <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" type="submit">Genre</button>
    <ul class="dropdown-menu">
      @foreach ($gs as $s)
      @if ( count($s->film) == 0)
      <li class="dropdown-item" disabled>Film {{ $s->name }} Belum Tersedia </li>
      <li><hr class="dropdown-divider"></li>
      @else
      <li><a href="/?keyword={{ $s->name }}" class="dropdown-item"><b>{{ $s->name }}</b> ada {{ count($s->film) }} Film </a></li>
      <li><hr class="dropdown-divider"></li>
      @endif
      
      @endforeach
    </ul>
  </div>
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
          <button class="btn btn-primary"  style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .4rem; --bs-btn-font-size: .76rem;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            Contoh
          </button>
          <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasExampleLabel">Ulasan</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <div>
                {{ $fs->deskripsi }}
              </div>
            </div>
          </div>
        </p>
        </div>
      </div>
    </div>
    @endforeach 
  </div>
</div>

<div class="my-5">
	{{ $films->withQueryString()->links() }}
</div>

@endsection