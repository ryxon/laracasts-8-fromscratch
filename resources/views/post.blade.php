<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="js/app.js"></script>
</head>
<body>
{{-- foreach all posts --}}
{{--@foreach($posts as $post)--}}
    <article>
        <h1><a href="/post/{{ $post->slug  }}">{!! $post->title !!}</a></h1>
        <div>date: {{ $post->date  }}</div>
        <div>{{ $post->excerpt }}</div>
        <div>{!! $post->body !!}</div>
    </article>
{{--@endforeach--}}
    <hr>
    <a href="/">Go back</a>
</body>
