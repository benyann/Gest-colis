@extends('layouts.master')

@section('title', 'Ajouter un chauffeur')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4 shadow">

                <!-- En-tête -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h4 class="mb-0 text-white">Ajout d’un nouveau chauffeur</h4>
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
                <form action="{{ route('chauffeur.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nom" class="form-label text-white">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="prenom" class="form-label text-white">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label text-white">Téléphone</label>
                        <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="matricule" class="form-label text-white">Matricule</label>
                        <input type="text" name="matricule" id="matricule" class="form-control" value="{{ old('matricule') }}">
                    </div>

                    <div class="mb-3">
                        <label for="statut" class="form-label text-white">Statut</label>
                        <select name="statut" id="statut" class="form-control" required>
                            <option value="disponible" {{ old('statut') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                            <option value="occupé" {{ old('statut') == 'occupé' ? 'selected' : '' }}>Occupé</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i> Enregistrer le chauffeur
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
