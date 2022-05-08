<?php

use App\Http\Controllers\CakeController;
use App\Http\Controllers\InterestedEmailController;
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

Route::any('/', function () {
    return ['message' => 'welcome'];
});

Route::resource('/cake', CakeController::class)->except('create', 'edit');
Route::resource('/interested-emails', InterestedEmailController::class)->except('create', 'edit');
Route::post('/interested-emails/batch', [InterestedEmailController::class, 'storeBatch']);