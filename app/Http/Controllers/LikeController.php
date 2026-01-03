<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function store( Request $request,  Post $post)
    {

        //almacenar el like
        $post->likes()->create([
            'user_id'=>Auth::user()->id
        ]);

        return back();
    }
    public function destroy( Request $request,  Post $post)
    {

        //eliminar el like
        $post->likes()->where('user_id', Auth::user()->id)->delete();

        return back();
    }
}
