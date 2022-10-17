<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
	public function index(Request $request)
	{
		$keyword = $request->keyword;
		$g = Genre::select('id', 'name')->with('film')->get();
		$film = Film::with('genre')->where('judul', 'LIKE', '%'.$keyword.'%')->orWherehas('genre', function($query) use($keyword){
			$query->where('name', 'LIKE', '%'.$keyword.'%'); 
		})->paginate(1);


		return view('home', ['films' => $film, 'gs' => $g]);
	}
}
