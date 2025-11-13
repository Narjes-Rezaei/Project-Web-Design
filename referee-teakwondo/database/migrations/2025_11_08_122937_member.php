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
        Schema::create('members' , function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('family');
            $table->dateTime('birth_date');
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('province_id');
            $table->string('image')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
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
