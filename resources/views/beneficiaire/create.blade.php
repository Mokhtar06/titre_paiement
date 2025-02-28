<html>
    <head><!-- Bootstrap CSS -->
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
        <h2>Créer un Nouveau Bénéficiaire</h2>

        <form action="{{ route('beneficiaire.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" id="prenom" required>
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <textarea name="adresse" class="form-control" id="adresse" required></textarea>
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="text" name="telephone" class="form-control" id="telephone" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="type_beneficaire" class="form-label">Type de Bénéficiaire</label>
                <select name="type_beneficiaire" id="type_beneficiaire" class="form-control" required>
                    <option value="personne">Personne</option>
                    <option value="entreprise">Entreprise</option>
                </select>                
            </div>
            
            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ml-2">Annuler</a>
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
