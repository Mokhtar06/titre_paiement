<?php

namespace App\Http\Controllers;

use App\Models\Taxe;
use Illuminate\Http\Request;

class TaxeController extends Controller
{
    public function index()
    {
        $taxes = Taxe::all();
        return view('taxes.index', compact('taxes'));
    }

    public function edit($id)
    {
        $taxes = Taxe::findOrFail($id);
        return view('taxes.edit', compact('taxes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'taxe' => 'required|numeric|min:0|max:100',  // Validation pourcentage entre 0 et 100
        ]);
    
        $taxe = Taxe::findOrFail($id);
    
        $taxe->pourcentage = $request->taxe;
        $taxe->save();  
        return redirect()->route('taxes.index')->with('success', 'La taxe a été mise à jour avec succès.');
    }
    
}
