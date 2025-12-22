<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');


    }

    public function store(Request $request)
    {
        // dd($request);

        //dd($request->get('username'));
        $request->validate([
            'name'=> 'required|min:5',
            'username'=> 'required|unique:users|min:3|max:20',
            'email'=> 'required|unique:users|email|max:40',
            'password'=> 'required ',
        //tambien se puede tener como arreglo: ['required,min:5']
        ]);

    }
}
