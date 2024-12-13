<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Taxe</title>
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('taxes.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom de la Taxe</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom de la taxe" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="pourcentage" class="form-label">Pourcentage (%)</label>
                        <input type="number" step="0.01" class="form-control" id="pourcentage" name="pourcentage" placeholder="Entrez le pourcentage" required>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Ajouter la Taxe</button>
                </form>
                
                
            </div>
        </div>
    </div>

    <!-- Lien vers Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
