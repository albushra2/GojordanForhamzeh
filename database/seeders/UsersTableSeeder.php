<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Admin user
        // User::create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('password123'),
        //     'phone' => '0799999999',
        //     'avatar' => 'avatars/admin.png',
        //     'bio' => 'Administrator of the Tourism Platform',
        //     'is_admin' => true,
        //     'email_verified_at' => now(),
        // ]);

        User::create([
            'name' => 'Ahmed Tourist',
            'email' => 'ahmed@example.com',
            'password' => Hash::make('password123'),
            'phone' => '0788888888',
            'avatar' => 'avatars/ahmed.png',
            'bio' => 'Loves exploring cultural and historical places in Jordan!',
            'is_admin' => false,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Guide Layla',
            'email' => 'layla@example.com',
            'password' => Hash::make('password123'),
            'phone' => '0777777777',
            'avatar' => 'avatars/layla.png',
            'bio' => 'Certified tour guide with 5 years of experience',
            'is_admin' => false,
            'email_verified_at' => now(),
        ]);
    }
}
