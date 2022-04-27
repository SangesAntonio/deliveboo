<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = [
            ['name' => 'Internazionale'],
            ['name' => 'Cinese'],
            ['name' => 'Giapponese'],
            ['name' => 'Messicano'],
            ['name' => 'Indiano'],
            ['name' => 'Pesce'],
            ['name' => 'Carne'],
            ['name' => 'Pizza'],
            ['name' => 'Cucina Mediterranea'],
            ['name' => 'Dolci'],
        ];

        foreach ($categories as $category) {
            $c = new Category();
            $c->name = $category['name'];
            $c->color = $faker->hexColor();
            $c->save();
        }
    }
}
