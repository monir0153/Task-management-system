<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $tasks = Task::latest()->get();
    $userId = Auth::id();
    $userTask = Task::where('user_id', $userId)->get();
    return view('dashboard', ['tasks' => $tasks, 'userTask' => $userTask]);
})->middleware(['auth', 'verified'])->name('dashboard');

// auth routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->controller(UserController::class)->group(function () {
    Route::get('/user', 'index')->name('user.index');
    Route::get('/user/create', 'create')->name('user.create');
    Route::post('/user', 'store')->name('user.store');
    Route::post('user/task/{id}', 'taskStatus')->name('user.taskStatus');
});

Route::middleware('auth')->controller(TaskController::class)->group(function () {
    Route::get('task', 'index')->name('task.index');
    Route::get('task/create', 'create')->name('task.create');
    Route::post('task', 'store')->name('task.store');
});

require __DIR__ . '/auth.php';
