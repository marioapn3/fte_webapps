<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyProfile::create([
            'name' => 'FTE',
            'address' => 'Jl. Raya Bogor, No. 1, Jakarta',
            'phone' => '021-1234567',
            'email' => '-'

        ]);
    }
}
