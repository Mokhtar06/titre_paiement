@extends('layouts.app')

@section('content')
    <!-- style css -->
    <style>
        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 5px rgba(0, 86, 179, 0.5);
        }

        .btn-warning {
            background-color: #f0ad4e;
            border-color: #eea236;
            color: white;
        }

        .btn-warning:hover {
            background-color: #ec971f;
            border-color: #d58512;
        }

        .container {
            max-width: 800px;
            margin-top: 50px;
        }
    </style>

<div class="container">
    <h1>Éditer le Paiement</h1>

    <form action="{{ route('paiements.update', $paiement->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="montant">Montant</label>
            <input type="number" class="form-control" id="montant" name="montant" value="{{ $paiement->montant }}" required>
        </div>

        <div class="form-group">
            <label for="mode_paiement">Mode de Paiement</label>
            <select class="form-control" id="mode_paiement" name="mode_paiement" required>
                <option value="carte" @if($paiement->mode_paiement == 'carte') selected @endif>Carte</option>
                <option value="virement" @if($paiement->mode_paiement == 'virement') selected @endif>Virement</option>
                <option value="cheque" @if($paiement->mode_paiement == 'cheque') selected @endif>Chèque</option>
                <option value="espèces" @if($paiement->mode_paiement == 'espèces') selected @endif>Espèces</option>
            </select>
        </div>

        <div class="form-group">
            <label for="id_compte">Compte</label>
            <select class="form-control" id="id_compte" name="id_compte" required>
                @foreach ($comptes as $compte)
                    <option value="{{ $compte->id }}" @if($compte->id == $paiement->id_compte) selected @endif>{{ $compte->numero }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_beneficiaire">Bénéficiaire</label>
            <select class="form-control" id="id_beneficiaire" name="id_beneficiaire" required>
                @foreach ($beneficiaires as $beneficiaire)
                    <option value="{{ $beneficiaire->id }}" @if($beneficiaire->id == $paiement->id_beneficiaire) selected @endif>{{ $beneficiaire->nom }} {{ $beneficiaire->prenom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Statut</label>
            <select class="form-control" id="status" name="status" required>
                <option value="en attente" @if($paiement->status == 'en attente') selected @endif>En attente</option>
                <option value="réussi" @if($paiement->status == 'réussi') selected @endif>Réussi</option>
                <option value="échoué" @if($paiement->status == 'échoué') selected @endif>Échoué</option>
            </select>
        </div>
        <div class="form-group">
            <label for="motif_da_la_depence">Motif de la depence</label>
            <input type="text" class="form-control" id="motif_da_la_depence" name="motif_da_la_depence" value="{{ $paiement->motif_de_la_depence }}" required>
        </div>

        <div class="form-group">
            <label for="impulsion">Impulsion</label>
            <select class="form-control" id="impulsion" name="impulsion" required>
                <option value="en attente" @if($paiement->impulsion == 'TVA') selected @endif>TVA</option>
                <option value="réussi" @if($paiement->impulsion == 'IMF') selected @endif>IMF</option>
                <option value="échoué" @if($paiement->impulsion == 'loyer') selected @endif>loyer</option>
                <option value="échoué" @if($paiement->impulsion == 'Exonéré') selected @endif>Exonéré</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Mettre à jour le Paiement</button>
    </form>
</div>
@endsection

