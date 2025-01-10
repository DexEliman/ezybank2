@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Ajouter de l'argent à votre compte</h1>

    <form action="{{ route('transaction.addMoneyPost') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="montant">Montant à ajouter :</label>
            <input type="number" name="montant" id="montant" class="form-control" required min="0" step="0.01">
        </div>
        <button type="submit" class="btn btn-success mt-2">Ajouter</button>
    </form>
</div>
@endsection