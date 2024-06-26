{{--create login form--}}

<x-home_layout>
    <main class="flex items-center justify-center">
        <section class="max-w-xl w-1/2 px-12 py-8 bg-gray-200 my-24">
            <h1 class="pb-4 text-3xl">Log in!</h1>

            {{--        Show success message if user is registered--}}



            <form method="POST" action="/login">
                @csrf


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
