<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\DetailToping;
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
            TokoSeeder::class,
            UserSeeder::class,
            TopingSeeder::class,
            // OrderSeeder::class,
            // OrderDetailSeeder::class,
            // DetailTopingSeeder::class
        ]);
    }
}
