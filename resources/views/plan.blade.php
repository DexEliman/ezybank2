<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisissez Votre Plan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Styles CSS personnalisés -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #333333, #000000);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            max-width: 800px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #343a40;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .plans {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .plan {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
            width: 48%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .plan h2 {
            color: #007bff;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .plan ul {
            list-style-type: none;
            padding: 0;
            text-align: left;
        }

        .plan ul li {
            margin-bottom: 10px;
            color: #343a40;
        }

        .plan ul li i {
            margin-right: 10px;
            color: #007bff;
        }

        .buttons {
            margin-top: 30px;
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
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            color: #28a745;
           
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Choisissez Votre Plan</h1>

        <!-- Conteneur des plans -->
        <div class="plans">
            <!-- Plan Basique -->
            <div class="plan">
                <h2>Basique</h2>
                <p class="price">0€</p>
                <ul>
                    <li><i class="fas fa-check"></i>Accès aux fonctionnalités de base</li>
                    <li><i class="fas fa-check"></i>Support prioritaire 24/7</li>
                    <li><i class="fas fa-check"></i>Plafond 10000€/Mois</li>
                    <li><i class="fas fa-check"></i>Limite de 1 Compte Courrant</li>
                    <li><i class="fas fa-check"></i>Limite de 2 Compte Epargne</li>
                    <li><i class="fas fa-check"></i>Jusqu'à 45% Pris en charge par vos Assurance par categorie</li>
                    <li><i class="fas fa-check"></i>1% sur prélevé sur les transfert flash de plus de 500€</li>
                    <li><i class="fas fa-check"></i>Droit à 1 Carte Physique (Silver ou Gold)</li>
                    <li><i class="fas fa-check"></i>Jusqu'à 2 Carte Virtuelle </li>
                </ul>
            </div>

            <!-- Plan Premium -->
            <div class="plan">
                <h2>Premium</h2>
                <p class="price">14,99€/mois</p>
                <ul>
                    <li><i class="fas fa-crown"></i>Accès à toutes les fonctionnalités</li>
                    <li><i class="fas fa-crown"></i>Support prioritaire 24/7</li>
                    <li><i class="fas fa-crown"></i>plafond 50000€/Mois</li>
                    <li><i class="fas fa-crown"></i>Jusqu'a 5 Compte Courrant</li>
                    <li><i class="fas fa-crown"></i>Jusqu'à 10 Compte Epargne</li>
                    <li><i class="fas fa-crown"></i>Pris en charge 100% par vos Assurance par Categorie </li>
                    <li><i class="fas fa-crown"></i>Jusqu'a 5 Carte Physique (Silver ou Gold)</li>
                    <li><i class="fas fa-crown"></i>Jusqu'à 3 Carte Virtuelle </li>
                    <li><i class="fas fa-crown"></i>Droit a une Carte Black Premium (cashBack 0.5%)</li>
                    <li>Et bien Encore Plus++...</li>
                    
                </ul>
            </div>
        </div>

        <div class="buttons">
            <a href="{{ route('inscription') }}" class="btn btn-primary">
                <i class="fas fa-user"></i> 
                => Stay Basic 
            </a>
            <a href="#" class="btn btn-success">
                <i class="fas fa-star"></i> 
                => Go Premium
            </a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>