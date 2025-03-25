@extends('layouts.master')

@section('title', 'Modifier un colis')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">

                <!-- En-tête -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Modification d’un colis</h6>
                    <a href="{{ route('colis.index') }}" class="btn btn-outline-primary">← Retour</a>
                </div>

                <!-- Formulaire de modification -->
                <form action="{{ route('colis.update', $colis->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Informations sur le colis --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="reference" class="form-label">Référence</label>
                            <input type="text" name="reference" class="form-control bg-dark border-0" id="reference" value="{{ old('reference', $colis->reference) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control bg-dark border-0" id="description" value="{{ old('description', $colis->description) }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="valeur" class="form-label">Valeur (FCFA)</label>
                            <input type="number" name="valeur" class="form-control bg-dark border-0" id="valeur" step="0.01" value="{{ old('valeur', $colis->valeur) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="poids" class="form-label">Poids (kg)</label>
                            <input type="number" name="poids" class="form-control bg-dark border-0" id="poids" step="0.01" value="{{ old('poids', $colis->poids) }}" required>
                        </div>
                    </div>

                    <hr class="my-4 text-white">

                    {{-- Informations destinataire --}}
                    <h6 class="text-primary mb-3">Informations sur le destinataire</h6>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="destinataire_nom" class="form-label">Nom</label>
                            <input type="text" name="destinataire_nom" class="form-control bg-dark border-0" id="destinataire_nom" value="{{ old('destinataire_nom', $colis->destinataire_nom) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="destinataire_telephone" class="form-label">Téléphone</label>
                            <input type="text" name="destinataire_telephone" class="form-control bg-dark border-0" id="destinataire_telephone" value="{{ old('destinataire_telephone', $colis->destinataire_telephone) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="destinataire_adresse" class="form-label">Adresse</label>
                            <input type="text" name="destinataire_adresse" class="form-control bg-dark border-0" id="destinataire_adresse" value="{{ old('destinataire_adresse', $colis->destinataire_adresse) }}">
                        </div>
                    </div>

                    <hr class="my-4 text-white">

                    {{-- Informations expéditeur --}}
                    <h6 class="text-primary mb-3">Informations sur l’expéditeur</h6>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="expediteur_nom" class="form-label">Nom</label>
                            <input type="text" name="expediteur_nom" class="form-control bg-dark border-0" id="expediteur_nom" value="{{ old('expediteur_nom', $colis->expediteur_nom) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="expediteur_telephone" class="form-label">Téléphone</label>
                            <input type="text" name="expediteur_telephone" class="form-control bg-dark border-0" id="expediteur_telephone" value="{{ old('expediteur_telephone', $colis->expediteur_telephone) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="expediteur_adresse" class="form-label">Adresse</label>
                            <input type="text" name="expediteur_adresse" class="form-control bg-dark border-0" id="expediteur_adresse" value="{{ old('expediteur_adresse', $colis->expediteur_adresse) }}">
                        </div>
                    </div>

                    <hr class="my-4 text-white">

                    {{-- Sélection de l'expédition --}}
                    <h6 class="text-primary mb-3">Sélection de l'expédition</h6>

                    <div class="mb-4">
                        <label for="expedition_id" class="form-label">Expédition</label>
                        <select name="expedition_id" class="form-select bg-dark border-0" id="expedition_id" required>
                            <option value="">-- Sélectionner une expédition --</option>
                            @foreach($expeditions as $expedition)
                                <option value="{{ $expedition->id }}" {{ $colis->expedition_id == $expedition->id ? 'selected' : '' }}>{{ $expedition->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4">Mettre à jour le colis</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
