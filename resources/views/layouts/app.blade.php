<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Devstagram - @yield('titulo')</title>
        @vite('resources/css/app.css')

    </head>
    <body class ="bg-gray-100">
        <header class= "p-5 border-b bg-white shadow">

            <div class = "container mx-auto flex justify-between items -center">

                <h1 class="text-4x1 font-black">
                    Devstagram
                </h1>

            <nav class = "flex gap-2">
                {{-- XDDDDDDDDDDD --}}
                <a class= "font-bold uppercasse text-gray-600 text-sm"
                href = "#"> Login </a>
                <a class= "font-bold uppercasse text-gray-600 text-sm" href = "/crear-cuenta"> Crear cuenta </a>
            </nav>

        </div>
    </header>
    <main = class ="container mx-auto mt-10">

        {{-- font color, text centrado --}}
        <h2 class= "font-black text-center text-3xl mb-10">
            @yield('titulazo')


        </h2>
        @yield('contenido')


    </main>


    <footer class="text-center p-5 textgray-500 font-bold uppercase">
            {{-- ws en php de usa el arroba php @php echo date ('Y') @endphp --
            tambien existen helpers que acortan codigo como por ejemplo el de abajo --}}


            todos los derechos semen
            {{ now()->year }}

    </footer>

    </body>
</html>
