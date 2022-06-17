<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Mentor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DivisionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MentorSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(parameterSeeder::class);
    }
}
