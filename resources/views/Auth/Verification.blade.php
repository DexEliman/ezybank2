<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail de Vérification</title>
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
            font-size: 4rem;
            margin-bottom: 2rem;
            color: green;
        }

        .code-container {
            display: flex;
            gap: 1rem;
        }

        .code-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 1.5rem;
            border: 2px solid white;
            border-radius: 5px;
            background-color: #1E90FF;
            color: white;
        }

        button {
            margin-top: 2rem;
            padding: 0.5rem 1rem;
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

        .error {
            color: red;
            font-size: 0.9rem;
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <h1>Portail de Vérification</h1>
    <h3>Sasissez le code a 6 chiffre envoyé à votre adresse email</h3>
    <form id="verificationForm" action="{{ route('verify.code') }}" method="POST">
        @csrf
        <div class="code-container">
            <input type="text" class="code-input" name="code1" maxlength="1" required>
            <input type="text" class="code-input" name="code2" maxlength="1" required>
            <input type="text" class="code-input" name="code3" maxlength="1" required>
            <input type="text" class="code-input" name="code4" maxlength="1" required>
            <input type="text" class="code-input" name="code5" maxlength="1" required>
            <input type="text" class="code-input" name="code6" maxlength="1" required>
        </div>
        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif
        <button type="submit">Vérifier</button>
    </form>

    <h2> NB : Ceci est Une Simulation le seul code est "123456"</h2>
</body>

</html>