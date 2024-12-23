<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order_detail;
use App\Models\Order;
use App\Models\Product;
use Faker\Factory as Faker;
class Order_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        $order_id = Order::pluck('id')->toArray();
        $product_id = Product::pluck('id')->toArray();

        for($i=0; $i<10000; $i++)
        {
            Order_detail::create([
                'order_id'=>$faker->randomElement($order_id),
                'product_id'=>$faker->randomElement($product_id),
                'quantity'=>$faker->numberBetween(1,50),
            ]);
        }
    }
}
