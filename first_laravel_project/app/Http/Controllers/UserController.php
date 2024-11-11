<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends MiddleController
{
    public function __construct()
    {
        parent::__construct(User::class); // Pass the User model to the parent constructor
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    }

    // The index, show, store, update, and destroy methods can be inherited from MiddleController
}