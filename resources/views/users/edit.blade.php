<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .error-border {
            border: 2px solid red;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4 text-center">Modifier l'utilisateur</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="mt-4" id="userForm">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nom :</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe (laisser vide pour ne pas changer) :</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary w-100 mt-2">Annuler</a>
    </form>
</div>

<script>
    document.getElementById('userForm').addEventListener('submit', function(event) {
        let isValid = true;
        const inputs = document.querySelectorAll('input[required]');
        
        inputs.forEach(input => {
            if (input.value.trim() === '') {
                input.classList.add('error-border');
                isValid = false;
            } else {
                input.classList.remove('error-border');
            }
        });
        
        if (!isValid) {
            event.preventDefault();
            alert('Veuillez remplir tous les champs obligatoires.');
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
