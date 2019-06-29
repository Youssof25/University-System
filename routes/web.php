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

Route::get('/create/application','ApplicationController@create');

Route::post('/create/application','ApplicationController@store');

Route::get('/applications', 'ApplicationController@index');

Route::delete('/delete/application/{id}','ApplicationController@destroy');

Route::get('/edit/application/{id}','ApplicationController@edit');

Route::post('/edit/application/{id}','ApplicationController@update');


Route::get('/profile', 'UserController@profile');

Route::post('/profile/after', 'UserController@update_avatar');

Route::group(['middleware' => ['admin']], function () {

    Route::get('admin/routes', 'HomeController@admin');

    Route::get('/create/course','CourseController@create');

    Route::post('/create/course','CourseController@store');

    Route::get('/courses', 'CourseController@index');

    Route::get('/edit/course/{id}','CourseController@edit');

    Route::post('/edit/course/{id}','CourseController@update');

    Route::delete('/delete/course/{id}','CourseController@destroy');

});