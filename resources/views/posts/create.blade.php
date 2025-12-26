@extends('layouts.app')
@section('titulo')
    Crar una nueva Publicación
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            imagen aqui
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl ">
            <form action="{{ route('register')}}" method="POST" novalidate>
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
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{old('name')}}"
                    />
                    @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
            </form>
        </div>
        
    </div>
@endsection