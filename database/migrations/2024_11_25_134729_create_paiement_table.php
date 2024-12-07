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
        Schema::create('paiement', function (Blueprint $table) {
            $table->id(); 
            $table->decimal('montant', 15, 2); 
            $table->timestamp('date_paiement')->useCurrent(); 
            $table->enum('mode_paiement', ['carte', 'virement', 'cheque', 'espèces']); 
            $table->enum('status', ['en attente', 'réussi', 'échoué']); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiement');
    }
};
