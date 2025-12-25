<!DOCTYPE html>
<html lang="{{ strreplace('', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Devstagram - @yield('titulo')</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        @vite('resources/css/app.css')

    </head>
    <body class="bg-gray-100">
        {{-- ENCABEZADO --}}
        <header class="p-5 border-b bg-white shadow">

            <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">Devstagram</h1>
            @auth
                <nav class="flex gap-1 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="#">
                        Hola: <span class="font-normal">{{auth()->user()->username}}</span>
                    </a>

                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm"
                        >Cerrar Sesion</button>

                    </form>
                </nav>

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
                @yield("titualzo")
            </h2>
            @yield("contenido")
        </main>

        {{-- FOOTER--}}
        <footer class="text-center p-6 text-gray-500 font-bold uppercase mt-32">
            Devstagram  - todos los derechos reservados {{ now()->year}}
        </footer>
    </body>
</html>
