@extends('layouts.master')

@section('title', 'Effectuer un paiement')

@section('content')
<div class="container mt-4">
    <h2>Effectuer un paiement</h2>

    <form action="{{ route('paiements.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="colis_id">Sélectionner un colis :</label>
            <select name="colis_id" id="colis_id" class="form-control" required>
                <option value="">-- Choisir un colis --</option>
                @foreach($colisNonPayes as $colis)
                    <option value="{{ $colis->id }}" data-valeur="{{ $colis->valeur }}">
                        Réf : {{ $colis->reference }} - Valeur : {{ $colis->valeur }} FCFA
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="montant">Montant à payer :</label>
            <input type="text" id="montant" class="form-control" name="montant" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Valider le paiement</button>
    </form>
</div>

@section('scripts')
<script>
    // Calculer le montant lorsque le colis est sélectionné
    document.getElementById('colis_id').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var valeur = selectedOption.getAttribute('data-valeur');
        var montant = valeur * 0.10; // Calcul du montant à payer (10% de la valeur)
        document.getElementById('montant').value = montant + " FCFA";
    });
</script>
@endsection
@endsection
