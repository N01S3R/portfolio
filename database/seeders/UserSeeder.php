<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Padle',
            'last_name' => 'Stravbord',
            'email' => 'admin@test.com',
            'user_name' => 'Padle',
            'password' => bcrypt('password'),
            'email_verified_at' => Carbon::yesterday(),
        ]);

        $user->assignRole(['Admin']);

        $user = User::create([
            'first_name' => 'Padle',
            'last_name' => 'Stravbord',
            'email' => 'member@test.com',
            'user_name' => 'Abdul',
            'password' => bcrypt('password'),
            'email_verified_at' => Carbon::yesterday(),
        ]);

        $user->assignRole(['User']);
    }
}
