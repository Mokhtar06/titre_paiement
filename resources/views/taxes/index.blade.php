@extends('layouts.app')

@section('content')
<div class="container">
<h2>Liste des Taxes</h2>

<table class="table">
    <head>
        <tr>
    <th>Nom du taxe</th>
    <th>Pourcentage du taxe</th>
    <th>Actions</th>
    </tr>
    </head>
    <tbody>
        @foreach ($taxes as $taxe)
        <tr>
            <td>{{ $taxe->nom }}</td>
            <td>{{ $taxe->pourcentage }}</td>
            <td>
            <a href="{{ route('taxes.edit', $taxe) }}" class="btn btn-warning btn-sm">Modifier</a>
            </td>
        </tr>
        @endforeach
    </tbody>


</table>

</div>


@endsection