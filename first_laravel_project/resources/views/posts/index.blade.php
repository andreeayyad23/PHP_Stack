<!-- resources/views/posts/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
</head>
<body>

    <h1>All Blog Posts</h1>

    @foreach($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p><strong>Posted by:</strong> {{ $post->user->name }} | <strong>Created at:</strong> {{ $post->created_at }}</p>
        </div>
        <hr>
    @endforeach

</body>
</html>
