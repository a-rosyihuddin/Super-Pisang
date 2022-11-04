<?php

namespace Database\Seeders;

use App\Models\Toko;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Toko::create([
            'nama_toko' => 'Super Pisang',
            'batas_order' => 2,
            'status' => 'Buka',
        ]);
    }
}
