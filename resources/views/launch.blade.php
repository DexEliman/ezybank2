<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Launch</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(to bottom, #333333, #000000);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: Arial, sans-serif;
            color: white;
        }

        h1 {
            font-size: 9rem;
            margin-bottom: 2rem;
            color: green;
        }

        .container {
            display: flex;
            gap: 2rem;
            align-items: flex-start; /* Alignement en haut */
        }

        .card {
            width: 300px;
            height: 200px;
            background-color: #1E90FF;
            border: 2px solid white;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .card:hover {
            background-color: #007BFF;
        }

        .card h2 {
            font-size: 2rem;
            margin: 0;
        }

        .separator {
            width: 2px;
            height: 200px;
            background-color: white;
        }

        .comments {
            margin-top: 1rem; /* Espace entre la case et le commentaire */
            text-align: center;
        }

        .comments h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .comments p {
            margin: 0;
        }
    </style>
</head>

<body>
    <h1>Launch</h1>
    <div class="container">
        <!-- Case Sign In avec commentaire -->
        <div>
            <div class="card">
                <a href="{{ route('Plan') }}">
                    <h2>Sign In</h2>
                </a>
            </div>
            <div class="comments">
                <h3>C'est ta première fois ?</h3>
                <p>Bienvenue ! Nous sommes ravis de vous accueillir.</p>
            </div>
        </div>

        <!-- Ligne verticale -->
        <div class="separator"></div>

        <!-- Case Log In avec commentaire -->
        <div>
            <div class="card">
                <a href="{{ route('connexion') }}">
                    <h2>Log In</h2>
                </a>
            </div>
            <div class="comments">
                <h3>Tu reviens enfin !!</h3>
                <p>Content de vous revoir ! Connectez-vous pour continuer.</p>
            </div>
        </div>
    </div>
</body>

</html>