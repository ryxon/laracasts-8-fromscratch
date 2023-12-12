@if(isset($post))


<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            @if($post->thumbnail)
                <img src="{{ asset($post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">
            @else
                <img src="/img/illustration-1.png" alt="Blog Post illustration" class="rounded-xl">
            @endif
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <a href="/category/{{ $post->category->slug }}"
                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{ $post->category->name }}</a>

                    {{--                    Check if user is logged in and admin:--}}
                    @if(auth()->check() && auth()->user()->is_admin)
                        <div class="flex justify-end">
                            <!-- Add an ID to the form for easy targeting -->
                            <form class="deleteForm_{{ $post->id }}" method="POST" action="/admin/post/{{ $post->slug }}">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                        class="delete-btn transition-colors duration-300 text-xs font-semibold bg-red-200 hover:bg-red-300 rounded-full py-2 px-8"
                                >DELETE</button>
                            </form>

                            <!-- Include jQuery library -->
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                            <script>
                                $(document).ready(function () {
                                    // Intercept form submission
                                    $(".deleteForm_{{ $post->id }} button").on('click', function (e) {
                                        e.preventDefault(); // Prevent the default form submission

                                        // Show a confirmation dialog
                                        if (confirm('Are you sure you want to delete this item?')) {
                                            // Submit the form
                                            $('.deleteForm_{{ $post->id }}').submit();
                                            // // If confirmed, send an AJAX request
                                            // $.ajax({
                                            //     type: 'DELETE',
                                            //     url: $('#deleteForm').attr('action'),
                                            //     data: $('#deleteForm').serialize(), // Serialize the form data
                                            //     success: function () {
                                            //         // Handle success (e.g., remove the deleted item from the UI)
                                            //         alert('Item deleted successfully!');
                                            //         // Add further UI updates as needed
                                            //     },
                                            //     error: function (xhr, status, error) {
                                            //         // Handle errors
                                            //         alert('Error deleting item: ' + error);
                                            //     }
                                            // });
                                        }
                                    });
                                });
                            </script>

                            <a href="/admin/post/{{ $post->slug }}"
                               class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                            >EDIT</a>
                        </div>
                    @endif
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {{ $post->excerpt }}
                </p>

                <p class="mt-4">
                    {{ $post->body }}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/img/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="{{ $post?->author?->username ? '/?author='.$post?->author?->username : 'javascript:void(0)' }}">{{ $post?->author?->name ? $post?->author?->name : '[user deleted]' }}</a>
                        </h5>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/post/{{ $post->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>

        </div>
    </div>
</article>
@endif
