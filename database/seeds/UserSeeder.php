<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Grammar;
use Faker\Generator as Faker;

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
    }
}
