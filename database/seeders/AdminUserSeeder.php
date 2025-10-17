<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'مدیر سایت',
            'email' => 'admin@rural.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
    }
}