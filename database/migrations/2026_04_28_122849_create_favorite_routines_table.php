<?php

use App\Models\Routine;
use App\Models\User;
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
        Schema::create('favorite_routines', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Routine::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['routine_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite_routines');
    }
};