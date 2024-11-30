@extends('layouts.app')

@section('content')
<style>
    /* Styles généraux */
.container {
    margin-top: 20px;
    background-color: #f9f9f9;
    padding: 30px;
    border-radius: 8px;
}

/* Titre de la page */
h2 {
    font-size: 2rem;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
    font-weight: bold;
}

/* Table des taxes */
.table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Légère ombre portée */
    border-radius: 8px;
    background-color: #fff;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    color: #495057;
}

/* Entête de la table */
.table th {
    background-color: #f8f9fa;
    font-weight: bold;
    color: #007bff;
}

.table td {
    color: #212529;
}

.table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table td a {
    color: #fff;
    margin: 0 5px;
    text-decoration: none;
}

/* Style des boutons */
.btn {
    padding: 8px 16px;
    font-size: 1rem;
    border-radius: 5px;
    margin-right: 10px;
    text-align: center;
    transition: all 0.3s ease;
}

.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
}

.btn-warning:hover {
    background-color: #e0a800;
    border-color: #d39e00;
}

.btn-sm {
    padding: 5px 10px;
    font-size: 0.875rem;
}

/* Effet d'hover sur les actions de la table */
.table td a:hover {
    background-color: #d39e00;
    border-radius: 5px;
    padding: 8px;
}

/* Améliorer l'affichage des liens de pagination */
.pagination {
    margin-top: 20px;
    justify-content: center;
}

.pagination a, .pagination span {
    color: #007bff;
    padding: 5px 10px;
    text-decoration: none;
    margin: 0 3px;
    border-radius: 5px;
}

.pagination a:hover {
    background-color: #e2e6ea;
}

.pagination .disabled {
    color: #6c757d;
}

/* Responsive design pour les écrans plus petits */
@media (max-width: 768px) {
    .table th, .table td {
        padding: 8px;
    }
}

</style>
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