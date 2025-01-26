@extends('layouts.principal')

@section('titulo', 'Edit Product')
@section('cabecera', 'Edit Product')

@section('contenido')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg">
        <form method="POST" action="{{ route('products.update', $product) }}" class="space-y-8" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="space-y-2">
                <label for="nombre" class="block text-sm text-gray-700">
                    Product Name
                </label>
                <input type="text"
                    id="nombre"
                    name="nombre"
                    value="{{ old('nombre', $product->nombre) }}"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-900 focus:ring-0"
                    placeholder="e.g. Electronics">
                @error('nombre')
                <x-error>{{ $message }}</x-error>
                @enderror
            </div>

            <!-- Description Field -->
            <div class="space-y-2">
                <label for="descripcion" class="block text-sm text-gray-700">
                    Product Description
                </label>
                <textarea id="descripcion"
                    name="descripcion"
                    rows="3"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-900 focus:ring-0"
                    placeholder="Describe the product...">{{ old('descripcion', $product->descripcion) }}</textarea>
                @error('descripcion')
                <x-error>{{ $message }}</x-error>
                @enderror
            </div>

            <!-- Image Field -->
            <div class="space-y-2">
                <label for="imagen" class="block text-sm text-gray-700">
                    Product Image
                </label>
                <div class="flex justify-between items-center">
                    <!-- Input para cargar la imagen -->
                    <div>
                        <input type="file"
                            id="imagen"
                            name="imagen"
                            accept="image/*"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-900 focus:ring-0"
                            oninput="preview.src=window.URL.createObjectURL(this.files[0])">
                    </div>

                    <!-- Imagen actual o previsualización -->
                    <div class="ml-2">
                        <img id="preview"
                            src="{{ Storage::url($product->imagen ?? 'images/products/default.png') }}"
                            class="w-56 aspect-video object-fill border-2 border-black rounded-md">
                    </div>
                </div>
                @error('imagen')
                <x-error>{{ $message }}</x-error>
                @enderror
            </div>

            <!-- Category Select -->
            <div class="space-y-2">
                <label for="category_id" class="block text-sm text-gray-700">
                    Product Category
                </label>
                <select id="category_id"
                    name="category_id"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-900 focus:ring-0">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->nombre }}
                    </option>
                    @endforeach
                </select>
                @error('category_id')
                <x-error>{{ $message }}</x-error>
                @enderror
            </div>

            <!-- Stock Field -->
            <div class="space-y-2">
                <label for="stock" class="block text-sm text-gray-700">
                    Product Stock
                </label>
                <input type="number"
                    id="stock"
                    name="stock"
                    value="{{ old('stock', $product->stock) }}"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-900 focus:ring-0"
                    placeholder="Enter stock amount">
                @error('stock')
                <x-error>{{ $message }}</x-error>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end space-x-4 pt-6">
                <a href="{{ route('products.index') }}"
                    class="px-6 py-2 text-sm text-gray-500 hover:text-gray-900">
                    Cancel
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-gray-900 text-white text-sm rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">
                    Save Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection