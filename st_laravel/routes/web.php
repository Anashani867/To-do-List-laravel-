<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Route::middleware(['admin'])->group(function () {
//    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
//
//    Route::get('/admin/tasks', [AdminController::class, 'taskList'])->name('admin.tasks');
//    Route::get('/admin/tasks/{task}/edit', [AdminController::class, 'editTask'])->name('admin.task.edit');
//    Route::post('/admin/tasks/{task}/update', [AdminController::class, 'updateTask'])->name('admin.task.update');
//    Route::delete('/admin/tasks/{task}', [AdminController::class, 'deleteTask'])->name('admin.task.delete');
//    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//
//});

//Route::get('/', [AdminMiddleware::class, 'handle'])->name('home');

//Route::middleware(['admin'])->group(function () {
//    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
//});



//Route::middleware(['auth'])->group(function () {
//    Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
//    Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
//    Route::put('/todos/{id}', [TodoController::class, 'update'])->name('todos.update');
//    Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');
//    Route::patch('/todos/{id}/status', [TodoController::class, 'updateStatus'])->name('todos.updateStatus');
//});
//
//
//Route::middleware(['auth', 'admin'])->group(function () {
//    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//    Route::delete('/admin/todos/{id}', [AdminController::class, 'destroyTodo'])->name('admin.todos.destroy');
//    Route::resource('/admin/users', AdminController::class);
//});

//
//Route::middleware(['admin'])->group(function () {
//    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
//});



Route::middleware(['auth'])->group(function () {
    Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
    Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
    Route::put('/todos/{id}', [TodoController::class, 'update'])->name('todos.update');
    Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::delete('/admin/todos/{id}', [AdminController::class, 'destroyTodo'])->name('admin.todos.destroy');
});



