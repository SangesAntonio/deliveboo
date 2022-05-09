<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('name', 'ASC')->with(['users'])->get();
        return response()->json($orders);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where("user_id", $id)->get();
        return response()->json($order);
    }

    /**
     * Save the order in DB.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeorder(Request $request)
    {
        $data = $request->all();
        $products = $data['products'];
        $product = Product::find($products[0]['id']);
        $user = $product->user;

        $total = 0;

        foreach ($products as $product) {
            $total += Product::find($product['id'])->price * $product['quantity'];
        }

        $newOrder = new Order();

        $newOrder->name = $data['client']['name'];
        $newOrder->lastname  = $data['client']['lastname'];
        $newOrder->address = $data['client']['address'];
        $newOrder->city = $data['client']['city'];
        $newOrder->total_amount = $data['client']['total'];
        $newOrder->quantity = $data['client']['quantity'];
        $newOrder->save();

        foreach ($products as $product) {
            $newOrder->products()->attach($product["id"], ['product_quantity' => $product["quantity"]]);
        }

        return response()->json($data, 200);
    }
}
