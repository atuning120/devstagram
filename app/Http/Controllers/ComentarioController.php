<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    //
    public function store(Request $request, User $user, Post $post)
    {

        //validar
        $this->validate($request,[
            'comentario'=>'required|string|max:255'
        ]);

        //almacenar
        Comentario::create([
            'user_id'=>Auth::user()->id,
            'post_id'=>$post->id,
            'comentario'=>$request->comentario
        ]);

        //imprimir mensaje
        return back()->with('mensaje','Comentario agregado correctamente');
    }
}
