<?php

use App\User;
use App\Models\Category;
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
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->restaurant_name = $faker->words(2, true);
            $user->email = $faker->email();
            $user->password = bcrypt($faker->password());
            $user->address = $faker->address();
            $user->vat_number = '12345678910';
            $user->image = $faker->imageUrl(360, 360);

            $user->save();
        }
        
        // TODO: eliminare a fine progetto
        $admin = new User();
        $admin->restaurant_name = 'admin';
        $admin->address = 'via Duomo';
        $admin->vat_number = '12345678910';
        $admin->email = 'admin@bool.it';
        $admin->password = bcrypt('admin');
        $admin->image = $faker->imageUrl(360, 360);
        $admin->save();

        $category_ids = Category::all('id');
        $user->each(function (App\User $user) use ($category_ids) {
            $user->category()->attach(
                $category_ids->random(rand(1, 2))->pluck('id')->toArray()
            );
        });
    }
}
