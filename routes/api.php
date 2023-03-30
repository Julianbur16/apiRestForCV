<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('clients',[ClientController::class, 'index']);
Route::post('clients',[ClientController::class, 'store']);
Route::get('clients/{client}',[ClientController::class, 'show']);
Route::put('clients/{client}',[ClientController::class, 'update']);
Route::delete('clients/{client}',[ClientController::class, 'destroy']);

Route::middleware(['cors'])->group(function () {
    Route::post('/hogehoge', 'Controller@hogehoge');
});

