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
        Menu::factory(5)->create();
        Menu::create([
            'nama_menu' => 'Bakso',
            'deskripsi_menu' => 'Enak bingit',
            'kategori' => 'Makanan',
            'harga_menu' => '15000',
            'stock' => '20',
            'foto_menu' => 'img/menu/menu2.png'
        ]);
        Menu::create([
            'nama_menu' => 'lalapan',
            'deskripsi_menu' => 'Enak bingit',
            'kategori' => 'Makanan',
            'harga_menu' => '10000',
            'stock' => '20',
            'foto_menu' => 'img/menu/menu3.png'
        ]);
        Menu::create([
            'nama_menu' => 'Sate',
            'deskripsi_menu' => 'Enak bingit',
            'kategori' => 'Dessert',
            'harga_menu' => '20000',
            'stock' => '20',
            'foto_menu' => 'img/menu/menu4.png'
        ]);
    }
}
