<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test 4 User',
            'email' => 'test4@example.com',
            'password'=>Hash::make('12345678'),
            'role'=>0,
        ]);
    }
}
