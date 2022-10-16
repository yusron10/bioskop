@extends ('layout.template')
@section ('title', 'Tambah Data')

@section ('background')

	@if($errors->any())
	<div class="alert alert-danger">
		<ul>@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	</div>
	@endif

<h1 class="text-center text-white mt-3">Tambah Data</h1>
<form action="" method="POST" enctype="multipart/form-data">
  
  @csrf
  <div class="container col-md-5">
    <div class="mb-3 mt-5">
      <label for="judul" class="form-label text-white"><b>Judul</b></label>
      <input type="text" class="form-control" id="judul" name="judul" required>
    </div>
    <div class="mb-3">
      <label for="tahun" class="form-label text-white"><b>Tahun</b></label>
      <input type="text" class="form-control" id="tahun" name="tahun">
    </div>
    <div class="mb-3">
      <label for="deskripsi" class="form-label text-white"><b>Deskripsi</b></label>
      <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
    </div>
    <div class="mb-3">
      <label for="genre" class="form-label text-white"><b>Genre</b></label>
      <select name="genre_id" id="genre_id" class="form-control" required>
        @foreach ($genres as $g)
        <option value="{{ $g->id }}">{{ $g->name }}</option>
        @endforeach
        
      </select>
    </div>

    <div class="mb-3">
      <label for="image" class="text-white form-label"> Image </label>
      <div class="input-group">
        <input type="file" class="form-control" id="image" name="image">
      </div>
    </div>


    <button class="btn btn-secondary">Submit</button>
  </div>
</form>
@endsection