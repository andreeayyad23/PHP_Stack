<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiddleController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->query('name', 'World'); 
        return "Hello, {$name}!";
    }

    public function show($id)
    {
        // Logic to retrieve a single item by ID
    }

    public function store(Request $request)
    {
        // Logic to create a new item
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing item by ID
    }

    public function destroy($id)
    {
        // Logic to delete an item by ID
    }

    public function new(Request $request)
    {
        return view('index');
    }

    // public function contact($id)
    // {
    // return view('contact')->with('id', $id);
    // }

    public function contact($id)
    {
    return view('contact', compact('id'));
    }

    public function shows($id)
    {
        return view('contact', ['id' => $id]);
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate([]);
    }
}