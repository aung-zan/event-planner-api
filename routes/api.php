<?php

use App\Http\Controllers\mobile\v1\AuthController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::controller('ListController')->group(function () {
        Route::get('list', 'list')->name('eventList');
    });

    Route::prefix('event/{id}')->group(function () {
        Route::controller('HomeController')->group(function () {
            Route::get('home/', 'dashboard');
        });

        Route::controller('SpotController')->group(function () {
            Route::get('spots', 'list');
            Route::post('spot/{spot_id}/admission', 'save');
        });

        Route::controller('BoothController')->group(function () {
            Route::get('booths', 'list');
            Route::post('booth/{booth_id}/admission', 'save');
        });

        Route::controller('SeminarController')->group(function () {
            Route::get('seminars', 'list');
            Route::post('seminar/{seminar_id}/admission', 'save');
        });

        Route::controller('SurveyController')->group(function () {
            Route::get('surveys', 'list');
        });

        Route::controller('VisitorController')->group(function () {
            Route::get('visitors', 'list');
        });
    });
});
