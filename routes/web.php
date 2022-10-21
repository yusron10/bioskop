<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'admin']);

Route::get('/create', [DashboardController::class, 'create'])->middleware(['auth', 'admin']);
Route::post('/create', [DashboardController::class, 'store'])->middleware(['auth', 'admin']);

Route::get('/edit/{id}', [DashboardController::class, 'edit'])->middleware(['auth', 'admin']);
Route::put('/edit/{id}', [DashboardController::class, 'update'])->middleware(['auth', 'admin']);

Route::get('/hapus/{id}', [DashboardController::class, 'delete'])->middleware(['auth', 'admin']);
Route::delete('/hapus/{id}', [DashboardController::class, 'destroy'])->middleware(['auth', 'admin']);

Route::get('/dashboard-user', [UserController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/dashboard-user/{id}', [UserController::class, 'destroy'])->middleware(['auth', 'admin']);
Route::delete('/dashboard-user/{id}', [UserController::class, 'destroy'])->middleware(['auth', 'admin']);
Route::post('/', [FilmController::class, 'createUlasan'])->middleware('auth');

Route::get('/history/{id}', [HistoryController::class, 'index'])->middleware('auth');
