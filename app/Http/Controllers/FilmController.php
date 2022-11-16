<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
		if($request['isi'] == []) {
			return redirect('/')->with('this-doesnt-work', 'ANTUM GAK NGISI RABUN KAH?');
		}
		if (Ulasan::where('film_id', $request->film_id)->where('user_id', Auth::id())->first()) {
			return redirect('/')->with('message', 'ANTUM SUDAH KOMEN');
		}
		 $pusing = Ulasan::create($request->all());
		 if ($pusing) {
			Session::flash('message', 'Entahlah');
		 }
		 return redirect('/');
	}
}
