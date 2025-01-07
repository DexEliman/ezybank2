@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer Compte</title>
</head>

<body>
    <h1>Créer un nouveau compte</h1>
    <form action="{{ route('comptes.store') }}" method="POST">
        @csrf
        <label for="nom_bancaire">Nom du compte :</label>
        <input type="text" name="nom_bancaire" id="nom_bancaire" required>
        <button type="submit">Créer</button>
    </form>
    <a href="{{ route('comptes.index') }}">Retour à la liste des comptes</a>
</body>

</html>


@endsection