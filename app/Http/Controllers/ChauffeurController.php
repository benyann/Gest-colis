<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
    /**
     * Affiche la liste des chauffeurs.
     */
    public function index()
    {
        $chauffeurs = Chauffeur::all();
        return view('chauffeur.index', compact('chauffeurs'));
    }

    /**
     * Affiche le formulaire de création d’un chauffeur.
     */
    public function create()
    {
        return view('chauffeur.create');
    }

    /**
     * Enregistre un nouveau chauffeur en base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'       => 'required|string|max:255',
            'prenom'    => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'matricule' => 'required|string|max:50|unique:chauffeurs,matricule',
            'statut'    => 'required|in:disponible,occupé',
        ]);

        Chauffeur::create($request->all());

        return redirect()->route('chauffeur.index')->with('success', 'Chauffeur ajouté avec succès.');
    }

    /**
     * Affiche les détails d’un chauffeur spécifique.
     */
    public function show(Chauffeur $chauffeur)
    {
        return view('chauffeur.show', compact('chauffeur'));
    }

    /**
     * Affiche le formulaire d’édition d’un chauffeur.
     */
    public function edit(Chauffeur $chauffeur)
    {
        return view('chauffeur.edit', compact('chauffeur'));
    }

    /**
     * Met à jour les informations d’un chauffeur existant.
     */
    public function update(Request $request, Chauffeur $chauffeur)
    {
        $request->validate([
            'nom'       => 'required|string|max:255',
            'prenom'    => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'matricule' => 'required|string|max:50|unique:chauffeurs,matricule,' . $chauffeur->id,
            'statut'    => 'required|in:disponible,occupé',
        ]);

        $chauffeur->update($request->all());

        return redirect()->route('chauffeur.index')->with('success', 'Chauffeur mis à jour avec succès.');
    }

    /**
     * Supprime un chauffeur.
     */
    public function destroy(Chauffeur $chauffeur)
    {
        $chauffeur->delete();
        return redirect()->route('chauffeur.index')->with('success', 'Chauffeur supprimé avec succès.');
    }
}
