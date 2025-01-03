<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limit Beta Version</title>
    <style>
        body {
            background: linear-gradient(to bottom, #333333, #000000);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: Arial, sans-serif;
            color: white;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            padding: 2rem;
            text-align: center;
        }

        .beta {
            font-size: 7rem;
            margin-bottom: 2rem;
            color: #1E90FF;
            /* Bleu */
        }

        h1 {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            color: #32CD32;
            /* Vert */
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #1E90FF;
            /* Bleu */
        }

        p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            text-align: justify;
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
    <div class="container">
        <div class="beta">Version Beta</div>
         <hr>
        <div class="buttons">
            <a href="{{ route('welcome') }}"> <- Revenir a la page d'acceuil</a>
        </div>
       
        <div class="buttons">
            <a href="{{ route('Home') }}"> <- Revenir a la page principal</a>
        </div>
        <hr>
        <h1>Ceci Est une version Beta (un prototype du vrai code) Cette partie a pas encore été developpé</h1>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non tincidunt est. Sed viverra tempus purus, eu feugiat felis cursus non. Vivamus tincidunt ante at elementum congue. Integer maximus, erat a cursus viverra, orci justo efficitur risus, gravida semper lacus eros et tortor. Duis metus nibh, suscipit nec rhoncus in, efficitur id justo. Phasellus maximus semper nulla, non placerat sapien ultricies maximus. Proin elementum risus urna, sit amet iaculis ex congue nec. Aliquam cursus quis eros in luctus. Aenean semper luctus enim et vestibulum. Phasellus at sapien ut massa euismod rhoncus ut sed dui.
        </p>


    </div>
</body>