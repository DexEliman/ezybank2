<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EZYBANK</title>
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
            font-size: 13rem;
            margin-bottom: 4rem;
        }

        .ezy {
            color: #1E90FF;
            /* Bleu */
        }

        .bank {
            color: #32CD32;
            /* Vert */
        }

        .buttons {
            display: flex;
            gap: 1rem;
        }

        .buttons a {
            text-decoration: none;
            color: white;
            background-color: #1E90FF;
            padding: 1rem 2rem;
            border-radius: 5px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
        }

        .buttons a:hover {
            background-color: #007BFF;
        }
    </style>
</head>

<body>
    <h1>
        <span class="ezy">EZY</span><span class="bank">BANK</span>
    </h1>
    <div class="buttons">
        <a href="{{ route('launch') }}">Launch</a>
        <a href="{{ route('about') }}">À propos de Nous</a>
    </div>
</body>

</html>