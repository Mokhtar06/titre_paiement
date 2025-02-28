<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Compteur;
use Illuminate\Http\Request;

class CompteurController extends Controller
{
    public function index()
    {
        $compteurs = Compteur::all();
        return view('compteurs.index', compact('compteurs'));
    }

    public function create()
    {
        if(Auth::user()->isAdmin()){
        return view('compteurs.create');
    }}

    public function store(Request $request)
    {
        if(Auth::user()->isAdmin()){
        $request->validate([
            'annee' => 'required|integer',
            'compteur' => 'required|integer',
        ]);

        Compteur::create($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Compteur ajouté avec succès!');
    }}

}