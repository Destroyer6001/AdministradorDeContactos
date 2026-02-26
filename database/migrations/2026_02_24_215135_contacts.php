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
        Schema::create('contacts', function(Blueprint $table){
            $table->id();
            $table->string("first_name")->require();
            $table->string("last_name")->require();
            $table->integer("age");
            $table->string("email")->unique();
            $table->unsignedBigInteger('entity_id');
            $table->foreign('entity_id')->references('id')->on('entities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
