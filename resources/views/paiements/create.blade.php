@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Ajouter une Taxe</h2>

    <!-- Message de succès -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Message d'erreurs de validation -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulaire d'ajout de taxe -->
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('taxes.store') }}">
                @csrf
                <!-- Champ Nom -->
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de la Taxe</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom de la taxe" required>
                </div>

                <!-- Champ Pourcentage -->
                <div class="mb-3">
                    <label for="pourcentage" class="form-label">Pourcentage (%)</label>
                    <input type="number" step="0.01" class="form-control" id="pourcentage" name="pourcentage" placeholder="Entrez le pourcentage" required>
                </div>

                <!-- Bouton Soumettre -->
                <button type="submit" class="btn btn-primary w-100">Ajouter la Taxe</button>
            </form>
        </div>
    </div>
</div>
@endsection
