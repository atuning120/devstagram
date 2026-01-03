@extends('layouts.app')
@section('titulo')
    {{ $post->titulo }}
@endsection


@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
            <div class="p-3">
                <p>0 Likes</p>
            </div>
            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input 
                            type="submit" 
                            value="Eliminar Publicación" 
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                            >
                    </form>
                @endif
            @endauth
        </div>


        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                <form action="{{ route('comentarios.store', ['user' => $post->user, 'post' => $post]) }}" method="POST">
                    @csrf
                    <div class="mb-4">

                        <p class="text-xl font-bold text-center mb-4">Agrega un Comentario</p>

                        @if (session('mensaje'))
                            <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                                {{ session('mensaje') }}
                            </div>
                        @endif


                        <label for="comentario" class="sr-only">Añade un comentario</label>
                        <textarea id="comentario"
                        name="comentario" 
                        rows="3" 
                        placeholder="Añade un comentario..." 
                        class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"></textarea>
                        @error('comentario')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="submit" value="Comentar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                </form>
                @endauth
                {{-- comentarios con fecha y verificacion si no hay comentarios poner un mensaje--}}
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentarios->count() == 0)
                        <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay comentarios aun</p>
                    @endif
                    @foreach ($post->comentarios as $comentario)
                    <div class="bg-white shadow mb-5 p-5 rounded-lg">
                        <a href="{{route('posts.index', $comentario->user) }}" class="font-bold">{{ $comentario->user->username }}</a>
                        <p>{{ $comentario->comentario }}</p>
                        <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    
@endsection
