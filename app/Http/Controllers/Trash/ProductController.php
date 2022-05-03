<?php

namespace App\Http\Controllers\Trash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Metodo per vedere la lista delle squadre nel cestino
    public function index()
    {
        // SELECT * FROM products WHERE 'deleted_at' NOT NULL
        $products = Product::onlyTrashed()->get();
        return view('admin.products.trash.index', compact('products'));
    }

    // Metodo per ripristinare una squadra
    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->route('admin.products.index');
    }

    // Metodo per eliminare definitivamente una squadra
    public function destroy($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->forceDelete();

        return redirect()->route('admin.products.trash.index');
    }
}
