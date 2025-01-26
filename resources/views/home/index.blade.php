@extends('layouts.principal')

@section('titulo', 'Inicio')
@section('cabecera', '')

@section('contenido')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Card Productos -->
    <a href="{{ route('products.index') }}"
        class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
        <div class="h-64 bg-contain bg-no-repeat bg-center" style="background-image: url('/img/landing/products.webp')"></div>
        <div class="p-6">
            <h2 class="text-2xl font-medium text-gray-900">Productos</h2>
            <p class="text-gray-700 mt-2">Explora nuestro catálogo de productos.</p>
        </div>
    </a>

    <!-- Card Categorías -->
    <a href="{{ route('categories.index') }}"
        class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
        <div class="h-64 bg-contain bg-no-repeat bg-center" style="background-image: url('/img/landing/categories.webp')"></div>
        <div class="p-6">
            <h2 class="text-2xl font-medium text-gray-900">Categorías</h2>
            <p class="text-gray-700 mt-2">Navega por nuestras categorías.</p>
        </div>
    </a>
</div>
@endsection