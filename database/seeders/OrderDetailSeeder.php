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
            'order_id' => 1,
            'menu_id' => 2,
            'jml_order' => 2,
            'sub_total' => 3000,
            'toping_id' => 1
        ]);
        OrderDetail::create([
            'order_id' => 1,
            'menu_id' => 2,
            'jml_order' => 2,
            'sub_total' => 3000,
            'toping_id' => 2
        ]);
        sleep(1);
        OrderDetail::create([
            'order_id' => 1,
            'menu_id' => 1,
            'jml_order' => 2,
            'sub_total' => 3000,
            'toping_id' => 3
        ]);
        sleep(1);
        OrderDetail::create([
            'order_id' => 2,
            'menu_id' => 3,
            'jml_order' => 4,
            'sub_total' => 4000,
            'toping_id' => 1
        ]);
        OrderDetail::create([
            'order_id' => 2,
            'menu_id' => 3,
            'jml_order' => 4,
            'sub_total' => 4000,
            'toping_id' => 3
        ]);
        OrderDetail::create([
            'order_id' => 2,
            'menu_id' => 3,
            'jml_order' => 4,
            'sub_total' => 4000,
            'toping_id' => 4
        ]);
        OrderDetail::create([
            'order_id' => 2,
            'menu_id' => 3,
            'jml_order' => 4,
            'sub_total' => 4000,
            'toping_id' => 2
        ]);
        OrderDetail::create([
            'order_id' => 3,
            'menu_id' => 4,
            'jml_order' => 4,
            'sub_total' => 4000,
            'toping_id' => 2
        ]);
    }
}
