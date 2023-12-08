<x-home_layout>
    <div class="m-10">
        <div class="border mx-auto p-10 w-1/2 w-50 pb-12">
            <h1 class="text-2xl font-bold mb-10">Comments</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full border border-collapse border-gray-300">
                    <thead>
                    <tr>
                        <th class="border p-2">Comment</th>
                        <th class="border p-2">Post</th>
                        <th class="border p-2">User</th>
                        <th class="border p-2">Status</th>
                        <th class="border p-2">Approve</th>
                        <th class="border p-2">Decline</th>
                        <th class="border p-2">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td class="border p-2">{{ $comment->body }}</td>
                            <td class="border p-2"><a href="{{ route('home.post', $comment->post->slug) }}">{{ $comment->post->title }}</a></td>
                            <td class="border p-2">{{ $comment->user->name }}</td>
                            <td class="border p-2">
                                @if($comment->approved == 1)
                                    <span class="text-green-600 font-bold">Approved</span>
                                @elseif($comment->declined == 1)
                                    <span class="text-red-600 font-bold">Declined</span>
                                @else
                                    <span class="font-bold">Awaiting Approval</span>
                                @endif
                            </td>
                            <td class="border p-2">
                                <form method="POST" action="{{ route('admin.comment.approve', $comment->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="border p-2">
                                <form method="POST" action="{{ route('admin.comment.decline', $comment->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="border p-2">
                                <form method="POST" action="{{ route('admin.comment.destroy', $comment->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete_comment">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="right-align my-4 mb-4">
                <!-- Add a link or button for creating comments if needed -->
            </div>
        </div>
    </div>
</x-home_layout>
{{--create a script that shows to confirmation box when deleting a comment--}}
<script>
    $(document).ready(function () {
        $('.delete_comment').on('click', function () {
            return confirm('Are you sure you want to delete this comment?');
        });
    });
</script>
