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
        Schema::create('domestic_competitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('referee_id');
            $table->unsignedBigInteger('event_type_id');
            $table->string('event_title');
            $table->string('event_date');
            $table->string('days_count');
            $table->integer('birth_year');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('province_id');
            $table->string('image')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('password');
            $table->timestamps();


            $table->foreign('degree_id')->references('id')->on('degrees')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
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
