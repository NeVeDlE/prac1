<?php

namespace Database\Seeders;

use App\Models\Market;
use App\Models\Orders;
use App\Models\store;
use Faker\Factory;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker=Factory::create('ar_JO');
        for($i=0; $i<10000;$i++)
        {
            Market::create([
                'user_name' => $faker->name,
                'user_address' => $faker->address,
                'phone' =>"123456789",
                "item_id" => $faker->randomElement(['1', '2','3','4']),
            ]);
        }
    }
}
