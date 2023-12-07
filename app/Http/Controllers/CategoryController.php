<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required'
        ]);
        $attributes['slug'] = \Str::slug(request('name'));

        Category::create($attributes);

        //flash message
        session()->flash('success', 'Category was created');
        return redirect('/admin/categories');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Category $category)
    {
        $attributes = request()->validate([
            'name' => 'required'
        ]);
        $attributes['slug'] = \Str::slug(request('name'));

        $category->update($attributes);

        //flash message
        session()->flash('success', 'Category was updated');
        return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        //flash message
        session()->flash('success', 'Category was deleted');
        return redirect('/admin/categories');
    }
}
