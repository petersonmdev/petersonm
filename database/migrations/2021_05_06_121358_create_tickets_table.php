<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client');
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('project');
            $table->string('subject');
            $table->string('email');
            $table->string('attachment');
            $table->text('content');
            $table->timestamps();

            $table->foreign('client')->references('id')->on('clients')->onDelete('CASCADE');
            $table->foreign('user')->references('id')->on('users')->onDelete('CASCADE');
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
        Schema::dropIfExists('tickets');
    }
}
