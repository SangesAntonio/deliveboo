<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;
use App\Models\Product;
use App\User;


class ProductSeeder extends Seeder
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
            $product = new Product();
            $product->user_id = Arr::random($user_ids);
            $product->name = $faker->word();
            $product->price = $faker->randomFloat(2, 5, 100);
            $product->description = $faker->paragraph();
            $product->image = $faker->imageUrl(360, 360);
            $product->visibility = $faker->boolean();
            $product->save();
        }
    }
}
