@extends('layouts.app')

@section('titulo')

Crear Nuevo Post


@endsection

@push('styles')

@endpush

@section('contenido')

<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
        <form enctype="multipart/form-data" method="POST" action="{{route('imagenes.store')}}" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
    </div>
    <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
        <form action="{{route('posts.store')}}" method="POST" novalidate>
                @csrf
                <div class = "mb-5">
                    <label for="titulo" class = "mb-2 block uppercase text-gray-500 font-bold">
                        Titula
                    </label>
                    <input
                    id="titulo"
                    name="titulo"
                    type= "text"
                    placeholder= "Titulo de la publicacion"
                    class= "border p-3 w-full rounded-lg @error('titulo') border-red-500
                    @enderror"
                    value={{old('titulo')}}
                    {{--mantiene lo escrito --}}
                    />
                    @error('titulo')
                    <p class= "bg-red-500 text-white my-2 rounder-lg text-sm p-2 text-center"> {{ $message}} </p>
                    @enderror
                </div>

                <div class = "mb-5">
                    <label for="descripcion" class = "mb-2 block uppercase text-gray-500 font-bold">
                        Descripcion
                    </label>
                    <textarea
                    id="descripcion"
                    name="descripcion"
                    placeholder= "Descripcion de la publicacion"
                    class= "border p-3 w-full rounded-lg @error('descripcion') border-red-500
                    @enderror"
                    {{--mantiene lo escrito --}}
                    >{{ old('descripcion') }}</textarea>

                    @error('descripcion')
                    <p class= "bg-red-500 text-white my-2 rounder-lg text-sm p-2 text-center"> {{ $message}} </p>
                    @enderror
                </div>

                <div class = "mb-5">
                    <input
                    type="hidden"
                    name="imagen"
                    value="{{ old('imagen') }}"
                    />
                    @error('imagen')
                    <p class= "bg-red-500 text-white my-2 rounder-lg text-sm p-2 text-center"> {{ $message}} </p>
                    @enderror
                </div>

                <input
                type="submit"
                value="crear publicacion"
                class= "bg-sky-600 hover:bg-sky-700 transition-colors cursors-pointer
                uppercase font-bold w-full p-3 text-white rounder-lg"
                />
        </form>
    </div>
</div>

    
@endsection

