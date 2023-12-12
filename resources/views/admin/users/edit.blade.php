<x-home_layout>
{{--    edit user form--}}
    <div class="m-10">
        {{-- Created a div with 50% width in the middle of the page --}}
        <div class="border mx-auto p-10 w-1/2 w-50 pb-12">
            <h1 class="text-2xl font-bold mb-10">Edit User1</h1>
            {{-- Created a form with 3 input fields and a submit button --}}
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                {{--            name--}}
                <div class="mb-4">
                    <label for="name">Name</label>
                    <input value="{{ $user->name }}" required type="text" name="name" id="name" placeholder="Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username">Username</label>
                    <input value="{{ $user->username }}" required type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}">
                    @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email">Email</label>
                    <input value="{{ $user->email }}" required type="text" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                {{-- Is Admin Checkbox --}}
                <div class="mb-4 flex items-center">
                    <input {{ $user->is_admin ? 'checked="checked"' : '' }} type="checkbox" name="is_admin" id="is_admin" class="bg-gray-100 border-2 p-4 @error('is_admin') border-red-500 @enderror" value="1">
                    <label for="is_admin" class="ml-2">Is admin</label>
                    @error('is_admin')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Submit --}}
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // function togglePasswordVisibility(inputId) {
        //     var input = document.getElementById(inputId);
        //     var checkbox = document.querySelector('input[type="checkbox"][onclick="togglePasswordVisibility(\'' + inputId + '\')"]');
        //     input.type = input.type === 'password' ? 'text' : 'password';
        //     checkbox.checked = input.type === 'text';
        // }

        $(function(){
            $('.fa-eye').click(function(){
                $(this).toggleClass('fa-eye-slash');
                $(this).toggleClass('fa-eye');
            });
            $('.pwswitch').click(function(){
                var input = $(this).parent().parent().find('input');
                if(input.attr('type') == 'password'){
                    input.attr('type', 'text');
                }else{
                    input.attr('type', 'password');
                }
            });
        });

        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password_confirmation").value;
            var passwordMatchError = document.getElementById("password-match-error");

            if (password !== confirmPassword) {
                passwordMatchError.style.display = "block";
                return false;
            } else {
                passwordMatchError.style.display = "none";
                return true;
            }
        }
    </script>
</x-home_layout>
