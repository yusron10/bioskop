<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', '!=', 1)->get();
        return view('/dashboard/user/index', ['user' => $user]);
    }

    public function destroy($id)
    {
        $hps = User::findOrFail($id);
        $hps->delete();

        return redirect('/dashboard/user/index');
    }
}
