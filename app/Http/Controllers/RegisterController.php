<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function show()
    {
        if(Auth::check())
        {
            return redirect('/profile/'.Auth::user()->username);
        }

        return view("layouts.register");
    }

    public function store(Request $request){

        $data = $request->validate(
            [
                'name' => ['required'],
                'email' => ['required'],
                'password' => ['required']

            ]
        );

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect("login");
    }
}
