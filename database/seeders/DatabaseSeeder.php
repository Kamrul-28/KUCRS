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
            'name' => 'Super Admin User',
            'email' => 'super@email.com',
            'role_id' => 1,
            'password' => Hash::make('123456')
        ]);
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@email.com',
            'role_id' => 2,
            'password' => Hash::make('123456')
        ]);
        DB::table('users')->insert([
            'name' => 'Teacher User',
            'email' => 'teacher@email.com',
            'role_id' => 3,
            'password' => Hash::make('123456')
        ]);
        DB::table('users')->insert([
            'name' => 'Student User',
            'email' => 'student@email.com',
            'role_id' => 4,
            'password' => Hash::make('123456')
        ]);
        DB::table('users')->insert([
            'name' => 'Student User',
            'email' => 'student1@email.com',
            'role_id' => 4,
            'password' => Hash::make('123456')
        ]);

        DB::table('settings')->insert([
            'app_name' => 'KUCRS',
            'app_url' => 'http://localhost:8000/',
            'app_logo_path' => 'http://localhost:8000/global_assets/images/ku_logo.png'
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Super Admin',
            'is_active' => 1
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Admin',
            'is_active' => 1
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Teacher',
            'is_active' => 1
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Student',
            'is_active' => 1
        ]);
    }
}
