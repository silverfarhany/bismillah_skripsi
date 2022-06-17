<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pembimbing 1',
            'email' => 'Pembimbing1@gmail.com',
            'password' => bcrypt('password'),
            'role' => '1'
        ]);

        User::create([
            'name' => 'Tim HR',
            'email' => 'timhr@gmail.com',
            'password' => bcrypt('password'),
            'role' => '3'
        ]);

        User::create([
            'name' => 'Peserta',
            'email' => 'peserta@gmail.com',
            'password' => bcrypt('password'),
            'role' => '2'
        ]);

        User::create([
            'name' => 'Peserta2',
            'email' => 'peserta2@gmail.com',
            'password' => bcrypt('password'),
            'role' => '2'
        ]);
    }
}
