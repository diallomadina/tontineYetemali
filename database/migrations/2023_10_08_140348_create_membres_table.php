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
        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->string('codeMembre')->unique();
            $table->string('nomMembre');
            $table->string('prenomMembre');
            $table->string('adresseMembre');
            $table->string('telMembre');
            $table->string('mailMembre')->nullable();
            $table->string('photoMembre')->nullable();
            $table->date('dateAdhesionMembre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membres');
    }
};
