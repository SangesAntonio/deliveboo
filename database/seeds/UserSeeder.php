<?php

use App\User;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = [
            // !!! Ristoranti di pesce
            [
                'restaurant_name' => 'Ristorante Il Molo',
                'email' => 'ilmolo@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via San Giovanni 54, 57123, Livorno',
                'vat_number' => '35420980522',
                'image' => 'user_images/pesce-1.jpg',
                'phone_number' => '+39 392 152 4402',
                'categories' =>
                [
                    '1', '6', '9'
                ]
            ],
            [
                'restaurant_name' => 'Ristorante Ciglieri',
                'email' => 'ristoranteciglieri@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via Ravizza 43, 57128, Livorno',
                'vat_number' => '72519840929',
                'image' => 'user_images/pesce-2.jpg',
                'phone_number' => '+39 0586 508194',
                'categories' =>
                [
                    '6', '9'
                ]
            ],
            [
                'restaurant_name' => 'Trattoria Da Armandino',
                'email' => 'trattoriarmandino@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via Leonardo da Vinci 60, 57123, Livorno',
                'vat_number' => '32205270369',
                'image' => 'user_images/pesce-3.jpg',
                'phone_number' => '+39 334 216 9747',
                'categories' =>
                [
                    '6', '9'
                ]
            ],
            // !!! Ristoranti internazionali
            [
                'restaurant_name' => 'Nelson Tavern',
                'email' => 'nelsontavern@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via Scali d\'Azeglio 64, 57123, Livorno',
                'vat_number' => '70249990691',
                'image' => 'user_images/internazionale-1.jpg',
                'phone_number' => '+39 334 923 5618',
                'categories' =>
                [
                    '1', '6', '7'
                ]
            ],
            [
                'restaurant_name' => 'L\'Ostriconda',
                'email' => 'ostriconda@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Viale Italia 20, 57126, Livorno',
                'vat_number' => '11348160539',
                'image' => 'user_images/internazionale-2.jpg',
                'phone_number' => '+39 0586 809118',
                'categories' =>
                [
                    '1', '7'
                ]
            ],
            [
                'restaurant_name' => 'Joe Cafè and Diner',
                'email' => 'trattoriarmandino@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Piazzale Pietro Mascagni 2, 57127, Livorno',
                'vat_number' => '92205270369',
                'image' => 'user_images/internazionale-3.jpeg',
                'phone_number' => '+39 0586 809211',
                'categories' =>
                [
                    '6', '9', '4'
                ]
            ],
            // !!! Ristoranti cucina mediterranea
            [
                'restaurant_name' => 'Cascara Urban Restaurant',
                'email' => 'cascaraurban@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via Giovanni Marradi 193/A, 57125, Livorno',
                'vat_number' => '55037180878',
                'image' => 'user_images/mediterranea-1.jpg',
                'phone_number' => '+39 0586 014298',
                'categories' =>
                [
                    '6', '9'
                ]
            ],
            [
                'restaurant_name' => 'Ristorante Al Fosso Reale',
                'email' => 'alfossoreale@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Scali delle Cantine, 52/54, 57122, Livorno',
                'vat_number' => '28734210074',
                'image' => 'user_images/mediterranea-2.webp',
                'phone_number' => '+39 0586 888474',
                'categories' =>
                [
                    '6', '9'
                ]
            ],
            [
                'restaurant_name' => 'Osteria della Venezia',
                'email' => 'osteriadellavenezia@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Viale Caprera 43, 57123, Livorno',
                'vat_number' => '48734213074',
                'image' => 'user_images/mediterranea-3.jpg',
                'phone_number' => '+39 0586 839543',
                'categories' =>
                [
                    '6', '7', '9'
                ]
            ],
            // !!! Ristoranti di carne
            [
                'restaurant_name' => 'InCaRne Ristorante Macelleria',
                'email' => 'incarneristorante@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Scali del Monte Pio 11, 57123, Livorno',
                'vat_number' => '70257520174',
                'image' => 'user_images/carne-1.jpg',
                'phone_number' => '+39 0586 893227',
                'categories' =>
                [
                    '7', '9'
                ]
            ],
            [
                'restaurant_name' => 'El Artista',
                'email' => 'elartista@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Corso Amedeo 294, 57125, Livorno',
                'vat_number' => '55143730723',
                'image' => 'user_images/carne-2.jpg',
                'phone_number' => '+39 0586 895371',
                'categories' =>
                [
                    '7', '9'
                ]
            ],
            [
                'restaurant_name' => 'RoManzo',
                'email' => 'romanzo@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via Buia, 4, 57123, Livorno',
                'vat_number' => '58579810589',
                'image' => 'user_images/carne-3.jpg',
                'phone_number' => '+39 0586 211703',
                'categories' =>
                [
                    '7', '9'
                ]
            ],
            // !!! Ristoranti di pizza
            [
                'restaurant_name' => 'Pizzeria Bianco e Nero',
                'email' => 'pizzeriabianconero@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via Galileo Galilei 27, 57122, Livorno',
                'vat_number' => '35696540794',
                'image' => 'user_images/pizzeria-1.jpg',
                'phone_number' => '+39 389 995 0995',
                'categories' =>
                [
                    '8', '9'
                ]
            ],
            [
                'restaurant_name' => 'Pulcinè - pizza in brace Gourmet',
                'email' => 'pulcinegourmet@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Viale Italia 191 primo piano, 57127, Livorno',
                'vat_number' => '41675520195',
                'image' => 'user_images/pizzeria-2.jpg',
                'phone_number' => '+39 0586 321204',
                'categories' =>
                [
                    '8', '9'
                ]
            ],
            [
                'restaurant_name' => 'Pizzeria 5 Impasti',
                'email' => 'pizzeria5impasti@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via de Larderel 44, 57125, Livorno',
                'vat_number' => '71955700969',
                'image' => 'user_images/pizzeria-3.jpg',
                'phone_number' => '+39 0586 420126',
                'categories' =>
                [
                    '8', '9'
                ]
            ],
            // !!! Ristoranti Messicani
            [
                'restaurant_name' => 'Los Rancheros',
                'email' => 'losrancheros@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via Firenze 49, 57121, Livorno',
                'vat_number' => '28401440509',
                'image' => 'user_images/messicano-1.jpg',
                'phone_number' => '+39 328 154 2958',
                'categories' =>
                [
                    '4', '1'
                ]
            ],
            [
                'restaurant_name' => 'Old Wild West',
                'email' => 'oldwildwest@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via Firenze, 45, 57121, Livorno',
                'vat_number' => '77913620900',
                'image' => 'user_images/messicano-2.jpg',
                'phone_number' => '+39 0586 403228',
                'categories' =>
                [
                    '4', '1', '7'
                ]
            ],
            [
                'restaurant_name' => 'Tijuana Mexican Grill',
                'email' => 'tijuanamexicangrill@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Piazza Damiano Chiesa 6, 57124, Livorno',
                'vat_number' => '49387060137',
                'image' => 'user_images/messicano-3.jpg',
                'phone_number' => '+39 055 287247',
                'categories' =>
                [
                    '4', '1'
                ]
            ],
            // !!! Ristoranti indiani
            [
                'restaurant_name' => 'New Lal Qila Ristorante Indiano',
                'email' => 'lalqilaindiano@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via Magenta, 72-74, 57125, Livorno',
                'vat_number' => '62796610947',
                'image' => 'user_images/indiano-1.jpg',
                'phone_number' => '+39 0586 886202',
                'categories' =>
                [
                    '5'
                ]
            ],
            [
                'restaurant_name' => 'India Gate Ristorante Indiano',
                'email' => 'indiagateindiano@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Piazza del Cisternone 7/8, 57122, Livorno',
                'vat_number' => '43639240977',
                'image' => 'user_images/indiano-2.jpg',
                'phone_number' => '+39 0586 952174',
                'categories' =>
                [
                    '5'
                ]
            ],
            [
                'restaurant_name' => 'Livorno Tasty Food',
                'email' => 'livornotastyfood@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Viale Italia 59, 57126, Livorno',
                'vat_number' => '40602590388',
                'image' => 'user_images/indiano-3.jpg',
                'phone_number' => '+39 388 757 3219',
                'categories' =>
                [
                    '5', '1'
                ]
            ],
            // !!! Ristoranti cinesi
            [
                'restaurant_name' => 'Ristorante Cinese La Giada',
                'email' => 'ristorantelagiada@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Viale Giosuè Carducci, 114, 57124, Livorno',
                'vat_number' => '13760170293',
                'image' => 'user_images/cinese-1.jpg',
                'phone_number' => '+39 0586 427285',
                'categories' =>
                [
                    '2'
                ]
            ],
            [
                'restaurant_name' => 'Ni Hao',
                'email' => 'nihao@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via de Larderel 13/15, 57122, Livorno',
                'vat_number' => '26113600477',
                'image' => 'user_images/cinese-2.webp',
                'phone_number' => '+39 0586 898332',
                'categories' =>
                [
                    '2', '1'
                ]
            ],
            [
                'restaurant_name' => 'Ristorante Chinese Jambo',
                'email' => 'jambochinese@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via della Madonna 20, 57123, Livorno',
                'vat_number' => '27564870478',
                'image' => 'user_images/cinese-3.jpg',
                'phone_number' => '+39 0586 890499',
                'categories' =>
                [
                    '2'
                ]
            ],
            // !!! Ristoranti Giapponesi
            [
                'restaurant_name' => 'Zen',
                'email' => 'giapponesezen@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via Borra 45, 57123, Livorno ',
                'vat_number' => '38954330429',
                'image' => 'user_images/giapponese-1.jpg',
                'phone_number' => '+39 0586 210602',
                'categories' =>
                [
                    '3', '6'
                ]
            ],
            [
                'restaurant_name' => 'Takumi Sushi',
                'email' => 'takumisushi@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via San Marco 7, 57123, Livorno',
                'vat_number' => '21871420168',
                'image' => 'user_images/giapponese-2.jpg',
                'phone_number' => '+39 0586 425512',
                'categories' =>
                [
                    '3', '6'
                ]
            ],
            [
                'restaurant_name' => 'Nishiki Sushi',
                'email' => 'nishikisushi@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Viale Italia 103/105, 57126, Livorno',
                'vat_number' => '27237900025',
                'image' => 'user_images/giapponese-3.jpg',
                'phone_number' => '+39 0586 950382',
                'categories' =>
                [
                    '3', '6'
                ]
            ],
            // !!! Ristoranti di dolci
            [
                'restaurant_name' => 'Dollino Pasticceria',
                'email' => 'nishikisushi@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via Grande 72, 57123, Livorno',
                'vat_number' => '67376140462',
                'image' => 'user_images/dolci-1.jpg',
                'phone_number' => '+39 338 689 2312',
                'categories' =>
                [
                    '10'
                ]
            ],
            [
                'restaurant_name' => 'Pasticceria Cristiani',
                'email' => 'nishikisushi@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Via di Salviano 6-8-10, 57124, Livorno',
                'vat_number' => '73495490945',
                'image' => 'user_images/dolci-2.jpg',
                'phone_number' => '+39 0586 856598',
                'categories' =>
                [
                    '10'
                ]
            ],
            [
                'restaurant_name' => 'A luna Caprese',
                'email' => 'nishikisushi@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'Scali delle Cantine 6, 57122, Livorno',
                'vat_number' => '63920181219',
                'image' => 'user_images/dolci-3.jpg',
                'phone_number' => '+39 0586 321299',
                'categories' =>
                [
                    '10'
                ]
            ],
            // !!! ADMIN SOLO PER TEST !!! 
            [
                'restaurant_name' => 'admin',
                'email' => 'admin@bool.it',
                'password' => bcrypt('admin'),
                'address' => 'Via dell\'admin 1/A, Italia',
                'vat_number' => '63920181219',
                'image' => 'user_images/admin.jpg',
                'phone_number' => '+39 0586 321299',
                'categories' =>
                [
                    '1', '6', '10'
                ]
            ],
        ];

        foreach ($users as $user) {
            $u = new User();
            $u->restaurant_name = $user['restaurant_name'];
            $u->email = $user['email'];
            $u->password = $user['password'];
            $u->address = $user['address'];
            $u->vat_number = $user['vat_number'];
            $u->image = $user['image'];
            $u->phone_number = $user['phone_number'];
            $u->save();

            $u->categories()->sync($user['categories']);
        }
    }
}
