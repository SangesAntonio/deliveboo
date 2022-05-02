<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\facades\Storage;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'restaurant_name' => ['string', 'required', 'unique:users', 'min:2', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'regex:/^.+@.+$/i', 'email:rfc,dns'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'address' => ['string', 'required', 'unique:users', 'max:50', 'regex:/^\s*\S+(?:\s+\S+){2}/'],
            'vat_number' => ['string', 'required', 'unique:users', 'size:11'],
            'image' =>  ['image', 'required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (array_key_exists('image', $data)) {
            $img = Storage::put('user_images', $data['image']);
            $data['image'] = $img;
        };

        return User::create([
            'restaurant_name' => $data['restaurant_name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
            'vat_number' => $data['vat_number'],
            'image' => $data['image']
        ]);
    }
}
