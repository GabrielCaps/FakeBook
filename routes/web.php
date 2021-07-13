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

Route::redirect('/', '/pt_BR');

Route::group(['prefix' => '{language}'], function () {

	Auth::routes();
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


	Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');


	/*---Posts---*/


			Route::prefix('post')->group(function () {
					Route::post('/create', [App\Http\Controllers\PostsController::class, 'store'])->name('post.create');
					Route::delete('/delete{id}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('post.destroy');
					Route::post('/edit{id}', [App\Http\Controllers\PostsController::class, 'edit'])->name('post.edit');
			});


	/*---Comments---*/


			Route::prefix('Comments')->group(function () {
					Route::post('/create', [App\Http\Controllers\CommentsController::class, 'store'])->name('comment.create');
					Route::delete('/delete{id}', [App\Http\Controllers\CommentsController::class, 'destroy'])->name('comment.destroy');
					Route::post('/edit{id}', [App\Http\Controllers\CommentsController::class, 'edit'])->name('comment.edit');
			});

			Route::prefix('User')->group(function () {
					Route::delete('/delete{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
					Route::post('/edit{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
					Route::get('/show{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
			});

});