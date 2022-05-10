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
                'created_at' => '2022-05-10 14:16:16',
                'user_id' => 31,
                'name' => 'Davide',
                'lastname' => 'Luporini',
                'email' => 'davideluporini@gmail.com',
                'address' => 'Via Grande 72, 57123',
                'city' => 'Livorno',
                'total_amount' => '',
                'products' =>
                [
                    [
                        'id' => 106,
                        'user_id' => 31,
                        'name' => 'Chili con carne',
                        'visibility' => 1,
                        'ingredients' => 'Manzo macinato, peperoni, fagioli rossi, passata di pomodoro.',
                        'price' => 7,
                        'image' => 'product_images/messicano/messicano(4).jpg',
                        'quantity' => 1,
                    ],
                    [
                        'id' => 107,
                        'user_id' => 31,
                        'name' => 'Nachos sfiziosi',
                        'visibility' => 1,
                        'ingredients' => 'Nachos, uova, jalapenos, pomodorini.',
                        'price' => 7.5,
                        'image' => 'product_images/messicano/messicano(3).jpg',
                        'quantity' => 1,
                    ],
                    [
                        'id' => 108,
                        'user_id' => 31,
                        'name' => 'Guacamole',
                        'visibility' => 1,
                        'ingredients' => 'Avocado, succo di lime, pomodori ramati, cipolle, coriandolo.',
                        'price' => 3.5,
                        'image' => 'product_images/messicano/messicano(6).jpg',
                        'quantity' => 3,
                    ],
                    [
                        'id' => 109,
                        'user_id' => 31,
                        'name' => 'Tacos della casa',
                        'visibility' => 1,
                        'ingredients' => 'salsiccia, cipollotto, lime, pomodori datterini, salsa allo yogurt.',
                        'price' => 8.5,
                        'image' => 'product_images/messicano/messicano(10).jpg',
                        'quantity' => 3,
                    ],
                ]
            ],
            [
                'created_at' => '2022-01-10 14:16:16',
                'user_id' => 31,
                'name' => 'Davide',
                'lastname' => 'Vinciguerra',
                'email' => 'davidevinciguerra@gmail.com',
                'address' => 'Viale Italia 105, 57126',
                'city' => 'Livorno',
                'total_amount' => '',
                'products' =>
                [
                    [
                        'id' => 106,
                        'user_id' => 31,
                        'name' => 'Chili con carne',
                        'visibility' => 1,
                        'ingredients' => 'Manzo macinato, peperoni, fagioli rossi, passata di pomodoro.',
                        'price' => 7,
                        'image' => 'product_images/messicano/messicano(4).jpg',
                        'quantity' => 2,
                    ],
                    [
                        'id' => 107,
                        'user_id' => 31,
                        'name' => 'Nachos sfiziosi',
                        'visibility' => 1,
                        'ingredients' => 'Nachos, uova, jalapenos, pomodorini.',
                        'price' => 7.5,
                        'image' => 'product_images/messicano/messicano(3).jpg',
                        'quantity' => 3,
                    ],
                    [
                        'id' => 108,
                        'user_id' => 31,
                        'name' => 'Guacamole',
                        'visibility' => 1,
                        'ingredients' => 'Avocado, succo di lime, pomodori ramati, cipolle, coriandolo.',
                        'price' => 3.5,
                        'image' => 'product_images/messicano/messicano(6).jpg',
                        'quantity' => 1,
                    ],
                    [
                        'id' => 109,
                        'user_id' => 31,
                        'name' => 'Tacos della casa',
                        'visibility' => 1,
                        'ingredients' => 'salsiccia, cipollotto, lime, pomodori datterini, salsa allo yogurt.',
                        'price' => 8.5,
                        'image' => 'product_images/messicano/messicano(10).jpg',
                        'quantity' => 1,
                    ],
                ]
            ],
            [
                'created_at' => '2022-02-10 14:16:16',
                'user_id' => 31,
                'name' => 'Antonio',
                'lastname' => 'Sanges',
                'email' => 'antoniosanges@gmail.com',
                'address' => 'Via San Marco 7, 57123',
                'city' => 'Livorno',
                'total_amount' => '',
                'products' =>
                [
                    [
                        'id' => 106,
                        'user_id' => 31,
                        'name' => 'Chili con carne',
                        'visibility' => 1,
                        'ingredients' => 'Manzo macinato, peperoni, fagioli rossi, passata di pomodoro.',
                        'price' => 7,
                        'image' => 'product_images/messicano/messicano(4).jpg',
                        'quantity' => 2,
                    ],
                    [
                        'id' => 108,
                        'user_id' => 31,
                        'name' => 'Guacamole',
                        'visibility' => 1,
                        'ingredients' => 'Avocado, succo di lime, pomodori ramati, cipolle, coriandolo.',
                        'price' => 3.5,
                        'image' => 'product_images/messicano/messicano(6).jpg',
                        'quantity' => 2,
                    ],
                    [
                        'id' => 109,
                        'user_id' => 31,
                        'name' => 'Tacos della casa',
                        'visibility' => 1,
                        'ingredients' => 'salsiccia, cipollotto, lime, pomodori datterini, salsa allo yogurt.',
                        'price' => 8.5,
                        'image' => 'product_images/messicano/messicano(10).jpg',
                        'quantity' => 5,
                    ],
                ]
            ],
            [
                'created_at' => '2022-03-10 14:16:16',
                'user_id' => 31,
                'name' => 'Laura',
                'lastname' => 'Bigoni',
                'email' => 'laurabigoni@gmail.com',
                'address' => 'Scali delle Cantine 6, 57122',
                'city' => 'Livorno',
                'total_amount' => '',
                'products' =>
                [
                    [
                        'id' => 108,
                        'user_id' => 31,
                        'name' => 'Guacamole',
                        'visibility' => 1,
                        'ingredients' => 'Avocado, succo di lime, pomodori ramati, cipolle, coriandolo.',
                        'price' => 3.5,
                        'image' => 'product_images/messicano/messicano(6).jpg',
                        'quantity' => 4,
                    ],
                    [
                        'id' => 109,
                        'user_id' => 31,
                        'name' => 'Tacos della casa',
                        'visibility' => 1,
                        'ingredients' => 'salsiccia, cipollotto, lime, pomodori datterini, salsa allo yogurt.',
                        'price' => 8.5,
                        'image' => 'product_images/messicano/messicano(10).jpg',
                        'quantity' => 2,
                    ],
                ]
            ],
            [
                'created_at' => '2022-04-10 14:16:16',
                'user_id' => 31,
                'name' => 'Davide',
                'lastname' => 'Croce',
                'email' => 'davidecroce@gmail.com',
                'address' => 'Via Borra 45, 57123',
                'city' => 'Livorno',
                'total_amount' => '',
                'products' =>
                [
                    [
                        'id' => 107,
                        'user_id' => 31,
                        'name' => 'Nachos sfiziosi',
                        'visibility' => 1,
                        'ingredients' => 'Nachos, uova, jalapenos, pomodorini.',
                        'price' => 7.5,
                        'image' => 'product_images/messicano/messicano(3).jpg',
                        'quantity' => 1,
                    ],
                    [
                        'id' => 108,
                        'user_id' => 31,
                        'name' => 'Guacamole',
                        'visibility' => 1,
                        'ingredients' => 'Avocado, succo di lime, pomodori ramati, cipolle, coriandolo.',
                        'price' => 3.5,
                        'image' => 'product_images/messicano/messicano(6).jpg',
                        'quantity' => 2,
                    ],
                    [
                        'id' => 109,
                        'user_id' => 31,
                        'name' => 'Tacos della casa',
                        'visibility' => 1,
                        'ingredients' => 'salsiccia, cipollotto, lime, pomodori datterini, salsa allo yogurt.',
                        'price' => 8.5,
                        'image' => 'product_images/messicano/messicano(10).jpg',
                        'quantity' => 3,
                    ],
                ]
            ],
            [
                'created_at' => '2022-05-10 14:16:16',
                'user_id' => 31,
                'name' => 'Davide',
                'lastname' => 'Luporini',
                'email' => 'davideluporini@gmail.com',
                'address' => 'Via Grande 72, 57123',
                'city' => 'Livorno',
                'total_amount' => '',
                'products' =>
                [
                    [
                        'id' => 106,
                        'user_id' => 31,
                        'name' => 'Chili con carne',
                        'visibility' => 1,
                        'ingredients' => 'Manzo macinato, peperoni, fagioli rossi, passata di pomodoro.',
                        'price' => 7,
                        'image' => 'product_images/messicano/messicano(4).jpg',
                        'quantity' => 3,
                    ],
                    [
                        'id' => 107,
                        'user_id' => 31,
                        'name' => 'Nachos sfiziosi',
                        'visibility' => 1,
                        'ingredients' => 'Nachos, uova, jalapenos, pomodorini.',
                        'price' => 7.5,
                        'image' => 'product_images/messicano/messicano(3).jpg',
                        'quantity' => 1,
                    ],
                    [
                        'id' => 108,
                        'user_id' => 31,
                        'name' => 'Guacamole',
                        'visibility' => 1,
                        'ingredients' => 'Avocado, succo di lime, pomodori ramati, cipolle, coriandolo.',
                        'price' => 3.5,
                        'image' => 'product_images/messicano/messicano(6).jpg',
                        'quantity' => 1,
                    ],
                    [
                        'id' => 109,
                        'user_id' => 31,
                        'name' => 'Tacos della casa',
                        'visibility' => 1,
                        'ingredients' => 'salsiccia, cipollotto, lime, pomodori datterini, salsa allo yogurt.',
                        'price' => 8.5,
                        'image' => 'product_images/messicano/messicano(10).jpg',
                        'quantity' => 2,
                    ],
                ]
            ],
            [
                'created_at' => '2022-05-01 14:16:16',
                'user_id' => 31,
                'name' => 'Davide',
                'lastname' => 'Vinciguerra',
                'email' => 'davidevinciguerra@gmail.com',
                'address' => 'Viale Italia 105, 57126',
                'city' => 'Livorno',
                'total_amount' => '',
                'products' =>
                [
                    [
                        'id' => 108,
                        'user_id' => 31,
                        'name' => 'Guacamole',
                        'visibility' => 1,
                        'ingredients' => 'Avocado, succo di lime, pomodori ramati, cipolle, coriandolo.',
                        'price' => 3.5,
                        'image' => 'product_images/messicano/messicano(6).jpg',
                        'quantity' => 2,
                    ],
                    [
                        'id' => 109,
                        'user_id' => 31,
                        'name' => 'Tacos della casa',
                        'visibility' => 1,
                        'ingredients' => 'salsiccia, cipollotto, lime, pomodori datterini, salsa allo yogurt.',
                        'price' => 8.5,
                        'image' => 'product_images/messicano/messicano(10).jpg',
                        'quantity' => 2,
                    ],
                ]
            ],
            [
                'created_at' => '2022-01-27 14:16:16',
                'user_id' => 31,
                'name' => 'Antonio',
                'lastname' => 'Sanges',
                'email' => 'antoniosanges@gmail.com',
                'address' => 'Via San Marco 7, 57123',
                'city' => 'Livorno',
                'total_amount' => '',
                'products' =>
                [
                    [
                        'id' => 106,
                        'user_id' => 31,
                        'name' => 'Chili con carne',
                        'visibility' => 1,
                        'ingredients' => 'Manzo macinato, peperoni, fagioli rossi, passata di pomodoro.',
                        'price' => 7,
                        'image' => 'product_images/messicano/messicano(4).jpg',
                        'quantity' => 3,
                    ],
                    [
                        'id' => 108,
                        'user_id' => 31,
                        'name' => 'Guacamole',
                        'visibility' => 1,
                        'ingredients' => 'Avocado, succo di lime, pomodori ramati, cipolle, coriandolo.',
                        'price' => 3.5,
                        'image' => 'product_images/messicano/messicano(6).jpg',
                        'quantity' => 3,
                    ],
                    [
                        'id' => 109,
                        'user_id' => 31,
                        'name' => 'Tacos della casa',
                        'visibility' => 1,
                        'ingredients' => 'salsiccia, cipollotto, lime, pomodori datterini, salsa allo yogurt.',
                        'price' => 8.5,
                        'image' => 'product_images/messicano/messicano(10).jpg',
                        'quantity' => 2,
                    ],
                ]
            ],
            [
                'created_at' => '2022-04-16 14:16:16',
                'user_id' => 31,
                'name' => 'Laura',
                'lastname' => 'Bigoni',
                'email' => 'laurabigoni@gmail.com',
                'address' => 'Scali delle Cantine 6, 57122',
                'city' => 'Livorno',
                'total_amount' => '',
                'products' =>
                [
                    [
                        'id' => 106,
                        'user_id' => 31,
                        'name' => 'Chili con carne',
                        'visibility' => 1,
                        'ingredients' => 'Manzo macinato, peperoni, fagioli rossi, passata di pomodoro.',
                        'price' => 7,
                        'image' => 'product_images/messicano/messicano(4).jpg',
                        'quantity' => 2,
                    ],
                    [
                        'id' => 107,
                        'user_id' => 31,
                        'name' => 'Nachos sfiziosi',
                        'visibility' => 1,
                        'ingredients' => 'Nachos, uova, jalapenos, pomodorini.',
                        'price' => 7.5,
                        'image' => 'product_images/messicano/messicano(3).jpg',
                        'quantity' => 1,
                    ],
                    [
                        'id' => 108,
                        'user_id' => 31,
                        'name' => 'Guacamole',
                        'visibility' => 1,
                        'ingredients' => 'Avocado, succo di lime, pomodori ramati, cipolle, coriandolo.',
                        'price' => 3.5,
                        'image' => 'product_images/messicano/messicano(6).jpg',
                        'quantity' => 1,
                    ],

                ]
            ],
            [
                'created_at' => '2022-04-20 14:16:16',
                'user_id' => 31,
                'name' => 'Davide',
                'lastname' => 'Croce',
                'email' => 'davidecroce@gmail.com',
                'address' => 'Via Borra 45, 57123',
                'city' => 'Livorno',
                'total_amount' => '',
                'products' =>
                [
                    [
                        'id' => 106,
                        'user_id' => 31,
                        'name' => 'Chili con carne',
                        'visibility' => 1,
                        'ingredients' => 'Manzo macinato, peperoni, fagioli rossi, passata di pomodoro.',
                        'price' => 7,
                        'image' => 'product_images/messicano/messicano(4).jpg',
                        'quantity' => 3,
                    ],
                    [
                        'id' => 107,
                        'user_id' => 31,
                        'name' => 'Nachos sfiziosi',
                        'visibility' => 1,
                        'ingredients' => 'Nachos, uova, jalapenos, pomodorini.',
                        'price' => 7.5,
                        'image' => 'product_images/messicano/messicano(3).jpg',
                        'quantity' => 1,
                    ],
                    [
                        'id' => 108,
                        'user_id' => 31,
                        'name' => 'Guacamole',
                        'visibility' => 1,
                        'ingredients' => 'Avocado, succo di lime, pomodori ramati, cipolle, coriandolo.',
                        'price' => 3.5,
                        'image' => 'product_images/messicano/messicano(6).jpg',
                        'quantity' => 1,
                    ],
                    [
                        'id' => 109,
                        'user_id' => 31,
                        'name' => 'Tacos della casa',
                        'visibility' => 1,
                        'ingredients' => 'salsiccia, cipollotto, lime, pomodori datterini, salsa allo yogurt.',
                        'price' => 8.5,
                        'image' => 'product_images/messicano/messicano(10).jpg',
                        'quantity' => 2,
                    ],
                ]
            ],
        ];

        foreach ($orders as $order) {
            $total = 0;
            foreach ($order['products'] as $p) {
                $total += Product::find($p['id'])->price * $p['quantity'];
            }

            $o = new Order();
            $o->user_id = $order['user_id'];
            $o->name = $order['name'];
            $o->lastname = $order['lastname'];
            $o->email = $order['email'];
            $o->address = $order['address'];
            $o->city = $order['city'];
            $o->total_amount = $total;
            $o->created_at = $order['created_at'];
            $o->save();

            foreach ($order['products'] as $product) {
                $o->products()->attach($product["id"], ['product_quantity' => $product["quantity"]]);
            }
        }
    }
}
