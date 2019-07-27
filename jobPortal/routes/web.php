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

Route::get('/company','CompanyController@create')->name('company')->middleware('auth');
Route::post('/company','CompanyController@store')->name('company.register')->middleware('auth');

Route::get('/job','JobController@create')->name('job')->middleware('auth');
Route::post('/job','JobController@store')->name('job.register')->middleware('auth');
Route::get('/jobs','JobController@index')->name('jobs')->middleware('auth');

Route::post('/job/apply','ApplicantsController@apply')->name('job.apply')->middleware('auth');

Route::get('/profile','ApplicantsController@profile')->name('profile')->middleware('auth');
Route::post('/profile','ApplicantsController@updateProfile')->name('updateProfile')->middleware('auth');


