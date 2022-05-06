<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\User;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'user_id' => 31,
                'name' => 'Davide',
                'lastname' => 'Luporini',
                'email' => 'davideluporini@gmail.com',
                'address' => 'Via Grande 72, 57123',
                'city' => 'Livorno',
                'total_amount' => 28,
                'products' =>
                [
                    106, 106, 108, 108, 109, 107
                ]
            ],
            [
                'user_id' => 31,
                'name' => 'Davide',
                'lastname' => 'Vinciguerra',
                'email' => 'davidevinciguerra@gmail.com',
                'address' => 'Viale Italia 105, 57126',
                'city' => 'Livorno',
                'total_amount' => 34.5,
                'products' =>
                [
                    106, 106, 108, 108, 109, 107
                ]
            ],
            [
                'user_id' => 31,
                'name' => 'Antonio',
                'lastname' => 'Sanges',
                'email' => 'antoniosanges@gmail.com',
                'address' => 'Via San Marco 7, 57123',
                'city' => 'Livorno',
                'total_amount' => 49.5,
                'products' =>
                [
                    106, 106, 108, 108, 109, 107, 107, 107, 109, 109, 108
                ]
            ],
            [
                'user_id' => 31,
                'name' => 'Laura',
                'lastname' => 'Bigoni',
                'email' => 'laurabigoni@gmail.com',
                'address' => 'Scali delle Cantine 6, 57122',
                'city' => 'Livorno',
                'total_amount' => 18,
                'products' =>
                [
                    106, 106, 108, 109
                ]
            ],
            [
                'user_id' => 31,
                'name' => 'Davide',
                'lastname' => 'Croce',
                'email' => 'davidecroce@gmail.com',
                'address' => 'Via Borra 45, 57123',
                'city' => 'Livorno',
                'total_amount' => 36,
                'products' =>
                [
                    106, 106, 108, 108, 109, 107, 107, 109
                ]
            ],
        ];

        foreach ($orders as $order) {
            $o = new Order();
            $o->user_id = $order['user_id'];
            $o->name = $order['name'];
            $o->lastname = $order['lastname'];
            $o->email = $order['email'];
            $o->address = $order['address'];
            $o->city = $order['city'];
            $o->total_amount = $order['total_amount'];
            $o->save();

            $o->products()->sync($order['products']);
        }
    }
}
