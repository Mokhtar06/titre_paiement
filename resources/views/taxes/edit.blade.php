@extends('layouts.app')

@section('content')

<div class="container">
<h2 class="mb-4">Modifier le pourcentages des taxes</h2>

<form action="{{ route('taxes.update', $taxes) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row mb-3">
                <label for="taxe" class="col-md-3 col-form-label">Pourcentages de taxe</label>
                <div class="col-md-9">
                    <input type="text" name="taxe" id="taxe" class="form-control" value="{{ $taxes->pourcentage }}" required>
                </div>
                <div class="row mb-3">
                <div class="col-md-9 offset-md-3">
                    <button type="submit" class="btn btn-primary">Mettre à jour le taxe</button>
                    <a href="{{ route('taxes.index') }}" class="btn btn-secondary ml-2">Annuler</a>
                </div>
            </div>
            </div>
</form>

</div>


@endsection