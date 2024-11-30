<?php

namespace App\Imports;

use App\Models\Paiement;
use Maatwebsite\Excel\Concerns\ToModel;

class PaiementImport implements ToModel
{
    /**
     * Mapper les données du fichier Excel et les enregistrer dans la base de données.
     *
     * @param array $row
     * @return \App\Models\Paiement
     */
    public function model(array $row)
    {
        return new Paiement([
            'montant' => $row[0],
            'date_paiement' => \Carbon\Carbon::parse($row[1]),
            'mode_paiement' => $row[2],
            'id_compte' => $row[3],
            'id_beneficiaire' => $row[4],
            'status' => $row[5],
        ]);
    }
}
