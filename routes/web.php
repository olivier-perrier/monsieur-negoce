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

// Projects
Route::get('/projects', 'ProjectController@index')->name('projects.index');
Route::get('/projects/create', 'ProjectController@create')->name('projects.create');
Route::post('/projects', 'ProjectController@store')->name('projects.store');
Route::get('/projects/{project}', 'ProjectController@show')->name('projects.show');
Route::get('/projects/{project}/edit', 'ProjectController@edit');
Route::put('/projects/{project}', 'ProjectController@update');
Route::delete('/projects/{project}', 'ProjectController@destroy');


// Négociations

Route::get('/negotiations', 'NegotiationController@index')->name('negotiations.index');
Route::get('/negotiations/{negotiation}', 'NegotiationController@show')->name('negotiations.show');


// Notes
Route::post('/notes', 'NoteController@store')->name('notes.store');


// Users
Route::get('/users/{user}/cashings', 'User\CashingController@index')->name('users.cashings.index');
Route::post('/users/{user}/cashings/payment', 'User\CashingController@payment')->name('users.cashings.payment');

Route::get('/users/{user}', 'UserController@show')->name('users.show');
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('/users/{user}', 'UserController@update')->name('users.update');

// Administation
Route::get('/admin/users', 'Admin\UserController@index')->name('admin.users.index');
Route::get('/admin/projects', 'Admin\ProjectController@index')->name('admin.projects.index');

Route::put('/admin/projects/{project}', 'Admin\ProjectController@update')->name('admin.projects.update');

Route::post('/admin/users/{user}/validate', 'Admin\UserController@validateUser')->name('admin.users.validate');
Route::put('/admin/projects/{project}/associate', 'Admin\ProjectController@associateUser')->name('admin.projects.associate');


Route::delete('/admin/users/{user}', 'Admin\UserController@destroy')->name('admin.users.delete');
Route::delete('/admin/projects/{project}', 'Admin\ProjectController@destroy')->name('admin.projects.delete');

// File
Route::post('/file/upload', 'FileController@upload')->name('file.upload');
Route::get('/file/download/{file}', 'FileController@download')->name('file.download');


Route::get('/about', function () {
    return view('about');
})->name('about.index');

Route::get('/faq', function () {
    return view('faq');
})->name('faq.index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
