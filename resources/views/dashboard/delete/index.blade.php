@extends ('layout.template')

@section ('title', 'Delete Data')

@section ('background')
<div class="justify-content-center">
	<h2 class="text-center mt-4 mb-4 text-white" style="font-family: Castellar">Informasi Data</h2>
<img src="/image/horor.png" alt="" class="mb-4" style="display:block; margin:auto;">
	<table class="table table-bordered table-dark text-white" border="2">
            <tr>
                <th>Judul</th>
                <th>Genre</th>
                <th>Tahun</th>
                <th>Deskripsi</th>
            </tr>
            <tr>
                <td>{{ $hapus->judul }}</td>
                <td>{{ $hapus->genre->name }}</td>
                <td>{{ $hapus->tahun }}</td>
                <td>{{ $hapus->deskripsi }}</td>
            </tr>
    </table>

    <form action="" method="post">
        @csrf
        @method('DELETE')
    <button type="submit" class="btn btn-danger btn-right" onclick="return confirm('Are you Sure?')">Delete</button>

</form>
</div>
	@endsection