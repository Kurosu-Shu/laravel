<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

Route::group(['middleware' => 'jwt'], function () {
   Route::get('/blog', [classname::class, 'index']);
});

Route::group(['prefix' => 'blog'], function () {
    Route::get("/", [BlogController::class, 'index']); // get all list

    Route::post("/", [BlogController::class, 'store']);

    Route::get("/{id}", [BlogController::class, 'show']);

    Route::put("/{id}",[BlogController::class, 'update']);

    Route::delete("/{id}", [BlogController::class, 'destory']);
});


