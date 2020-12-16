<?php

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

Route::get('/', 'HomeController@index');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    Route::get('/import', 'HomeController@import')->name('import')->middleware('admin');
});

Auth::routes();

Route::resource('post', 'PostController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
