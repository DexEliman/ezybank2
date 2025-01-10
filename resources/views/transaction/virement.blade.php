

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Effectuer un virement</h1>
    <form action="{{ route('transaction.verifyPassword') }}" method="GET">
        @csrf
        <div class="form-group">
            <label for="iban">IBAN du destinataire :</label>
            <input type="text" name="iban" id="iban" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="montant">Montant :</label>
            <input type="number" name="montant" id="montant" class="form-control" required min="0" step="0.01">
        </div>
        <button type="submit" class="btn btn-primary">Vérifier l'IBAN</button>
    </form>
</div>
@endsection