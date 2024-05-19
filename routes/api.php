<?php

use App\Http\Controllers\Api\PilotBookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('pilot/booking', PilotBookingController::class)->only(['index', 'show']);
Route::post('pilot/booking/{vid}', [PilotBookingController::class, 'store']);
