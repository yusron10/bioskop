@extends('layout.template')

@section ('title', 'Home')

@section('background')
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    .font{
        font-size: 14px;
    }
</style>
<body>
    <h1>Halaman Home</h1>
    <div class="container">
        <div class="row">
            @foreach($films as $fs)
                
           
            <div class="col-md-4 mb-3">
    <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $fs->judul }}        <small class="font"><span class="badge bg-dark">  Tahun {{ $fs->tahun }}</span></small></h5>
          <p class="badge bg-danger">Genre : {{ $fs->genre->name }}</p>
          <p class="card-text">{{ $fs->deskripsi }}</p>
          <a href="#">Go somewhere</a>
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

</body>
</html>

@endsection