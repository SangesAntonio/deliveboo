<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('admin.products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:50| min:2',
            'price' => 'required| max:999| min: 1| numeric',
            'description' => 'required| min:4 | max:500',
            'visibility' => 'boolean',
            'image' => 'image',
        ], [
            'name.required' => 'Il nome del prodotto è obbligatorio',
            'description.required' => 'La descrizione è obbligatoria',
            'name.max' => 'La lunghezza non può essere maggiore di :max caratteri',
            'name.min' => 'La lunghezza non può essere minore di :min caratteri',
            'description.min' => 'La lunghezza non può essere minore di :min caratteri',
            'description.max' => 'La lunghezza non può essere maggiore di :max caratteri',
            'price.numeric' => 'Il prezzo deve essere un numero',
            'price.min' => 'Il prezzo deve essere minimo :min euro',
            'price.max' => 'Il prezzo deve essere massimo :max euro',
            'image' => 'Il formato dell\'immagine non è corretto.',
        ]);
        $data = $request->all();
        $product = new Product();
        $product->fill($data);
        $product->save();
        return redirect()->route('admin.products.show');
    }



    // Rule::unique('product')->ignore($product->id)

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:50| min:2',
            'price' => 'required| max:999| min: 1| numeric',
            'description' => 'required| min:4 | max:500',
            'visibility' => 'boolean',
            'image' => 'image',
        ], [
            'name.required' => 'Il nome del prodotto è obbligatorio',
            'description.required' => 'La descrizione è obbligatoria',
            'name.max' => 'La lunghezza non può essere maggiore di :max caratteri',
            'name.min' => 'La lunghezza non può essere minore di :min caratteri',
            'description.min' => 'La lunghezza non può essere minore di :min caratteri',
            'description.max' => 'La lunghezza non può essere maggiore di :max caratteri',
            'price.numeric' => 'Il prezzo deve essere un numero',
            'price.min' => 'Il prezzo deve essere minimo :min euro',
            'price.max' => 'Il prezzo deve essere massimo :max euro',
            'image' => 'Il formato dell\'immagine non è corretto.',
        ]);
        $data = $request->all();
        $product->update($data);
        return redirect()->route('admin.products.show', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
