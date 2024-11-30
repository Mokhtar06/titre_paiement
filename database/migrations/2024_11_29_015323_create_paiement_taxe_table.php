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
        Schema::create('paiement_taxe', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paiement_id');
            $table->foreignId('taxe_id');
            $table->foreign('paiement_id')->references('id')->on('paiement');
            $table->foreign('taxe_id')->references('id')->on('taxes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiement_taxe');
    }
};
