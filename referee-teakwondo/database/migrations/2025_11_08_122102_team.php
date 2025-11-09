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
        Schema::create('taem', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo');            
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('province_id');
            $table->timestamps();


            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
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
