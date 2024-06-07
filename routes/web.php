<?php

use App\Http\Controllers\{IvaoController};
use App\Livewire\Admin\AtcBooking as AdminAtcBooking;
use App\Livewire\Admin\AtcBookingView;
use App\Livewire\Website\{AtcBooking, Home, PilotBooking};
use Illuminate\Support\Facades\{Auth, Route};

use App\Livewire\Admin\Home as AdminHome;
use App\Livewire\Admin\PilotBooking as AdminPilotBooking;
use App\Livewire\Admin\PilotBookingView;
use Tests\Feature\Livewire\Admin\AtcBookingTest;

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
    Route::prefix('booking')->group(function () {
        Route::get('pilot', PilotBooking::class)->name('book.pilot');
        Route::get('atc', AtcBooking::class)->name('book.atc');
        Route::get('atc/view', AtcBookingView::class)->name('booking.atc.view');
        Route::get('pilot/view', PilotBookingView::class)->name('booking.pilot.view');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/pilot', AdminPilotBooking::class)->name('admin.pilot');
        Route::get('/atc', AdminAtcBooking::class)->name('admin.atc');
    });
    Route::get('/dashboard', AdminHome::class)->name('dashboard');
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
