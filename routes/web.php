<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Dashboard\AdminAccommodationController;
use App\Http\Controllers\Dashboard\AdminPrestigeController;
use App\Http\Controllers\PayFastController;
use App\Http\Controllers\PrestigeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

// Public accommodation listing
Route::get('/accommodation', [AccommodationController::class, 'index'])->name('accommodation');
Route::get('/accommodation/{accommodationId}/accommodation-info', [AccommodationController::class, 'show'])->name('accommodationInfo');

// Public prestige/transport listing
Route::get('/transport', [PrestigeController::class, 'index'])->name('transport');
Route::get('/car/{carId}/car-info', [PrestigeController::class, 'show'])->name('carInfo');

// PayFast payment gateway hooks.
// {bookingRef} is embedded into return/cancel URLs at signing time (payBooking()),
// so PayFast returns the customer straight back to their booking context.
Route::get('/payfast/return/{bookingRef}', [PayFastController::class, 'return'])->name('payfast.return');
Route::get('/payfast/cancel/{bookingRef}', [PayFastController::class, 'cancel'])->name('payfast.cancel');
Route::post('/payfast/notify', [PayFastController::class, 'notify'])->name('payfast.notify');

// Booking lifecycle pages — publicly accessible via booking reference
Route::get('/booking/{bookingRef}/success', [BookingController::class, 'success'])->name('booking.success');
Route::get('/booking/{bookingRef}/payment', [PayFastController::class, 'payBooking'])->name('booking.payment');

Route::get('/events', function () {
    return view('events');
})->name('events');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Public booking success & payment pages
Route::get('/booking/{bookingRef}/success', [BookingController::class, 'success'])->name('booking.success');
Route::get('/booking/{bookingRef}/payment', [PayFastController::class, 'payBooking'])->name('booking.payment');

// {type} = accommodation | prestige, {id} = model primary key
Route::get('/checkout/{type}/{id}', [PayFastController::class, 'pay'])
    ->where('type', 'accommodation|prestige')
    ->where('id', '[0-9]+')
    ->name('checkout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Public booking creation — guests can submit a booking without auth
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

Route::middleware('auth')->group(function () {
    Route::prefix('admin-dashboard')->group(function () {

        // Bookings HTML admin page (separate from the JSON apiResource index)
        Route::get('/bookings', [BookingController::class, 'adminIndex'])->name('admin.bookings.adminIndex');

        // Accommodation admin CRUD
        Route::apiResource('/admin-accommodation', AdminAccommodationController::class)->names([
            'index'   => 'admin.accommodation.index',
            'store'   => 'admin.accommodation.store',
            'show'    => 'admin.accommodation.show',
            'update'  => 'admin.accommodation.update',
            'destroy' => 'admin.accommodation.destroy',
        ]);

        // Prestige admin CRUD
        Route::apiResource('/admin-prestige', AdminPrestigeController::class)->names([
            'index'   => 'admin.prestige.index',
            'store'   => 'admin.prestige.store',
            'show'    => 'admin.prestige.show',
            'update'  => 'admin.prestige.update',
            'destroy' => 'admin.prestige.destroy',
        ]);

        // Booking admin management (store is public above)
        Route::apiResource('/admin-bookings', BookingController::class)
            ->except(['store'])
            ->names([
                'index'   => 'admin.bookings.index',
                'show'    => 'admin.bookings.show',
                'update'  => 'admin.bookings.update',
                'destroy' => 'admin.bookings.destroy',
            ]);

        // Booking status transitions (confirm/decline trigger emails)
        Route::patch('/admin-bookings/{booking}/confirm', [BookingController::class, 'confirm'])->name('admin.bookings.confirm');
        Route::patch('/admin-bookings/{booking}/decline', [BookingController::class, 'decline'])->name('admin.bookings.decline');

        // Confirm a pending booking and send the payment email to the customer
        Route::patch('/admin-bookings/{booking}/confirm', [BookingController::class, 'confirm'])
            ->name('admin.bookings.confirm');

        // Form edit pages (not included in apiResource)
        Route::get('/admin-accommodation/{admin_accommodation}/edit', [AdminAccommodationController::class, 'edit'])
            ->name('admin.accommodation.edit');
        Route::get('/admin-prestige/{admin_prestige}/edit', [AdminPrestigeController::class, 'edit'])
            ->name('admin.prestige.edit');

        // Profile management
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
