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
        Schema::create('pro_user', function (Blueprint $table) {
            $table->id('idProUser');
            $table->String('Nom');
            $table->String('Prenom');
            $table->String('Adresse');
            $table->String('Localisation');
            $table->String('tel');
            $table->String('Email');
            $table->String('Password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro_user');
    }
};
