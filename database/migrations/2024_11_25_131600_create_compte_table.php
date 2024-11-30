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
        Schema::create('compte', function (Blueprint $table) {
            $table->id(); 
            $table->string('numero'); 
            $table->enum('type_compte', ['courant', 'épargne']); // Type de compte (par exemple courant ou épargne)
            $table->decimal('solde', 15, 2); // Solde du compte
            $table->timestamp('date_creation')->useCurrent(); 
            $table->text('description')->nullable(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compte');
    }
};
