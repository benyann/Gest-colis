@extends('layouts.master')

@section('title', 'Chauffeurs')

@section('content')

<div class="container-fluid pt-4 px-4">

    <!-- En-tête : Titre + Bouton de création -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-white mb-0">Liste des chauffeurs</h4>
        <a href="{{ route('chauffeur.create') }}" class="btn btn-outline-primary">
            <i class="fa fa-plus me-1"></i> Nouveau Chauffeur
        </a>
    </div>

    <!-- Tableau des chauffeurs -->
    <div class="bg-secondary text-center rounded p-4 shadow">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle mb-0">
                <thead class="text-white">
                    <tr>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Matricule</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($chauffeurs as $chauffeur)
                        <tr>
                            <td>{{ $chauffeur->nom }}</td>
                            <td>{{ $chauffeur->telephone }}</td>
                            <td>{{ $chauffeur->matricule ?? '-' }}</td>
                            <td>
                                <span class="badge bg-{{ $chauffeur->statut == 'disponible' ? 'success' : 'danger' }}">
                                    {{ ucfirst($chauffeur->statut) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('chauffeur.edit', $chauffeur->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="fa fa-edit"></i> Modifier
                                </a>
                                <form action="{{ route('chauffeur.destroy', $chauffeur->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce chauffeur ?')">
                                        <i class="fa fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-white text-center">Aucun chauffeur enregistré pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
