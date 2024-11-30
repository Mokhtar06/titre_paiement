<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxe extends Model
{
    use HasFactory;

    protected $table = 'taxes';

    protected $fillable =[
        'TVA','IMF','PL','CF','IRF',
    ];


    public function paiements()
{
    return $this->belongsToMany(Paiement::class, 'paiement_taxe', 'taxe_id', 'paiement_id');
}
}
