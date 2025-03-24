<?php

namespace App\Http\Controllers;

use App\Models\Expedition;
use App\Models\Chauffeur;
use App\Models\Agence;
use Illuminate\Http\Request;

class ExpeditionController extends Controller
{
    public function index()
    {
        $expeditions = Expedition::with(['agence', 'chauffeur', 'colis'])->latest()->get();
        return view('expedition.index', compact('expeditions'));
    }

    public function create()
    {
        $agences = Agence::all();
        $chauffeurs = Chauffeur::where('statut', 'disponible')->get();
        return view('expedition.create', compact('agences', 'chauffeurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference'        => 'required|string|unique:expeditions,reference',
            'date_expedition'  => 'required|date',
            'creneau'          => 'required|in:matin,midi,soir',
            'agence_id'        => 'nullable|exists:agences,id',
            'chauffeur_id'     => 'nullable|exists:chauffeurs,id',
            'statut'           => 'required|in:en attente,en cours,terminée',
        ]);

        Expedition::create([
            'reference'        => $request->reference,
            'date_expedition'  => $request->date_expedition,
            'creneau'          => $request->creneau,
            'agence_id'        => $request->agence_id,
            'chauffeur_id'     => $request->chauffeur_id,
            'statut'           => $request->statut,
        ]);

        return redirect()->route('expedition.index')->with('success', 'Expédition créée avec succès.');
    }

    public function show(Expedition $expedition)
    {
        $expedition->load(['agence', 'chauffeur', 'colis']);
        return view('expedition.show', compact('expedition'));
    }

    public function edit(Expedition $expedition)
    {
        $agences = Agence::all();
        $chauffeurs = Chauffeur::all(); // Si tu veux toujours afficher tous les chauffeurs, sinon filtre les disponibles
        return view('expedition.edit', compact('expedition', 'agences', 'chauffeurs'));
    }

    public function update(Request $request, Expedition $expedition)
    {
        $request->validate([
            'reference'        => 'required|string|unique:expeditions,reference,' . $expedition->id,
            'date_expedition'  => 'required|date',
            'creneau'          => 'required|in:matin,midi,soir',
            'agence_id'        => 'nullable|exists:agences,id',
            'chauffeur_id'     => 'nullable|exists:chauffeurs,id',
            'statut'           => 'required|in:en attente,en cours,terminée',
        ]);

        $expedition->update([
            'reference'        => $request->reference,
            'date_expedition'  => $request->date_expedition,
            'creneau'          => $request->creneau,
            'agence_id'        => $request->agence_id,
            'chauffeur_id'     => $request->chauffeur_id,
            'statut'           => $request->statut,
        ]);

        return redirect()->route('expedition.index')->with('success', 'Expédition mise à jour avec succès.');
    }

    public function destroy(Expedition $expedition)
    {
        $expedition->delete();
        return redirect()->route('expedition.index')->with('success', 'Expédition supprimée avec succès.');
    }
}
