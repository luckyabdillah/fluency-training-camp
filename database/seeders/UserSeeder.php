<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'uuid' => fake()->uuid(),
            'name' => 'Lucky Abdillah',
            'username' => 'luckyabdillah',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::create([
            'uuid' => fake()->uuid(),
            'name' => 'Nauval',
            'username' => 'nauval',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::create([
            'uuid' => fake()->uuid(),
            'name' => 'Ziva',
            'username' => 'ziva',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::create([
            'uuid' => fake()->uuid(),
            'name' => 'Rafi',
            'username' => 'rafi',
            'password' => bcrypt('password'),
            'role' => 'staff',
        ]);
    }
}
