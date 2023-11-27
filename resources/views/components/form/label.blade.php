@props(['name'])

<label class="block mb-2 font-bold text-xs text-gray-700"
       for="{{ $name }}"
>
    {{--        label in uppercase first letter--}}
    {{ ucwords($name) }}
</label>
