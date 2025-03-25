@extends('layouts.master')

@section('title', 'Créer un colis')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="bg-secondary rounded p-4 shadow">
                <h3 class="text-center text-primary mb-4">Créer un colis</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('colis.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="reference" class="form-label">Référence</label>
                        <input type="text" name="reference" class="form-control bg-dark border-0" id="reference" value="{{ old('reference') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control bg-dark border-0" id="description">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="valeur" class="form-label">Valeur</label>
                        <input type="number" name="valeur" class="form-control bg-dark border-0" id="valeur" value="{{ old('valeur') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="poids" class="form-label">Poids</label>
                        <input type="number" name="poids" class="form-control bg-dark border-0" id="poids" value="{{ old('poids') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="destinataire_nom" class="form-label">Nom du destinataire</label>
                        <input type="text" name="destinataire_nom" class="form-control bg-dark border-0" id="destinataire_nom" value="{{ old('destinataire_nom') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="destinataire_telephone" class="form-label">Téléphone du destinataire</label>
                        <input type="text" name="destinataire_telephone" class="form-control bg-dark border-0" id="destinataire_telephone" value="{{ old('destinataire_telephone') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="destinataire_adresse" class="form-label">Adresse du destinataire</label>
                        <input type="text" name="destinataire_adresse" class="form-control bg-dark border-0" id="destinataire_adresse" value="{{ old('destinataire_adresse') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="expediteur_nom" class="form-label">Nom de l'expéditeur</label>
                        <input type="text" name="expediteur_nom" class="form-control bg-dark border-0" id="expediteur_nom" value="{{ old('expediteur_nom') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="expediteur_telephone" class="form-label">Téléphone de l'expéditeur</label>
                        <input type="text" name="expediteur_telephone" class="form-control bg-dark border-0" id="expediteur_telephone" value="{{ old('expediteur_telephone') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="expediteur_adresse" class="form-label">Adresse de l'expéditeur</label>
                        <input type="text" name="expediteur_adresse" class="form-control bg-dark border-0" id="expediteur_adresse" value="{{ old('expediteur_adresse') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="expedition_id" class="form-label">Expédition</label>
                        <select name="expedition_id" class="form-select bg-dark border-0" id="expedition_id" required>
                            <option value="">-- Sélectionner une expédition --</option>
                            @foreach($expeditions as $expedition)
                                <option value="{{ $expedition->id }}" {{ old('expedition_id') == $expedition->id ? 'selected' : '' }}>{{ $expedition->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4">Créer le colis</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection