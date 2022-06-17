<?php

namespace Database\Seeders;

use App\Models\Mentor;
use Illuminate\Database\Seeder;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mentor::create([
            'divisions_id' => 2,
            'name' => 'Bang Bob',
            'email' => 'Pembimbing1@gmail.com',
            'phone' => '0891234567'
        ]);
        Mentor::create([
            'divisions_id' => 1,
            'name' => 'Tim HR',
            'email' => 'timhr@gmail.com',
            'phone' => '0891234567'
        ]);
    }
}
