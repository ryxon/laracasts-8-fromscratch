<article class="flex bg-yellow-100 border border-gray-200 p-6 m-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
{{--       ?u= provides unique images --}}
        <img src="https://i.pravatar.cc/60?u={{ $comment->id }}" alt="image" width="60" height="60" class="rounded-xl border border-gray-200">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->author->name }}</h3>
            <p class="text-xs">Posted on <time>{{ $comment->created_at }}</time></p>
        </header>
        <p>
            {!! $comment?->approved ? $comment->body : '<span style="color: grey; font-size:12px;">[This comment is awaiting approval]</span>' !!}
        </p>
    </div>
</article>
