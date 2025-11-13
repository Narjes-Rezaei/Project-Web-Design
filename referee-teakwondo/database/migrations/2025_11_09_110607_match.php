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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('event_title');
            $table->dateTime('event_date');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('event_rank_id');
            $table->unsignedBigInteger('event_type_id');
            $table->timestamps();


            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('event_rank_id')->references('id')->on('event_ranks')->onDelete('cascade');
            $table->foreign('event_type_id')->references('id')->on('event_types')->onDelete('cascade');
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
