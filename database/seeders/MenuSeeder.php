<?php

namespace Database\Seeders;

use Carbon\Factory;
use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menu::factory(5)->create();
        Menu::create([
            'nama_menu' => 'Pisang Susu Polos',
            'deskripsi_menu' => 'Enak bingit',
            'harga_menu' => '15000',
            'stock' => '20',
            'foto_menu' => 'foto_menu/menu1.jpg'
        ]);
        Menu::create([
            'nama_menu' => 'Pisang Susu Keju',
            'deskripsi_menu' => 'Enak bingit',
            'harga_menu' => '10000',
            'stock' => '20',
            'foto_menu' => 'foto_menu/menu2.png'
        ]);
        Menu::create([
            'nama_menu' => 'Pisang Susu Coklat (Mesin)',
            'deskripsi_menu' => 'Enak bingit',
            'harga_menu' => '20000',
            'stock' => '20',
            'foto_menu' => 'foto_menu/menu3.jpg'
        ]);
        Menu::create([
            'nama_menu' => 'Pisang Susu Coklat (Ori)',
            'deskripsi_menu' => 'Enak bingit',
            'harga_menu' => '20000',
            'stock' => '20',
            'foto_menu' => 'foto_menu/menu4.png'
        ]);
    }
}
