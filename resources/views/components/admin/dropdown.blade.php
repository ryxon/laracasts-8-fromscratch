@props(['trigger', 'links'])

<div x-data="{ show: false }" @click.away="show = false" class="relative px-6">
    {{-- Trigger --}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>

    {{-- Links --}}
    <div x-show="show" class="absolute bg-gray-100 mt-2 rounded-xl w-full z-50 overflow-auto">
        {{ $links }}
    </div>
</div>
