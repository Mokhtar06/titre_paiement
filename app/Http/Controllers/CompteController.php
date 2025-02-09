<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Exports\ComptesExport;
use App\Imports\ComptesImport;
use Auth;
use Maatwebsite\Excel\Facades\Excel;

class CompteController extends Controller
{
    public function index()
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }
        $comptes = Compte::all();
        return view('compte.index', compact('comptes'));
    }

    public function create()
    {
        if(Auth::user()->isAdmin()){
        return view('compte.create');
        }else{
            $comptes = Compte::all();
            return view('compte.index', compact('comptes'));
        }
    }

    public function store(Request $request)
    {
        if(Auth::user()->isAdmin()){
        $request->validate([
            'numero' => 'required|string|max:50',  // Assurez-vous que le champ 'num_compt' est validé
            'type_compte' => 'required|string|max:255',
            'solde' => 'required|numeric',
            'date_creation' => 'required|date',
            'description' => 'nullable|string|max:500',
        ]);

        Compte::create($request->all());
        return redirect()->route('compte.index')->with('success', 'Compte créé avec succès.');
    }else{
        $comptes = Compte::all();
        return view('compte.index', compact('comptes'));
    }
}

    public function edit(Compte $compte)
    {
        if(Auth::user()->isAdmin()){
        return view('compte.edit', compact('compte'));
    }else{
        $comptes = Compte::all();
        return view('compte.index', compact('comptes'));
    }
}

    public function update(Request $request, Compte $compte)
    {
        if(Auth::user()->isAdmin()){
        $request->validate([
            'numero' => 'required|string|max:50',
            'type_compte' => 'required|string|max:255',
            'solde' => 'required|numeric',
            'date_creation' => 'required|date',
            'description' => 'nullable|string|max:500',
        ]);
        
        $compte->update($request->all());
        return redirect()->route('compte.index')->with('success', 'Compte mis à jour avec succès.');
    }else{
        $comptes = Compte::all();
        return view('compte.index', compact('comptes'));
    }
}

    public function destroy(Compte $compte)
    {
        if(Auth::user()->isAdmin()){
            $compte->delete();
            return redirect()->route('compte.index')->with('success', 'Compte supprimé avec succès.');
    }else{
        $comptes = Compte::all();
        return view('compte.index', compact('comptes'));
    }
}

    public function export()
    {
        if(Auth::user()->isAdmin()){
            return Excel::download(new ComptesExport, 'compt.xlsx');
    }else{
        $comptes = Compte::all();
        return view('compte.index', compact('comptes'));
    }
}

    public function import(Request $request)
    {
        if(Auth::user()->isAdmin()){
        $request->validate([
            'file' => 'required|mimes:xlsx,csv|max:2048',
        ]);

        try {
            Excel::import(new ComptesImport, $request->file('file'));
            return redirect()->route('compte.index')->with('success', 'Comptes importés avec succès!');
        } catch (\Exception $e) {
            return redirect()->route('compte.index')->with('error', 'Erreur lors de l\'importation : ' . $e->getMessage());
        }
    }else{
        $comptes = Compte::all();
        return view('compte.index', compact('comptes'));
    }
}
}
