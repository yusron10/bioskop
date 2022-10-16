<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $film = Film::with('genre')->get();
        return view('dashboard/index', ['films' => $film]);
    }
    public function create()
    {
        $genre = Genre::select('id', 'name')->get();
        return view ('dashboard/create/index', ['genres' => $genre]);
    }

    public function store(FilmRequest $request)
    {
        $film = Film::create($request->all());

        if($film) {
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil Menambahkan Daftar Film ');

        }
        return redirect('/dashboard');
    }

    public function edit(Request $request, $id)
    {
        $film = Film::with('genre')->findOrFail($id);

        $genre = Genre::where('id', '!=', $film->genre_id)->get(['id', 'name']);
        
        return view('/dashboard/edit/index', ['edit' => $genre, 'listedit' => $film]);
    }

    public function update(Request $request, $id)
    {
        $film = Film::findOrFail($id);
        $film->update($request->all());
        if($film) {
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil Update Film ');

        }
        return redirect('/dashboard');
    }

    public function destroy($id)
    {
        $hancurkanData = Film::findOrFail($id);
        $hancurkanData->delete();
        if($hancurkanData) {
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil Menghapus Film ');

        }
        return redirect('/dashboard')->with('success', 'Data berhasil Di Hancurkan');
    }

    public function delete($id)
    {
        $hapus = Film::findOrFail($id);
        return view('/dashboard/delete/index', ['hapus' => $hapus ]);
    }
}
