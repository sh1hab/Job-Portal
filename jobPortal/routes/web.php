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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/company','CompanyController@create')->name('company');
Route::post('/company','CompanyController@store')->name('company.register');

Route::get('/job','JobController@create')->name('job');
Route::post('/job','JobController@store')->name('job.register');

Route::post('/job/apply','JobController@store')->name('job.apply');


