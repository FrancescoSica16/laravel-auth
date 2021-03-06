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

Route::get('/', function () {
    return view('guests.home');
});

Auth::routes();

Route::middleware('auth') //devi essere autenticato     
->namespace('Admin')      // prrendi i controller delle route tue figlie a partire dalla cartella Admin/
->prefix('admin')         // inserisci come prefisso nelle URI di tutte le route figlie di admin
->name('admin.')          // inserisci come prefisso per ogni nome di tutte le route figlie "admin."
->group(function(){       // e raggruppale in

    // tutte le rotte che iniziano con prefisso " "
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
    // Route::get('singlePost', 'HomeController@show')->name('singlePost');

});
// Route::middleware('auth')->get('/admin', 'Admin\HomeController@index')->name('admin.home');

// Route::get('/home', 'HomeController@index')->name('home');
