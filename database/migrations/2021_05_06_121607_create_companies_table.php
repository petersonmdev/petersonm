<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client');
            $table->string('name');
            $table->string('company_name')->nullable();
            $table->string('cpf');
            $table->string('rg');
            $table->string('issuing_organ');
            $table->string('issuing_state');
            $table->string('cnpj')->unique();
            $table->timestamps();

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
        Schema::dropIfExists('companies');
    }
}
