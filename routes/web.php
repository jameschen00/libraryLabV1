<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

//Route::resource('books', 'App\Http\Controllers\BookController');
//Route::resource('votings', 'App\Http\Controllers\VotingController');
//Route::resource('students', 'App\Http\Controllers\StudentController');
//   ->middleware('auth:web');
//
//Route::get('/login', 'App\Http\Controllers\LoginController@login')->name('login');
//

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// middleware will redirect to 'login'
//Route::group(['middleware'=>'auth'], function(){
//Route::resource('books', 'App\Http\Controllers\BookController');
//Route::resource('votings', 'App\Http\Controllers\VotingController');
//});

Route::resource('books', 'App\Http\Controllers\BookController')
    ->middleware('auth');

Route::resource('votings', 'App\Http\Controllers\VotingController')
    ->middleware('auth');
