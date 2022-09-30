<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
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



Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('examquiz/{quizId}','App\Http\Controllers\ExamController@getQuizQuestions')->middleware('auth');
Route::group(['middleware'=>'isAdmin'],function(){
    Route::get('/', function () {
        return view('admin.index');
    });
Route::resource('quiz','App\Http\Controllers\QuizController');
Route::resource('question','App\Http\Controllers\QuestionController');
Route::resource('user','App\Http\Controllers\UserController');
Route::get('quiz/{id}/question','App\Http\Controllers\QuizController@question')->name('quiz.question');

});
Route::resource('exam','App\Http\Controllers\ExamController');
