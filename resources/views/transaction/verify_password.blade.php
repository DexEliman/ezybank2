
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vérification du mot de passe</h1>
    <form action="{{ route('transaction.processVirement') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Confirmer le virement</button>
    </form>
</div>
@endsection