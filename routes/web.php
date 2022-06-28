<?php

use App\Http\Controllers\API\ContentController;
use App\Http\Controllers\ProdukController;
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

// Route::get('/', function () {
//     return view('content');
// });

Route::get('/content', [ContentController::class, 'index']);
Route::get('/', [ProdukController::class, 'index']);
Route::get('/produk/data_ajax', [ProdukController::class, 'data_ajax']);
