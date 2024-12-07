<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaiementTaxe extends Model
{
    // Le nom de la table associée
    protected $table = 'paiement_taxe';

    // Les colonnes que vous pouvez remplir (mass assignment)
    protected $fillable = ['paiement_id', 'taxe_id'];

    // Relation avec le modèle Paiement
    public function paiement()
    {
        return $this->belongsTo(Paiement::class);
    }

    // Relation avec le modèle Taxe
    public function taxe()
    {
        return $this->belongsTo(Taxe::class);
    }
}
