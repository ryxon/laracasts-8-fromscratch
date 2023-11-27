<!doctype html>

<title>Laravel From Scratch 8</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
{{-- inlcude google jquery cdn--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x.x/dist/alpine.min.js" defer></script>


@vite(['resources/css/app.css', 'resources/js/app.js'])

<body style="font-family: Open Sans, sans-serif">
<x-flash-main></x-flash-main>
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/img/logo.svg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="flex md:mt-0 mt-8 w w-3/4 justify-end items-center">
            <div style="display: inline-block">Welcome, <b>Ryan Hendriks</b>!</div>

            <x-admin.dropdown>
                <x-slot name="trigger">
                    <button class="text-xs font-bold uppercase bg-blue-500 text-white py-2 px-4 rounded focus:outline-none hover:bg-blue-700">
                        Manage
                    </button>
                </x-slot>

                <x-slot name="links">
                    <x-admin.dropdown-link href="/admin/dashboard">Dashboard</x-admin.dropdown-link>
                    <x-admin.dropdown-link href="/admin/posts">Posts</x-admin.dropdown-link>
                    <x-admin.dropdown-link href="/admin/post/create">New Post</x-admin.dropdown-link>
                    <x-admin.dropdown-link href="/admin/users">Users</x-admin.dropdown-link>
                    <x-admin.dropdown-link href="/admin/categories">Categories</x-admin.dropdown-link>
                    <x-admin.dropdown-link href="/admin/comments">Comments</x-admin.dropdown-link>
                </x-slot>
            </x-admin.dropdown>

            <a href="/logout" class="text-xs font-bold uppercase ml-4">Log Out</a>
            <a href="#footer" class="bg-blue-500 ml-4 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Subscribe for Updates</a>
        </div>
    </nav>

    {{ $slot }}

    <x-footer></x-footer>
{{--    {{ $footer }}--}}
</section>
</body>
