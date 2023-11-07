<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $insertData = [[
            'uuid' => Str::orderedUuid(),
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]];
        Admin::insert($insertData);
    }
}
