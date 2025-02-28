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
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="nav-links">
            <h2>Dashboard</h2>
            <a onclick="loadContent('{{ route('admin.compt_index') }}')">Comptes</a>
            <a onclick="loadContent('{{ route('admin.benefi_index') }}')">Bénéficiaires</a>
            <a onclick="loadContent('{{ route('admin.paieme_index') }}')">Paiements</a>
            <a onclick="loadContent('{{ route('admin.taxes_index') }}')">Taxes</a>
            <a onclick="loadContent('{{ route('compteurs.index') }}')">Année/id</a>
            <a onclick="loadContent('{{ route('users.index') }}')">Les Utilisateurs</a>
        </div>
        <a class="logout" href="{{ route('logout') }}">Déconnexion</a>
    </div>
    <div class="content" id="content">
    <div class="container">
    <div class="row">
        <!-- Cartes pour les statistiques -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Comptes</h5>
                    <p class="card-text fs-3" id="total-comptes">0</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Bénéficiaires</h5>
                    <p class="card-text fs-3" id="total-beneficiaires">0</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Paiements</h5>
                    <p class="card-text fs-3" id="total-paiements">0</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Taxes</h5>
                    <p class="card-text fs-3" id="total-taxes">0</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Utilisateurs</h5>
                    <p class="card-text fs-3" id="total-users">0</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-body">
                    <h5 class="card-title">ID/Année</h5>
                    <p class="card-text fs-3" id="total-id-annee">0</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Graphique -->
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Statistiques</h5>
            <canvas id="statsChart"></canvas>
        </div>
    </div>
</div>

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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch("{{ route('admin.dashboard.stats') }}") // Une route Laravel à créer pour récupérer les stats
            .then(response => response.json())
            .then(data => {
                // Met à jour les nombres sur les cartes
                document.getElementById("total-comptes").innerText = data.comptes;
                document.getElementById("total-beneficiaires").innerText = data.beneficiaires;
                document.getElementById("total-paiements").innerText = data.paiements;
                document.getElementById("total-taxes").innerText = data.taxes;
                document.getElementById("total-users").innerText = data.users;
                document.getElementById("total-id-annee").innerText = data.id_annee;

                // Génère le graphique
                const ctx = document.getElementById("statsChart").getContext("2d");
                new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: ["Comptes", "Bénéficiaires", "Paiements", "Taxes", "Utilisateurs", "ID/Année"],
                        datasets: [{
                            label: "Nombre total",
                            data: [data.comptes, data.beneficiaires, data.paiements, data.taxes, data.users, data.id_annee],
                            backgroundColor: ["#007bff", "#28a745", "#dc3545", "#ffc107", "#17a2b8", "#6c757d"]
                        }]
                    }
                });
            })
            .catch(error => console.error("Erreur lors du chargement des statistiques:", error));
    });
</script>

</body>
</html>
