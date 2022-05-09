<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

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
        // $products = json_decode($data['products']);
        // $products = $data['products'];

        // $newOrder = new Order();
        // $newOrder->name = $data['client']['name'];
        // $newOrder->lastname  = $data['client']['lastname'];
        // $newOrder->address = $data['client']['address'];
        // $newOrder->email = $data['client']['email'];
        // $newOrder->city = $data['client']['city'];
        // $newOrder->total_amount = $data['total'];
        // $newOrder->user_id = $data['products']['user_id'];
        // $newOrder->save();

        // foreach ($products as $product) {
        //     $newOrder->products()->attach($product["id"], ['product_quantity' => $product["quantity"]]);
        // }

        return response()->json($data, 201);
    }
}
