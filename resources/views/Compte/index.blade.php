@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Comptes</title>
</head>

<body>
    h1>Comptes bancaires</h1>
    <ul>
        @foreach($comptes as $compte)
        <li>
            {{ $compte->nom_bancaire }} - {{ $compte->statut }}
            <form action="{{ route('comptes.updateStatut', $compte->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">{{ $compte->statut === 'ouvert' ? 'Bloquer' : 'Débloquer' }}</button>
            </form>
            <form action="{{ route('comptes.destroy', $compte->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </li>
        @endforeach
    </ul>
    <a href="{{ route('comptes.create') }}">Créer un nouveau compte</a>
</body>

</html>
@endsection