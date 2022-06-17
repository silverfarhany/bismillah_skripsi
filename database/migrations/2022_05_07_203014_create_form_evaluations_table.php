<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id');
            $table->double('average')->nullable();
            $table->string('predicate')->nullable();
            $table->foreignId('evaluator')->nullable();
            $table->datetime('date');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('evaluator')->references('id')->on('mentors')->onDelete('set null');
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
        Schema::dropIfExists('form_evaluations');
    }
}
