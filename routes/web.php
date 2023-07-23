<?php

use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('/', function(){
    return redirect(route('leaderboard.index'));
});

Route::resource('leaderboard', LeaderboardController::class)->only(['index']);

Route::resource('task', TaskController::class)
->only(['index', 'create', 'store', 'show', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::put('/task/{task}/completed', [TaskController::class, 'updateCompleted'])
->middleware(['auth', 'verified'])
->name('task.completed');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
