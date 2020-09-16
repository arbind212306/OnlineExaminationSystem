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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth' => 'admin'], 'prefix' => '/admin'], function() {
    Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('dashboard');
    // exam routes
    Route::get('/exam', 'Admin\ExamController@show')->name('exams');
    Route::get('/exam/add', 'Admin\ExamController@add')->name('exam.add');
    Route::post('/exam/create', 'Admin\ExamController@create')->name('exam.create');
    Route::get('/exam/edit/{id}', 'Admin\ExamController@edit')->name('exam.edit');
    Route::put('/exam/edit/{id}', 'Admin\ExamController@update')->name('exam.update');
    Route::delete('/exam/delete/{id}', 'Admin\ExamController@destroy')->name('exam.delete');
    
    // question routes
    Route::get('/questions', 'Admin\QuestionController@show')->name('questions');
    Route::get('/question/add', 'Admin\QuestionController@add')->name('question.add');
    Route::post('/question/create', 'Admin\QuestionController@create')->name('question.create');
    Route::get('/question/edit/{id}', 'Admin\QuestionController@edit')->name('question.edit');
    Route::put('/question/edit/{id}', 'Admin\QuestionController@update')->name('question.update');
    Route::delete('/question/delete/{id}', 'Admin\QuestionController@destroy')->name('question.delete');

    // options routes
    Route::get('/options', 'Admin\OptionController@show')->name('options');
    Route::get('/option/add', 'Admin\OptionController@add')->name('option.add');
    Route::post('/option/create', 'Admin\OptionController@create')->name('option.create');
    Route::get('/option/edit/{id}', 'Admin\OptionController@edit')->name('option.edit');
    Route::put('/option/edit/{id}', 'Admin\OptionController@update')->name('option.update');
    Route::delete('/option/delete/{id}', 'Admin\OptionController@destroy')->name('option.delete');

    // user routes for admin
    Route::get('/users', 'Admin\UserController@show')->name('users');
    Route::get('/user/add', 'Admin\UserController@add')->name('user.add');
    Route::post('/user/create', 'Admin\UserController@create')->name('user.create');
    Route::get('/user/edit/{id}', 'Admin\UserController@edit')->name('user.edit');
    Route::put('/user/edit/{id}', 'Admin\UserController@update')->name('user.update');
    Route::delete('/user/delete/{id}', 'Admin\UserController@destroy')->name('user.delete');
    Route::get('/user/change/status/{id}', 'Admin\UserController@change_status')->name('user.change.status');
    Route::get('/users/enrolled', 'Admin\UserController@enroll')->name('admin.user.enroll');
    Route::get('/users/enrolled/change-status/{id}', 'Admin\UserController@change_enrolled_user_status')->name('change.status.enrolled.user');
    Route::get('/users/qualified-candidate', 'Admin\UserController@qualified_candidate')->name('user.qualified');
    Route::get('/users/disqualified-candidate', 'Admin\UserController@disqualified_candidate')->name('user.disqualified');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/login', 'Auth\LoginController@showLoginForm');
Route::post('/admin/login', 'Auth\LoginController@adminLogin')->name('admin.login');

Route::get('/user/assesment-test/{id}', 'UserController@assesment')->name('user.assesment')->middleware('exam');
Route::get('/user/exam/assesment-test/question/{id}', 'UserController@question')->name('user.exam.question');
Route::get('/user/exam/assesment-test/question/save-answer/{id}', 'UserController@save_answer')->name('user.exam.answer.save');
Route::post('/user/enroll', 'UserController@enroll_user')->name('enroll.user');
Route::get('/user/submit/test/{id}', 'UserController@submit_test')->name('user.submit.test');
