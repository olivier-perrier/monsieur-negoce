<?php

use App\Http\Controllers\PostController;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Articles
Route::get('/articles', 'ArticleController@index')->name('articles.index');
Route::get('/articles/create', 'ArticleController@create');
Route::post('/articles', 'ArticleController@store');
Route::get('/articles/{article}', 'ArticleController@show')->name('articles.show');
Route::get('/articles/{article}/edit', 'ArticleController@edit');
Route::put('/articles/{article}', 'ArticleController@update');
Route::delete('/articles/{article}', 'ArticleController@destroy');

// Projects
Route::get('/projects', 'ProjectController@index')->name('projects.index');
Route::get('/projects/create', 'ProjectController@create');
Route::post('/projects', 'ProjectController@store');
Route::get('/projects/{project}', 'ProjectController@show')->name('projects.show');


// Négociations
Route::get('/negotiations', 'NegotiationController@index')->name('negotiations.index');
Route::get('/negotiations/{negotiation}', 'NegotiationController@show')->name('negotiations.show');

// Notes
Route::post('/notes', 'NoteController@store');


// Users
Route::get('/users/{user}', 'UserController@show')->name('users.show');
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('/users/{user}', 'UserController@update');

// Administation
Route::get('/admin/users', 'Admin\UserController@index')->name('admin.users.index');
Route::get('/admin/projects', 'Admin\ProjectController@index')->name('admin.projects.index');

Route::post('/admin/users/{user}/validate', 'Admin\UserController@validateUser');
Route::put('/admin/projects/{project}/associate', 'Admin\ProjectController@associateUser');


Route::delete('/admin/users/{user}', 'Admin\UserController@destroy');
Route::delete('/admin/projects/{project}', 'Admin\ProjectController@destroy');

// File
Route::post('/file/upload', 'FileController@upload');


Route::get('/about', function () {
    return view('about');
});

Route::get('/faq', function () {
    return view('faq');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
