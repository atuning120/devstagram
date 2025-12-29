<?php

namespace App\Http\Controllers;


use App\Models\Post;
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

        public function store(Request $request)
        {
            //dd('creando un post');

            //validacion
            $this->validate($request,[
                'titulo'=>'required|max:255',
                'descripcion'=>'required',
                'imagen'=>'required'
            ]);

            //almacenar la imagen
            Post::create([
                'titulo'=>$request->titulo,
                'descripcion'=>$request->descripcion,
                'imagen'=>$request->imagen,
                'user_id'=>Auth::user()->id
            ]);

            return redirect()->route('posts.index',Auth::user()->username);
        }
}
