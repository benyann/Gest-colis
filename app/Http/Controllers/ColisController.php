<?php

namespace App\Http\Controllers;

use App\Models\Colis;
use App\Models\Expedition;
use Illuminate\Http\Request;

class ColisController extends Controller
{
    // Afficher la liste des colis
    public function index()
    {
        $colis = Colis::with('expedition')->get();
        return view('colis.index', compact('colis'));
    }

    // Afficher le formulaire de création d'un colis
    public function create()
    {
        $expeditions = Expedition::all();
        return view('colis.create', compact('expeditions'));
    }

    // Enregistrer un nouveau colis
    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:colis',
            'description' => 'nullable|string',
            'valeur' => 'required|numeric',
            'poids' => 'required|numeric',
            'destinataire_nom' => 'required|string',
            'destinataire_telephone' => 'required|string',
            'destinataire_adresse' => 'required|string',
            'expediteur_nom' => 'required|string',
            'expediteur_telephone' => 'required|string',
            'expediteur_adresse' => 'required|string',
            'expedition_id' => 'required|exists:expeditions,id',
        ]);

        Colis::create($request->all());

        return redirect()->route('colis.index')->with('success', 'Colis créé avec succès.');
    }

    // Afficher les détails d'un colis
    public function show($id)
    {
        $colis = Colis::with('expedition')->findOrFail($id);
        return view('colis.show', compact('colis'));
    }

    // Afficher le formulaire de modification d'un colis
    public function edit($id)
    {
        $colis = Colis::findOrFail($id);
        $expeditions = Expedition::all();
        return view('colis.edit', compact('colis', 'expeditions'));
    }

    // Mettre à jour un colis
    public function update(Request $request, $id)
    {
        $request->validate([
            'reference' => 'required|unique:colis,reference,' . $id,
            'description' => 'nullable|string',
            'valeur' => 'required|numeric',
            'poids' => 'required|numeric',
            'destinataire_nom' => 'required|string',
            'destinataire_telephone' => 'required|string',
            'destinataire_adresse' => 'required|string',
            'expediteur_nom' => 'required|string',
            'expediteur_telephone' => 'required|string',
            'expediteur_adresse' => 'required|string',
            'expedition_id' => 'required|exists:expeditions,id',
        ]);

        $colis = Colis::findOrFail($id);
        $colis->update($request->all());

        return redirect()->route('colis.index')->with('success', 'Colis mis à jour avec succès.');
    }

    // Supprimer un colis
    public function destroy($id)
    {
        $colis = Colis::findOrFail($id);
        $colis->delete();

        return redirect()->route('colis.index')->with('success', 'Colis supprimé avec succès.');
    }
}
