<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EntityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/entities', [EntityController::class, 'Index']);
Route::get('/entities/{id}', [EntityController::class, 'GetById']);
Route::post('/entities', [EntityController::class, 'Create']);
Route::put('/entities/{id}', [EntityController::class, 'Edit']);
Route::post('entities/deleteAll', [EntityController::class, 'Delete']);
Route::get('/contacts', [ContactController::class, 'Index']);
Route::get('/contacts/{id}', [ContactController::class, 'GetById']);
Route::post('/contacts', [ContactController::class, 'Create']);
Route::put('/contacts/{id}', [ContactController::class, 'Update']);
Route::delete('/contacts/{id}', [ContactController::class, 'Delete']);