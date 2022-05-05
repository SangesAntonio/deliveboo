<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DESC per Data
        $orders = Order::with(['products'])->where('user_id', auth()->id())->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if ($order->user_id !== auth()->user()->id) abort(404);
        return view('admin.orders.show', compact('order'));
    }
}