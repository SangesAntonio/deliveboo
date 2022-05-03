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
            ['name' => 'Internazionale', 'image' => 'category_images/internazionale.jpg'],
            ['name' => 'Cinese', 'image' => 'category_images/cinese.jpg'],
            ['name' => 'Giapponese', 'image' => 'category_images/giapponese.jpg'],
            ['name' => 'Messicano', 'image' => 'category_images/messicano.jpg'],
            ['name' => 'Indiano', 'image' => 'category_images/indiano.jpg'],
            ['name' => 'Pesce', 'image' => 'category_images/pesce.jpg'],
            ['name' => 'Carne', 'image' => 'category_images/carne.jpg'],
            ['name' => 'Pizza', 'image' => 'category_images/pizza.jpg'],
            ['name' => 'Cucina Mediterranea', 'image' => 'category_images/mediterranea.jpg'],
            ['name' => 'Dolci', 'image' => 'category_images/dolci.jpg'],
        ];

        foreach ($categories as $category) {
            $c = new Category();
            $c->name = $category['name'];
            $c->image = $category['image'];
            $c->save();
        }
    }
}
