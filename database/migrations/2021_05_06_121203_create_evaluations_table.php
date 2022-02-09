<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client');
            $table->unsignedBigInteger('project');
            $table->string('name');
            $table->string('company');
            $table->string('rating');
            $table->string('image_avatar');
            $table->text('content');
            $table->timestamps();

            $table->foreign('client')->references('id')->on('clients')->onDelete('CASCADE');
            $table->foreign('project')->references('id')->on('projects')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
