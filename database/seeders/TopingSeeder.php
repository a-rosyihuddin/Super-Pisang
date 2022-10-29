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
            'nama_toping' => 'Susu Kedelai',
            'stock' => 2
        ]);
        Toping::create([
            'nama_toping' => 'Susu Sapi',
            'stock' => 1
        ]);
        Toping::create([
            'nama_toping' => 'Keju Kuis',
            'stock' => 4
        ]);
        Toping::create([
            'nama_toping' => 'Ini Toping',
            'stock' => 4
        ]);
        Toping::create([
            'nama_toping' => 'Pokok Toping',
            'stock' => 4
        ]);
        Toping::create([
            'nama_toping' => 'Toping Terserah',
            'stock' => 4
        ]);
    }
}
