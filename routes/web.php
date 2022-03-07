<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', [PostController::class, 'getUsers']);
Route::get('/singlePost/{id}', [PostController::class, 'singlePost']);
Route::get('/addpostapi', [PostController::class, 'addpostview']);
Route::post('/store', [PostController::class, 'addData']);
