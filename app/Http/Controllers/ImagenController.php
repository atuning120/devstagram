<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagenController extends Controller
{
        public function store(Request $request){
        $imagen = $request->file('file');
        $nombreImagen = uniqid() . '.' . $imagen->getClientOriginalExtension();
        $imagen->move(public_path('imagenes'), $nombreImagen);

        return response()->json(['imagen' => $nombreImagen]);
    }
}
