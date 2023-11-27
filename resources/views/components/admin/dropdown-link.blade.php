@props(['href', 'active' => false])

<a href="{{ $href }}"
   x-bind:class="{ 'text-red-500': window.location.pathname === '{{ $href }}' }"
   class="text-xs px-4 py-2 font-semibold block"
>{{ $slot }}</a>
