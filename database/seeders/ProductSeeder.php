<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        for($i=0; $i<100; $i++)
        {
            Product::create([
                'name'=>$faker->sentence(3),
                'description'=>$faker->paragraph(),
                'price'=>$faker->randomFloat(2, 10, 100),
                'quantity'=>$faker->numberBetween(5, 50),
            ]);
        }
    }
}
