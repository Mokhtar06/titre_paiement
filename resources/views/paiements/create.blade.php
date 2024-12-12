@extends('layouts.app')

@section('content')
<style>
    /* Styles du formulaire */
    .container {
        margin-top: 50px;
        max-width: 800px;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 2rem;
        color: #4CAF50;
    }

    form {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-size: 1rem;
        font-weight: bold;
        color: #333;
    }

    input[type="number"], input[type="date"], select {
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    .alert {
        margin-top: 20px;
        padding: 10px;
        background-color: #f8d7da;
        color: #721c24;
        border-radius: 5px;
        font-size: 1rem;
    }

    .is-invalid {
        border-color: #dc3545;
    }
</style>

<div class="container">
    <h1>Ajouter un Paiement</h1>

    <form action="{{ route('paiements.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="montant">Montant</label>
            <input type="number" class="form-control @error('montant') is-invalid @enderror" id="montant" name="montant" required value="{{ old('montant') }}">
            @error('montant')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date_paiement">Date de Paiement</label>
            <input type="date" class="form-control @error('date_paiement') is-invalid @enderror" 
                   id="date_paiement" name="date_paiement" required 
                   value="{{ old('date_paiement', \Carbon\Carbon::now()->format('Y-m-d')) }}">
            @error('date_paiement')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>
        

        <div class="form-group">
            <label for="mode_paiement">Mode de Paiement</label>
            <select class="form-control @error('mode_paiement') is-invalid @enderror" id="mode_paiement" name="mode_paiement" required>
                <option value="carte" @if(old('mode_paiement') == 'carte') selected @endif>Carte</option>
                <option value="virement" @if(old('mode_paiement') == 'virement') selected @endif>Virement</option>
                <option value="cheque" @if(old('mode_paiement') == 'cheque') selected @endif>Chèque</option>
                <option value="espèces" @if(old('mode_paiement') == 'espèces') selected @endif>Espèces</option>
            </select>
            @error('mode_paiement')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_compte">Compte</label>
            <select class="form-control @error('id_compte') is-invalid @enderror" id="id_compte" name="id_compte" required>
                @foreach ($comptes as $compte)
                    <option value="{{ $compte->id }}" @if(old('id_compte') == $compte->id) selected @endif>{{ $compte->numero }}</option>
                @endforeach
            </select>
            @error('id_compte')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_beneficiaire">Bénéficiaire</label>
            <select class="form-control @error('id_beneficiaire') is-invalid @enderror" id="id_beneficiaire" name="id_beneficiaire" required>
                @foreach ($beneficiaires as $beneficiaire)
                    <option value="{{ $beneficiaire->id }}" @if(old('id_beneficiaire') == $beneficiaire->id) selected @endif>{{ $beneficiaire->nom }} {{ $beneficiaire->prenom }}</option>
                @endforeach
            </select>
            @error('id_beneficiaire')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Statut</label>
            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                <option value="en attente" @if(old('status') == 'en attente') selected @endif>En attente</option>
                <option value="réussi" @if(old('status') == 'réussi') selected @endif>Réussi</option>
                <option value="échoué" @if(old('status') == 'échoué') selected @endif>Échoué</option>
            </select>
            @error('status')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="motif_de_la_depence">Motif de la dépense</label>
            <input type="text" class="form-control @error('motif_de_la_depence') is-invalid @enderror" id="motif_de_la_depence" name="motif_de_la_depence" required value="{{ old('motif_de_la_depence') }}">
            @error('motif_de_la_depence')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="impulsion">Impulsion</label>
            <select class="form-control @error('impulsion') is-invalid @enderror" id="impulsion" name="impulsion" required>
                <option value="TVA" @if(old('impulsion') == 'TVA') selected @endif>TVA</option>
                <option value="IMF" @if(old('impulsion') == 'IMF') selected @endif>IMF</option>
                <option value="loyer" @if(old('impulsion') == 'loyer') selected @endif>Loyer</option>
                <option value="Exonéré" @if(old('impulsion') == 'Exonéré') selected @endif>Exonéré</option>
            </select>
            @error('impulsion')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Ajouter le Paiement</button>
    </form>
</div>
@endsection
