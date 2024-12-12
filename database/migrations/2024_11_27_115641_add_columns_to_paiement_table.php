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
        Schema::table('paiement', function (Blueprint $table) {
            $table->string('motif_de_la_depence')->default('Motif non spécifié')->after('status');
            $table->enum('impulsion', ['TVA','IMF', 'Loyer', 'Exonéré']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paiement', function (Blueprint $table) {
            //
        });
    }
};
