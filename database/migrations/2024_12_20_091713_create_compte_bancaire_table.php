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
        Schema::create('compte_bancaire', function (Blueprint $table) {
            $table->id();
            $table->string('numero_compte')->unique();
            $table->integer('idUser');
            $table->string('nom_bancaire');
            $table->integer('budget')->default(0);
            $table->string('statut')->default('ouvert');
            $table->string('typeCompte')->default('Courant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('compte_bancaire');
    }
};