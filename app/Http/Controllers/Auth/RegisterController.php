<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Dumper\ContextProvider\RequestContextProvider;
use Symfony\Contracts\Service\Attribute\Required;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //dd($request->get('username'));


        //validaciones de campos
        $request->validate([
            'name' => 'required|string|max:30|min:3',
            'username' => 'required|min:3|unique:users|max:30',
            'email' => 'required|email|unique:users|max:60',
            'password' => 'required|string|confirmed|min:6',
        ]);
    }
}
