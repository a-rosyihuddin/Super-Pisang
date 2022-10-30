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
            'stock' => 2,
            'harga' => 3000
        ]);
        Toping::create([
            'nama_toping' => 'Coklat',
            'stock' => 1,
            'harga' => 3000
        ]);
        Toping::create([
            'nama_toping' => 'Mesis',
            'stock' => 4,
            'harga' => 2000
        ]);
        Toping::create([
            'nama_toping' => 'Selai',
            'stock' => 4,
            'harga' => 2000
        ]);
        Toping::create([
            'nama_toping' => 'Cappucino',
            'stock' => 4,
            'harga' => 3000
        ]);
        Toping::create([
            'nama_toping' => 'Manila',
            'stock' => 4,
            'harga' => 3000
        ]);
    }
}
