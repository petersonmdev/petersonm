<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsgTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msg_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket');                     
            $table->text('content');
            $table->string('attachment');
            $table->timestamps();

            $table->foreign('ticket')->references('id')->on('tickets')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('msg_tickets');
    }
}
