<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\LoginController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [LoginController::class, 'masuk'])->name('login');
Route::post('/login', [LoginController::class, 'cek']);
Route::get('/logout', [LoginController::class, 'keluar'])->middleware('auth');

Route::get('/', [FilmController::class, 'index'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/create', [DashboardController::class, 'create']);
Route::post('/create', [DashboardController::class, 'store']);

Route::get('/edit/{id}', [DashboardController::class, 'edit']);
Route::put('/edit/{id}', [DashboardController::class, 'update']);

Route::get('/hapus/{id}', [DashboardController::class, 'delete']);
Route::delete('/hapus/{id}', [DashboardController::class, 'destroy']);
