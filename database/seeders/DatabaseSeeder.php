<?php

namespace Database\Seeders;

use App\Models\Orders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     //   $this->call(StoreSeeder::class);
        $this->call(OrderSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
