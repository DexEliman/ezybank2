@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Assurances</title>
    <!-- Lien vers Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .container {
            text-align: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px; /* Limite la largeur du conteneur */
            margin: 0 auto; /* Centre le conteneur horizontalement */
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .cards {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            flex-wrap: wrap; /* Permet aux cartes de passer à la ligne sur les petits écrans */
        }
        .card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: 200px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .card i {
            font-size: 2.5rem;
            color: #007BFF;
            margin-bottom: 10px;
        }
        .card h2 {
            font-size: 1.2rem;
            color: #007BFF;
            margin-bottom: 10px;
        }
        .card p {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 15px;
        }
        .card .button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        .card .button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Vos Assurances</h1>
        <div class="cards">
            <!-- Assurance Automobile -->
            <div class="card">
                <i class="fas fa-car"></i> 
                <h2>Assurance Automobile</h2>
                <p>Protégez votre véhicule avec notre assurance automobile.</p>
                <a href="{{ route('beta') }}" class="button">Voir Plus</a>
            </div>

            <!-- Assurance Immobilière -->
            <div class="card">
                <i class="fas fa-home"></i> 
                <h2>Assurance Immobilière</h2>
                <p>Protégez votre maison avec notre assurance immob ilière.</p>
                <a href="{{ route('beta') }}" class="button">Voir Plus</a>
            </div>

            <!-- Assurance Santé -->
            <div class="card">
                <i class="fas fa-heartbeat"></i> 
                <h2>Assurance Santé</h2>
                <p>Protégez votre santé avec notre assurance santé.</p>
                <a href="{{ route('beta') }}" class="button">Voir Plus</a>
            </div>
        </div>
    </div>
</body>
</html>
@endsection