<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');


    }

    public function store(Request $request)
    {
        // dd($request);
        $request->request->add(['username' => Str::slug($request->username)]);

        //dd($request->get('username'));
        $request->validate([
            'name'=> 'required|min:5',
            'username'=> 'required|unique:users|min:3|max:20',
            'email'=> 'required|unique:users|email|max:40',
            'password'=> 'required|confirmed|min:6 ',
        //tambien se puede tener como arreglo: ['required,min:5']
        ]);


        User::create([
            'name'=>$request->name,
            'username'=>$request->username  ,

            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('posts.index');
    }
}
