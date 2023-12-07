<x-home_layout>
    <div class="m-10">

{{--    created a div with 50% width in the middle of the page--}}
    <div class="border mx-auto p-10 w-1/2 w-50 pb-12">
        <h1 class="text-2xl font-bold mb-10">Categories</h1>
{{--        created a table with 3 columns--}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-collapse border-gray-300">
                <thead>
                <tr>
                    <th class="border p-2">Id</th>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Created At</th>
                    <th class="border p-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                {{-- Loop through the categories and display the data --}}
                @foreach($categories as $category)
                    <tr>
                        <td class="border p-2">{{ $category->id }}</td>
                        <td class="border p-2">{{ $category->name }}</td>
                        {{-- Used the format method to format the date --}}
                        <td class="border p-2">{{ $category->created_at->format('d-m-Y') }}</td>
                        <td class="border p-2">
                            <!-- Edit button with Font Awesome icon -->
                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="text-blue-500 hover:text-blue-700 mr-2">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Delete button with Font Awesome icon -->
                            <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

{{--        created a link to the create page--}}
        <div class="right-align my-4 mb-4">
            <a href="{{ route('categories.create') }}" class="btn btn-primary block">Create</a>
        </div>

    </div>
</div>
</x-home_layout>
