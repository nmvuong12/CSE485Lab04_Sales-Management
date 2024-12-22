<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $customer_id = Customer::pluck('id')->toArray();

        for($i=0; $i<100; $i++)
        {
            Order::create([
                'customer_id'=>$faker->randomElement($customer_id),
                'order_date'=>$faker->date(),
                'status'=>$faker->randomElement([0, 1]),
            ]);
        }
    }
}
