{{--in this we use the section and yield approach, in the post.blade.php we use the component layout approach--}}

@extends('layouts.layout')

@section('header')
    <h1 class="header">posts:MULTIPLE POSTS HEADER</h1>
@endsection


@section('content')
    @unless(false)
        <h1>True</h1>
    @endunless

    @if(time() % 2 == 0)
        <h1>timestamp is even {{time()}}</h1>
    @else
        <h1>timestamp is uneven {{time()}}</h1>
    @endif

    @foreach($posts as $post)
{{--        @dump($loop)--}}
        <article class="{{ $loop->even ? 'foobar' : '' }}">
            <h1><a href="/post/{{ $post->slug  }}">{!! $post->title !!}</a></h1>

            {{--            create category link--}}
            <p>
            <p>By <a href="/posts/author/{{ $post->user->username }}">{{ $post->user->name }}</a> in <a href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
            </p>

            <div>date: {{ $post->date  }}</div>
            <div>{{ $post->excerpt }}</div>
            <div>{!! $post->body !!}</div>
        </article>
    @endforeach
@endsection



