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

Route::prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index']);
});

Route::prefix('admin/project')->group(function () {
    Route::get('', [\App\Http\Controllers\ProjectController::class, 'index']);
    Route::get('/add', [\App\Http\Controllers\ProjectController::class, 'pageAdd']);
    Route::post('/store', [\App\Http\Controllers\ProjectController::class, 'Add']);
    Route::get('/detail', [\App\Http\Controllers\ProjectController::class, 'pageDetail']);
    Route::get('/edit/{id}', [\App\Http\Controllers\ProjectController::class, 'pageEdit']);
    Route::post('/edit/{id}', [\App\Http\Controllers\ProjectController::class, 'Edit']);
    Route::post('/delete/{id}', [\App\Http\Controllers\ProjectController::class, 'Delete']);

});
