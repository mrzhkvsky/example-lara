<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::get('/user', function (Request $request) {
    return User::all();
});

Route::post('/user', [UserController::class, 'create']);
Route::post('/bid', [BidController::class, 'create']);
Route::get('/stats/user/{id}/bid', [StatsController::class, 'getBidsStats']);
