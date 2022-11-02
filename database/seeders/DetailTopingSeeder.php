<?php

namespace Database\Seeders;

use App\Models\DetailToping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailTopingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailToping::create([
            'order_detail_id' => 1,
            'toping_id' => 1,
        ]);
        DetailToping::create([
            'order_detail_id' => 1,
            'toping_id' => 2,
        ]);
        DetailToping::create([
            'order_detail_id' => 1,
            'toping_id' => 3,
        ]);
        DetailToping::create([
            'order_detail_id' => 2,
            'toping_id' => 1,
        ]);
        DetailToping::create([
            'order_detail_id' => 2,
            'toping_id' => 3,
        ]);
        DetailToping::create([
            'order_detail_id' => 2,
            'toping_id' => 4,
        ]);
    }
}
