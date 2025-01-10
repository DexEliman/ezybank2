@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Virement réussi</h1>
    <p>{{ session('success') }}</p>
    <a href="{{ route('transaction.showVirementForm') }}" class="btn btn-primary">Retourner au formulaire de virement</a>
</div>
@endsection