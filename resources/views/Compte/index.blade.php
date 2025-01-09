@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Comptes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Styles CSS personnalisés -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        h1 {
            color: #343a40;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #dee2e6;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 4px;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
            color: #000;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-danger,
        .btn-warning {
            margin: 0 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Mes Comptes Bancaires</h1>

        <!-- Bouton pour créer un nouveau compte bancaire -->
        <a href="{{ route('compte_bancaire.create') }}" class="btn btn-primary mb-4">
            <i class="fas fa-plus"></i> Créer un nouveau compte bancaire
        </a>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <!-- Tableau pour afficher les comptes bancaires -->
        <table class="table table-striped">
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
                @foreach ($comptes as $compte)
                <tr>
                    <td>{{ $compte->numero_compte }}</td>
                    <td>{{ $compte->iban }}</td>
                    <td>{{ $compte->budget }} €</td>
                    <td>{{ $compte->statut }}</td>
                    <td>{{ $compte->typeCompte }}</td>
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
                @endforeach
                @if (count($comptes) == 0)
                <tr>
                    <td colspan="6" class="text-center">Aucun compte bancaire trouvé.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection