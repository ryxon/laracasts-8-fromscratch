<div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
    <select id="category_select" name="category" class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
        <option value="">All Categories</option>
        @foreach ($categories as $category)
            <option {!! $currentCategoryId == $category->id ? 'SELECTED="SELECTED"': '' !!} value="{{ $category->slug }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
         height="22" viewBox="0 0 22 22">
        <g fill="none" fill-rule="evenodd">
            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
            </path>
            <path fill="#222"
                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
        </g>
    </svg>
</div>
