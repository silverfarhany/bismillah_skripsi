<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentors_id')->references('id')->on('mentors');
            $table->foreignId('members_id')->references('id')->on('members');
            $table->foreignId('tasks_id')->references('id')->on('tasks');
            $table->mediumInteger('PengetahuanKerja');
            $table->mediumInteger('ProblemSolving');
            $table->mediumInteger('KeterampilanTeknis');
            $table->mediumInteger('HasilKerja');
            $table->mediumInteger('KetepatanWaktu');
            $table->mediumInteger('Jujur');
            $table->mediumInteger('Disiplin');
            $table->mediumInteger('TanggungJawab');
            $table->mediumInteger('Motivasi');
            $table->mediumInteger('Inisiatif');
            $table->mediumInteger('TeamWork');
            $table->mediumInteger('Social');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
}
