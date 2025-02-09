<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use Auth;
use Illuminate\Http\Request;
use App\Exports\BeneficiairesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BeneficiairesInport;

class beneficiaireController extends Controller
{
    public function index()
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }
        $beneficiaires = Beneficiaire::all();
        return view('beneficiaire.index', compact('beneficiaires'));
    }

    public function create()
    {
        if(Auth::user()->isAdmin()){
            return view('beneficiaire.create');
        }else{
            $beneficiaires = Beneficiaire::all();
            return view('beneficiaire.index', compact('beneficiaires'));
        }
    }

    public function edit(Beneficiaire $beneficiaire)
    {
        if(Auth::user()->isAdmin()){
        return view('beneficiaire.edit', compact('beneficiaire'));
        }else{
            $beneficiaires = Beneficiaire::all();
            return view('beneficiaire.index', compact('beneficiaires'));
        }
    }

    public function update(Request $request, Beneficiaire $beneficiaire)
    {
        if(Auth::user()->isAdmin()){
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string',
            'telephone' => 'required|numeric',
            'email' => 'nullable|email',
            'type_beneficiaire' => 'nullable|in:personne,entreprise',
        ]);
    
        $beneficiaire->update($request->all());
    
        return redirect()->route('beneficiaire.index')->with('success', 'Bénéficiaire mis à jour avec succès.');
    } else{
        $beneficiaires = Beneficiaire::all();
        return view('beneficiaire.index', compact('beneficiaires'));
    }
    }

    public function store(Request $request)
    {
        if(Auth::user()->isAdmin()){
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|numeric',
            'email' => 'required|email',
            'type_beneficiaire' => 'required|in:personne,entreprise',
        ]);
        
        Beneficiaire::create($request->all());

        return redirect()->route('beneficiaire.index')->with('success', 'Bénéficiaire créé avec succès.');
    }else{
        $beneficiaires = Beneficiaire::all();
        return view('beneficiaire.index', compact('beneficiaires'));
    }
}

    public function destroy(Beneficiaire $beneficiaire)
    {
        if(Auth::user()->isAdmin()){
        // Supprimez les paiements associés au bénéficiaire (si applicable)
        $beneficiaire->paiements()->delete();
        
        // Supprimez le bénéficiaire
        $beneficiaire->delete();
    
        return redirect()->route('beneficiaire.index')->with('success', 'Bénéficiaire supprimé avec succès.');
    }else{
        $beneficiaires = Beneficiaire::all();
        return view('beneficiaire.index', compact('beneficiaires'));
    }
}
    
    

    public function import(Request $request)
    {
        if(Auth::user()->isAdmin()){
        $request->validate([
            'file' => 'required|mimes:xlsx,csv|max:2048',
        ]);

        try {
            Excel::import(new BeneficiairesInport, $request->file('file'));
            return redirect()->route('beneficiaire.index')->with('success', 'Bénéficiaires importés avec succès!');
        } catch (\Exception $e) {
            return redirect()->route('beneficiaire.index')->with('error', 'Erreur lors de l\'importation : ' . $e->getMessage());
        }
    }else{
        $beneficiaires = Beneficiaire::all();
        return view('beneficiaire.index', compact('beneficiaires'));
    }
}

    public function export()
    {
        if(Auth::user()->isAdmin()){
        return Excel::download(new BeneficiairesExport, 'beneficiaires.xlsx');
        }else{
            $beneficiaires = Beneficiaire::all();
            return view('beneficiaire.index', compact('beneficiaires'));
        }
    }
}
