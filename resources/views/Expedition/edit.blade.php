@extends('layouts.master')

@section('title', 'Modifier une expédition')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">

                <!-- En-tête -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Modification d’une expédition</h6>
                    <a href="{{ route('expedition.index') }}" class="btn btn-outline-primary">← Retour</a>
                </div>

                <!-- Affichage des erreurs de validation -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulaire de modification -->
                <form action="{{ route('expedition.update', $expedition->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Informations sur l'expédition --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date_expedition" class="form-label">Date de l'expédition</label>
                            <input type="date" name="date_expedition" class="form-control bg-dark border-0" id="date_expedition" value="{{ old('date_expedition', $expedition->date_expedition) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="heure_expedition" class="form-label">Heure de l'expédition</label>
                            <input type="time" name="heure_expedition" class="form-control bg-dark border-0" id="heure_expedition" value="{{ old('heure_expedition', $expedition->heure_expedition) }}" required pattern="[0-9]{2}:[0-9]{2}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="agence_depart_id" class="form-label">Agence de départ</label>
                            <select name="agence_depart_id" class="form-select bg-dark border-0" id="agence_depart_id">
                                <option value="">-- Sélectionner une agence de départ --</option>
                                @foreach($agences as $agence)
                                    <option value="{{ $agence->id }}" {{ $expedition->agence_depart_id == $agence->id ? 'selected' : '' }}>{{ $agence->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="agence_arrivee_id" class="form-label">Agence d'arrivée</label>
                            <select name="agence_arrivee_id" class="form-select bg-dark border-0" id="agence_arrivee_id">
                                <option value="">-- Sélectionner une agence d'arrivée --</option>
                                @foreach($agences as $agence)
                                    <option value="{{ $agence->id }}" {{ $expedition->agence_arrivee_id == $agence->id ? 'selected' : '' }}>{{ $agence->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <hr class="my-4 text-white">

                    {{-- Sélection du chauffeur et du statut --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="chauffeur_id" class="form-label">Chauffeur</label>
                            <select name="chauffeur_id" class="form-select bg-dark border-0" id="chauffeur_id">
                                <option value="">-- Sélectionner un chauffeur --</option>
                                @foreach($chauffeurs as $chauffeur)
                                    <option value="{{ $chauffeur->id }}" {{ $expedition->chauffeur_id == $chauffeur->id ? 'selected' : '' }}>{{ $chauffeur->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="statut" class="form-label">Statut</label>
                            <select name="statut" class="form-select bg-dark border-0" id="statut">
                                <option value="">-- Sélectionner un statut --</option>
                                <option value="en préparation" {{ $expedition->statut == 'en préparation' ? 'selected' : '' }}>En préparation</option>
                                <option value="en transit" {{ $expedition->statut == 'en transit' ? 'selected' : '' }}>En transit</option>
                                <option value="livrée" {{ $expedition->statut == 'livrée' ? 'selected' : '' }}>Livrée</option>
                            </select>
                        </div>
                    </div>

                    <hr class="my-4 text-white">

                    <!-- Bouton de soumission -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4">Mettre à jour l'expédition</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
