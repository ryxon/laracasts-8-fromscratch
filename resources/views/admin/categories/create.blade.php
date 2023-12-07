<x-home_layout>
    <div class="m-10">
        <div class="border mx-auto p-10 w-1/2 w-50 pb-12">
            <h1 class="text-2xl font-bold mb-10">Create Category</h1>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                           placeholder="Category Name" value="{{ old('name') }}">
                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                            class="bg-blue-500 text-white px-4 py-3 rounded
                            font-medium w-full">Create Category</button>
                </div>
            </form>
        </div>
    </div>
</x-home_layout>
