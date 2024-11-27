<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'name' => 'Member1',
            'email' => 'laenandaraung1682@gmail.com',
            'password' => Hash::make('member123'),
        ]);
    }
}
