

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

    <!-- Bouton Ajouter un Paiement -->
    <div class="mb-3">
        <a href="{{ route('paiement.create') }}" class="btn btn-primary">Ajouter un Paiement</a>
    </div>
    {{-- <a href="{{ route('paiements.export', ['id' => $paiement->id] ) }}" class="btn btn-success">Exporter </a>
    <a href="{{ route('paiements.import', ['id' => $paiement->id] ) }}" class="btn btn-success">Importer</a> --}}
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Montant</th>
                <th>Date de Paiement</th>
                <th>Mode de Paiement</th>
                <th>Compte</th>
                <th>Bénéficiaire</th>
                <th>Status</th>
                <th>Motif de la dépense</th>
                <th>Impulsion</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paiements as $paiement)
            <tr>
                <td>{{ $paiement->montant }}</td>
                <td>{{ \Carbon\Carbon::parse($paiement->date_paiement)->format('Y-m-d') }}</td>
                <td>{{ $paiement->mode_paiement }}</td>
                <td>{{ $paiement->id_compte }}</td>
                <td>{{ $paiement->id_beneficiaire }}</td> 
                <td>{{ $paiement->status }}</td>
                <td>{{ $paiement->motif_de_la_depence }}</td>
                <td>{{ $paiement->impulsion }}</td>
                <td>
                    <a href="{{ route('paiements.edit', $paiement->id) }}" class="btn btn-warning">Editer</a>
                    <a href="{{ route('paiements.show', $paiement->id) }}" class="btn btn-primary">Voir</a>
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
