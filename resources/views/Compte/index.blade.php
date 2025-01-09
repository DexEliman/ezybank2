@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Comptes</title>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Mes Comptes Bancaires</h1>

        <!-- Bouton pour créer un nouveau compte bancaire -->
        <a href="{{ route('compte_bancaire.create') }}" class="btn btn-primary mb-4">
            Créer un nouveau compte bancaire
        </a>

        <!-- Tableau pour afficher les comptes bancaires -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Numéro de Compte</th>
                        <th>IBAN</th>
                        <th>Budget</th>
                        <th>Statut</th>
                        <th>Type de Compte</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comptes as $compte)
                    <tr>
                        <td>{{ $compte->numero_compte }}</td>
                        <td>{{ $compte->iban }}</td>
                        <td>{{ number_format($compte->budget, 2) }} €</td>
                        <td>{{ ucfirst($compte->statut) }}</td>
                        <td>{{ ucfirst($compte->typeCompte) }}</td>
                        <td>
                            
                            <a href="{{ route('compte_bancaire.show', $compte->id) }}" class="btn btn-info btn-sm">
                                Voir
                            </a>

                            
                            <a href="{{ route('compte_bancaire.edit', $compte->id) }}" class="btn btn-warning btn-sm">
                                Modifier
                            </a>

                            
                            <form action="{{ route('compte_bancaire.destroy', $compte->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?')">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Aucun compte bancaire trouvé.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
@endsection