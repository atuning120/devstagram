<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <title>Devstagram - @yield('titulo')</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="bg-gray-100">
        {{-- ENCABEZADO --}}
        <header class="p-5 border-b bg-white shadow">

            <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">Devstagram</h1>
            @auth
                <nav class="flex gap-1 items-center">
                    <a class="flex items-center gap-2 bg-white p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer" href="{{route('posts.create')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        Crear post
                    </a>

                    <a href="{{route('posts.index', auth()->user()->username)}}" class="font-bold text-gray-600 text-sm">
                        Hola:
                        <span class="font-normal">
                            {{auth()->user()->username}}
                        </span>
                    </a>

                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="font-bold uppercase">
                            Cerrar Sesión
                        </button>
                    </form>
                    
            @endauth

            @guest
             <nav class="flex gap-2">
                 <a href="{{route('login')}}" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                 <a href="{{route('register')}}" class="font-bold uppercase text-gray-600 text-sm">Crear Cuenta</a>
             </nav>
            @endguest
            </div>
        </header>

        {{-- CONTENIDO PRINCIPAL --}}
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield("titulo")
            </h2>
            @yield("contenido")
        </main>

        {{-- FOOTER--}}
        <footer class="text-center p-6 text-gray-500 font-bold uppercase mt-32">
            Devstagram  - todos los derechos reservados {{ now()->year}}
        </footer>
    </body>
</html>