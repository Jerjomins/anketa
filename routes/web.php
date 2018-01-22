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

Route::get('/', 'QuizController@index')->name('quiz');
Route::post('question', 'QuizController@start')->name('quiz.start');
Route::post('answers', 'AnswersController@get')->name('answers.get');