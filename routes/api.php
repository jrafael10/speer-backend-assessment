<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/signup', [RegisterController::class, '__invoke']);
Route::post('auth/login', [LoginController::class, '__invoke']);

Route::middleware(['auth:sanctum', 'throttle:100,1'] )->group(function () {
    Route::post('notes/{note}/share', [Api\SharedNoteController::class, 'store']);
    Route::get('/search', [NoteController::class, 'searchByKeyword']);
    Route::apiResource('notes', NoteController::class);

});


