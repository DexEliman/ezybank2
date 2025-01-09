@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
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
            color: #2ecc71;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Mon Compte</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Numéro de compte : {{ $compte->numero_compte }}</h5>
                <p class="card-text">IBAN : {{ $compte->iban }}</p>
                <p class="card-text budget">Budget : <span class="budget">{{ $compte->budget }} €</span></p>
                <p class="card-text">Statut : {{ $compte->statut }}</p>
                <p class="card-text">Type de compte : {{ $compte->typeCompte }}</p>
            </div>
        </div>
    </div>
</body>

</html>

@endsection