<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parameter_id');
            $table->foreignId('form_id');
            $table->integer('point');
            $table->foreign('parameter_id')->references('id')->on('evaluation_parameters');
            $table->foreign('form_id')->references('id')->on('form_evaluations')->onDelete('cascade');
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
        Schema::dropIfExists('member_evaluations');
    }
}
