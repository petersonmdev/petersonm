<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaDeCasaNovaGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cha_de_casa_nova_guests', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->unsignedTinyInteger('companions_count')->default(0);
            $table->timestamps();

            $table->index('full_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cha_de_casa_nova_guests');
    }
}
