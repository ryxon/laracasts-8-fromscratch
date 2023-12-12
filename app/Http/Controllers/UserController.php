<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
class UserController extends Controller
{
    public function index()
    {
        //get all users without pagination
        //sort users by name and then by is_admin
        $users = User::all()->sortBy('name')->sortByDesc('is_admin');;

        //show view
        return view('admin.users.index', ['users' => $users]);
    }

    //create
    public function create()
    {
        return view('admin.users.create');
    }

    //store
    public function store(Request $request)
    {

        $attributes = request()->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:7|max:255|min:7',
            'password_confirmation' => 'required|min:7|max:255|min:7',
            'is_admin' => 'boolean'
        ]);

        //check if password matches password_confirmation
        if($attributes['password'] !== $attributes['password_confirmation']){
            session()->flash('error', 'Passwords do not match');
            return back();
        }

        $attributes['remember_token'] = Str::random(10);

        $user = User::create($attributes);

        //redirect
        session()->flash('success', 'User created successfully');
        return redirect('/admin/users');
    }

    public function edit(User $user)
    {
//        dd($user->password);

        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'is_admin' => 'boolean'
        ]);

        //if is_admin is not set, set it to false
        if(!isset($attributes['is_admin'])){
            $attributes['is_admin'] = false;
        }

        $user = User::find(request('user'));
        $user->update($attributes);

        //redirect
        session()->flash('success', 'User updated successfully');
        return redirect('/admin/users');
    }

    public function destroy(User $user)
    {
        $user->delete();

        //redirect
        session()->flash('success', 'User deleted successfully');
        return redirect('/admin/users');
    }
}
