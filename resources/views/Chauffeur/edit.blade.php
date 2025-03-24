@extends('layouts.master')

@section('title', 'Modifier un chauffeur')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4 shadow">

                <!-- En-tête -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h4 class="mb-0 text-white">Modification du chauffeur : {{ $chauffeur->nom }} {{ $chauffeur->prenom }}</h4>
                    <a href="{{ route('chauffeur.index') }}" class="btn btn-outline-light">
                        <i class="fa fa-arrow-left me-1"></i> Retour à la liste
                    </a>
                </div>

                <!-- Messages d'erreur -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulaire -->
                <form action="{{ route('chauffeur.update', $chauffeur->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nom" class="form-label text-white">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control"
                               value="{{ old('nom', $chauffeur->nom) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="prenom" class="form-label text-white">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control"
                               value="{{ old('prenom', $chauffeur->prenom) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label text-white">Téléphone</label>
                        <input type="text" name="telephone" id="telephone" class="form-control"
                               value="{{ old('telephone', $chauffeur->telephone) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="matricule" class="form-label text-white">Matricule</label>
                        <input type="text" name="matricule" id="matricule" class="form-control"
                               value="{{ old('matricule', $chauffeur->matricule) }}">
                    </div>

                    <div class="mb-3">
                        <label for="statut" class="form-label text-white">Statut</label>
                        <select name="statut" id="statut" class="form-control" required>
                            <option value="disponible" {{ old('statut', $chauffeur->statut) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                            <option value="occupé" {{ old('statut', $chauffeur->statut) == 'occupé' ? 'selected' : '' }}>Occupé</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check-circle me-1"></i> Mettre à jour le chauffeur
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
