<x-home_layout>
{{--@dd($posts)--}}
{{--    this is simply a blade component, it is included in the home_layout.blade.php file--}}
{{--    <x-header></x-header>--}}

{{--    this is a partial view, it is included in the home_layout.blade.php file--}}
    @include('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

{{--        check if posts exist--}}
{{--        if no posts exist, show this message--}}


        @if(!isset($posts) || count($posts) == 0)
            <p class="text-center">No posts yet. Please check back later.</p>
{{--            if posts exist, show the first post--}}
        @else
            <x-posts.featured :post="$posts[0]"></x-posts.featured>
        @endif

        @if(isset($posts) && count($posts) > 1)
        <div class="lg:grid lg:grid-cols-2">
{{--            only show second and third post, but first check if there are any posts--}}
                @foreach($posts->skip(1) as $post)
                    <x-posts.card :post="$post"></x-posts.card>
{{--                    stop after 2 posts--}}
                    @if($loop->index == 1)
                        @break
                    @endif
                @endforeach
        </div>
        @endif

        @if(isset($posts) && count($posts) > 3)
        <div class="lg:grid lg:grid-cols-3">
{{--            skip first 3 posts and show the next 6 posts, but first check if there are any posts beyond the first 3--}}
            @foreach($posts->skip(3) as $post)
                <x-posts.card :post="$post"></x-posts.card>
{{--                stop after 6 posts--}}
                @if($loop->index == 5)
                    @break
                @endif
            @endforeach
        </div>
        @endif

        @if(isset($posts) && count($posts) > 6)
            <div class="lg:grid lg:grid-cols-4">
                {{--            skip first 3 posts and show the next 6 posts, but first check if there are any posts beyond the first 3--}}
                @foreach($posts->skip(6) as $post)
                    <x-posts.card :post="$post"></x-posts.card>
                    {{--                stop after 12 posts--}}
{{--                    @if($loop->index == 11)--}}
{{--                        @break--}}
{{--                    @endif--}}
                @endforeach
            </div>
        @endif
        <div>{{ $posts->links() }}</div>
    </main>



    <x-slot name="footer">
        <x-footer></x-footer>
    </x-slot>

</x-home_layout>
