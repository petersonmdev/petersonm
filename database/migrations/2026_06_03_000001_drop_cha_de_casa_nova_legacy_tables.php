<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropChaDeCasaNovaLegacyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('cha_de_casa_nova_gifts');
        Schema::dropIfExists('cha_de_casa_nova_guests');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('cha_de_casa_nova_guests', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->unsignedTinyInteger('companions_count')->default(0);
            $table->timestamps();
            $table->index('full_name');
        });

        Schema::create('cha_de_casa_nova_gifts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->index();
            $table->text('description')->nullable();
            $table->boolean('received')->default(false)->index();
            $table->string('gifted_by')->nullable();
            $table->timestamps();
            $table->index('name');
        });
    }
}
