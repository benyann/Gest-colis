@extends('layouts.master')

@section('title', 'Détail de l\'expédition')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="bg-secondary rounded p-4 shadow">
                <h3 class="text-center text-primary mb-4">Détails de l'expédition</h3>

                @if($expedition)
                <table class="table table-borderless text-white">
                    <tr>
                        <th class="text-end w-50">Code de l'expédition :</th>
                        <td>EXP-{{ $expedition->id }}</td>
                    </tr>
                    <tr>
                        <th class="text-end">Date d'expédition :</th>
                        <td>{{ $expedition->date_expedition ? \Carbon\Carbon::parse($expedition->date_expedition)->format('d/m/Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-end">Heure :</th>
                        <td>{{ $expedition->heure_expedition ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-end text-info">Agence de départ :</th>
                        <td>{{ $expedition->agenceDepart->nom ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-end text-info">Agence d'arrivée :</th>
                        <td>{{ $expedition->agenceArrivee->nom ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-end">Chauffeur :</th>
                        <td>{{ $expedition->chauffeur->nom ?? '-' }} ({{ $expedition->chauffeur->matricule ?? '-' }})</td>
                    </tr>
                    <tr>
                        <th class="text-end">Statut :</th>
                        <td>
                            <span class="badge bg-info">{{ $expedition->statut ?? 'Non défini' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-end">Nombre de colis :</th>
                        <td>{{ $expedition->colis->count() ?? '0' }}</td>
                    </tr>
                </table>
                @else
                    <p class="text-center text-warning">Aucune information trouvée pour cette expédition.</p>
                @endif

                <div class="text-center mt-4">
                    <a href="{{ route('expedition.index') }}" class="btn btn-outline-light me-2">
                        <i class="fa fa-arrow-left me-1"></i> Retour
                    </a>
                    <a href="{{ route('expedition.edit', $expedition->id) }}" class="btn btn-primary">
                        <i class="fa fa-edit me-1"></i> Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
