<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SerieController;

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

Route::get('/', function () {
    $classement = \App\Models\Serie::orderBy('note','desc')->take(5)->get();
    $recent = \App\Models\Serie::orderBy('premiere','desc')->take(5)->get();
    return view('welcome',['c'=>$classement],['r'=>$recent]);
});
Route::get('/series',[SerieController::class,'listeSerie'])->name('series.liste');
Route::get('/series/{id}',[SerieController::class,'serieInfo'])->name('series.details');
Route::get('/classement',[SerieController::class,'classementSerie'])->name('series.classement');
Route::get('/profile',[SerieController::class,'profile'])->name('profile');

//Route::post("/login", );
