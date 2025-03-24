@extends('layouts.master')

@section('title', 'Gestion des expéditions')

@section('content')

<!-- Statistiques Expéditions -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-truck fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total des expéditions</p>
                    <h6 class="mb-0">{{ $expeditions->count() }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-check-circle fa-3x text-success"></i>
                <div class="ms-3">
                    <p class="mb-2">Expéditions terminées</p>
                    <h6 class="mb-0">--</h6> {{-- À adapter plus tard --}}
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-clock fa-3x text-warning"></i>
                <div class="ms-3">
                    <p class="mb-2">Expéditions en cours</p>
                    <h6 class="mb-0">--</h6> {{-- À adapter plus tard --}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Liste des Expéditions -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h6 class="mb-0">Liste des expéditions</h6>
            <form class="d-none d-md-flex ms-3">
                <input class="form-control bg-dark border-0" type="search" placeholder="Recherche...">
            </form>
            <a href="{{ route('expedition.create') }}" class="btn btn-outline-primary mt-2 mt-md-0">+ Nouvelle expédition</a>
        </div>

        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead class="text-white bg-dark">
                    <tr>
                        <th>#</th>
                        <th>Référence</th>
                        <th>Date</th>
                        <th>Agence de départ</th>
                        <th>Agence d’arrivée</th>
                        <th>Chauffeur</th>
                        <th>Nombre de colis</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($expeditions as $expedition)
                        <tr>
                            <td>EXP-000{{ $expedition->id }}</td>
                            <td>{{ $expedition->reference }}</td>
                            <td>{{ \Carbon\Carbon::parse($expedition->date)->format('d/m/Y') }}</td>
                            <td>{{ $expedition->agence_depart->nom ?? 'N/A' }}</td>
                            <td>{{ $expedition->agence_arrivee->nom ?? 'N/A' }}</td>
                            <td>{{ $expedition->chauffeur->nom ?? 'Non attribué' }}</td>
                            <td>{{ $expedition->colis_count ?? 0 }}</td>
                            <td>
                                <span class="badge bg-{{ $expedition->statut == 'en cours' ? 'warning' : 'success' }}">
                                    {{ ucfirst($expedition->statut) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('expedition.show', $expedition->id) }}" class="btn btn-sm btn-info">Voir</a>
                                <a href="{{ route('expedition.edit', $expedition->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                <form action="{{ route('expedition.destroy', $expedition->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Supprimer cette expédition ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-white">Aucune expédition enregistrée pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
