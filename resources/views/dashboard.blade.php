@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>


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
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #1E90FF;
            /* Bleu */
        }

        p {
            font-size: 2rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            text-align: justify;
        }


    </style>
</head>

<body>
    <h1>Dashboard</h1>
    @auth
    <p>Bienvenue, {{ Auth::user()->Nom}} !</p>
    @endauth
    <p>Ceci est le dashboard.</p>
</body>

</html>

@endsection