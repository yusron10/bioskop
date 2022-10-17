<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
	public function index()
	{
		$film = Film::with('genre')->get();
		$genre = Genre::get();

		return view('home', ['films' => $film, 'genres' => $genre ]);
	}
}
