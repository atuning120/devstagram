@extends('layouts.app')

@section('titulo')
    Registrate en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12  p-6 shadow-xl rounded-lg bg-white">
            <img src="{{ asset('Auth/registrar.jpg')}}" alt="imagen register usuario">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow">
            <form action="{{ route('register')}}" method="POST">
                @csrf
                <div>
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input 
                        type="name" 
                        id="name" 
                        name="name" 
                        placeholder="Tu nombre" 
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <div>
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                        type="username" 
                        id="username" 
                        name="username" 
                        placeholder="Tu nombre de usuario" 
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <div>
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="tu correo" 
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <div>
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Intrese Contraseña" 
                        class="border p-3 w-full rounded-lg"
                    />
                </div>

                <div>
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Contraseña
                    </label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        placeholder="Intrese Contraseña" 
                        class="border p-3 w-full rounded-lg"
                    />
                </div>

                <input 
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mt-5"
                />
            </form>
        </div>
    </div>
@endsection