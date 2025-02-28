<html>
    <head>
        <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
<body>
    
<style>
    .container {
    max-width: 600px;
    margin-top: 50px;
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #007bff;
    font-size: 1.8rem;
}

.form-control {
    border-radius: 5px;
    font-size: 1rem;
}

.btn {
    font-size: 1rem;
    padding: 10px 20px;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
    border: none;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

</style>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Modifier le Pourcentage des Taxes</h2>

    <form action="{{ route('taxes.update', $taxes) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Pourcentage de taxe -->
        <div class="row mb-3">
            <label for="taxe" class="col-md-3 col-form-label text-md-end">Pourcentage de Taxe</label>
            <div class="col-md-6">
                <input 
                    type="text" 
                    name="taxe" 
                    id="taxe" 
                    class="form-control" 
                    value="{{ $taxes->pourcentage }}" 
                    required
                    placeholder="Exemple : 20"
                >
            </div>
        </div>

        <!-- Boutons -->
        <div class="row mb-3">
            <div class="col-md-6 offset-md-3">
                <button type="submit" class="btn btn-primary">Mettre à Jour</button>
                <a href="{{ route('taxes.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </div>
    </form>
</div>
<!-- Bootstrap Bundle avec Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let form = document.querySelector("form");
        let taxeInput = document.getElementById("taxe");

        // Vérification en temps réel
        taxeInput.addEventListener("input", function() {
            let valeur = taxeInput.value;
            if (!/^\d+(\.\d{1,2})?$/.test(valeur)) {
                taxeInput.classList.add("is-invalid");
            } else {
                taxeInput.classList.remove("is-invalid");
            }
        });

        // Vérification avant soumission
        form.addEventListener("submit", function(event) {
            let valeur = taxeInput.value;
            if (!/^\d+(\.\d{1,2})?$/.test(valeur)) {
                event.preventDefault();
                event.stopPropagation();
                taxeInput.classList.add("is-invalid");
            }
            form.classList.add("was-validated");
        });
    });
</script>

</body>
</html>
