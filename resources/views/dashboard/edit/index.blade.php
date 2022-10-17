@extends ('layout.template')
@section ('title', 'Edit Data')

@section ('background')
<h1 class="text-center text-white mt-3" style="font-family: Castellar">Edit Data</h1>
<form action="" method="POST" enctype="multipart/form-data">
  
  @csrf
  @method ('PUT')
  <div class="container col-md-5">
    <div class="mb-3 mt-5">
      <label for="judul" class="form-label text-white"><b>Judul</b></label>
      <input type="text" class="form-control" id="judul" name="judul" value="{{ $listedit->judul }}" required>
    </div>
    <div class="mb-3">
      <label for="tahun" class="form-label text-white"><b>Tahun</b></label>
      <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $listedit->tahun }}" required>
    </div>
    <div class="mb-3">
      <label for="deskripsi" class="form-label text-white"><b>Deskripsi</b></label>
      <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $listedit->deskripsi }}" required>
    </div>
    <div class="mb-3">
      <label for="genre" class="form-label text-white"><b>Genre</b></label>
      <select name="genre_id" id="genre_id" class="form-control" required>
        <option value="{{ $listedit->genre->id }}">{{ $listedit->genre->name }}</option>
        @foreach ($edit as $g)
        <option value="{{ $g->id }}">{{ $g->name }}</option>
        @endforeach
        
      </select>
    </div>

    <div class="mb-3">
      <label for="img" class="text-white form-label"> Image </label>
      <div class="input-group">
        <input type="file" class="form-control" id="img" name="img">
      </div>
    </div>


    <button class="btn btn-secondary">Submit</button>
  </div>
</form>
@endsection