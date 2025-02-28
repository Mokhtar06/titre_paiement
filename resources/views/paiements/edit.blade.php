{{-- @if (Session::has('user_id')) --}}
<html>
    <head>
        <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
<body>
    <style>
        .container {
    margin-top: 50px;
    max-width: 800px;
}

h1 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 2rem;
    color: #ffc107; /* Jaune Bootstrap */
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-size: 1rem;
    font-weight: bold;
    color: #333;
}

input[type="number"], input[type="text"], select {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button[type="submit"] {
    background-color: #ffc107;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #e0a800;
}

.alert {
    margin-top: 10px;
    padding: 10px;
    background-color: #f8d7da;
    color: #721c24;
    border-radius: 5px;
    font-size: 1rem;
}

.is-invalid {
    border-color: #dc3545;
}

    </style>

<div class="container">
    <h1>Éditer le Paiement</h1>

    <form action="{{ route('paiements.update1', [$paiement->id, $paiement->annee]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="montant">Montant</label>
            <input type="number" class="form-control" id="montant" name="montant" value="{{ $paiement->montant }}" required>
        </div>

        <div class="form-group">
            <label for="mode_paiement">Mode de Paiement</label>
            <select class="form-control" id="mode_paiement" name="mode_paiement" required>
                <option value="carte" @if($paiement->mode_paiement == 'carte') selected @endif>Carte</option>
                <option value="virement" @if($paiement->mode_paiement == 'virement') selected @endif>Virement</option>
                <option value="cheque" @if($paiement->mode_paiement == 'cheque') selected @endif>Chèque</option>
                <option value="espèces" @if($paiement->mode_paiement == 'espèces') selected @endif>Espèces</option>
            </select>
        </div>

        <div class="form-group">
            <label for="id_compte">Compte</label>
            <select class="form-control" id="id_compte" name="id_compte" required>
                @foreach ($comptes as $compte)
                    <option value="{{ $compte->id }}" @if($compte->id == $paiement->id_compte) selected @endif>{{ $compte->numero }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_beneficiaire">Bénéficiaire</label>
            <select class="form-control" id="id_beneficiaire" name="id_beneficiaire" required>
                @foreach ($beneficiaires as $beneficiaire)
                    <option value="{{ $beneficiaire->id }}" @if($beneficiaire->id == $paiement->id_beneficiaire) selected @endif>{{ $beneficiaire->nom }} {{ $beneficiaire->prenom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Statut</label>
            <select class="form-control" id="status" name="status" required>
                <option value="en attente" @if($paiement->status == 'en attente') selected @endif>En attente</option>
                <option value="réussi" @if($paiement->status == 'réussi') selected @endif>Réussi</option>
                <option value="échoué" @if($paiement->status == 'échoué') selected @endif>Échoué</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="motif_de_la_depence">Motif de la dépense</label>
            <input type="text" class="form-control" id="motif_de_la_depence" name="motif_de_la_depence" value="{{ $paiement->motif_de_la_depence }}" required>
        </div>

        <div class="form-group">
            <label for="impulsion">Impulsion</label>
            <select class="form-control" id="impulsion" name="impulsion" required>
                <option value="TVA" @if($paiement->impulsion == 'TVA') selected @endif>TVA</option>
                <option value="IMF" @if($paiement->impulsion == 'IMF') selected @endif>IMF</option>
                <option value="loyer" @if($paiement->impulsion == 'loyer') selected @endif>Loyer</option>
                <option value="Exonéré" @if($paiement->impulsion == 'Exonéré') selected @endif>Exonéré</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Mettre à jour le Paiement</button>
    </form>
</div>
<!-- Bootstrap Bundle avec Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let form = document.querySelector("form");
        form.addEventListener("submit", function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add("was-validated");
        }, false);
    });
</script>

</body>
</html>
{{-- @else
<script>
    window.location.href = "{{ route('connexion.form') }}";
</script>
@endif --}}