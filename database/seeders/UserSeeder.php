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
            'no_hp' => 'admin',
            'nama' => 'Yusuf',
            'password' => Hash::make('admin'),
            'level' => 'Admin' //admin|kasir
        ]);
        User::create([
            'no_hp' => '085807433209',
            'nama' => 'Ahmad Rosyihuddin',
            'password' => Hash::make('user'),
            'level' => 'Customer' //admin|kasir
        ]);
    }
}
