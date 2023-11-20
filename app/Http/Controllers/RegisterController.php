<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import user model
use App\Models\User;

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

        //store user
        $user = User::create($attributes);

        auth()->login($user);

        session()->flash('success', 'Your account has been created.'); // what does this do? It flashes the message to the session for one request. This is useful for quick messages like "Item has been deleted".

        //return to register.create and show message
        return redirect('/register')
            ->with('success', 'Your account has been created.'); // what does with do?
        // It flashes the message to the session for one request.
        // This is useful for quick messages like "Item has been deleted".
        // how is it displayed in the view? By using the session helper function: session('success') in the view
    }
}
