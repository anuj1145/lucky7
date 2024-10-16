<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[GameController::class,'index'])->name('home');
Route::get('/play',[GameController::class,'play'])->name('play');
Route::get('/play_again',[GameController::class,'play_again'])->name('play_again');
Route::get('/reset',[GameController::class,'reset'])->name('reset');
