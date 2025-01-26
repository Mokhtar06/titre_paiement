<?php

namespace App\Exports;

use App\Models\Paiement;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaiementExport implements FromCollection, WithHeadings
{
    /**
     * Récupérer les paiements pour l'exportation.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Fetch all payments from the database
        return Paiement::all();
    }

    /**
     * Define the headings for the Excel file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Montant',
            'Date de Paiement',
            'Mode de Paiement',
            'Motif du Paiement',
            'Status',
            'Impulsion'
        ];
    }

    /**
     * Map the data to match the headings.
     * This is optional and only needed if your database columns don't match the headings.
     *
     * @param mixed $paiement
     * @return array
     */
    public function map($paiement): array
    {
        return [
            $paiement->montant,
            $paiement->date_paiement,
            $paiement->mode_paiement,
            $paiement->motif_de_la_paiement,
            $paiement->impulsion,
            $paiement->status
        ];
    }
}