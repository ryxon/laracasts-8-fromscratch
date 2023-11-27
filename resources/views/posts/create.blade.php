<x-home_layout>


    <div class="mx-auto w-1/2 p-12">
        <h1 class="text-xl py-4">Create a post</h1>


        <form method="POST" action="/admin/post" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" />

            <x-form.field name="category_id">
                <x-form.label name="Category" />
                <select name="category_id" id="category_id">
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-form.error name="category_id" />
            </x-form.field>

            <x-form.submit></x-form.submit>

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


