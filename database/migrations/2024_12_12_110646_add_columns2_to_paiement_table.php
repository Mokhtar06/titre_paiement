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
            // Ajouter la colonne id_compte
            $table->unsignedBigInteger('id_compte')->after('mode_paiement');
            
            // Ajouter la colonne id_beneficiaire
            $table->unsignedBigInteger('id_beneficiaire')->after('id_compte');
            
            // Ajouter les clés étrangères
            $table->foreign('id_compte')->references('id')->on('compte')->onDelete('cascade');
            $table->foreign('id_beneficiaire')->references('id')->on('beneficiaire')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paiement', function (Blueprint $table) {
            // Supprimer les clés étrangères
            $table->dropForeign(['id_compte']);
            $table->dropForeign(['id_beneficiaire']);
            
            // Supprimer les colonnes
            $table->dropColumn('id_compte');
            $table->dropColumn('id_beneficiaire');
        });
    }
};
