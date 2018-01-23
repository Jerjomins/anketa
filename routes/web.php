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
Route::post('quiz-start', 'QuizController@start')->name('quiz.start');
Route::get('quiz-finish', 'QuizController@finish')->name('quiz.finish');
Route::post('quiz-finish', 'QuizController@store')->name('quiz.store');
Route::post('answers', 'AnswersController@get')->name('answers.get');
Route::post('save-answer', 'AnswersController@save')->name('answer.save');
Route::get('results', 'ResultsController@index')->name('results');
Route::any('{all}', function () {
    return abort(404);
})->where('all', '.*');