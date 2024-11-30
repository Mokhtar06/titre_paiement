<?php

namespace App\Exports;

use App\Models\Paiement;
use Maatwebsite\Excel\Concerns\FromCollection;

class PaiementExport implements FromCollection
{

    
    /**
     * Récupérer les paiements pour l'exportation.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Paiement::all();
    }

    public function headings(): array
    {
        return [
             'montant', 'date_paiement', 'mode_paiement','motif_de_la_paiement','impulsion'
        ];
    }
}
