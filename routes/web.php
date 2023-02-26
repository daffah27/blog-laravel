<?php

use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\PostinganController;
use App\Models\kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Kernel;
use App\Http\Middleware;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Gate;

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



Route::get('/profile', function () {
    return view('profile', ["name" => "daffah", "title" => "Profile", 'active' => 'Profile']);
});

Route::get('/', function () {
    return view('home', ["title" => "Home", 'active' => 'Home']);
});

Route::get('/postingan', [PostinganController::class, 'index']);

Route::get('/postingan/{id}', [PostinganController::class, 'show']);

Route::get('/kategori', [KategoriController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/kategori', AdminKategoriController::class);;