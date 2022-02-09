<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client');
            $table->unsignedBigInteger('project');
            $table->unsignedBigInteger('evaluation');
            $table->unsignedBigInteger('menu');
            $table->unsignedBigInteger('ticket');
            $table->unsignedBigInteger('invoice');
            $table->string('name');
            $table->string('description');
            $table->timestamps();

            $table->foreign('client')->references('id')->on('clients')->onDelete('CASCADE');
            $table->foreign('project')->references('id')->on('projects')->onDelete('CASCADE');
            $table->foreign('evaluation')->references('id')->on('evaluations')->onDelete('CASCADE');
            $table->foreign('menu')->references('id')->on('menus')->onDelete('CASCADE');
            $table->foreign('ticket')->references('id')->on('tickets')->onDelete('CASCADE');
            $table->foreign('invoice')->references('id')->on('invoices')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
