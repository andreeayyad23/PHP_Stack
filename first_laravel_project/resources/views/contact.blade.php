@extends('layouts.app')

@section('title', 'Contact Details')

@section('content')
    <div class="container">
        <h1>Contact ID</h1>
        <p>The ID of the contact is: {{ $id }}</p>
        <p>Debug: The view is rendering correctly!</p> <!-- Add this line for debugging