@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Créer un Nouveau Compte</h2>

        <form action="{{ route('compte.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="numero" class="form-label">Numéro du Compte</label>
                <input type="text" name="numero" class="form-control" id="numero" required>
            </div>
            <div class="mb-3">
                <label for="type_compte" class="form-label">Type du Compte</label>
                <select name="type_compte" id="type_compte" class="form-control" required>
                    <option value="courant">Courant</option>
                    <option value="épargne">Épargne</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="solde" class="form-label">Solde</label>
                <input type="number" name="solde" class="form-control" id="solde" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="date_creation" class="form-label">Date de Création</label>
                <input type="date" name="date_creation" class="form-control" id="date_creation" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description"></textarea>
            </div>
            <div class="d-flex justify-content-start">
                <button type="submit" class="btn btn-primary">Créer</button>
                <a href="{{ route('compte.index') }}" class="btn btn-secondary ml-2">Annuler</a>
            </div>
        </form>
    </div>
@endsection
