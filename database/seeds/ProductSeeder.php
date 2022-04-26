<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $product = new Product();
            $product->name = $faker->word();
            $product->price = $faker->randomFloat(2, 5, 100);
            $product->description = $faker->paragraph();
            $product->image = $faker->imageUrl(360, 360);
            $product->visibility = $faker->boolean();
            $product->save();
        }
    }
}
