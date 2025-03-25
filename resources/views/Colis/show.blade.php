@extends('layouts.master')

@section('title', 'Détail du colis')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="bg-secondary rounded p-4 shadow">
                <h3 class="text-center text-primary mb-4">Détails du colis</h3>

                @if($colis)
                <table class="table table-borderless text-white">
                    <tr>
                        <th class="text-end w-50">Code du colis :</th>
                        <td>GC-0023{{ $colis->id }}</td>
                    </tr>
                    <tr>
                        <th class="text-end">Référence :</th>
                        <td>{{ $colis->reference ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-end">Description :</th>
                        <td>{{ $colis->description ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-end">Poids (kg) :</th>
                        <td>{{ $colis->poids ? $colis->poids . ' Kg' : '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-end">Valeur (FCFA) :</th>
                        <td>{{ $colis->valeur ? number_format($colis->valeur, 0, ',', ' ') . ' F CFA' : '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-end">Nom du destinataire :</th>
                        <td>{{ $colis->destinataire_nom ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-end">Téléphone du destinataire :</th>
                        <td>{{ $colis->destinataire_telephone ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-end">Adresse du destinataire :</th>
                        <td>{{ $colis->destinataire_adresse ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-end">Nom de l'expéditeur :</th>
                        <td>{{ $colis->expediteur_nom ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-end">Téléphone de l'expéditeur :</th>
                        <td>{{ $colis->expediteur_telephone ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="text-end">Adresse de l'expéditeur :</th>
                        <td>{{ $colis->expediteur_adresse ?? '-' }}</td>
                    </tr>
                </table>
                @else
                    <p class="text-center text-warning">Aucune information trouvée pour ce colis.</p>
                @endif

                <div class="text-center mt-4">
                    <a href="{{ route('colis.index') }}" class="btn btn-outline-light me-2">
                        <i class="fa fa-arrow-left me-1"></i> Retour
                    </a>
                    <a href="{{ route('colis.edit', $colis->id) }}" class="btn btn-primary">
                        <i class="fa fa-edit me-1"></i> Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
