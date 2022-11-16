@extends('layout.template')

@section ('title', 'Home')

@section('background')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">

@if($errors->any())
<div class="alert alert-danger mt-3 col-md-5 siuuu">
  <ul>@foreach($errors->all() as $error)
   <li>{{ $error }}</li>
   @endforeach
 </ul>
</div>
@endif

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
  {{ Session::get('message') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    
@endif


@if(Session::has('this-doesnt-work'))

<div class="alert alert-secondary alert-dismissible fade show mt-2" role="alert">
  {{ Session::get('this-doesnt-work') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    
@endif

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
          <button class="btn btn-primary"  style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .4rem; --bs-btn-font-size: .76rem;" type="button" data-bs-toggle="offcanvas" data-bs-target="#contoh-{{ $fs->id }}" aria-controls="offcanvasExample">
            Kumpulan Orang Berkomentar
          </button> <br> <br>
          <button class="btn btn-success" style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .4rem; --bs-btn-font-size: .76rem;" disabled>
            Tags Cuy : 
          </button> <br>
          @foreach ($fs->tag as $o)
              <span class="text-dark badge bg-info">{{ $o->pagar }}</span>
          @endforeach
          <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="contoh-{{ $fs->id }}" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="contoh-{{ $fs->id }}">Ulasan</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <style>
              .bi {
                color: yellow;
              }
            </style>
            <div class="offcanvas-body">
              <form action="" method="POST">
                @csrf
                <div class="row">
                  <div class="col-lg-12">
                    <i class="bi bi-star-fill"></i>
                  <select name="rating_star" id="" class="bg-dark text-white mx-2">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>

                  </select>
                </div>
              </div>
              <div class="mt-3">
                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="film_id" id="film_id" value="{{ $fs->id }}">
                <textarea name="isi" id="isi" cols="50" rows="10" class="bg-dark text-white"></textarea>
                <button type="submit" class="btn btn-primary">Comment</button>
              </form></div>
                
               @forelse ($fs->ulasan as $k)
               <br>
               <i class="bi bi-star-fill"></i> <b>{{ $k->rating_star }}</b><br>
               <b>{{ $k->user->name }}:</b> <br> {{ $k->isi }} <br>

               @empty

               <strong>No Comment</strong>
                   
               @endforelse
                 
              <div>
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