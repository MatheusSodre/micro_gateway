<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalAccount extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'API_GATEWAY',
                'email' => 'gateway@local.com',
                'password' => bcrypt('gateway'),
            ]
        ]);
    }
}
