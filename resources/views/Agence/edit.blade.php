@extends('layouts.master')

@section('title', 'Modifier une agence')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4 shadow">

                <!-- En-tête -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h4 class="mb-0 text-white">Modification de l’agence : {{ $agence->nom }}</h4>
                    <a href="{{ route('agence.index') }}" class="btn btn-outline-light">
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
                <form action="{{ route('agence.update', $agence->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nom" class="form-label text-white">Nom de l'agence</label>
                        <input type="text" name="nom" id="nom" class="form-control"
                               value="{{ old('nom', $agence->nom) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="adresse" class="form-label text-white">Adresse</label>
                        <input type="text" name="adresse" id="adresse" class="form-control"
                               value="{{ old('adresse', $agence->adresse) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label text-white">Téléphone</label>
                        <input type="text" name="telephone" id="telephone" class="form-control"
                               value="{{ old('telephone', $agence->telephone) }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check-circle me-1"></i> Mettre à jour l'agence
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
