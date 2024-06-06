<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(3)->create();

        User::factory()->create([
            'name' => 'Dhin Steve',
            'email' => 'admin@dhintech.com',
            'password' => Hash::make('admin123'),
            // 'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Fakhriza',
            'email' => 'fahriza@dhintech.com',
            'password' => Hash::make('password'),
            // 'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Vanesya',
            'email' => 'nesya@dhintech.com',
            'password' => Hash::make('password'),
            // 'role' => 'admin',
        ]);

        // data dummy for company
        \App\Models\Company::create([
            'name' => 'PT. DhinTech',
            'email' => 'official@dhintech.com',
            'address' => 'Jl. Jalan yuk',
            'latitude' => '-6.6953321',
            'longitude' => '106.8090916',
            'radius_km' => '2.5',
            'time_in' => '08:00',
            'time_out' => '23:50',
        ]);

        $this->call([
            // AttendanceSeeder::class,
            // PermissionSeeder::class,
        ]);
    }
}
