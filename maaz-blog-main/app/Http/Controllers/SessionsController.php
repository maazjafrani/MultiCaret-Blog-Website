<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }

    public function create()
    {
        return view('login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        if (auth()->attempt($attributes)) {   //attempting to login the user:
            session()->flash('success', 'Successfully Logged in! ');
            return redirect('/');
        }

        throw ValidationException::withMessages([
            'email' => 'Your Provided credentials couldnt be verified!'
        ]);


    }


}
