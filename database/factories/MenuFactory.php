<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_menu' => 'Nasi Goreng',
            'deskripsi_menu' => $this->faker->sentence(3),
            'kategori' => 'Makanan',
            'harga_menu' => 20000,
            'stock' => 20,
            'foto_menu' => 'img/menu/menu1.png'

        ];
    }
}
