<html>
    <head>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

    <style>
    .container {
        max-width: 650px;
        margin-top: 50px;
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
    }
    .btn {
        min-width: 150px;
    }
    .btn-secondary {
        margin-left: 10px;
    }
</style>

        
    
    <div class="container">
        <h2 class="mb-4">Modifier le Compte</h2>

        <!-- Affichage des messages de succès ou d'erreur -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('compte.update', $compte->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Indiquer que c'est une mise à jour -->

            <div class="row mb-3">
                <label for="numero" class="col-md-3 col-form-label">Numéro du Compte</label>
                <div class="col-md-9">
                    <input type="text" name="numero" id="numero" class="form-control" value="{{ $compte->numero }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="type_compte" class="col-md-3 col-form-label">Type de Compte</label>
                <div class="col-md-9">
                    <select name="type_compte" id="type_compte" class="form-control" required>
                        <option value="courant" @if ($compte->type_compte === 'courant') selected @endif>Courant</option>
                        <option value="épargne" @if ($compte->type_compte === 'épargne') selected @endif>Épargne</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="solde" class="col-md-3 col-form-label">Solde</label>
                <div class="col-md-9">
                    <input type="number" name="solde" id="solde" class="form-control" value="{{ $compte->solde }}" required step="0.01">
                </div>
            </div>

            <div class="row mb-3">
                <label for="date_creation" class="col-md-3 col-form-label">Date de Création</label>
                <div class="col-md-9">
                    <input type="date" name="date_creation" id="date_creation" class="form-control" value="{{ \Carbon\Carbon::parse($compte->date_creation)->format('Y-m-d') }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="description" class="col-md-3 col-form-label">Description</label>
                <div class="col-md-9">
                    <textarea name="description" id="description" class="form-control" rows="3">{{ $compte->description }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-9 offset-md-3">
                    <button type="submit" class="btn btn-primary">Mettre à jour le compte</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ml-2">Annuler</a>
                </div>
            </div>
        </form>
    </div>
    <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("updateForm");

        form.addEventListener("submit", function (event) {
            let valid = true;

            const numero = document.getElementById("numero");
            if (numero.value.trim() === "") {
                valid = false;
                alert("Le numéro du compte est obligatoire !");
            }

            const solde = document.getElementById("solde");
            if (parseFloat(solde.value) < 0) {
                valid = false;
                alert("Le solde ne peut pas être négatif !");
            }

            if (!valid) {
                event.preventDefault();
            }
        });
    });
</script>

    </body>
    </html>