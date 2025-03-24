<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Http\Request;

class AgenceController extends Controller
{
    /**
     * Affiche la liste des agences.
     */
    public function index()
    {
        $agences = Agence::latest()->get();
        return view('agence.index', compact('agences'));
    }

    /**
     * Affiche le formulaire de création d'une agence.
     */
    public function create()
    {
        return view('agence.create');
    }

    /**
     * Enregistre une nouvelle agence en base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'       => 'required|string|max:255',
            'adresse'   => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
        ]);

        Agence::create($request->all());

        return redirect()->route('agence.index')->with('success', 'Agence ajoutée avec succès.');
    }

    /**
     * Affiche les détails d'une agence spécifique.
     */
    public function show(Agence $agence)
    {
        return view('agence.show', compact('agence'));
    }

    /**
     * Affiche le formulaire d'édition d'une agence.
     */
    public function edit(Agence $agence)
    {
        return view('agence.edit', compact('agence'));
    }

    /**
     * Met à jour les informations d'une agence existante.
     */
    public function update(Request $request, Agence $agence)
    {
        $request->validate([
            'nom'       => 'required|string|max:255',
            'adresse'   => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
        ]);

        $agence->update($request->all());

        return redirect()->route('agence.index')->with('success', 'Agence mise à jour avec succès.');
    }

    /**
     * Supprime une agence.
     */
    public function destroy(Agence $agence)
    {
        $agence->delete();
        return redirect()->route('agence.index')->with('success', 'Agence supprimée avec succès.');
    }
}
