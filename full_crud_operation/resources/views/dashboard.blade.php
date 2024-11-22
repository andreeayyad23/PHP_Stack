<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">Tourism App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a href="{{ route('destinations.create') }}" class="btn btn-primary">
                            <i class="fas fa-map-marker-alt icon-blue"></i> Create New Destination
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->username }}
                        </a>
                        <ul style="color: white;" class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @auth
        <h2 class="text-center" style="color: black;">Welcome, {{ auth()->user()->username }}!</h2>
    @endauth
    <h1 class="text-center">Destinations</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Number of Persons</th>
                <th>Description</th>
                <th>Location</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    @forelse($destinations as $destination)
        <tr>
            <td>{{ $destination->id }}</td>
            <td>{{ $destination->number_of_persons }}</td>
            <td>{{ $destination->description }}</td>
            <td>{{ $destination->location }}</td>
            <td>{{ \Carbon\Carbon::parse($destination->start_date)->format('d M Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($destination->end_date)->format('d M Y') }}</td>
            <td>
                @if(auth()->check() && auth()->user()->id === $destination->user_id)
                    <a href="{{ route('destinations.edit', $destination->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit icon"></i> Edit
                    </a>
                    <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this destination?');">
                            <i class="fas fa-trash icon"></i> Delete
                        </button>
                    </form>
                @else
                    <span class="text-muted">No actions available</span>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center">No destinations found.</td>
        </tr>
    @endforelse
</tbody>
    </table>
</div>

<footer class="footer text-center">
    <p>&copy; {{ date('Y') }} My Application. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>