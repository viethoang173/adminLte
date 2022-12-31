<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
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

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);

    Route::get('/profile', [AdminController::class, 'proFile'])->name('profile');
});

Route::prefix('admin/project')->group(function () {
    Route::get('', [ProjectController::class, 'index']);
    Route::get('/{search}', [ProjectController::class, 'search'])->name('project.search');
    Route::get('/add', [ProjectController::class, 'pageAdd']);
    Route::post('/store', [ProjectController::class, 'Add']);
    Route::get('/detail', [ProjectController::class, 'pageDetail']);
    Route::get('/edit/{id}', [ProjectController::class, 'pageEdit']);
    Route::post('/edit/{id}', [ProjectController::class, 'Edit']);
    Route::post('/delete/{id}', [ProjectController::class, 'Delete']);
});
