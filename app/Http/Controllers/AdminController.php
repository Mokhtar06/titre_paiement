<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;
use App\Models\Compte;
use App\Models\Beneficiaire;
use App\Models\Taxe;
use App\Models\Compteur;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard'); 
    }

    public function compt_index()
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }
        $comptes = Compte::all();
        return view('admin.compt_index', compact('comptes'));
    }
    
    public function benefi_index()
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }
        $beneficiaires = Beneficiaire::all();
        return view('admin.benefi_index', compact('beneficiaires'));
    }

    public function paieme_index()
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }
        $paiements = Paiement::all();
        return view('admin.paieme_index', compact('paiements'));
    }

    public function taxes_index()
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }
        $taxes = Taxe::all();
        return view('admin.taxes_index', compact('taxes'));
    }

    public function getStats()
{
    return response()->json([
        'comptes' => Compte::count(),
        'beneficiaires' => Beneficiaire::count(),
        'paiements' => Paiement::count(),
        'taxes' => Taxe::count(),
        'users' => User::count(),
        'id_annee' => Compteur::count() // Si vous avez un modèle Compteur
    ]);
}
}

