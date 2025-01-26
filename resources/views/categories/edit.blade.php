@extends('layouts.principal')

@section('titulo', 'Editar Categoría')
@section('cabecera', 'Editar Categoría')

@section('contenido')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg">
        <form method="POST" action="{{ route('categories.update', $category) }}" class="space-y-8">
            @csrf
            @method('PUT')
            <!-- Campo Nombre Categoría -->
            <div class="space-y-2">
                <label for="nombre" class="block text-sm text-gray-700">
                    Nombre de la categoría
                </label>
                <input type="text"
                    id="nombre"
                    name="nombre"
                    value="{{ old('nombre', $category->nombre) }}"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-900 focus:ring-0"
                    placeholder="Ejemplo: Electrónica">
                @error('nombre')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo Color Categoría -->
            <div class="space-y-2">
                <label for="color" class="block text-sm text-gray-700">
                    Color de la categoría
                </label>
                <input type="color"
                    id="color"
                    name="color"
                    value="{{ old('color', $category->color) }}"
                    class="w-full h-12 p-1 bg-gray-50 border border-gray-200 rounded-lg cursor-pointer focus:outline-none focus:border-gray-900 focus:ring-0">
                @error('color')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex items-center justify-end space-x-4 pt-6">
                <a href="{{ route('categories.index') }}"
                    class="px-6 py-2 text-sm text-gray-500 hover:text-gray-900">
                    Cancelar
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-gray-900 text-white text-sm rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">
                    Guardar categoría
                </button>
            </div>
        </form>
    </div>
</div>
@endsection