<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\FilmRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        $newName = '';

        if($request->file('foto')){

            $extension = $request->file('foto')->getClientOriginalExtension();

            $newName = $request->judul.'-'.now()->timestamp.'.'.$extension;

            $request->file('foto')->storeAs('foto', $newName);

        }
        $request['image'] = $newName;

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
        $cover = '';
        if ($request->file('img')) {
            $newfoto = $request->file('img')->store('foto');
            $request['image'] = basename($newfoto);
            $cover = Film::findOrFail($id);
            Storage::delete('foto/'.$cover->image);
        }
        $cover->update($request->all());
        if($cover) {
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil Update Film ');

        }
        return redirect('/dashboard');
    }

    public function destroy(Film $film, $id)
    {
        $film = Film::findOrFail($id);
        if ($film->image) {
            Storage::delete('foto/'.$film->image);
        }
        $film->delete();
        if($film) {
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil Menghapus Film ');

        }
        return redirect('/dashboard');
    }

    public function delete($id)
    {
        $hapus = Film::findOrFail($id);
        return view('/dashboard/delete/index', ['hapus' => $hapus ]);
    }
}
