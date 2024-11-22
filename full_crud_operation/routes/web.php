<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CreateController;
use Illuminate\Support\Facades\Auth;

// Home Route
Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
})->name('home')->middleware('guest');

// Authentication Routes
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UserController::class, 'register']);
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserController::class, 'login']);
});

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard and Destinations
    Route::resource('destinations', DestinationController::class)->except(['show']);
    Route::get('/destinations/create', [CreateController::class, 'create'])->name('destinations.create');
    Route::post('/destinations', [CreateController::class, 'store'])->name('destinations.store');
    
    // User logout
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DestinationController::class, 'index'])->name('dashboard');
});