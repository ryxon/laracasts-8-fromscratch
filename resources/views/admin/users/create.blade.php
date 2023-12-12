<x-home_layout>
    {{-- CREATE FORM FOR A NEW USER --}}
    <div class="border mx-auto p-10 w-1/2 w-50 pb-12">
        <h1 class="text-2xl font-bold mb-10">Create user</h1>

        {{-- Form --}}
        <form action="{{ route('admin.users.store') }}" method="POST" onsubmit="return validateForm()">
            @csrf
{{--            name--}}
            <div class="mb-4">
                <label for="name">Name</label>
                <input required type="text" name="name" id="name" placeholder="Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="username">Username</label>
                <input required type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}">
                @error('username')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email">Email</label>
                <input required type="text" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            {{-- Password --}}
            <div class="mb-4">
                <label for="password">Password</label>
                <div class="relative">
                    <input required type="password" name="password" id="password" placeholder="Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
                    <div class="absolute top-2 right-2">
                        <input type="checkbox" id="pw-one" class="hidden pwswitch">
                        <label for="pw-one">
                            <i class="fas fa-eye text-gray-500 cursor-pointer hover:text-gray-700 text-2xl m-2.5"></i>
                        </label>
                    </div>
                </div>
                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            {{-- Password Confirmation --}}
            <div class="mb-4">
                <label for="password_confirmation">Password again</label>
                <div class="relative">
                    <input required type="password" name="password_confirmation" id="password_confirmation" placeholder="Password again" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror" value="">
                    <div class="absolute top-2 right-2">
                        <input type="checkbox" id="pw-two" class="hidden pwswitch">
                        <label for="pw-two">
                            <i class="fas fa-eye text-gray-500 cursor-pointer hover:text-gray-700 text-2xl m-2.5"></i>
                        </label>
                    </div>
                </div>
                {{-- Password Matching Check --}}
                <div id="password-match-error" class="text-red-600 font-bold mt-2 text-sm" style="display: none;">
                    Passwords do not match.
                </div>
                @error('password_confirmation')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            {{-- Is Admin Checkbox --}}
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="is_admin" id="is_admin" class="bg-gray-100 border-2 p-4 @error('is_admin') border-red-500 @enderror" value="1">
                <label for="is_admin" class="ml-2">Is admin</label>
                @error('is_admin')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- Submit --}}
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Create</button>
            </div>
        </form>
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
