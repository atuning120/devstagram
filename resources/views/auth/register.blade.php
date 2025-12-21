@extends('layouts.app')

@section('titulazo')

Registrarse



@endsection


@section('contenido')

    <div class = "md:flex md:justify-center md:gap-10 md:items-center">
        <div class ="md:w-6/12 bg-white p-6 rounder-lg shadow-xl">
            <img src= "{{ asset('imagenes/registrar.jpg') }}" alt="imagen de
            registro de usuarios">
        </div>

        <div class= "md:w-1/2">
            <form action="/crear-cuenta" method="POST">
                @csrf
                <div class = "mb-5">
                    <label for="name" class = "mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input
                    id="name"
                    name="name"
                    type= "text"
                    placeholder= "Tu nombre"
                    class= "border p-3 w-full rounded-lg"
                    />
                </div>
                <div class = "mb-5">
                    <label for="username" class = "mb-2 block uppercase text-gray-500 font-bold">
                        Usuario
                    </label>
                    <input
                    id="username"
                    name="username"
                    type= "text"
                    placeholder= "Tu nombre pero de usuario"
                    class= "border p-3 w-full rounded-lg"
                    />
                </div>

                <div class = "mb-5">
                    <label for="Email" class = "mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input
                    id="Email"
                    name="Email"
                    type= "email"
                    placeholder= "Tu correo"
                    class= "border p-3 w-full rounded-lg"
                    />
                </div>

                <div class = "mb-5">
                    <label for="password" class = "mb-2 block uppercase text-gray-500 font-bold">
                        Contrasena
                    </label>
                    <input
                    id="password"
                    name="password"
                    type= "password"
                    placeholder= "Ingrese contrasena"
                    class= "border p-3 w-full rounded-lg"
                    />
                </div>

                <div class = "mb-5">
                    <label for="password_confirmation" class = "mb-2 block uppercase text-gray-500 font-bold">
                        Repite la contrasena
                    </label>
                    <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type= "password"
                    placeholder= "Repite contrasena"
                    class= "border p-3 w-full rounded-lg"
                    />
                </div>

                <input
                type="submit"
                value="crear cuenta"
                class= "bg-sky-600 hover:bg-sky-700 transition-colors cursors-pointer
                uppercase font-bold w-full p-3 text-white rounder-lg"
                />
            </form>
        </div>
    </div>
@endsection
