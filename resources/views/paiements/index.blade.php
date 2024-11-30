@extends('layouts.app')

@section('content')
<style>
    /* Styles pour la page des paiements */
.container {
    margin-top: 20px;
}

h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #343a40;
}

/* Style pour les messages de succès */
.alert-success {
    background-color: #28a745;
    color: white;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
    font-size: 1.1rem;
}

/* Table des paiements */
.table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f8f9fa;
    color: #495057;
}

.table td {
    color: #212529;
}

.table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table td a {
    color: white;
    margin: 0 5px;
}

/* Style des boutons */
.btn {
    padding: 10px 15px;
    font-size: 1rem;
    border-radius: 5px;
    margin-right: 5px;
    text-align: center;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
}

.btn-success:hover {
    background-color: #218838;
    border-color: #1e7e34;
}

.btn-info {
    background-color: #17a2b8;
    border-color: #17a2b8;
}

.btn-info:hover {
    background-color: #138496;
    border-color: #117a8b;
}

.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
}

.btn-warning:hover {
    background-color: #e0a800;
    border-color: #d39e00;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

/* Style pour les actions sur les paiements */
table td form {
    display: inline-block;
}

table td form button {
    margin: 0 5px;
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

.import_export{
    display: flex;
    flex-direction: row;
    justify-content: right; 
}

</style>
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
