<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //📌 Créer grâce à l'IA car je trouvais sympa d'avoir cette fonctionnalité, finalement j'ai décidé de l'enlever, car je ne comprenais pas comment fonctionnait le code
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('favorite_routines');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('favorite_routines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('routine_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['routine_id', 'user_id']);
        });
    }
};