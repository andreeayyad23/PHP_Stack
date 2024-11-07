<?php

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
    // Route to display user profile
    Route::get('/profile', function () {
        return 'User  Profile Page';
    });

    // Route to display user settings
    Route::get('/settings', function () {
        return 'User  Settings Page';
    });

    // Route to display user activity
    Route::get('/activity', function () {
        return 'User  Activity Page';
    });
});

// Group of routes for blog-related actions
Route::prefix('blog')->group(function () {
    // Route to display all blog posts
    Route::get('/', function () {
        return 'All Blog Posts';
    });

    // Route to display a specific blog post by ID
    Route::get('/{id}', function ($id) {
        return 'Blog Post ID: ' . $id;
    });

    // Route to create a new blog post
    Route::get('/create', function () {
        return 'Create a New Blog Post';
    });
});