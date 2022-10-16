@extends ('layout.template')
@section ('titll', 'Dashboard')
@section ('background')
@if(Session::has('status'))
<div class="alert alert-success mt-3" role="alert">
	{{ Session::get('message') }}
</div>
@endif
<h1 class="text-white text-center">Ini halaman Dashboard</h1>
<table class="table table-bordered table-striped table-dark" border="2">
    <thead>
        <tr class="text-white">
            <th>No</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Tahun</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($films as $f)
        <tr class="text-white">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $f->judul }}</td>
            <td>{{ $f->genre->name }}</td>
            <td>{{ $f->tahun }}</td>
            <td>
                <a href="" class="badge bg-dark nav-link">Detail</a>
                <a href="/edit/{{ $f->id }}" class="badge bg-dark nav-link">Edit</a>
                <a href="/hapus/{{ $f->id }}" class="badge bg-dark nav-link">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="/create" class="btn btn-dark">Create Film</a>

@endsection