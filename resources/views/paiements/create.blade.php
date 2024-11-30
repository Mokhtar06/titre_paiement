
@extends('layouts.app')

@section('content')
<style>
    /* Container principal */
.container {
    margin-top: 50px;
    max-width: 800px;
}

/* Titre */
h1 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 2rem;
    color: #4CAF50; /* Couleur verte pour le titre */
}

/* Formulaire */
form {
    background-color: #f9f9f9; /* Fond clair pour le formulaire */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Styles des éléments du formulaire */
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

/* Styles pour le bouton de soumission */
button[type="submit"] {
    background-color: #007bff; /* Couleur bleue de bouton */
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #0056b3; /* Couleur plus foncée au survol */
}

/* Message d'alerte */
.alert {
    margin-top: 20px;
    padding: 10px;
    background-color: #f8d7da;
    color: #721c24;
    border-radius: 5px;
    font-size: 1rem;
}

</style>
<div class="container">
    <h1>Ajouter un Paiement</h1>

    <form action="{{ route('paiements.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="montant">Montant</label>
            <input type="number" class="form-control" id="montant" name="montant" required>
        </div>
        <div class="form-group">
            <label for="date_paiement">Date de Paiement</label>
            <input type="date" class="form-control" id="date_paiement" name="date_paiement" required>
        </div>
        <div class="form-group">
            <label for="mode_paiement">Mode de Paiement</label>
            <select class="form-control" id="mode_paiement" name="mode_paiement" required>
                <option value="carte">Carte</option>
                <option value="virement">Virement</option>
                <option value="cheque">Chèque</option>
                <option value="espèces">Espèces</option>
            </select>
        </div>
        <div class="form-group">
            <label for="id_compte">Compte</label>
            <select class="form-control" id="id_compte" name="id_compte" required>
                @foreach ($comptes as $compte)
                    <option value="{{ $compte->id }}">{{ $compte->numero }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_beneficiaire">Bénéficiaire</label>
            <select class="form-control" id="id_beneficiaire" name="id_beneficiaire" required>
                @foreach ($beneficiaires as $beneficiaire)
                    <option value="{{ $beneficiaire->id }}">{{ $beneficiaire->nom }} {{ $beneficiaire->prenom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Statut</label>
            <select class="form-control" id="status" name="status" required>
                <option value="en attente">En attente</option>
                <option value="réussi">Réussi</option>
                <option value="échoué">Échoué</option>
            </select>
        </div>
        <div class="form-group">
            <label for="motif_de_la_depence">Motif de la depence</label>
            <input type="text" class="form-control" id="motif_de_la_depence" name="motif_de_la_depence" required>
        </div>
        <div class="form-group">
            <label for="impulsion">Impulsion</label>
            <select class="form-control" id="impulsion" name="impulsion" required>
                <option value="TVA">TVA</option>
                <option value="IMF">IMF</option>
                <option value="loyer">loyer</option>
                <option value="Exonéré">Exonéré</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter le Paiement</button>
    </form>
</div>
@endsection
