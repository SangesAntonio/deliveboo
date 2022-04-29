<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\facades\Storage;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->where('user_id', auth()->id())->get();



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
    public function store(Request $request, Product $product, User $user)
    {
        $request->validate([
            'name' => 'required|max:50| min:2',
            'price' => ['required', 'regex:/^(\d+(\.\d*)?)|(\.\d+)$/', 'max:999', ' min: 1'],
            'description' => 'required| min:4 | max:500',
            'visibility' => 'boolean',
            'image' => 'url',
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
            'price.required' => 'Il prezzo è obbligatorio',
            'url' => 'Il formato dell\'immagine non è corretto.',
            'boolean' => 'Deve essere vero o falso'
        ]);
        // if ($request->fails()) {
        //     return response()->json(['errors', $request->errors()]);
        // }
        $data = $request->all();
        $user = Auth::user();
        if (array_key_exists('visibility', $data)) {
            $product['visibility'] = true;
        }

        $product = new Product();
        $product->user_id = $user->id;
        $product->fill($data);
        $product->save();
        return redirect()->route('admin.products.show', $product->id);
    }

    public function toggle(Product $product)
    {
        $product->visibility = !$product->visibility;
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
            'image' => 'url',
        ], [
            'name.required' => 'Il nome del prodotto è obbligatorio',
            'description.required' => 'La descrizione è obbligatoria',
            'name.max' => 'La lunghezza non può essere maggiore di :max caratteri',
            'name.min' => 'La lunghezza non può essere minore di :min caratteri',
            'description.min' => 'La lunghezza della descrizione non può essere minore di :min caratteri',
            'description.max' => 'La lunghezza della descrizione non può essere maggiore di :max caratteri',
            'price.numeric' => 'Il prezzo deve essere un numero',
            'price.min' => 'Il prezzo deve essere minimo :min euro',
            'price.max' => 'Il prezzo deve essere massimo :max euro',
            'price.required' => 'Il prezzo è obbligatorio',
            'url' => 'Il formato dell\'immagine non è corretto.',
        ]);
        $data = $request->all();
        $data['visibility'] = array_key_exists('visibility', $data) ? 1 : 0;
        if (array_key_exists('image', $data)) {
            // $image = Storage::put('image', $data['image']);
            $data['image'] = $data['image'];
            // if ($product->image) Storage::delete($product->image);
        }

        $product->update($data);
        return redirect()->route('admin.products.show', $product->id);
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
