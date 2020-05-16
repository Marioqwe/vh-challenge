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

Route::get('/questions', 'QuestionController@all')->name('questions');

Route::post('/questions', 'QuestionController@create');

Route::get('/questions/{id}', 'QuestionController@view')->name('question_with_id');

Route::post('/questions/{id}/answer', 'QuestionController@createAnswer');
