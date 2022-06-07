<?php

use App\Http\Controllers\PajakController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemPajakController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/pajak', [PajakController::class, 'index']);
Route::post('/pajak', [PajakController::class, 'store']);
Route::put('/pajak/{id}', [PajakController::class, 'update']);
Route::delete('/pajak/{id}', [PajakController::class, 'destroy']);


Route::get('/item', [ItemController::class, 'index']);
Route::post('/item', [ItemController::class, 'store']);
Route::put('/item/{id}', [ItemController::class, 'update']);
Route::delete('/item/{id}', [ItemController::class, 'destroy']);


Route::get('/item_pajak', [ItemPajakController::class, 'index']);