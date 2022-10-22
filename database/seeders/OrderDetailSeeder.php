<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderDetail::create([
            'id_order' => 1,
            'id_menu' => 2,
            'jmlh_pesanan' => 2
        ]);
        OrderDetail::create([
            'id_order' => 1,
            'id_menu' => 3,
            'jmlh_pesanan' => 3
        ]);
        OrderDetail::create([
            'id_order' => 3,
            'id_menu' => 2,
            'jmlh_pesanan' => 1
        ]);
        OrderDetail::create([
            'id_order' => 4,
            'id_menu' => 1,
            'jmlh_pesanan' => 4
        ]);
        OrderDetail::create([
            'id_order' => 5,
            'id_menu' => 2,
            'jmlh_pesanan' => 2
        ]);
        OrderDetail::create([
            'id_order' => 6,
            'id_menu' => 2,
            'jmlh_pesanan' => 2
        ]);
        OrderDetail::create([
            'id_order' => 7,
            'id_menu' => 4,
            'jmlh_pesanan' => 1
        ]);
    }
}
