<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'id_user' => '1',
            'id_customer' => '2',
            'jml_order' => '0',
            'total_pembayaran' => 0,
            'tgl_order' => '2022-06-15',
            'status_order' => 'Wait'
        ]);
    }
}
