<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\UserController;
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
    return redirect(route('home'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->resource('manage-majors', MajorController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('manage-courses', CourseController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('manage-levels', LevelController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('manage-years', YearController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('manage-users', UserController::class);
