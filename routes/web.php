<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VenueController;
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
// backend routes start

Auth::routes();
Route::resource('genres', GenreController::class);
Route::resource('artists', ArtistController::class);
Route::resource('venues', VenueController::class);
Route::resource('events', EventController::class);
Route::resource('settings', SettingController::class);
// backend routes end

// frontend routes start
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[IndexController::class, 'index'])->name('index');
Route::get('/search',[IndexController::class, 'getEvent'])->name('search.event');
Route::get('advanced/search/',[IndexController::class, 'getAdvancedEvent'])->name('advance.search.event');

// frontend routes end