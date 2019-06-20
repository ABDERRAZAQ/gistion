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

Route::get('/', function () {
    return view('login');
});
Route::get('Commandements/get/{id}', 'VisiteursController@getCommandements');
Route::get('visiteurs/get/{id}', 'VisiteursController@getCommunes');
Route::get('visites/get/{id}', 'VisiteursController@getCommunes');
Route::get('services/get/{id}', 'VisiteursController@getServices');
Route::get('/downloadPDF/{id}','VisiteursController@downloadPDF');
Route::get('/downloadExel','VisiteursController@export');
Route::get('/statistique', 'ChartController@index');


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::resource('visites' , 'VisitesController');
Route::get('visiteurs/get_datatable', 'VisiteursController@get_datatable');
Route::resource('visiteurs' , 'VisiteursController');





