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
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'x@email.com',
            'password' => Hash::make('123456')
        ]);

        DB::table('settings')->insert([
            'app_name' => 'Khulna University Course Registration System',
            'app_url' => 'http://localhost:8000/',
            'app_logo_path' => 'http://localhost:8000/global_assets/images/ku_logo.png'
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Super Admin',
            'is_active' => 1
        ]);
    }
}
