<?php

use App\Http\Controllers\PostController;
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

// Notifications
Route::post('/notifications', 'NotificationController@store');


// Users
Route::get('/users/{user}', 'UserController@show')->name('users.show');
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('/users/{user}', 'UserController@update');

// Administation
Route::get('/admin/clients', function () {
    return view('admin.clients.index', ['clients' => User::all()]);
})->name('admin.clients.index');

Route::post('/admin/users/{user}/validate', function (User $user) {
    $user->validated = true;
    $user->save();
    return redirect(route('admin.clients.index'));
});

Route::get('/admin/negotiators', 'AdminController@index')->name('negotiations.index');


Route::get('/about', function () {
    return view('about');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
