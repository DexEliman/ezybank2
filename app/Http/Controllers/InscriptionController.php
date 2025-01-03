<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Localisation;

class InscriptionController extends Controller
{
    // Afficher le formulaire d'inscription
    public function showForm()
    {
        // Récupérer toutes les localisations pour la liste déroulante
        $localisations = Localisation::all();
        dd($localisations);//Debobage Temporaire conceiller par chat
        return view('Auth.inscription', compact('localisations'));
    }

    // Traitement de L'inscription l'inscription merci M.Bryan pour cette partie
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'localisation' => 'required|string|max:255',
            'autre_localisation' => 'nullable|string|max:255',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|unique:user,Email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        
        if ($request->has('autre_localisation') && $request->autre_localisation) {
            $localisation = $request->autre_localisation;
        } else {
            $localisation = $request->localisation;
        }

        // Créer un nouvel utilisateur
        User::create([
            'Nom' => $request->nom,
            'adresse' => $request->adresse,
            'Localisation' => $localisation,
            'tel' => $request->tel,
            'Email' => $request->email,
            'Password' =>bcrypt($request->password),
        ]);

        // Rediriger 
        return redirect()->route('connexion')->with('success', 'Inscription réussie Connecté Vous pour Continuer !');
    }
}
