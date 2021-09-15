<?php
declare(strict_types=1);

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::resource('users', UserController::class);
Route::resource('notifications', NotificationController::class);


//Use a group route

Route::group(['prefix' => 'channels'], function () {
    Route::get('/', [NotificationController::class, 'channels']);
    Route::get('/toggle/{channel_id}', [NotificationController::class, 'toggle']);
});

