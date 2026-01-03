@extends('layouts.app')

@section('titulo')

Perfil: {{ $user->username }}


@endsection

@section('contenido')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="md:w-8/12 lg:w-6/12 px-5 flex md:flex md:flex-col items-center md:justify-center nd:items-start py-10">
                <img src="{{asset('auth/usuario.svg')}}" alt="imagen usuario">
            </div>
            <div class="flex items-center gap-2">
                <p class="text-gray-700 text-2xl">{{ $user->username }}</p>
                @auth

                @if ($user->id === auth()->user()->id)
                    <a href="{{ route('perfil.index') }}" class="bg-gray-600 hover:bg-gray-700 transition-colors cursor-pointer uppercase font-bold text-white p-2 rounded-lg block text-center w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="currentColor" viewBox="0 0 20 20" stroke="currentColor" stroke-width="2">
                            <path d=M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z/> </svg>
                        </a>

                @else

                @endif

                @endauth

                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal"> Seguidores </span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal"> Posts </span>

            </div>
        </div>

    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black mb-10">Tus ultimas publicaciones</h2>


        @if ($posts->count()    )

        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($posts as $post)
                <div>
                    <a href="{{route('posts.show', ['post'=>$post, 'user'=>$user])}}">
                    <img src= "{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                    </a>
                </div>
            @endforeach
        </div>
        <div>
            {{$posts->links('pagination::tailwind')}}
        </div>

        @else
            <p class="text-center">No hay publicaciones aun, crea tu primera publicacion</p>
        @endif
@endsection
