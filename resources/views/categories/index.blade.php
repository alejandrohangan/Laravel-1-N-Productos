@extends('layouts.principal')

@section('titulo', 'Categorias')
@section('cabecera', 'Listado Categorias')

@section('contenido')
<div class="mb-6 flex justify-end">
    <a href="{{ route('categories.create') }}" class="px-8 py-4 bg-black text-white font-semibold rounded-full shadow hover:bg-gray-700">
        Crear Categoría
    </a>
</div>

<div class="space-y-4">
    @foreach($categories as $category)
    <div class="rounded-lg shadow-sm border overflow-hidden bg-[{{$category->color}}]">
        <div class="p-6 flex items-center justify-between">
            <h3 class="text-xl font-semibold text-white">{{$category->nombre}}</h3>

            <div class="flex items-center space-x-4">
                <form class="inline-block" method="POST" action="{{route('categories.destroy', $category) }}">
                    @csrf
                    @method('DELETE')

                    <a href="{{route('categories.edit', $category)}}" class="inline-block">
                        <i class="fas fa-edit text-black text-xl"></i>
                    </a>
                    <button type="submit">
                        <i class="fas fa-trash text-xl text-black"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection