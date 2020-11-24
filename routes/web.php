<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/master', function(){
    return view('admin.layout.master');
});

/*
//SOAL 1
Route::get('/', function(){
    return view('konten.index');
});

Route::get('/data-tables', function(){
    return view('konten.datatables');
});

Route::get('/data-tables', function(){
    return view('konten.datatables');
});

*/

Route::get('/pertanyaan', 'PertanyaanController@index');

Route::get('/pertanyaan/create', 'PertanyaanController@create');

Route::post('/pertanyaan', 'PertanyaanController@store');

Route::get('pertanyaan/{id}', 'PertanyaanController@show');

Route::get('pertanyaan/{id}/edit', 'PertanyaanController@edit');

Route::put('pertanyaan/{id}', 'PertanyaanController@update');

Route::delete('pertanyaan/{id}', 'PertanyaanController@destroy');