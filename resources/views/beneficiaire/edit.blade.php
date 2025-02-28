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
        <h2 class="mb-4">Modifier le Bénéficiaire</h2>

        <!-- Affichage des messages de succès ou d'erreur -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('beneficiaire.update', $beneficiaire) }}" method="POST">
            @csrf
            @method('PUT') <!-- Indiquer que c'est une mise à jour -->

            <!-- Champ Nom -->
            <div class="mb-3 row">
                <label for="nom" class="col-md-3 col-form-label">Nom</label>
                <div class="col-md-9">
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ $beneficiaire->nom }}" required>
                </div>
            </div>

            <!-- Champ Prénom -->
            <div class="mb-3 row">
                <label for="prenom" class="col-md-3 col-form-label">Prénom</label>
                <div class="col-md-9">
                    <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $beneficiaire->prenom }}" required>
                </div>
            </div>

            <!-- Champ Adresse -->
            <div class="mb-3 row">
                <label for="adresse" class="col-md-3 col-form-label">Adresse</label>
                <div class="col-md-9">
                    <textarea name="adresse" id="adresse" class="form-control" rows="3" required>{{ $beneficiaire->adresse }}</textarea>
                </div>
            </div>

            <!-- Champ Téléphone -->
            <div class="mb-3 row">
                <label for="telephone" class="col-md-3 col-form-label">Téléphone</label>
                <div class="col-md-9">
                    <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $beneficiaire->telephone }}" required>
                </div>
            </div>

            <!-- Champ Email -->
            <div class="mb-3 row">
                <label for="email" class="col-md-3 col-form-label">Email</label>
                <div class="col-md-9">
                    <input type="email" name="email" id="email" class="form-control" value="{{ $beneficiaire->email }}" required>
                </div>
            </div>

            <!-- Champ Type de Bénéficiaire -->
            <div class="mb-3 row">
                <label for="type_beneficiaire" class="col-md-3 col-form-label">Type de Bénéficiaire</label>
                <div class="col-md-9">
                    <select name="type_beneficiaire" id="type_beneficiaire" class="form-control" required>
                        <option value="personne" {{ $beneficiaire->type_beneficiaire == 'personne' ? 'selected' : '' }}>Personne</option>
                        <option value="entreprise" {{ $beneficiaire->type_beneficiaire == 'entreprise' ? 'selected' : '' }}>Entreprise</option>
                    </select>
                </div>
            </div>

            <!-- Boutons -->
            <div class="mb-3 row">
                <div class="col-md-9 offset-md-3">
                    <button type="submit" class="btn btn-primary">Mettre à jour le bénéficiaire</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ml-2">Annuler</a>
                </div>
            </div>
        </form>
    </div>
    <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("beneficiaireForm");

        form.addEventListener("submit", function (event) {
            let valid = true;

            const telephone = document.getElementById("telephone");
            const email = document.getElementById("email");

            // Vérification du numéro de téléphone (doit contenir uniquement des chiffres et être de 10 caractères)
            const phoneRegex = /^[0-9]{10}$/;
            if (!phoneRegex.test(telephone.value)) {
                valid = false;
                alert("Le numéro de téléphone doit contenir 10 chiffres !");
            }

            // Vérification de l'email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                valid = false;
                alert("Veuillez entrer un email valide !");
            }

            if (!valid) {
                event.preventDefault();
            }
        });
    });
</script>
</body>
    </html>
