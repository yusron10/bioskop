@extends('layout.template')
@section('title', 'Privasi')
@section('background')

<h1 class="text-white text-center mt-3" style="font-family: Castellar">Daftar User</h1>
<table class="table table-bordered table-striped table-dark mt-3" border="2">
    <thead>
        <tr class="text-white">
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $s)
        <tr class="text-white">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $s->name }}</td>
            <td>{{ $s->email}}</td>
            <td>
                <a href="/dashboard-user/{{ $s->id }}" class="badge bg-dark nav-link " onclick="return confirm('Antum Yakin?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection