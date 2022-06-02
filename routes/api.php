<?php

use App\Http\Controllers\API\BukuController;
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

Route::get('buku', [BukuController::class, 'index']);
Route::post('buku/store', [BukuController::class, 'store']);
Route::get('buku/show/{id}', [BukuController::class, 'show']);
Route::post('buku/update/{id}', [BukuController::class, 'update']);
Route::get('buku/destroy/{id}', [BukuController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
