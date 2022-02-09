<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project');
            $table->unsignedBigInteger('tag');
            $table->timestamps();

            $table->foreign('project')->references('id')->on('projects')->onDelete('CASCADE');
            $table->foreign('tag')->references('id')->on('tags')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_tags');
    }
}
