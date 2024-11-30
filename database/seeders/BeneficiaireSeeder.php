<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Beneficiaire;

class BeneficiaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Beneficiaire::create([
        'nom' => 'marieme',
        'prenom' => 'med lemine',
        'email' => '23034@supnum.mr',
        'telephone' => '41151657',
        'adresse' => 'Arafat, NKTT',
        'type_beneficiaire' => 'personne morale',  // ou 'morale'
    ]);
}
}
