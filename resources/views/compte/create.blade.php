<html>
<head>
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons (si nécessaire) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>
    

<style>
    .container {
        max-width: 600px;
        margin-top: 50px;
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }
    .btn {
        min-width: 100px;
    }
    .btn-secondary {
        margin-left: 10px;
    }
</style>
  
    <div class="container">
        <h2>Créer un Nouveau Compte</h2>

        <form action="{{ route('compte.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="numero" class="form-label">Numéro du Compte</label>
                <input type="text" name="numero" class="form-control" id="numero" required>
            </div>
            <div class="mb-3">
                <label for="type_compte" class="form-label">Type du Compte</label>
                <select name="type_compte" id="type_compte" class="form-control" required>
                    <option value="courant">Courant</option>
                    <option value="épargne">Épargne</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="solde" class="form-label">Solde</label>
                <input type="number" name="solde" class="form-control" id="solde" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="date_creation" class="form-label">Date de Création</label>
                <input type="date" name="date_creation" class="form-control" id="date_creation" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description"></textarea>
            </div>
            <div class="d-flex justify-content-start">
                <button type="submit" class="btn btn-primary">Créer</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ml-2">Annuler</a>
            </div>
        </form>
    </div>
<!-- Bootstrap JS (si ce n'est pas déjà inclus) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");

        form.addEventListener("submit", function (event) {
            let valid = true;

            // Vérifier que le numéro du compte est bien rempli
            const numero = document.getElementById("numero");
            if (numero.value.trim() === "") {
                valid = false;
                alert("Le numéro du compte est obligatoire !");
            }

            // Vérifier que le solde est un nombre positif
            const solde = document.getElementById("solde");
            if (parseFloat(solde.value) < 0) {
                valid = false;
                alert("Le solde ne peut pas être négatif !");
            }

            if (!valid) {
                event.preventDefault(); // Empêche l'envoi du formulaire si validation échoue
            }
        });
    });
</script>
</body>
</html>
