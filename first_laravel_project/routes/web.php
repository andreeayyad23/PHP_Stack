<?php

use App\Http\Controllers\Controller; // Assuming this is your base controller
use App\Http\Controllers\MiddleController; // Assuming this is your middle controller
use App\Http\Controllers\UserController; // Assuming this is your user controller
use Illuminate\Support\Facades\Route;

// Route for the homepage that returns a view
Route::get('/', function () {
    return view('welcome');
});

// Route that returns "Hello World"
Route::get('/hello', function () {
    return 'Hello World';
});

// Group of routes for user-related actions
Route::prefix('user')->group(function () {
    Route::get('/profile', function () {
        return 'User  Profile Page';
    });

    Route::get('/settings', function () {
        return 'User  Settings Page';
    });

    Route::get('/activity', function () {
        return 'User  Activity Page';
    });
});

// Group of routes for blog-related actions
Route::prefix('blog')->group(function () {
    Route::get('/', function () {
        return 'All Blog Posts';
    });

    Route::get('/link-to-welcome', function () {
        $link = url('/'); // This will point to the homepage (welcome page)
        return '<a href="' . $link . '">Go to Welcome Page</a>';
    });

    Route::get('/{id}', function ($id) {
        return 'Blog Post ID: ' . $id;
    });

    Route::get('/create', function () {
        return 'Create a New Blog Post';
    });

    Route::get('post/{id}/{name}', function ($id, $name) {
        return 'Blog Post ID: ' . $id . " Name: " . $name;
    });

    Route::get('post/example/exercise', function () {
        return 'Blog Post with Example and Exercise';
    })->name('post.example');
});

// Resource routes for users using UserController
Route::resource('users', UserController::class);

// Example of using MiddleController directly for a specific route
Route::get('/use', [MiddleController::class, 'index']);

Route::get('/contact/{id}', [MiddleController::class, 'contact']);
Route::get('/news', [MiddleController::class, 'new']);

?>