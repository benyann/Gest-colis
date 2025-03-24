@extends('layouts.master')

@section('title', 'Agences')

@section('content')

<div class="container-fluid pt-4 px-4">

    <!-- En-tête : Titre + Bouton de création -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-white mb-0">Liste des agences</h4>
        <a href="{{ route('agence.create') }}" class="btn btn-outline-primary">
            <i class="fa fa-plus me-1"></i> Nouvelle Agence
        </a>
    </div>

    <!-- Tableau des agences -->
    <div class="bg-secondary text-center rounded p-4 shadow">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle mb-0">
                <thead class="text-white">
                    <tr>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($agences as $agence)
                        <tr>
                            <td>{{ $agence->nom }}</td>
                            <td>{{ $agence->adresse }}</td>
                            <td>{{ $agence->telephone }}</td>
                            <td>
                                <a href="{{ route('agence.edit', $agence->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="fa fa-edit"></i> Modifier
                                </a>
                                <form action="{{ route('agence.destroy', $agence->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette agence ?')">
                                        <i class="fa fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-white text-center">Aucune agence enregistrée pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
