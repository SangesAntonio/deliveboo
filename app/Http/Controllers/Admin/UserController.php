<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //! Usiamo index come dettaglio dell'user /ristorante
    public function index(User $user)
    {
        $categories = Category::all();
        return view('admin.users.index', compact('user', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    // questo user tecnicamente è il nostro login , utilizzare il login dell'auth?
    {
        $User = new User();
        return view('admin.users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Rule $rule, User $user)
    {
        $request->validate(
            [
                'restaurant_name' => ['required', 'string', 'min:2', 'max:50'],
                'email' => ['required', 'string', 'unique', 'regex:/^.+@.+$/i', 'email:rfc,dns'],
                'password' => ['required', 'confirmed', 'password:api'],
                'address' => 'required|string',
                'vat_number' => ['unique', 'required', 'string', 'size:11'],
                'phone_number' => ['string', 'required', 'numeric'],
                'image' =>  ['required', 'image']
            ],
            [
                'required' => 'il campo :attribute è obbligatorio!',
                'vat_number.unique' => "Il campo :attribute $request->vat_number risulta già registrato!",
                'restaurant_name.min' => "$request->title deve essere più lungo di 2 caratteri!",
                'restaurant_name.max' => "$request->title deve essere più corto di 50 caratteri!",
                'size' => 'il campo :attribute deve essere esattamente 11',
                'string' => 'il campo :attribute deve essere testuale',
                'image.image' => 'il campo :attribute non è una immagine',
                'email.regex' => 'il campo :attribute contiente caratteri vietati',
                'email.email' => 'sei sicuro di aver inserito l\'email corretta?',
                'email.unique' => 'Esiste già un utente con questa mail!',
                'password.password' => 'la password non rispetta i criteri , inserisci un\'altra password',
                'phone_number.numeric' => 'Non hai inserito dei numeri corretti.'
            ]
        );

        $data = $request->all();
        $user->fill($data);
        $user->save();

        return redirect()->route('admin.users.show', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit(User $user)
    {
        if ($user->id !== auth()->user()->id) abort(404);

        $categories = Category::orderBy('name', 'ASC')->get();

        $user_categories_ids = $user->categories->pluck('id')->toArray();

        return view('admin.users.edit', compact('user', 'categories', 'user_categories_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $request->validate(
            [
                'restaurant_name' => ['string', 'required', Rule::unique('users')->ignore($user->id), 'min:2', 'max:50'],
                'email' => ['required', 'string', 'email', Rule::unique('users')->ignore($user->id), 'max:255', 'regex:/^.+@.+$/i', 'email:rfc,dns'],
                'address' => ['string', 'required', Rule::unique('users')->ignore($user->id), 'max:50', 'regex:/^\s*\S+(?:\s+\S+){2}/'],
                'vat_number' => ['string', 'required', Rule::unique('users')->ignore($user->id), 'size:11'],
                'phone_number' => ['string', 'required', Rule::unique('users')->ignore($user->id), 'numeric'],
                'image' =>  ['image', 'nullable', Rule::unique('users')->ignore($user->id)]
            ],
            [
                'required' => 'il campo :attribute è obbligatorio!',
                'vat_number.unique' => "Il campo :attribute $request->vat_number risulta già registrato!",
                'restaurant_name.min' => "$request->title deve essere più lungo di 2 caratteri!",
                'restaurant_name.max' => "$request->title deve essere più corto di 50 caratteri!",
                'size' => 'il campo :attribute deve essere esattamente 11',
                'string' => 'il campo :attribute deve essere testuale',
                'image.image' => 'il campo :attribute non è una immagine',
                'email.regex' => 'il campo :attribute contiente caratteri vietati',
                'email.email' => 'sei sicuro di aver inserito l\'email corretta?',
                'email.unique' => 'Esiste già un utente con questa mail!',
                'phone_number.numeric' => 'Non hai inserito dei numeri corretti.'

            ]
        );

        $data = $request->all();

        if (array_key_exists('image', $data)) {
            if ($user->image) Storage::delete($user->image);

            $img = Storage::put('user_images', $data['image']);
            $data['image'] = $img;
        }

        $user->update($data);

        if (!array_key_exists('categories', $data)) $user->categories()->detach();
        else $user->categories()->sync($data['categories']);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
    /**
     * Show the statistic of the restaurant.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statistics()
    {
        //Prendo l'id dell'utente loggato
        $idLog = Auth::id();

        // Recupero tutti i dati dell'utente loggato
        $user = DB::table('users')->where('id', '=', $idLog)->first();

        $quantity = DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('order_product', 'order_product.product_id', '=', 'product.id')
            ->join('orders', 'order_product.order_id', '=', 'orders.id')
            ->select(DB::raw('sum(order_product.product_quantity) as quantity , products.name'))
            ->groupBy('products.name')
            ->where('users.id', '=', $idLog)
            ->get();

        $price = DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('order_product', 'order_product.product_id', '=', 'products.id')
            ->join('orders', 'order_product.order_id', '=', 'orders.id')
            ->select('orders.created_at', 'orders.total_amount')
            ->where('users.id', '=', $idLog)
            ->get();

        $productName = $quantity->pluck('name');
        $totalQuantity = $quantity->pluck('product_quantity');

        foreach ($price as $item) {
            $item->created_at = date("d-m-Y", strtotime($item->created_at));
        }

        $orderDate = $price->pluck('created_at');
        $totalAmount = $price->pluck('total_amount');

        return view('admin.users.statistics', compact('totalQuantity', 'productName', 'quantity', 'user', 'price', 'orderDate', 'totalAmount'));
    }
}
