<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Hello, User!</h1>

    <!-- Success Alert -->
    <div class="alert alert-success" style="display: none;" id="success-alert">
        Item created successfully!
    </div>

    <h2>Item List</h2>
    <ul class="list-group mb-4" id="item-list">
        <li class="list-group-item">Item 1</li>
        <li class="list-group-item">Item 2</li>
        <li class="list-group-item">Item 3</li>
        <!-- Add more items as needed -->
        <!-- If no items are available, you can uncomment the line below -->
        <!-- <li class="list-group-item">No items found.</li> -->
    </ul>

    <h2>Create New Item</h2>
    <form id="item-form">
        <div class="form-group">
            <label for="name">Item Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter item name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Item</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>