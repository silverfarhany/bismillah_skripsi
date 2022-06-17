<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'mentors_id' => 1,
            'divisions_id' => 1,
            'start' => '2020-01-01',
            'end' => '2020-03-03',
            'name' => 'Peserta 1',
            'nikp' => 'P0001',
            'univ' => 'lpkia',
            'email' => 'peserta@gmail.com',
            'description' => 'Mahasiswa PKL',
            'phone' => '076545678766',
            'activate_number' => 1,
            'cv' => 'aa',
            'internship_letter' => 'aa',
            'transcripts' => 'bb',
            'submission_status' => 'Diterima',
            'is_aktif' => 1,
        ]);

        Member::create([
            'mentors_id' => 1,
            'divisions_id' => 1,
            'start' => '2020-01-01',
            'end' => '2020-03-03',
            'name' => 'Peserta 2',
            'nikp' => 'P0002',
            'univ' => 'lpkia',
            'email' => 'peserta2@gmail.com',
            'description' => 'Mahasiswa PKL',
            'phone' => '076545678766',
            'activate_number' => 9,
            'cv' => 'aa',
            'internship_letter' => 'aa',
            'transcripts' => 'bb',
            'submission_status' => 'Diterima',
            'is_aktif' => 1,
        ]);

        Member::create([
            'mentors_id' => 1,
            'divisions_id' => 1,
            'start' => '2020-01-01',
            'end' => '2020-03-03',
            'name' => 'Peserta 3',
            'univ' => 'lpkia',
            'email' => 'peserta3@gmail.com',
            'description' => 'Mahasiswa PKL',
            'phone' => '076545678766',
            'cv' => 'aa',
            'internship_letter' => 'aa',
            'transcripts' => 'bb',
            'submission_status' => 'Pending',
            'is_aktif' => 0,
        ]);
    }
}
