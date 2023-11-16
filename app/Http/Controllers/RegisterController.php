<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import user model
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:3',
            'username' => 'required|max:255|min:3',
            'email' => 'required|email|min:7|max:255',
            'password' => 'required|min:7|max:255|min:7'
        ]);

        //store user
        User::create($attributes);

        //return to register.create and show message
        return redirect('/register')->with('success', 'Your account has been created.');
    }
}
