<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => Hash::make("admin"),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Silver User',
            'email' => 'silver@user.com',
            'role' => 'user',
            'member' => 'Silver',
            'password' => Hash::make("user"),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Gold User',
            'email' => 'gold@user.com',
            'role' => 'user',
            'member' => 'Gold',
            'password' => Hash::make("user"),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Platinum User',
            'email' => 'platinum@user.com',
            'role' => 'user',
            'member' => 'Platinum',
            'password' => Hash::make("user"),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Not Member User',
            'email' => 'notmember@user.com',
            'role' => 'user',
            'password' => Hash::make("user"),
        ]);
    }
}
