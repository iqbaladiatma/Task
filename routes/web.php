<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Routing di Laravel itu seperti peta yang memberitahu aplikasi web ke mana harus pergi ketika seseorang mengunjungi alamat tertentu di internet
Route::resource('tasks', TaskController::class);
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
// ini adalah route untuk mengedit task, yang jika kita membukan di localhost/tasks/edit/1 maka akan diarahkan ke halaman edit task dengan id 1 
Route::get('/tasks/edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
// ini adalah route untuk membuat task, yang jika kita membukan di localhost/tasks/create maka akan diarahkan ke halaman create task
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
