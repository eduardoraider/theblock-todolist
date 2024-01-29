<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Homepage
Route::get('/', [TodoController::class, 'index'])->name('index');

// Return full list of tasks
Route::get('/todolist', [TodoController::class, 'index']);

// Create a new task
Route::post('/todolist/create', [TodoController::class, 'create'])->name('create');

// Update the task status
Route::put('/todolist/update/{id}', [TodoController::class, 'update'])->name('update');

// Delete the task
Route::delete('/todolist/delete/{id}', [TodoController::class, 'delete'])->name('delete');