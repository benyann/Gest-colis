<?php

namespace App\Http\Controllers;

use App\Models\Expedition;
use App\Models\Agence;
use App\Models\Chauffeur;
use App\Models\Colis;
use Illuminate\Http\Request;

class ExpeditionController extends Controller
{
    public function index()
    {
        $expeditions = Expedition::with(['agenceDepart', 'agenceArrivee', 'chauffeur'])->orderBy('date_expedition', 'desc')->get();
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
        // Validation des champs
        $request->validate([
            'nom' => 'required|string|max:255',  // Validation du nom
            'date_expedition' => 'required|date',  // Validation de la date
            'heure_expedition' => 'required|date_format:H:i',  // Validation de l'heure au format HH:MM
            'agence_depart_id' => 'required|exists:agences,id',  // Vérifier si l'agence de départ existe
            'agence_arrivee_id' => 'required|exists:agences,id|different:agence_depart_id',  // Vérifier si l'agence d'arrivée existe et différente de celle de départ
            'chauffeur_id' => 'nullable|exists:chauffeurs,id|nullable',  // Validation du chauffeur si renseigné
        ]);

        // Création de l'expédition
        $expedition = Expedition::create([
            'reference' => 'EXP-' . time(),  // Génération de la référence unique
            'nom' => $request->nom,  // Récupération du nom
            'date_expedition' => $request->date_expedition,  // Récupération de la date
            'heure_expedition' => $request->heure_expedition,  // Récupération de l'heure
            'agence_depart_id' => $request->agence_depart_id,  // Récupération de l'agence de départ
            'agence_arrivee_id' => $request->agence_arrivee_id,  // Récupération de l'agence d'arrivée
            'chauffeur_id' => $request->chauffeur_id,  // Récupération du chauffeur (si disponible)
            'nombre_colis' => 0,  // Initialisation du nombre de colis à 0
            'statut' => 'en préparation',  // Statut par défaut
        ]);

        // Redirection avec message de succès
        return redirect()->route('expedition.index')->with('success', 'Expédition créée avec succès.');
    }

    public function edit($id)
    {
        $expedition = Expedition::findOrFail($id);
        $agences = Agence::all();
        $chauffeurs = Chauffeur::where('statut', 'disponible')->get(); 
        $colis = Colis::all();

        return view('expedition.edit', compact('expedition', 'agences', 'chauffeurs', 'colis'));
    }

    public function update(Request $request, $id)
    {
        // Validation des champs
        $request->validate([
            'date_expedition' => 'required|date',
            'heure_expedition' => 'required|date_format:H:i',
            'agence_depart_id' => 'required|exists:agences,id',
            'agence_arrivee_id' => 'required|exists:agences,id|different:agence_depart_id',
            'chauffeur_id' => 'nullable|exists:chauffeurs,id',
            'statut' => 'required|in:en préparation,en transit,livrée',
        ]);

        // Récupération de l'expédition
        $expedition = Expedition::findOrFail($id);

        // Mise à jour de l'expédition
        $expedition->update([
            'date_expedition' => $request->date_expedition,
            'heure_expedition' => $request->heure_expedition,
            'agence_depart_id' => $request->agence_depart_id,
            'agence_arrivee_id' => $request->agence_arrivee_id,
            'chauffeur_id' => $request->chauffeur_id,
            'statut' => $request->statut,
        ]);

        // Redirection avec message de succès
        return redirect()->route('expedition.index')->with('success', 'Expédition mise à jour avec succès.');
    }

    public function show($id)
    {
        $expedition = Expedition::with(['agenceDepart', 'agenceArrivee', 'chauffeur', 'colis'])->findOrFail($id);
        return view('expedition.show', compact('expedition'));
    }

    public function destroy(Expedition $expedition)
    {
        $expedition->delete();  // Suppression de l'expédition
        return redirect()->route('expedition.index')->with('success', 'Expédition supprimée avec succès.');
    }
}
