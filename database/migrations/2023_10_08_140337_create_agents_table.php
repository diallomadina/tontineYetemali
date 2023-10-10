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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('codeAgent')->unique();
            $table->string('nomAgent');
            $table->string('prenomAgent');
            $table->string('adresseAgent');
            $table->string('telAgent');
            $table->string('mailAgent')->nullable();
            $table->string('photoAgent')->nullable();
            $table->date('dateAdhesion');
            $table->foreignId('Agence')->references('id')->on('agences')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
