<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransfersController;

Auth::routes();
Route::get('/',                 [HomeController::class, 'index']);
Route::get('/home',             [HomeController::class, 'index'])->name('home');

    #Transfer Routes
Route::get('/history',          [TransfersController::class, 'index']);
Route::get('/transfer/create',  [TransfersController::class, 'edit']);
Route::post('/transfer/{id}',   [TransfersController::class, 'update']);




