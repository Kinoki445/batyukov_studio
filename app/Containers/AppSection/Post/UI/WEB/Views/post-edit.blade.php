<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body>
    <form action="{{ route('post_update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="hidden" name="id" value="{{ $post->id }}">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required>{{ $post->content }}</textarea>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" width="100">
            @endif
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>