<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Contracts\Service\Attribute\Required;
use Symfony\Component\VarDumper\Dumper\ContextProvider\RequestContextProvider;

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

        $request->request->add(['username' => Str::slug($request->username)]);

        //validaciones de campos
        $request->validate([
            'name' => 'required|string|max:30|min:3',
            'username' => 'required|min:3|unique:users|max:30',
            'email' => 'required|email|unique:users|max:60',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'username' =>$request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        
        //autenticar usuario
        Auth::attempt($request->only('email', 'password'));


        //redireccionar
        return redirect()->route('posts.index');
    }
}
