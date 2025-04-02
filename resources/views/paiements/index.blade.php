@extends('layouts.master')

@section('title', 'Liste des paiements')

@section('content')
<div class="container mt-4">
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Liste des paiements</h2>
    <a href="{{ route('paiements.create', ['id' => $paiement->id]) }}" class="btn btn-primary">
    Enregistrer Paiement
</a>
    </div>

    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Référence du colis</th>
                <th>Montant (FCFA)</th>
                <th>Statut</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paiements as $paiement)
                <tr>
                    <td>{{ $paiement->id }}</td>
                    <td>{{ $paiement->colis->reference }}</td>
                    <td>{{ $paiement->montant }}</td>
                    <td>{{ $paiement->statut }}</td>
                    <td>{{ $paiement->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
