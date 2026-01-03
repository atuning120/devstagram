<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user)
    {
        return view('perfil.index', compact('user'));
    }

    public function store(Request $request)
    {
        // Lógica para actualizar el perfil del usuario
    }
}
