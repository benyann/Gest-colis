@extends('layouts.master')

@section('title', 'Créer une nouvelle expédition')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">

                <!-- En-tête -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Création d'une nouvelle expédition</h6>
                    <a href="{{ route('expedition.index') }}" class="btn btn-outline-primary">← Retour</a>
                </div>

                <!-- Formulaire de création -->
                <form action="{{ route('expedition.store') }}" method="POST">
                    @csrf

                    {{-- Référence de l'expédition --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control bg-dark border-0" id="nom" value="{{ old('nom') }}" required>
                        </div>
                    </div>

                    {{-- Date et Heure de l'expédition --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date_expedition" class="form-label">Date de l'expédition</label>
                            <input type="date" name="date_expedition" class="form-control bg-dark border-0" id="date_expedition" value="{{ old('date_expedition') }}" required>
                            @error('date_expedition')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="heure_expedition" class="form-label">Heure de l'expédition</label>
                            <input type="time" name="heure_expedition" class="form-control bg-dark border-0" id="heure_expedition" value="{{ old('heure_expedition') }}" required>
                            @error('heure_expedition')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4 text-white">

                    {{-- Sélection de l'agence de départ --}}
                    <div class="mb-4">
                        <label for="agence_depart_id" class="form-label">Agence de départ</label>
                        <select name="agence_depart_id" class="form-select bg-dark border-0" id="agence_depart_id" required>
                            <option value="">-- Sélectionner une agence --</option>
                            @foreach($agences as $agence)
                                <option value="{{ $agence->id }}" {{ old('agence_depart_id') == $agence->id ? 'selected' : '' }}>{{ $agence->nom }}</option>
                            @endforeach
                        </select>
                        @error('agence_depart_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Sélection de l'agence d'arrivée --}}
                    <div class="mb-4">
                        <label for="agence_arrivee_id" class="form-label">Agence d'arrivée</label>
                        <select name="agence_arrivee_id" class="form-select bg-dark border-0" id="agence_arrivee_id" required>
                            <option value="">-- Sélectionner une agence --</option>
                            @foreach($agences as $agence)
                                <option value="{{ $agence->id }}" {{ old('agence_arrivee_id') == $agence->id ? 'selected' : '' }}>{{ $agence->nom }}</option>
                            @endforeach
                        </select>
                        @error('agence_arrivee_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Sélection du chauffeur --}}
                    <div class="mb-4">
                        <label for="chauffeur_id" class="form-label">Chauffeur</label>
                        <select name="chauffeur_id" class="form-select bg-dark border-0" id="chauffeur_id">
                            <option value="">-- Sélectionner un chauffeur --</option>
                            @foreach($chauffeurs as $chauffeur)
                                <option value="{{ $chauffeur->id }}" {{ old('chauffeur_id') == $chauffeur->id ? 'selected' : '' }}>{{ $chauffeur->nom }}</option>
                            @endforeach
                        </select>
                        @error('chauffeur_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4">Créer l'expédition</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
