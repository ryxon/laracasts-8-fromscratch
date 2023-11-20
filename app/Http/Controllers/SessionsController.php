<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    function destroy()
    {
        auth()->logout();
        return redirect('/login')->with('success', 'Goodbye!');
    }

    function login()
    {
        //If post request is made, do this:
        if (request()->isMethod('post')) {

            request()->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if(auth()->attempt(request(['email', 'password'])) == false) {
                return back()->withErrors([
                    'email' => 'The email or password is incorrect, please try again'
                ])->withInput(['email']); //withInput() will fill the email field with the email that was entered.
            }else{
                return redirect('/')->with('success', 'Welcome back!');
            }
        }

        return view('login');
    }
}
