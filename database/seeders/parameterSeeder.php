<?php

namespace Database\Seeders;

use App\Models\EvaluationParameter;
use Illuminate\Database\Seeder;

class parameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EvaluationParameter::create([
            'description'=>'Penugasan / Pengetahuan Bidang Kerja',
            'category'=>'A'
        ]);

        EvaluationParameter::create([
            'description'=>'Kemampuan Memecahkan Masalah',
            'category'=>'A'
        ]);

        EvaluationParameter::create([
            'description'=>'Keterampilan Teknis',
            'category'=>'B'
        ]);

        EvaluationParameter::create([
            'description'=>'Kualitas Hasil Kerja',
            'category'=>'B'
        ]);

        EvaluationParameter::create([
            'description'=>'Ketepatan Waktu Penyelesaian Pekerjaan',
            'category'=>'B'
        ]);

        EvaluationParameter::create([
            'description'=>'Kejujuran',
            'category'=>'C'
        ]);

        EvaluationParameter::create([
            'description'=>'Kedisiplinan',
            'category'=>'C'
        ]);

        EvaluationParameter::create([
            'description'=>'Tanggung Jawab',
            'category'=>'C'
        ]);

        EvaluationParameter::create([
            'description'=>'Motivasi',
            'category'=>'C'
        ]);

        EvaluationParameter::create([
            'description'=>'Inisiatif',
            'category'=>'C'
        ]);

        EvaluationParameter::create([
            'description'=>'Team Work',
            'category'=>'C'
        ]);

        EvaluationParameter::create([
            'description'=>'Interaksi Sosial',
            'category'=>'C'
        ]);
    }
}
