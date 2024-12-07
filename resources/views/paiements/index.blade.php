@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Liste des Paiements</h1>

    <!-- Messages de succès -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @foreach ($paiements as $paiement )
   <div class="import_export">
    <!-- <a href="{{ route('paiements.create') }}" class="btn btn-primary">Ajouter un Paiement</a> -->
    <!-- <a href="{{ route('paiements.export', ['id' => $paiement->id] ) }}" class="btn btn-success">Exporter </a>
    <a href="{{ route('paiements.import', ['id' => $paiement->id] ) }}" class="btn btn-success">Importer</a> -->
    </div>
    @endforeach
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Montant</th>
                <th>Date de Paiement</th>
                <th>Mode de Paiement</th>
                <th>Compte</th>
                <th>Bénéficiaire</th>
                <th>Status</th>
                <th>Motif de la depence</th>
                <th>Impulsion</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paiements as $paiement)
            <tr>
                
                <td>{{ $paiement->montant }}</td>
                <td>{{ $paiement->date_paiement }}</td>
                <td>{{ $paiement->mode_paiement }}</td>
                <td>{{ $paiement->id_compte }}</td>
                <td>{{ $paiement->id_beneficiaire }}</td>
                <td>{{ $paiement->status }}</td>
                <td>{{ $paiement->motif_de_la_depence}}</td>
                <td>{{ $paiement->impulsion}}</td>
                <td>
    <!-- Edit Button -->
    <a href="{{ route('paiements.edit', $paiement->id) }}" class="btn btn-warning">Editer</a>
    
    <!-- Show Button (for view/visualization in Word) -->
    <a href="{{ route('paiements.show', $paiement->id) }}" class="btn btn-primary">Voir</a>
    
    <!-- Delete Button -->
    <form action="{{ route('paiements.destroy', $paiement->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?')">Supprimer</button>
    </form>
</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
