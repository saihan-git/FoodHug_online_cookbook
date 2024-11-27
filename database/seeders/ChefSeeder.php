<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Chef;

class ChefSeeder extends Seeder
{
    public function run()
    {
        Chef::create([
            'name' => 'John Doe',
            'email' => 'laenandaraung1682@gmail.com',
            'password' => Hash::make('password'),
            'specialty' => 'Italian Cuisine',
        ]);
    }
}
