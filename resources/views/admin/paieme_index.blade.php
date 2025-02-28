<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #343a40, #212529);
            color: white;
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .search-container {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
    <div class="content" id="content">
        <div class="container">
            <h1>Liste des Paiements</h1>
            <div class="search-container">
                <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un paiement par ID...">
            </div>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Montant</th>
                        <th>Date de Paiement</th>
                        <th>Mode de Paiement</th>
                        <th>Compte</th>
                        <th>Bénéficiaire</th>
                        <th>Status</th>
                        <th>Motif de la dépense</th>
                        <th>Impulsion</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="paiements-list">
                    @foreach ($paiements as $paiement)
                    <tr class="paiement-item" data-id="{{ $paiement->id }}">
                        <th>{{ $paiement->id }}</th>
                        <td>{{ $paiement->montant }}</td>
                        <td>{{ \Carbon\Carbon::parse($paiement->date_paiement)->format('Y-m-d') }}</td>
                        <td>{{ $paiement->mode_paiement }}</td>
                        <td>{{ $paiement->id_compte }}</td>
                        <td>{{ $paiement->id_beneficiaire }}</td>
                        <td>{{ $paiement->status }}</td>
                        <td>{{ $paiement->motif_de_la_depence }}</td>
                        <td>{{ $paiement->impulsion }}</td>
                        <td>
                            <a href="{{ route('paiements.edit1', $paiement->id) }}" class="btn btn-warning">Editer</a>
                            <a href="{{ route('paiements.show', $paiement->id) }}" class="btn btn-primary">Voir</a>
                            <form action="{{ route('paiements.destroy1', $paiement->id) }}" method="POST" style="display:inline;">
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
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('searchInput').addEventListener('input', function() {
        let searchValue = this.value.trim().toLowerCase(); // Valeur recherchée
        let paiements = document.querySelectorAll('#paiements-list tr'); // Sélection des lignes

        paiements.forEach(paiement => {
            let idElement = paiement.querySelector('th'); // Sélectionne l'élément <th> contenant l'ID
            if (!idElement) return; // Vérification de l'existence de l'élément

            let idText = idElement.textContent.trim().toLowerCase(); // Récupère le texte de l'ID
            console.log("Comparaison ID:", idText, "avec", searchValue); // Debugging

            // Vérifie si l'ID contient la valeur recherchée
            if (idText.includes(searchValue)) {
                paiement.style.display = ''; // Afficher la ligne si correspondance
            } else {
                paiement.style.display = 'none'; // Cacher sinon
            }
        });
    });
});

    </script>
</body>
</html>
