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
        Schema::create('personnes', function (Blueprint $table) {
            $table->id();
            $table->string('codePersonne')->unique();
            $table->string('nomPersonne');
            $table->string('prenomPersonne');
            $table->string('adressePersonne');
            $table->string('telPersonne');
            $table->string('mailPersonne')->nullable();
            $table->string('photoPersonne')->nullable();
            $table->date('dateAdhesion');
            $table->string('typePersonne');
            $table->foreignId('Agence')->references('id')->on('agences')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnes');
    }
};
