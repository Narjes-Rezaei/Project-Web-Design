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
        Schema::create('referee_match', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('referee_id');
            $table->unsignedBigInteger('match_id');
            $table->boolean('is_present');
            $table->boolean('is_observer');
            $table->boolean('is_best_referee');
            $table->boolean('score');
            $table->timestamps();

            $table->foreign('referee_id')->references('referee_id')->on('referees')->onDelete('cascade');
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
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
