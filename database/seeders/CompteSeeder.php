<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Compte;
class CompteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Compte::create([
        'numero' => '123456789',
        'type_compte' => 'courant',  // ou 'epargne'
        'solde' => 1000,
        'date_creation' => now(),
        'description' => 'Compte courant principal',
    ]);
}
}
