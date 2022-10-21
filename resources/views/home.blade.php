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
            <div class="offcanvas-body">
              <form action="" method="POST">
                @csrf
                <div class="row">
                  <div class="col-lg-12">
                  <div class="star-rating">
                    <span class="bi bi-star" data-rating="1"></span>
                    <span class="bi bi-star" data-rating="2"></span>
                    <span class="bi bi-star" data-rating="3"></span>
                    <span class="bi bi-star" data-rating="4"></span>
                    <span class="bi bi-star" data-rating="5"></span>
                    <input type="hidden" name="whatever1" class="rating-value" value="2.56">
                  </div>
                </div>
              </div>
                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="film_id" id="film_id" value="{{ $fs->id }}">
                <textarea name="isi" id="isi" cols="50" rows="10" class="bg-dark text-white"></textarea>
                <button type="submit" class="btn btn-primary">Comment</button>
              </form><br>
                
               @forelse ($fs->ulasan as $k)
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

<script>
  var $star_rating = $('.star-rating .bi');

var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('bi-star').addClass('bi-star-fill');
    } else {
      return $(this).removeClass('bi-star-fill').addClass('bi-star');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {

});
</script>


@endsection