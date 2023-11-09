<select id="category_select" class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold" onchange="location = this.value;">
    <option value="/">All Categories</option>
    @foreach ($categories as $category)
        <option {!! request()->path() == "category/".$category->slug ? 'SELECTED="SELECTED"': '' !!} value="/category/{{ $category->slug }}">{{ $category->name }}</option>
    @endforeach
</select>
<select id="category_select" class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold" onchange="location = this.value;">
    <option value="/">All Categories</option>
    @foreach ($categories as $category)
        <option {!! request()->getQueryString() == "category=".$category->slug ? 'SELECTED="SELECTED"': '' !!} value="?category={{ $category->slug }}">{{ $category->name }}</option>
    @endforeach
</select>
