<?php

use App\Http\Controllers\{IvaoController};
use App\Livewire\Website\{Home, PilotBooking};
use Illuminate\Support\Facades\{Auth, Route};


Route::get('/', Home::class)->name('home');


Route::get("/logout", function () {
    Auth::logout();
    return redirect('/');
})->name("ivao.logout");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('book')->group(function () {
        Route::get('pilot', PilotBooking::class)->name('book.pilot');
    });
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});



/**
 * ----------------------
 * /  IVAO SSO ROUTES
 * ----------------------
 */


Route::get('login', function () {
    return redirect()->route('ivao.login-sso');
})->name('login');
Route::get("auth/ivao-sso", [IvaoController::class, "sso"])->name("ivao.login-sso");
Route::get("auth/callback", [IvaoController::class, "sso"])->name("ivao.login-sso-callback");
