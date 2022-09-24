<?php

use App\Http\Controllers\MayoristaController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth'], function() {
    Route::post('/mayorista', [MayoristaController::class, 'store'])->name('mayorista-store');
    Route::get('/mayoristas/{search?}', [MayoristaController::class, 'list'])->name('mayorista-list');
});
