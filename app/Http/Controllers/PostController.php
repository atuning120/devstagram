<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);
    }

    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(20);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);

        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => Auth::user()->id,
        // ]);


        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('posts.index', Auth::user()->username);
    }


    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    public function destroy(Post $post)
    {
        //Ejecutar el Policy
        $this->authorize('delete', $post);

        // Eliminar comentarios asociados (si no se ha configurado onDelete cascade en la BD)
        $post->comentarios()->delete();

        $post->delete();

        //Eliminar la imagen
        $imagen_path = public_path('uploads/' . $post->imagen);

        if (file_exists($imagen_path)) {
            unlink($imagen_path);
        }

        return redirect()->route('posts.index', Auth::user()->username);
    }
}