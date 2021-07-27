<?php

namespace Database\Seeders;
use Faker\Factory;
use App\Models\store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */




    public function run()
    {
        $faker=Factory::create('ar_JO');
            for($i=0; $i<10000;$i++)
            {
                store::create([
                    'name' => $faker->name,
                    'size' => $faker->randomElement(['l', 'm']),
                    'description' =>$faker->address,
                    "file_path" => 'address.png',
                ]);
            }
    }
}
