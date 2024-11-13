<?php

use App\Http\Controllers\Controller; // Base controller
use App\Http\Controllers\MiddleController; // Middle controller
use App\Http\Controllers\UserController; // User controller
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User; // User model

// Homepage route displaying a welcome view
Route::get('/', function () {
    return view('welcome');
});

// Route that returns "Hello World" message
Route::get('/hello', function () {
    return 'Hello World';
});

// User routes for profile, settings, and activity pages
Route::prefix('user')->group(function () {
    Route::get('/profile', function () {
        return 'User Profile Page';
    });

    Route::get('/settings', function () {
        return 'User Settings Page';
    });

    Route::get('/activity', function () {
        return 'User Activity Page';
    });
});

// Blog routes for accessing posts and linking to welcome page
Route::prefix('blog')->group(function () {
    Route::get('/', function () {
        return 'All Blog Posts';
    });

    Route::get('/link-to-welcome', function () {
        $link = url('/'); // Points to the homepage
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

// Resource routes for UserController
Route::resource('users', UserController::class);

// Routes using MiddleController for specific functionalities
Route::get('/use', [MiddleController::class, 'index']);
Route::get('/contact/{id}', [MiddleController::class, 'contact']);
Route::get('/news', [MiddleController::class, 'new']);
Route::get('/contacts/{id}', [MiddleController::class, 'shows']);

// Route to insert a new post with a valid user ID
Route::get('/insert', function () {
    // Ensure a user with ID 1 exists or create one
    $user = User::firstOrCreate(
        ['id' => 1],
        [
            'name' => 'Default User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]
    );

    DB::table('posts')->insert([
        'user_id' => $user->id,
        'title' => 'Inserted Post Title',
        'content' => 'This is the content of the post inserted via a route.',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return 'Post inserted successfully!';
});

// Route to fetch and display all posts in JSON format
Route::get('/read', function () {
    $posts = DB::table('posts')->get(); // Fetch all posts
    return response()->json($posts);
});

// Route to update a specific post by ID
Route::get('/update-post/{id}', function ($id) {
    $updatedData = [
        'title' => 'Updated Post Title',
        'content' => 'This is the updated content of the post.',
        'updated_at' => now(),
    ];

    $updated = DB::table('posts')->where('id', $id)->update($updatedData);

    if ($updated) {
        return "Post with ID $id updated successfully!";
    } else {
        return "Post with ID $id not found or update failed.";
    }
});

// Route to delete a specific post by ID
Route::get('/delete-post/{id}', function ($id) {
    $deleted = DB::table('posts')->where('id', $id)->delete();

    if ($deleted) {
        return "Post with ID $id deleted successfully!";
    } else {
        return "Post with ID $id not found or deletion failed.";
    }
});

?>
