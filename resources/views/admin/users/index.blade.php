<x-home_layout>
    <div class="m-10">
        {{-- Created a div with 50% width in the middle of the page --}}
        <div class="border mx-auto p-10 w-2/3 w-50 pb-12">
            <h1 class="text-2xl font-bold mb-10">Users</h1>
            {{-- Created a table with 7 columns --}}
            <div class="overflow-x-auto">
                <table class="min-w-full border border-collapse border-gray-300">
                    <thead>
                    <tr>
                        <th class="border p-2">Id</th>
                        <th class="border p-2">Name</th>
                        <th class="border p-2">Username</th>
                        <th class="border p-2">Email</th>
                        <th class="border p-2">Admin</th>
                        <th class="border p-2">Created At</th>
                        <th class="border p-2">Updated At</th>
                        <th class="border p-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- Loop through the users and display the data --}}
                    @foreach($users as $user)
                        <tr>
                            <td class="border p-2">{{ $user->id }}</td>
                            <td class="border p-2">{{ $user->name }}</td>
                            <td class="border p-2">{{ $user->username }}</td>
                            <td class="border p-2">{{ $user->email }}</td>
                            <td class="border p-2">
                                @if($user->is_admin)
                                    <i class="fas fa-user-shield text-blue-500"></i> <!-- Show admin user icon for is_admin = true -->
                                @else
                                    <i class="fas fa-times text-red-500"></i> <!-- Show times icon for is_admin = false -->
                                @endif
                            </td>
                            <td class="border p-2">{{ $user->created_at }}</td>
                            <td class="border p-2">{{ $user->updated_at }}</td>
                            <td class="border p-2">
                                <!-- Edit button with Font Awesome icon -->
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Delete button with Font Awesome icon -->
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
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

            {{-- Created a link to the create page --}}
            <div class="right-align my-4 mb-4">
                <a href="{{ route('admin.users.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded block text-center">Create new User</a>
            </div>
        </div>
    </div>
</x-home_layout>
