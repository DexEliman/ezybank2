<?php

namespace App\Http\Controllers;

use App\Models\Localisation;
use Illuminate\Http\Request;

class LocalisationController extends Controller
{
    // Afficher la liste des localisations
    public function index()
    {
        $localisations = Localisation::all();
        return view('localisations.index', compact('localisations'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('localisations.create');
    }

    // Enregistrer une nouvelle localisation
    public function store(Request $request)
    {
        $request->validate([
            'loc' => 'required|string|max:255',
        ]);

        Localisation::create($request->all());

        return redirect()->route('localisations.index')->with('success', 'Localisation ajoutée avec succès.');
    }

    // Afficher le formulaire de modification
    public function edit(Localisation $localisation)
    {
        return view('localisations.edit', compact('localisation'));
    }

    // Mettre à jour une localisation
    public function update(Request $request, Localisation $localisation)
    {
        $request->validate([
            'loc' => 'required|string|max:255',
        ]);

        $localisation->update($request->all());

        return redirect()->route('localisations.index')->with('success', 'Localisation mise à jour avec succès.');
    }

    // Supprimer une localisation
    public function destroy(Localisation $localisation)
    {
        $localisation->delete();

        return redirect()->route('localisations.index')->with('success', 'Localisation supprimée avec succès.');
    }
}