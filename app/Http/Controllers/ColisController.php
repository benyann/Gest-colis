<?php

namespace App\Http\Controllers;

use App\Models\Colis;
use App\Models\Expedition;
use App\Models\Agence;
use App\Models\Chauffeur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ColisController extends Controller
{
    /**
     * Liste des colis.
     */
    public function index()
    {
        $colis = Colis::with('agence', 'expeditions')->latest()->get();
        return view('colis.index', compact('colis'));
    }

    /**
     * Formulaire de création d’un colis.
     */
    public function create()
    {
        $agences = Agence::all();
        return view('colis.create', compact('agences'));
    }

    /**
     * Enregistrement d’un nouveau colis.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reference'              => 'required|string|unique:colis,reference',
            'description'            => 'required|string',
            'valeur'                 => 'required|numeric',
            'poids'                  => 'required|numeric',
            'destinataire_nom'       => 'required|string',
            'destinataire_telephone' => 'required|string',
            'destinataire_adresse'   => 'required|string',
            'expediteur_nom'         => 'required|string',
            'expediteur_telephone'   => 'required|string',
            'expediteur_adresse'     => 'required|string',
            'agence_id'              => 'nullable|exists:agences,id',
        ]);

        $colis = Colis::create($request->all());

        // Détermination du créneau horaire
        $creneau = $this->getCreneauHoraire();

        // Recherche d'une expédition existante respectant les quotas
        $expedition = $this->getExpeditionDisponible($colis->agence_id, $creneau);

        // Si aucune expédition disponible, on en crée une nouvelle
        if (!$expedition) {
            $chauffeur = Chauffeur::where('statut', 'disponible')->first();

            if (!$chauffeur) {
                return redirect()->back()->with('error', 'Aucun chauffeur disponible.');
            }

            $expedition = Expedition::create([
                'reference'        => 'EXP-' . strtoupper(Str::random(6)),
                'date_expedition'  => today(),
                'creneau'          => $creneau,
                'agence_id'        => $colis->agence_id,
                'chauffeur_id'     => $chauffeur->id,
                'statut'           => 'en attente',
            ]);
        }

        // Lier le colis à l'expédition
        $colis->expeditions()->attach($expedition->id);

        return redirect()->route('colis.index')->with('success', 'Colis ajouté et expédition créée ou mise à jour.');
    }

    /**
     * Détail d’un colis.
     */
    public function show(Colis $colis)
    {
        return view('colis.show', compact('colis'));
    }

    /**
     * Formulaire d’édition d’un colis.
     */
    public function edit(Colis $colis)
    {
        $agences = Agence::all();
        return view('colis.edit', compact('colis', 'agences'));
    }

    /**
     * Mise à jour d’un colis existant.
     */
    public function update(Request $request, Colis $colis)
    {
        $request->validate([
            'reference'              => 'required|string|unique:colis,reference,' . $colis->id,
            'description'            => 'required|string',
            'valeur'                 => 'required|numeric',
            'poids'                  => 'required|numeric',
            'destinataire_nom'       => 'required|string',
            'destinataire_telephone' => 'required|string',
            'destinataire_adresse'   => 'required|string',
            'expediteur_nom'         => 'required|string',
            'expediteur_telephone'   => 'required|string',
            'expediteur_adresse'     => 'required|string',
            'agence_id'              => 'nullable|exists:agences,id',
        ]);

        $colis->update($request->all());

        return redirect()->route('colis.index')->with('success', 'Colis mis à jour.');
    }

    /**
     * Suppression d’un colis.
     */
    public function destroy(Colis $colis)
    {
        $colis->delete();
        return redirect()->route('colis.index')->with('success', 'Colis supprimé.');
    }

    /**
     * Détermine le créneau horaire actuel.
     */
    private function getCreneauHoraire()
    {
        $heure = now()->hour;
        return match (true) {
            $heure < 11 => 'matin',
            $heure < 17 => 'midi',
            default     => 'soir',
        };
    }

    /**
     * Retourne une expédition disponible ou null.
     */
    private function getExpeditionDisponible($agenceId, $creneau)
    {
        return Expedition::with('colis')
            ->where('agence_id', $agenceId)
            ->whereDate('date_expedition', today())
            ->where('creneau', $creneau)
            ->get()
            ->filter(function ($exp) {
                return $exp->colis->count() < 50 && $exp->colis->sum('poids') < 2000;
            })->first();
    }
}
