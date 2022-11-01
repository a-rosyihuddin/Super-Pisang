<?php

namespace Database\Seeders;

use App\Models\Toping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Toping::create([
            'nama_toping' => 'Keju',
            'status' => 'Ready',
            'harga' => 3000
        ]);
        Toping::create([
            'nama_toping' => 'Coklat',
            'status' => 'Ready',
            'harga' => 3000
        ]);
        Toping::create([
            'nama_toping' => 'Mesis',
            'status' => 'Ready',
            'harga' => 2000
        ]);
        Toping::create([
            'nama_toping' => 'Selai',
            'status' => 'Ready',
            'harga' => 2000
        ]);
        Toping::create([
            'nama_toping' => 'Cappucino',
            'status' => 'Ready',
            'harga' => 3000
        ]);
        Toping::create([
            'nama_toping' => 'Manila',
            'status' => 'Ready',
            'harga' => 3000
        ]);
    }
}
