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
        .nav-links {
            flex-grow: 1;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px;
            margin: 5px 0;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .logout {
            margin-top: auto;
            background: #dc3545;
            text-align: center;
            font-weight: bold;
        }
        .logout:hover {
            background: #c82333;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="nav-links">
            <h2>Dashboard</h2>
            <a onclick="loadContent('{{ route('compte.index') }}')">Comptes</a>
            <a onclick="loadContent('{{ route('beneficiaire.index') }}')">Bénéficiaires</a>
            <a onclick="loadContent('{{ route('paiements.index') }}')">Paiements</a>
            <a onclick="loadContent('{{ route('taxes.index') }}')">Taxes</a>
            <a onclick="loadContent('{{ route('compteurs.index') }}')">Année/id</a>
            <a onclick="loadContent('{{ route('users.index') }}')">Les Utilisateurs</a>
        </div>
        <a class="logout" href="{{ route('logout') }}">Déconnexion</a>
    </div>
    <div class="content" id="content">
        <h1>Bienvenue sur le tableau de bord</h1>
    </div>

    <script>
    function loadContent(url) {
        fetch(url, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('content').innerHTML = data;
        })
        .catch(error => {
            console.error('Erreur lors du chargement de la page:', error);
            document.getElementById('content').innerHTML = '<h1>Erreur</h1><p>Impossible de charger la page.</p>';
        });
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
