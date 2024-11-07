<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('storage/style/style.css') }}">

    <title>Apiato</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <nav class="nav">
            @guest('web')
                <a href="{{ route('login-page') }}" class="top-right button">Login</a>
                <a href="{{ route('register-page') }}" class="top-right button">Register</a>
            @endguest

            @auth('web')
                <form id="form" action="{{ route('logout') }}" method="POST">@csrf</form>
                <a class="top-right button" href="javascript:void(0)" onclick="document.getElementById('form').submit()">Logout</a>
                <a href="{{ route('create_post') }}" class="top-right button">Create_post</a>
                <h1>{{ auth('web')->user()->name }}</h1>
            @endauth
        </nav>
        
        <div class="posts">
            <h1>Posts</h1>
            <ul>
                @foreach($posts as $post)
                    <li>
                        <h2>{{ $post->title }}</h2>
                        <p>{{ $post->content }}</p>
                        @if($post->image)
                            <img src="{{ asset("storage/" . $post->image) }}" alt="Image for {{ $post->title }}">
                        @else
                            <p>No image available</p> 
                        @endif
                        <p>Автор: {{ $post->user->name }}</p>
                        @if($post->user->image)
                            <img src="{{ asset('storage/' . $post->user->image) }}" alt="Avatar of {{ $post->user->name }}" style="width: 50px; height: 50px;">
                        @endif
                        @if(auth('web')->id() == $post->user_id)
                            <a href="{{ route('post_edit', ['id' => $post->id]) }}" class="button">Edit</a>
                            <a href="{{ route('post_delete', ['id' => $post->id]) }}" class="button">Delete</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
