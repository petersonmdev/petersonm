<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service');
            $table->unsignedBigInteger('client');
            $table->timestamps();

            $table->foreign('service')->references('id')->on('services')->onDelete('CASCADE');
            $table->foreign('client')->references('id')->on('clients')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_clients');
    }
}
