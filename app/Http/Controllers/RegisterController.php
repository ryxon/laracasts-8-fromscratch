<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import user model
use App\Models\User;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function create()
    {
        //session()->put to put something in the session
//        session()->flush(); // to flush the session after testing.
//        session()->put('success', 'Your account has been created.'); //test
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:3',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|min:7|max:255',
            'password' => 'required|min:7|max:255|min:7' //automatically hashed
        ]);

        $attributes['remember_token'] = Str::random(10); // what does this do?
        // It generates a random string of 10 characters and assigns it to the remember_token attribute.

        //store user
        $user = User::create($attributes);

        auth()->login($user);

        //redirect to homepage and show success message
        return redirect('/')->with('success', 'Your account has been created.');
    }
}
