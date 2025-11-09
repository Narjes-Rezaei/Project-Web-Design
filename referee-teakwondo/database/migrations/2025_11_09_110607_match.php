<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matchs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_type_id');
            $table->string('event_title');
            $table->dateTime('event_date');
            $table->dateTime('event_date');
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('province_id');
            $table->timestamps();


            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
