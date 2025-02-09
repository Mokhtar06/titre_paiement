
<div class="container">
    <h1 class="mb-4">Liste des compteurs</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('compteurs.create') }}" class="btn btn-dark mb-3">Ajouter un compteur</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Année</th>
                <th>Compteur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compteurs as $compteur)
                <tr>
                    <td>{{ $compteur->annee }}</td>
                    <td>{{ $compteur->compteur }}</td>
                    <td>
                        
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

