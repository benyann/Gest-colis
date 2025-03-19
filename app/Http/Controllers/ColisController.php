<?php

namespace App\Http\Controllers;

use App\Models\Colis;
use Illuminate\Http\Request;

class ColisController extends Controller
{
    /**
     * Affiche la liste des colis.
     */
    public function index()
    {
        $colis = Colis::all();
        return view('colis.index', compact('colis'));
    }

    /**
     * Affiche le formulaire de création d’un colis.
     */
    public function create()
    {
        return view('colis.create');
    }

    /**
     * Enregistre un nouveau colis.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'poids' => 'required|numeric',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'code_postal' => 'required|string',
            'pays' => 'required|string',
        ]);

        Colis::create($request->all());

        return redirect()->route('colis.index')->with('success', 'Colis créé avec succès.');
    }

    /**
     * Affiche les détails d’un colis spécifique.
     */
    public function show(Colis $colis)
    {
        return view('colis.show', compact('colis'));
    }

    /**
     * Affiche le formulaire d’édition d’un colis.
     */
    public function edit(Colis $colis)
    {
        return view('colis.edit', compact('colis'));
    }

    /**
     * Met à jour un colis existant.
     */
    public function update(Request $request, Colis $colis)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'poids' => 'required|numeric',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'code_postal' => 'required|string',
            'pays' => 'required|string',
        ]);

        $colis->update($request->all());

        return redirect()->route('colis.index')->with('success', 'Colis mis à jour avec succès.');
    }

    /**
     * Supprime un colis.
     */
    public function destroy(Colis $colis)
    {
        $colis->delete();

        return redirect()->route('colis.index')->with('success', 'Colis supprimé avec succès.');
    }
}
