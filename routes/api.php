<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SortController;
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

Route::get('/Sort', [SortController::class, 'index'] );
Route::post('/Sort', [SortController::class, 'setsort'] );
Route::patch('/Sort/{id}', [SortController::class, 'updatesort'] );
Route::delete('/Sort/{id}', [SortController::class, 'deletesort'] );
