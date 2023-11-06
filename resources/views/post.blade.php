{{--in this blade view we are using the component layout approach, in posts we will use the section and yield approach--}}

<x-layouttwo>
    <x-slot name="header">
        <!-- Header content goes here -->
        <div id="header">
            <h1>This is the COMPONENT LAYOUT TWO Header:</h1>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </x-slot>

    <article>
        <h1><a href="/post/{{ $post->slug  }}">{!! $post->title !!}</a></h1>
        <p>By <a href="/posts/author/{{ $post->user->username }}">{{ $post->user->name }}</a> in <a href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
        <div>date: {{ $post->date  }}</div>
        <div>{{ $post->excerpt }}</div>
        <div>{!! $post->body !!}</div>
    </article>
    {{--@endforeach--}}
    <hr>
    <a href="/">Go back</a>

    <x-button>somecontent...</x-button>

</x-layouttwo>
