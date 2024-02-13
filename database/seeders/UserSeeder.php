<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'Admin@fte.com',
            'password' => Hash::make('Admin@fte.com'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Kepala Bagian',
            'email' => 'KepalaBagian@fte.com',
            'password' => Hash::make('KepalaBagian@fte.com'),
            'role' => 'head_division',
        ]);
    }
}
