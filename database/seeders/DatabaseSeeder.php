<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MenuSeeder::class,
            UserSeeder::class,
            TopingSeeder::class,
            // MejaSeeder::class,
            // CustomerSeeder::class,
            // OrderSeeder::class,
            // OrderDetailSeeder::class
        ]);
    }
}
