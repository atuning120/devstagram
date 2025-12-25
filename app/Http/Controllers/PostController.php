<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(User $user)
    {


        return view('dashboard', [
            'user'=>$user
        ]);
        }
        public function create()
        {
            //dd siempre para ver que esta llegando y despues se retorna las vistas
            //buena practica, vida wena
            return view('posts.create');
        }
}
