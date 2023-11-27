@props(['name', 'type' => 'text', 'value' => null, 'required' => false])

<div class="mb-6">
    <x-form.label name="{{ $name }}" />
    <input class="border border-gray-400 p-2 w-full"
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ $value ? $value : old($name) }}"
           {{$required ? 'required' : ''}}
    >
    <x-form.error name="{{ $name }}" />
</div>
