<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJr+3Wq8fJ+Yw6bK7Scw3T5z5zAop2G2nJAK9L5jFJWb6+rObg7Xb3fF6roT" crossorigin="anonymous">

    </head>
    <body>
        
<style>
    /* styles.css */

/* Conteneur du formulaire avec un fond clair et un ombrage pour donner un effet de carte */
.container {
    background-color: #f8f9fa; /* Fond gris clair */
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre douce autour du conteneur */
}

/* Titre centré avec une couleur spécifique */
h1 {
    color: #007bff; /* Bleu Bootstrap */
    font-size: 2rem;
    margin-bottom: 20px;
}

/* Style pour les champs de formulaire (input) */
.form-control {
    border-radius: 5px; /* Coins arrondis */
    width: 50%;
    height: 35px;
}

/* Style personnalisé pour le bouton, largeur maximale */
button {
    width: 100%;
    padding: 12px;
    font-size: 1rem;
}

/* Formulaire avec une largeur maximum pour la lisibilité */
form {
    max-width: 500px;
    margin: 50 auto;
}

</style>
<div class="container">
    <h1>Ajouter un compteur</h1>

    <form action="{{ route('compteurs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="annee">Année</label>
            <input type="text" class="form-control" id="annee" name="annee" required>
        </div>
        <div class="form-group">
            <label for="compteur">Compteur</label>
            <input type="text" class="form-control" id="compteur" name="compteur" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb3h5tRf4l41sVxFh0zHk+V+2fU7AyX18xt+M0U6p6zLZ0q2c3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8Fqg5Fh3VtgaFzbbt3RSM73K3RjZAXm+c6U8p4JDbV+f1d" crossorigin="anonymous"></script>

<script>
// scripts.js

// Validation basique du formulaire à la soumission
document.querySelector('form').addEventListener('submit', function(event) {
    const anneeInput = document.getElementById('annee');
    const compteurInput = document.getElementById('compteur');

    // Vérification des champs de saisie
    if (!anneeInput.value || !compteurInput.value) {
        event.preventDefault();  // Empêche l'envoi du formulaire
        alert("Veuillez remplir tous les champs avant de soumettre le formulaire.");
    }
});
</script>
</body>
</html>
