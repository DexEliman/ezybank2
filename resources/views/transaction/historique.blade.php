@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Transactions</title>
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
        <h1>Historique des Transactions</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Envoyeur</th>
                    <th>Destinataire</th>
                    <th>Montant</th>
                    <th>Type de Transaction</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->CompteDeb }}</td>
                    <td>{{ $transaction->CompteCre }}</td>
                    <td>
                        @if ($transaction->CompteDeb == Auth::user()->Email && $transaction->CompteCre == Auth::user()->Email)
                        <span style="color: green">{{ '+' . $transaction->montant }}</span>
                        @elseif ($transaction->CompteDeb == Auth::user()->Email)
                        <span style="color: red">{{ '-' . $transaction->montant }}</span>
                        @else
                        <span style="color: green">{{ '+' . $transaction->montant }}</span>
                        @endif
                    </td>
                    <td>
                        @if ($transaction->CompteDeb == Auth::user()->Email)
                        {{ 'Envoi' }}
                        @else
                        {{ 'Récois' }}
                        @endif
                    </td>
                    <td>{{ $transaction->created_at }}</td>
                </tr>
                @endforeach
                @if (count($transactions) == 0)
                <tr>
                    <td colspan="5" class="text-center">Aucun compte bancaire trouvé.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

@endsection