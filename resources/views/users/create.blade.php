<html>
    <head>
        <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
<body>
    
<style>
    .container {
    max-width: 500px;
    margin-top: 50px;
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #28a745;
    font-size: 1.8rem;
}

.form-label {
    font-weight: bold;
}

.form-control {
    border-radius: 5px;
    font-size: 1rem;
}

.btn-success {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-success:hover {
    background-color: #218838;
}

</style>
<div class="container mt-5">
    <h1>Créer un nouvel utilisateur</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let form = document.querySelector("form");
        let nameInput = document.getElementById("name");
        let emailInput = document.getElementById("email");
        let passwordInput = document.getElementById("password");

        // Fonction de validation des champs
        function validateInput(input, regex) {
            if (!regex.test(input.value)) {
                input.classList.add("is-invalid");
            } else {
                input.classList.remove("is-invalid");
            }
        }

        // Vérification en temps réel
        nameInput.addEventListener("input", function() {
            validateInput(nameInput, /^[a-zA-Z\s]{2,}$/);
        });

        emailInput.addEventListener("input", function() {
            validateInput(emailInput, /^[^\s@]+@[^\s@]+\.[^\s@]+$/);
        });

        passwordInput.addEventListener("input", function() {
            validateInput(passwordInput, /^.{6,}$/);
        });

        // Vérification avant soumission
        form.addEventListener("submit", function(event) {
            validateInput(nameInput, /^[a-zA-Z\s]{2,}$/);
            validateInput(emailInput, /^[^\s@]+@[^\s@]+\.[^\s@]+$/);
            validateInput(passwordInput, /^.{6,}$/);

            if (document.querySelector(".is-invalid")) {
                event.preventDefault();
                event.stopPropagation();
            }
        });
    });
</script>
<!-- Bootstrap Bundle avec Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
