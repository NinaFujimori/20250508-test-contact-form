<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;


Route::get('/', [ContactController::class,'index']);
Route::post('contacts/confirm',[ContactController::class,'confirm']);
Route::post('/contacts',[ContactController::class,'store']);

Route::get('/register',[AuthController::class,'indexRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login',[AuthController::class,'indexLogin']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'index']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::delete('/contacts/{id}', [AuthController::class, 'destroy']);

Route::get('/admin/search', [AuthController::class, 'search']);