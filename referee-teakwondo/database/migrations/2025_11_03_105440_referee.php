<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Routing\Matching\SchemeValidator;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('referees', function (Blueprint $table) {
            $table->unsignedBigInteger('referee_id')->primary();
            $table->string('national_code')->nullable();
            $table->string('name');
            $table->string('family');
            $table->unsignedBigInteger('degree_id');
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
