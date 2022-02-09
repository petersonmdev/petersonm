<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project');
            $table->unsignedBigInteger('skill');
            $table->timestamps();

            $table->foreign('project')->references('id')->on('projects')->onDelete('CASCADE');
            $table->foreign('skill')->references('id')->on('skills')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_skills');
    }
}
