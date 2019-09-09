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

// Login/Registration Functions
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth:api'], function() {
    // Student Functions
    Route::get('students', 'StudentController@index');
    Route::get('students/{id}', 'StudentController@show');
    Route::post('students', 'StudentController@store');
    Route::put('students/{id}', 'StudentController@update');
    Route::delete('students/{id}', 'StudentController@delete');

    // Worksheet Functions
    Route::get('worksheet', 'WorksheetController@index');
    Route::get('worksheets/{id}', 'WorksheetController@show');
    Route::post('worksheets', 'WorksheetController@store');
    Route::put('worksheets/{id}', 'WorksheetController@update');
    Route::delete('worksheets/{id}', 'WorksheetController@delete');

    // Question Functions
    Route::get('question', 'QuestionController@index');
    Route::get('questions/{id}', 'QuestionController@show');
    Route::post('questions', 'QuestionController@store');
    Route::put('questions/{id}', 'QuestionController@update');
    Route::delete('questions/{id}', 'QuestionController@delete');

    // Answer Functions
    Route::get('answer', 'AnswerController@index');
    Route::get('answers/{id}', 'AnswerController@show');
    Route::post('answers', 'AnswerController@store');
    Route::put('answers/{id}', 'AnswerController@update');
    Route::delete('answers/{id}', 'AnswerController@delete');
});

    
