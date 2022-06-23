<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/company','CompanyController@index')->name('company');
Route::post('/company','CompanyController@store')->name('company.register')->middleware('auth');

Route::get('/job','JobController@create')->name('job');
Route::post('/job','JobController@store')->name('job.register');
Route::get('/jobs','JobController@index')->name('jobs');
Route::delete('/job/{id}','JobController@destroy')->name('job.destroy');
Route::get('/job/{job}','JobController@edit')->name('job.edit');

Route::post('/job/apply','ApplicantsController@apply')->name('job.apply')->middleware('auth');

Route::get('/profile','ApplicantsController@getProfile')->name('profile')->middleware('auth');
Route::post('/profile','ApplicantsController@updateProfile')->name('updateProfile')->middleware('auth');
