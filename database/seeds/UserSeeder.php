<?php

use App\User;
use App\Models\Product;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $product_ids = Product::pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->product_id = Arr::random($product_ids);
            $user->restaurant_name = $faker->words(2, true);
            $user->email = $faker->email();
            $user->password = bcrypt($faker->password());
            $user->address = $faker->address();
            $user->vat_number = '12345678910';
            $user->image = $faker->imageUrl(360, 360);

            $user->save();
        }
        // ! Qua inseriamo piu prodotti per ogni ristorante
        // $product_ids = Product::all('id');
        // $user->each(function (App\User $user) use ($product_ids) {
        //     $user->products()->attach(
        //         $product_ids->random(rand(0, 3))->pluck('id')->toArray()
        //     );
        // });
    }
}
