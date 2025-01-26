@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2 class="text-center">Les nombres des Paiements par Année</h2>

    <!-- Affichage des messages de succès ou d'erreur -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Tableau des IDs par année -->
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Année</th>
                <th scope="col">Nombre de  Paiement</th>
                {{-- <th scope="col">Prochaine ID Disponible</th>
                <th scope="col">Modifier</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($paiements as $paiement)
                <tr>
                    <td>{{ $paiement->year }}</td>
                    <td>{{ $paiement->last_id }}</td>
                    {{-- <td>{{ $paiement->next_id }}</td> --}}
                    {{-- <td>
                        <form action="{{ route('paiement.updateNextId') }}" method="POST" class="form-inline">
                            @csrf
                            <input type="hidden" name="year" value="{{ $paiement->year }}">
                            <div class="form-group mx-2">
                                <input type="number" name="next_id" min="{{ $paiement->last_id + 1 }}" value="{{ $paiement->next_id }}" required class="form-control" placeholder="Nouvelle ID">
                            </div>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Êtes-vous sûr de vouloir mettre à jour la prochaine ID ?')">Mettre à jour</button>
                        </form>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Bouton pour revenir à la liste des paiements -->
    {{-- <div class="text-center my-4">
        <a href="{{ route('paiements.index') }}" class="btn btn-secondary">Retour à la liste des paiements</a>
    </div> --}}
</div>
@endsection