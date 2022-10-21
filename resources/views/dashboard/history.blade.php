@extends('layout.template')

@section('title', 'History')

@section('background')
<div class="table">
    <table class="table table-bordered table-bg-dark table-dark mt-3" border="2">
    <thead>
        <tr class="text-white">
            <th>No</th>
            <th>Judul</th>
            <th>Ulasan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ul as $f)
        <tr class="text-white">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $f->film->judul }} {{ $f->film->tahun }}</td>
            <td>{{ $f->isi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection