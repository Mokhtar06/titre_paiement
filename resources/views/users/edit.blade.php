@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Modifier l'utilisateur</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nom :</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                value="{{ $user->name }}" 
                class="form-control" 
                required
            >
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                value="{{ $user->email }}" 
                class="form-control" 
                required
            >
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe (laisser vide pour ne pas changer) :</label>
            <input 
                type="password" 
                name="password" 
                id="password" 
                class="form-control"
            >
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
