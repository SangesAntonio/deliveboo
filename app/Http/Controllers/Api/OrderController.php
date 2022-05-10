<?php

namespace App\Http\Controllers\Api;

use app\Mail\OrderCompleted;
use Illuminate\Support\Facades\Mail;
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
        $client = $data['client'];
        $total = $data['total'];
        $products = $data['products'];
        $product = Product::find($products[0]['id']);
        $user = $product->user_id;

        $newOrder = new Order();
        $newOrder->name = $client['name'];
        $newOrder->lastname = $client['lastname'];
        $newOrder->email = $client['email'];
        $newOrder->city = $client['city'];
        $newOrder->address = $client['address'];
        $newOrder->total_amount = $total;
        $newOrder->user_id = $user;
        $newOrder->save();

        foreach ($products as $product) {
            $newOrder->products()->attach($product["id"], ['product_quantity' => $product["quantity"]]);
        }

        // MANDO UNA MAIL DI CONFERMA
        $mail = new OrderCompleted();
        $receiver = $client['email'];
        Mail::to($receiver)->send($mail);

        return response()->json($data, 201);
    }
}
