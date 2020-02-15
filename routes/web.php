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

Route::resource('/docenten', 'TeacherController')->middleware('checkRole:admin');

//admin needs also auth middleware because if user isn't set auth()->user() is null
Route::get('/admin', function() {
    return view('admin');
})->middleware('admin', 'auth');

Route::get('/manager', function() {
    return view('deadline.show');
})->middleware('deadline', 'auth');

Route::resource('/deadline', 'DeadlineController')->middleware('checkRole:deadline manager');
