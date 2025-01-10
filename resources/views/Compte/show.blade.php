@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Styles CSS personnalisés -->
    <style>
        body {
            font-family: Arial, sans-serif;
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

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .budget {
            font-size: 24px;
            font-weight: bold;
            color: rgb(32, 211, 106);
        }

        .buttons {
            margin-top: 30px;
            margin-left: 30px;
            margin-bottom: 30px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            margin-top: 0.5rem;
        }
        
        .btn-out {
            background-color:rgb(242, 12, 12);
            border: none;
            margin-top: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Mon Compte</h1>
        <div class="buttons">
            <a href="{{ route('compte_bancaire.index') }}" class="btn btn-out"><i class="fas fa-chevron-left"></i> Retour </a>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Numéro de compte : {{ $compte->numero_compte }}</h5>
                <p class="card-text">IBAN : {{ $compte->iban }}</p>
                <p class="card-text budget">Budget : <span class="budget">{{ $compte->budget }} €</span></p>
                <p class="card-text">Statut : {{ $compte->statut }}</p>

            </div>

            <div class="buttons">
                <a href="{{ route('transaction.addMoney') }}" class="btn btn-primary"><i class="fas fa-check"></i> ADD </a>
            </div>
        </div>

    </div>


</body>

</html>

@endsection