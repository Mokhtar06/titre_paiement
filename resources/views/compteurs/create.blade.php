@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un compteur</h1>

    <form action="{{ route('compteurs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="annee">Année</label>
            <input type="text" class="form-control" id="annee" name="annee" required>
        </div>
        <div class="form-group">
            <label for="compteur">Compteur</label>
            <input type="text" class="form-control" id="compteur" name="compteur" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
    </form>
</div>
@endsection
