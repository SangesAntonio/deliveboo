<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;


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
        return view('admin.users.index', compact('user'));
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
        return view('admin.users.create', compact('User'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Rule $rule)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //! Serve inserire User $User?
    public function edit(User $User)
    {
        return view('admin.users.edit', compact('user'));
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
                'restaurant_name' => ['required', 'string', 'min:2', 'max:50'],
                'email' => ['required', 'string', 'unique', 'regex:/^.+@.+$/i', 'email:rfc,dns'],
                'password' => ['required', 'confirmed', 'password:api'],
                'address' => 'required|string',
                'vat_number' => ['unique', 'required', 'string', 'size:11'],
                'image' =>  ['required', 'image'] //mimes:jpg, png , pdf --> need this to specify the type of the file
            ],
            [
                'required' => 'il campo :attribute è obbligatorio!',
                'vat_number.unique' => "Il campo :attribute: $request->restaurant_name risulta già registrato!",
                'restaurant_name.min' => "$request->title deve essere più lungo di 2 caratteri!",
                'restaurant_name.max' => "$request->title deve essere più corto di 50 caratteri!",
                'size' => 'il campo :attribute deve essere esattamente 11',
                'string' => 'il campo :attribute deve essere testuale',
                'image.image' => 'il campo :attribute non è una immagine',
                'email.regex' => 'il campo :attribute contiente caratteri vietati',
                'email.email' => 'sei sicuro di aver inserito l\'email corretta?',
                'email.unique' => 'Esiste già un utente con questa mail!',
                'password.password' => 'la password non rispetta i criteri , inserisci un\'altra password',

            ]
        );

        $data = $request->all();
        $user->update($data);

        return redirect()->route('admin.users.show', compact('user'));
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
    public function statistics(User $user)
    {
        return view('admin.users.statistics', compact('user'));
    }
}
