@extends('layouts.master')  

@section('title', 'Ajouter un colis')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Ajout d’un colis</h6>
                    <a href="{{ route('colis.index') }}" class="btn btn-outline-primary">← Retour</a>
                </div>

                <form action="{{ route('colis.store') }}" method="POST">
                    @csrf

                    {{-- Informations sur le colis --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="reference" class="form-label">Référence</label>
                            <input type="text" name="reference" class="form-control bg-dark border-0" id="reference" required>
                        </div>
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control bg-dark border-0" id="description" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="valeur" class="form-label">Valeur (FCFA)</label>
                            <input type="number" name="valeur" class="form-control bg-dark border-0" id="valeur" step="0.01" required>
                        </div>
                        <div class="col-md-6">
                            <label for="poids" class="form-label">Poids (kg)</label>
                            <input type="number" name="poids" class="form-control bg-dark border-0" id="poids" step="0.01" required>
                        </div>
                    </div>

                    <hr class="my-4 text-white">

                    {{-- Informations destinataire --}}
                    <h6 class="text-primary mb-3">Informations sur le destinataire</h6>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="destinataire_nom" class="form-label">Nom</label>
                            <input type="text" name="destinataire_nom" class="form-control bg-dark border-0" id="destinataire_nom" required>
                        </div>
                        <div class="col-md-4">
                            <label for="destinataire_telephone" class="form-label">Téléphone</label>
                            <input type="text" name="destinataire_telephone" class="form-control bg-dark border-0" id="destinataire_telephone" required>
                        </div>
                        <div class="col-md-4">
                            <label for="destinataire_adresse" class="form-label">Adresse</label>
                            <input type="text" name="destinataire_adresse" class="form-control bg-dark border-0" id="destinataire_adresse">
                        </div>
                    </div>

                    <hr class="my-4 text-white">

                    {{-- Informations expéditeur --}}
                    <h6 class="text-primary mb-3">Informations sur l’expéditeur</h6>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="expediteur_nom" class="form-label">Nom</label>
                            <input type="text" name="expediteur_nom" class="form-control bg-dark border-0" id="expediteur_nom" required>
                        </div>
                        <div class="col-md-4">
                            <label for="expediteur_telephone" class="form-label">Téléphone</label>
                            <input type="text" name="expediteur_telephone" class="form-control bg-dark border-0" id="expediteur_telephone" required>
                        </div>
                        <div class="col-md-4">
                            <label for="expediteur_adresse" class="form-label">Adresse</label>
                            <input type="text" name="expediteur_adresse" class="form-control bg-dark border-0" id="expediteur_adresse">
                        </div>
                    </div>

                    {{-- Agence --}}
                    <div class="mb-4">
                        <label for="agence_id" class="form-label">Agence de réception</label>
                        <select name="agence_id" class="form-select bg-dark border-0" id="agence_id">
                            <option value="">-- Sélectionner une agence --</option>
                            @foreach($agences as $agence)
                                <option value="{{ $agence->id }}">{{ $agence->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4">Enregistrer le colis</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
