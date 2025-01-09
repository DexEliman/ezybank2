<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
            font-size: 6rem;
            margin-bottom: 2rem;
            color: green;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 3rem;
        }

        input {
            padding: 0.5rem;
            font-size: 2rem;
            border: 2px solid white;
            border-radius: 5px;
            background-color: #1E90FF;
            color: white;
        }

        input::placeholder {
            color: white;
        }

        button {
            padding: 0.5rem;
            font-size: 1rem;
            border: 2px solid white;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            width: 90%;
            max-width: 600px;
            text-align: center;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .alert-success {
            background-color: #28a745;
            color: white;
        }

        .alert-error {
            background-color: #dc3545;
            color: white;
        }

        .btn-redirect {
            margin-top: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-redirect:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <!-- Messages d'alerte -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
        @if(session('error') === 'Cet email n\'existe pas. Veuillez vous inscrire.')
        <a href="{{ route('Plan') }}" class="btn-redirect">S' Inscrire</a>
        @endif
    </div>
    @endif

    <h1>LOG IN</h1>

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se Connecter</button>

        <p>Vous avez pas de compte ? <a href="{{ route('Plan') }}">S'inscrire</a></p>

    </form>
</body>

</html>