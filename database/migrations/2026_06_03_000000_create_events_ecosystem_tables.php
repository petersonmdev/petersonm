<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEventsEcosystemTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(true)->index();
            $table->string('style_path')->nullable();
            $table->string('layout_view')->nullable();
            $table->string('landing_view')->nullable();
            $table->timestamps();
        });

        Schema::create('event_guests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->string('full_name');
            $table->unsignedTinyInteger('companions_count')->default(0);
            $table->timestamps();

            $table->index(['event_id', 'full_name']);
        });

        Schema::create('event_gifts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->string('name');
            $table->string('category');
            $table->text('description')->nullable();
            $table->boolean('received')->default(false)->index();
            $table->string('gifted_by')->nullable();
            $table->timestamps();

            $table->index(['event_id', 'category']);
            $table->index(['event_id', 'name']);
        });

        $this->backfillChaDeCasaNova();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_gifts');
        Schema::dropIfExists('event_guests');
        Schema::dropIfExists('events');
    }

    private function backfillChaDeCasaNova()
    {
        if (!Schema::hasTable('cha_de_casa_nova_guests') && !Schema::hasTable('cha_de_casa_nova_gifts')) {
            return;
        }

        $now = now();

        $eventId = DB::table('events')->insertGetId([
            'name' => 'Cha de Casa Nova',
            'slug' => 'cha-de-casa-nova',
            'is_active' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        if (Schema::hasTable('cha_de_casa_nova_guests')) {
            $guests = DB::table('cha_de_casa_nova_guests')->get();

            foreach ($guests as $guest) {
                DB::table('event_guests')->insert([
                    'event_id' => $eventId,
                    'full_name' => $guest->full_name,
                    'companions_count' => $guest->companions_count,
                    'created_at' => $guest->created_at ?? $now,
                    'updated_at' => $guest->updated_at ?? $now,
                ]);
            }
        }

        if (Schema::hasTable('cha_de_casa_nova_gifts')) {
            $gifts = DB::table('cha_de_casa_nova_gifts')->get();

            foreach ($gifts as $gift) {
                DB::table('event_gifts')->insert([
                    'event_id' => $eventId,
                    'name' => $gift->name,
                    'category' => $gift->category,
                    'description' => $gift->description,
                    'received' => $gift->received,
                    'gifted_by' => $gift->gifted_by,
                    'created_at' => $gift->created_at ?? $now,
                    'updated_at' => $gift->updated_at ?? $now,
                ]);
            }
        }
    }
}
