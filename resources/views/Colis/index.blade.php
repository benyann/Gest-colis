@extends('layouts.master')

@section('title', 'Gestion des colis')

@section('content')

<!-- Statistiques Colis -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-box fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Nombre total de colis</p>
                    <h6 class="mb-0">{{ $colis->count() }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-check-circle fa-3x text-success"></i>
                <div class="ms-3">
                    <p class="mb-2">Colis livrés</p>
                    <h6 class="mb-0">--</h6> {{--  --}}
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-clock fa-3x text-warning"></i>
                <div class="ms-3">
                    <p class="mb-2">Colis en attente</p>
                    <h6 class="mb-0">--</h6> {{--  --}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Liste des Colis -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h6 class="mb-0">Liste des colis</h6>
            <form class="d-none d-md-flex ms-3">
                <input class="form-control bg-dark border-0" type="search" placeholder="Recherche...">
            </form>
            <a href="{{ route('colis.create') }}" class="btn btn-outline-primary mt-2 mt-md-0">+ Enregistrer un colis</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead class="text-white bg-dark">
                    <tr>
                        <th>Code colis</th>
                        <th>Référence</th>
                        <th>Description</th>
                        <th>Poids (kg)</th>
                        <th>Valeur (F CFA)</th>
                        <th>Destinataire</th>
                        <th>Agence</th>
                        <th>Téléphone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($colis as $item)
                        <tr>
                            <td>GC-000{{ $item->id }}</td>
                            <td>{{ $item->reference }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->poids }}</td>
                            <td>{{ number_format($item->valeur, 0, ',', ' ') }}</td>
                            <td>{{ $item->destinataire_nom }}</td>
                            <td>{{ $item->agence ? $item->agence->nom : 'Non défini' }}</td>
                            <td>{{ $item->destinataire_telephone }}</td>
                            <td>
                                <a href="{{ route('colis.show', $item->id) }}" class="btn btn-sm btn-info">Voir</a>
                                <a href="{{ route('colis.edit', $item->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                                <form action="{{ route('colis.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Supprimer ce colis ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center text-white">Aucun colis enregistré pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>  

@endsection
