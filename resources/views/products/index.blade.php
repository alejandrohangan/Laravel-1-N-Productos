@extends('layouts.principal')

@section('titulo', 'Productos')
@section('cabecera', 'Catálogo de Productos')

@section('contenido')

<div class="mb-6 flex justify-end">
    <a href="{{ route('products.create') }}" class="px-8 py-4 bg-black text-white font-semibold rounded-full shadow hover:bg-gray-700">
        Crear Producto
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
    @foreach($products as $product)
    @php
    $color_stock = match (true) {
    $product->stock >= 0 && $product->stock <= 10=> 'text-red-400',
        $product->stock > 10 && $product->stock <= 30=> 'text-orange-500',
            $product->stock > 30 => 'text-green-600',
            };
            @endphp
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="{{ Storage::url($product->imagen) }}" alt="{{ $product->nombre }}" class="h-48 w-full object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-medium text-gray-900">{{ $product->nombre }}</h3>
                    <p class="text-gray-700 text-base">{{ $product->descripcion }}</p>
                    <div class="flex items-center justify-between mt-4">
                        <p class="text-gray-900 font-medium">Categoría: {{ $product->category->nombre }}</p>
                        <p class="text-gray-900 font-medium">
                            Stock: <span class="{{ $color_stock }}">{{ $product->stock }}</span>
                        </p>
                    </div>
                    <div class="flex justify-end mt-4">
                        <form class="inline-block" method="POST" action="{{ route('products.destroy', $product) }}">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('products.edit', $product) }}" class="inline-block">
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

<div class="mt-4">
    {{ $products->links() }}
</div>
@endsection