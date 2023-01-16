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
Route::get('/todo', [\App\Http\Controllers\TodoController::class, 'index'])->name('todo-index');

Route::get('/todo/create', [\App\Http\Controllers\TodoController::class, 'create'])->name('todo-form');
Route::post('/todo/create', [\App\Http\Controllers\TodoController::class, 'store']);

Route::get('/todo/{id}', [\App\Http\Controllers\TodoController::class, 'show' ])->name('todo-show');
Route::get('/todo/edit/{id}', [\App\Http\Controllers\TodoController::class, 'edit'])->name('todo-edit');
Route::post('/todo/update/{id}', [\App\Http\Controllers\TodoController::class, 'update']);

Route::get('/todo/delete/{id}', [\App\Http\Controllers\TodoController::class, 'destroy']);
