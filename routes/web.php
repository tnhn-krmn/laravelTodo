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
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'verified']], function ()
{
    //Route::get('/todolist', [\App\Http\Controllers\taskController::class, 'index']);
    Route::get('/dashboard', [\App\Http\Controllers\taskController::class, 'index'])->name('dashboard');
    Route::get('/todolist/taskUpdate', [\App\Http\Controllers\taskController::class,'taskUpdate']);
    Route::get('/todolist/delete/{id}', [\App\Http\Controllers\taskController::class,'destroy']);
    Route::get('/todolist/edit/{id}', [\App\Http\Controllers\taskController::class,'edit']);
    Route::get('/todolist/create', [\App\Http\Controllers\taskController::class,'create']);
});






