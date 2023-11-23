<x-home_layout>
    <h1>Create a post</h1>

    <div class="mx-auto w-1/2">
        <form method="POST" action="/admin/posts">
            @csrf

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="title"
                >
                    Title
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="text"
                       name="title"
                       id="title"
                       value="{{ old('title') }}"
                       required
                >

                @error('title')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{--        <div class="mb-6">--}}
            {{--            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"--}}
            {{--                   for="slug"--}}
            {{--            >--}}
            {{--                Slug--}}
            {{--            </label>--}}

            {{--            <input class="border border-gray-400 p-2 w-full"--}}
            {{--                   type="text"--}}
            {{--                   name="slug"--}}
            {{--                   id="slug"--}}
            {{--                   value="{{ old('slug') }}"--}}
            {{--                   required--}}
            {{--            >--}}

            {{--            @error('slug')--}}
            {{--            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>--}}
            {{--            @enderror--}}
            {{--        </div>--}}

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="excerpt"
                >
                    Excerpt
                </label>

                <textarea class="border border-gray-400 p-2 w-full"
                          name="excerpt"
                          id="excerpt"
                          required
                >{{ old('excerpt') }}</textarea>

                @error('excerpt')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="body"
                >
                    Body
                </label>

                <textarea class="border border-gray-400 p-2 w-full"
                          name="body"
                          id="body"
                          required
                >{{ old('body') }}</textarea>

                @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="category_id"
                >
                    Category
                </label>

                <select name="category_id" id="category_id">
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                @error('category_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>

            {{--        SUBMIT--}}

            <div class="mb-6">
                <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                >
                    Submit
                </button>
            </div>

            {{--        URL to created post--}}
            @php
                $post = session('created_post');
//                dump($post);
                if($post) {
                    echo "<p>URL to created post: <a href='/post/".$post['slug']."'>".$post['title']."</a></p>";
                }
            @endphp
        </form>
    </div>

</x-home_layout>


