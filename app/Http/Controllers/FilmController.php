<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;
use App\Models\Genre;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class FilmController extends Controller
{
	public function index(Request $request)
	{
		$keyword = $request->keyword;
		$g = Genre::select('id', 'name')->with('film')->get();
		$film = Film::with(['tag','genre', 'ulasan'])->where('judul', 'LIKE', '%'.$keyword.'%')->orWherehas('genre', function($query) use($keyword){
			$query->where('name', 'LIKE', '%'.$keyword.'%');
		})->paginate(2);



		return view('home', ['films' => $film, 'gs' => $g]);
	}
	
	public function createUlasan(Request $request)
	{
		 Ulasan::create($request->all());

		 return redirect('/');
	}
}
