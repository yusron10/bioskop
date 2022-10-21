<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index($id)
    {
        $ul = Ulasan::with('film')->where('user_id', $id)->get();
        return view('/dashboard/history', ['ul' => $ul]);
    }
}
