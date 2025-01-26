<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('id', 'desc')->paginate(6);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'nombre')->orderBy('nombre')->get();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules());
        $validatedData['imagen'] = ($request->imagen) ? $request->imagen->store('images/products/') : 'images/products/default.png';
        Product::create($validatedData);
        return redirect()->route('products.index')->with('mensaje', 'Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::select('id', 'nombre')->orderBy('nombre')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate($this->rules($product->id));
        $validatedData['imagen'] = ($request->imagen) ? $request->imagen->store('images/products/') : $product->imagen;

        $latestImage = $product->imagen;

        $product->update($validatedData);

        if (basename($latestImage) != 'default.png' && $request->imagen) {
            Storage::delete($latestImage);
        }

        return redirect()->route('products.index')->with('mensaje', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (basename($product->imagen) != 'default.png') {
            Storage::delete($product->imagen);
        }

        $product->delete();
        return redirect()->route('products.index')->with('mensaje', 'Producto eliminado correctamente');
    }

    private function rules(?int $id = null) : array {
        return [
            'nombre' => ['required', 'string', 'min:5', 'max:35', 'unique:products,nombre,' . $id],
            'descripcion' => ['required', 'string', 'min:5', 'max:100'],
            'imagen' => ['image', 'max:2048'],
            'category_id' => ['required', 'exists:categories,id'],
            'stock' => ['required', 'integer', 'min:0', 'max:10000'], 
        ];        
    }
}
