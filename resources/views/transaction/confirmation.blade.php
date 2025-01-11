@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Styles CSS personnalisés -->
    <style>
        .buttons {
            margin-top: 30px;
        }

        .container {
            text-align: left;
            max-width: 1000px;
            max-height: 120vh;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            margin: 0 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            margin-top: 0.5rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            margin-top: 0.5rem;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .montant {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Confirmation du virement</h1>
        <p>Vous êtes sur le point d'effectuer un virement de {{ $virementData['montant'] }} à l'IBAN {{ $virementData['iban'] }}.</p>
        <form action="{{ route('transaction.executeVirement') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Confirmer le virement</button>
        </form>
        <a href="{{ route('transaction.showVirementForm') }}" class="btn btn-danger">Annuler</a>
    </div>
</body>

</html>

@endsection