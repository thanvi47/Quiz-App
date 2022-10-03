<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
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

Route::post('examquiz/store',[App\Http\Controllers\ExamController::class ,'postQuiz'])->name('quiz.store')->middleware('auth');
Route::get('/result/user/{userId}/quiz/{quizId}',[App\Http\Controllers\ExamController::class ,'viewResult'])->name('result')->middleware('auth');

Route::group(['middleware'=>'isAdmin'],function(){
    Route::get('/', function () {
        return view('admin.index');
    });
Route::resource('quiz','App\Http\Controllers\QuizController');
Route::resource('question','App\Http\Controllers\QuestionController');
Route::resource('user','App\Http\Controllers\UserController');
Route::get('quiz/{id}/question','App\Http\Controllers\QuizController@question')->name('quiz.question');
Route::get('result',[App\Http\Controllers\ExamController::class ,'result']);
Route::get('result/{userId}/{quizId}',[App\Http\Controllers\ExamController::class ,'userQuizResult']);

});
Route::resource('exam','App\Http\Controllers\ExamController');

