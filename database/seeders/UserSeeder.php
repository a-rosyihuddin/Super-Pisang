<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'nama' => 'Ahmad Rosyihuddin',
            'password' => Hash::make('admin'),
            'level' => 'Admin' //admin|kasir
        ]);
        User::create([
            'username' => 'kasir',
            'nama' => 'Ahmad Rosyihuddin',
            'password' => Hash::make('kasir'),
            'level' => 'Kasir' //admin|kasir
        ]);
    }
}
