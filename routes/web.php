<?php

use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('welcome');});
Route::resource('playlist',PlaylistController::class);
Route::get('musique/{titremus}/playlists', [PlaylistController::class, 'index'])->name('playlist.musique');
Route::get('musique/{notemus}/playlists', [PlaylistController::class, 'index'])->name('playlist.musique');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
