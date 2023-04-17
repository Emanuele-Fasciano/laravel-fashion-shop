<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use App\Models\Shoe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 30; $i++) { 
            $shoe = new Shoe;
    
            $shoe->marca = $faker->word();
            $shoe->modello = $faker->word();
            $shoe->colore = $faker->safeColorName();
            $shoe->taglia = $faker->numberBetween(20, 46);
            $shoe->prezzo = $faker->randomFloat(2, 20, 1000);
            $shoe->costo = $faker->randomFloat(2, 20, 1000);
            $shoe->genere = $faker->randomElement(['uomo', 'donna', 'bambino', 'bambina']);
            $shoe->image = $faker->imageUrl(640, 480, 'shoes', true);

            $shoe->save();
        }

    }
}