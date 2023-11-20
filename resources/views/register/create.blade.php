

<x-home_layout>
    @if(session('success'))
        <div class="regsuccess fixed top-0 left-1/2 transform -translate-x-1/2 w-1/2 text-center py-2 px-6 bg-blue-300 border-black border-solid border-2">
            {{ session('success') }}
        </div>

        <script type="text/javascript">
            jQuery(function($){
                setTimeout(function(){
                    $('.regsuccess').fadeOut();
                }, 6000);
            });
        </script>
    @endif

    <main class="flex items-center justify-center">
    <section class="max-w-xl w-1/2 px-12 py-8 bg-gray-200 my-24">
        <h1>Register a user!</h1>

{{--        Show success message if user is registered--}}



        <form method="POST" action="/register">
            @csrf

            <div class="mb-6">
                <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Name
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="text"
                       name="name"
                       id="name"
                       value="{{ old('name') }}"
                       required
                >

                @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Username
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="text"
                       name="username"
                       id="username"
                       value="{{ old('username') }}"
                       required
                >

                @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

{{--            Email adress--}}

            <div class="mb-6">
                <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Email Adress
                </label>

{{--                validate the email adress--}}



                <input class="border border-gray-400 p-2 w-full"
                       type="text"
                       name="email"
                       id="email"
                       value="{{ old('email') }}"
                       required
                >

                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Password
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="password"
                       name="password"
                       id="password"
{{--                       value="{{ old('password') }}"--}}
                       required
                >

                @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

{{--            SUBMIT BUTTON--}}
            <div class="mb-6">
                <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                >
                    Submit
                </button>
            </div>
        </form>

        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

    </section>
    </main>
    <x-slot name="footer"></x-slot>
</x-home_layout>
