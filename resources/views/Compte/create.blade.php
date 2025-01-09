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
    <div class="container">
        <h1>Créer un nouveau compte bancaire</h1>
        <form action="{{ route('compte_bancaire.store') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Créer un compte bancaire</button>
        </form>
    </div>
</body>

</html>


@endsection