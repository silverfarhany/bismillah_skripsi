<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentors_id')->nullable();
            $table->foreignId('divisions_id')->nullable();
            $table->date('start');
            $table->date('end');
            $table->string('name');
            $table->string('nikp', 10)->unique()->nullable();
            $table->string('univ');
            $table->string('email')->unique();
            $table->longText('description')->nullable();
            $table->string('phone');
            $table->string('cv');
            $table->string('internship_letter');
            $table->string('transcripts');
            $table->string('submission_status');
            $table->boolean('is_aktif');
            $table->integer('activate_number')->nullable();
            $table->foreign('mentors_id')->references('id')->on('mentors')->onDelete('set null');
            $table->foreign('divisions_id')->references('id')->on('divisions')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
