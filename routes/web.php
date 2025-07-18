<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Models\User;
use App\Models\Booking;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalUsers = User::count();
    $totalBookings = Booking::count(); // Make sure Booking model/table exists

    return view('dashboard', compact('totalUsers', 'totalBookings'));
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('bookings', BookingController::class);





});
Route::resource('users', UserController::class);

require __DIR__ . '/auth.php';
