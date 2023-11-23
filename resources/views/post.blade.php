{{--in this blade view we are using the component layout approach, in posts we will use the section and yield approach--}}

<x-post_layout>
    <x-slot name="header">
        <!-- Header content goes here -->
        <div id="header">
            <h1>This content is set in posts.blade.php</h1>
            <p>Because it is within x-slot with the name header</p>
            <p>It is displayed in the post_layout.blade.php file because it is called with $header</p>
        </div>
    </x-slot>

    <x-posts.featured :post="$post"></x-posts.featured>

    {{--@foreach($posts as $post)--}}

{{--    <article>--}}
{{--        <h1><a href="/post/{{ $post->slug  }}">{!! $post->title !!}</a></h1>--}}
{{--        <p>By <a href="/posts/author/{{ $post->user->username }}">{{ $post->user->name }}</a> in <a href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>--}}
{{--        <div>date: {{ $post->date  }}</div>--}}
{{--        <div>{{ $post->excerpt }}</div>--}}
{{--        <div>{!! $post->body !!}</div>--}}
{{--    </article>--}}
    {{--@endforeach--}}
    <hr>
    @auth
        <x-button>[somecontent from posts.blade.php within the x-button tag]</x-button>
{{--    Create comment form:--}}
    <form method="POST" action="/post/{{ $post->slug }}/comment" class="border border-gray-200 p-6 rounded-xl">
        @csrf
        <header class="mb-4">
            <h3 class="font-bold">Leave a comment:</h3>
        </header>
        <div class="mb-6">
            <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Body:
            </label>
            <textarea name="body" id="body" class="border border-gray-400 p-2 w-full" required></textarea>
            @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Submit
            </button>
        </div>
    </form>
    @else
        <hr><hr>
        <p>Please <a href="/login">login</a> to leave a comment.</p>
        <hr><hr>
    @endauth
    <hr>
    <section class="col-span-8 col-start-5 mt-10">
        @foreach($post->comments as $comment)
            <x-post-comment :comment="$comment"/>
        @endforeach
    </section>
    <hr>
    <a href="/">Go back</a>

    <x-button>somecontent...</x-button>

</x-post_layout>
