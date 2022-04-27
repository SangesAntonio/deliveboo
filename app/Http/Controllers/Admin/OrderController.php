<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        $orders = Order::orderBy('updated_at', 'desc')->get();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        $request->validate([
            'email' => ['email:rfc,dns', 'required', 'email', Rule::unique('orders')->ignore($order->id), 'min:5', 'regex:/^.+@.+$/i'],
            'name' => 'required|string|min:5|max:50',
            'lastname' => 'required|string|min:5|max:50',
            'city' => 'required',
            'address' => 'required',
            'total_amount' => 'required|numeric',
            'user_id' => 'nullable|exists:users,id',
        ], [
            'email.required' => 'Il campo email è obbligatorio.',
            'email.email' => 'Devi inserire una mail corretta.',
            'email.min' => "La mail deve contenere almeno :min caratteri.",
            'name.required' => 'Il nome è obbligatorio.',
            'name.string' => 'Il nome non deve contenere numeri o caratteri speciali.',
            'name.min' => "Il nome deve contenere almeno :min caratteri.",
            'name.max' => "Il nome deve contenere almeno :max caratteri.",
            'lastname.required' => 'Il cognome è obbligatorio.',
            'lastname.string' => 'Il cognome non deve contenere numeri o caratteri speciali.',
            'lastname.min' => "Il cognome deve contenere almeno :min caratteri.",
            'lastname.max' => "Il cognome deve contenere almeno :max caratteri.",
            'city.required' => 'La città è obbligatoria.',
            'address.required' => "L'indirizzo è obbligatorio.",
            'total_amount.required' => "Questo campo è obbligatorio.",
            'total_amount.numeric' => "Il totale dev'essere numerico.",
        ]);

        $data = $request->all();

        $order->fill($data);

        $order->save();

        return redirect()->route('admin.orders.show', $order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'email' => ['email:rfc,dns', 'required', 'email', Rule::unique('orders')->ignore($order->id), 'min:5', 'regex:/^.+@.+$/i'],
            'name' => 'required|string|min:5|max:50',
            'lastname' => 'required|string|min:5|max:50',
            'city' => 'required',
            'address' => 'required',
            'total_amount' => 'required|numeric',
            'user_id' => 'nullable|exists:users,id',
        ], [
            'email.required' => 'Il campo email è obbligatorio.',
            'email.email' => 'Devi inserire una mail corretta.',
            'email.min' => "La mail deve contenere almeno :min caratteri.",
            'name.required' => 'Il nome è obbligatorio.',
            'name.string' => 'Il nome non deve contenere numeri o caratteri speciali.',
            'name.min' => "Il nome deve contenere almeno :min caratteri.",
            'name.max' => "Il nome deve contenere almeno :max caratteri.",
            'lastname.required' => 'Il cognome è obbligatorio.',
            'lastname.string' => 'Il cognome non deve contenere numeri o caratteri speciali.',
            'lastname.min' => "Il cognome deve contenere almeno :min caratteri.",
            'lastname.max' => "Il cognome deve contenere almeno :max caratteri.",
            'city.required' => 'La città è obbligatoria.',
            'address.required' => "L'indirizzo è obbligatorio.",
            'total_amount.required' => "Questo campo è obbligatorio.",
            'total_amount.numeric' => "Il totale dev'essere numerico.",
        ]);

        $data = $request->all();

        $order->update($data);

        return redirect()->route('admin.orders.show', $order->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index');
    }
}
