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

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('home');
Route::get('/home', 'DashboardController@index')->name('home');
Route::get('/', 'DashboardController@index');

Route::resource('/docenten', 'TeacherController')->middleware('checkRole:admin');
Route::resource('/vakken', 'CourseController')->middleware('checkRole:admin');

Route::get('/vakken/test/{course}', 'TestController@create')->middleware('checkRole:admin');
Route::post('/vakken/test/{course}', 'TestController@store')->middleware('checkRole:admin');

Route::post('/upload/assesment/{course}', 'TestController@uploadAssesment')->middleware('checkRole:admin');
Route::post('/grade/{course}', 'testController@gradeAssesment')->middleware('checkRole:admin');

Route::get('/docenten', 'TeacherController@index')->middleware('checkRole:admin');
