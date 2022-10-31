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
            'user_id' => 2,
            'total_order' => 2,
            'total_pembayaran' => 30000,
            'tgl_order' => '2022-06-15',
            'status_order' => 'Proses'
        ]);
        Order::create([
            'user_id' => 2,
            'total_order' => 3,
            'total_pembayaran' => 10000,
            'tgl_order' => '2022-06-15',
            'status_order' => 'Selesai'
        ]);
        Order::create([
            'user_id' => 2,
            'total_order' => 3,
            'total_pembayaran' => 10000,
            'tgl_order' => '2022-06-15',
            'status_order' => 'Siap'
        ]);
    }
}
