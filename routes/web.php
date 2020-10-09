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

Route::get('/', [\App\Http\Controllers\LoginController::class, 'home'])
    ->name('home');


Route::middleware(['guest'])->group(function () {
    Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'form'])
        ->name('register');

    Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'register']);


    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])
        ->name('login');

    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'check']);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/link', [\App\Http\Controllers\LinkController::class, 'link'])
        ->name('link');

    Route::post('/link', [\App\Http\Controllers\LinkController::class, 'generate_link'])
        ->name('link');

    Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])
        ->name('logout');

    Route::get('/delete/{id}', [\App\Http\Controllers\AdminController::class, 'delete'])
        ->name('delete');

    Route::get('/{short_link}', [\App\Http\Controllers\LinkController::class, 'redirect'])
        ->name('redirect');

    Route::get('/update/{id?}', [\App\Http\Controllers\AdminController::class, 'find'])
        ->name('update');

    Route::post('/update/{id?}', [\App\Http\Controllers\AdminController::class, 'update'])
        ->name('update');


});

