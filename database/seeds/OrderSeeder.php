<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Order;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Arr;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user_ids = User::pluck('id')->toArray();
        for ($i = 0; $i < 100; $i++) {
            $order = new Order();
            $order->user_id = Arr::random($user_ids);
            $order->name = $faker->word();
            $order->lastname = $faker->word();
            $order->email = $faker->email();
            $order->city = $faker->word();
            $order->address = $faker->address();
            $order->total_amount =  $faker->randomNumber(2, false);
            $order->save();
        }

        $product_ids = Product::all('id');
        $order->each(function (App\Models\Order $order) use ($product_ids) {
            $order->products()->attach(
                $product_ids->random(rand(1, 5))->pluck('id')->toArray(),
                // [$order->product_quantity = count($product_ids)->where('order_id')->$order->order_id]
            );
        });
    }
}
