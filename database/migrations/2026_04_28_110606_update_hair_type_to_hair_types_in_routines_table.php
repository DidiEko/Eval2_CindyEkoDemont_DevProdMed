<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('routines', function (Blueprint $table) {
            $table->json('hair_types')->nullable()->after('steps');
        });

        $routines = DB::table('routines')->select('id', 'hair_type')->get();

        foreach ($routines as $routine) {
            DB::table('routines')
                ->where('id', $routine->id)
                ->update([
                    'hair_types' => json_encode($routine->hair_type ? [$routine->hair_type] : []),
                ]);
        }

        Schema::table('routines', function (Blueprint $table) {
            $table->dropColumn('hair_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('routines', function (Blueprint $table) {
            $table->string('hair_type')->nullable()->after('steps');
        });

        $routines = DB::table('routines')->select('id', 'hair_types')->get();

        foreach ($routines as $routine) {
            $hairTypes = json_decode($routine->hair_types, true) ?? [];

            DB::table('routines')
                ->where('id', $routine->id)
                ->update([
                    'hair_type' => $hairTypes[0] ?? null,
                ]);
        }

        Schema::table('routines', function (Blueprint $table) {
            $table->dropColumn('hair_types');
        });
    }
};