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

    public function update(Request $request, Taxe $taxe)
    {
        $request->validate([
            'pourcentage' => 'required|numeric',
        ]);
        
        $taxe->update($request->all());
        return redirect()->route('taxes.index')->with('success', 'taxes mis à jour avec succès.');
    }
}
