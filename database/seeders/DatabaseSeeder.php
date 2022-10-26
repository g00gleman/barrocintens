<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user =
        ['name' => "Admin",
        'username' => "Admin",
        'email' => "admin@gmail.com",
        'password' => Hash::make('admin123'),
        'created_at' => "2022-10-26 11:45:28",
        'updated_at' => "2022-10-26 11:45:28",];

        DB::table('users')->insert($user);

        $rollen =
        ['user_id' => "1",
        'admin' => 1,
        'created_at' => "2022-10-26 11:45:28",
        'updated_at' => "2022-10-26 11:45:28",];

        DB::table('rollens')->insert($rollen);
    }
}
