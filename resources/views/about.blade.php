<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À Propos de Nous</title>
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

        .about {
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
        <div class="about">À propos de nous</div>
        <div class="buttons">
            <a href="{{ route('welcome') }}"> <- Revenir en Arriere</a>
        </div>
        <p></p>
        <h1>Qui sommes-nous ?</h1>
        <h2>Notre histoire</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non tincidunt est. Sed viverra tempus purus, eu feugiat felis cursus non. Vivamus tincidunt ante at elementum congue. Integer maximus, erat a cursus viverra, orci justo efficitur risus, gravida semper lacus eros et tortor. Duis metus nibh, suscipit nec rhoncus in, efficitur id justo. Phasellus maximus semper nulla, non placerat sapien ultricies maximus. Proin elementum risus urna, sit amet iaculis ex congue nec. Aliquam cursus quis eros in luctus. Aenean semper luctus enim et vestibulum. Phasellus at sapien ut massa euismod rhoncus ut sed dui.
        </p>
        <h2>Notre mission</h2>
        <p>
            Duis sodales libero laoreet dui aliquet ullamcorper. Morbi urna orci, tincidunt vitae mi eu, tincidunt congue nibh. Nam eu euismod metus. Maecenas interdum mauris a lacus rutrum cursus. Nunc porttitor ultricies velit. Suspendisse nisi nulla, finibus in bibendum eu, eleifend at orci. Maecenas vel dui posuere, lobortis massa non, imperdiet sapien. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Proin at odio sodales, mattis ipsum eu, rhoncus augue. Nam id odio lectus. Phasellus dapibus vel neque eget tempus. Duis imperdiet faucibus ornare. Pellentesque
        </p>
        <p>
            Suspendisse potenti. Donec sed arcu et sapien elementum viverra.
        </p>
        <p>
            Aliquam erat volutpat. Donec sed arcu et sapien elementum viv
        </p>
        <h1> Documentation</h1>
        <h2> Sommaire</h2>

        <li>Introduction</li>
        <li>Develop</li>
        <li>LoremIpsum</li>
        <li>YAAAAAAAAAAA</li>

    </div>
</body>