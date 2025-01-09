<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompteBancaire;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class CompteBancaireController extends Controller


{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }
        $comptes = CompteBancaire::where('idUser', Auth::id())->get();
        

        return view('Compte.index', compact('comptes'));
    }
    public function create()
    {
        return view('Compte.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour créer un compte bancaire.');
        }
        // Vérifie si l'utilisateur Basique a déjà créé un compte bancaire
        //Sachant que si l'utilisateur est premium il peut créer plusieurs comptes (Pas encoure ajouté)
        if (CompteBancaire::where('idUser', Auth::id())->exists()) {
            return redirect()->route('comptes.index')->with('error', 'Vous avez déjà créé un compte bancaire.');
        }

        // Générer un numéro de compte unique
        do {
            $numero_compte = rand(1000000000, 9999999999); // Génère un numéro de compte aléatoire de 10 caractères
        } while (CompteBancaire::where('numero_compte', $numero_compte)->exists());

        // Générer un IBAN unique
        do {
            $iban = 'FR' . 76 . 30006000 . 0 . $numero_compte; // Génère un IBAN random de 25 caractères (FR + 23 caractères)
        } while (CompteBancaire::where('iban', $iban)->exists());

        // Créer le compte bancaire
        $compte = CompteBancaire::create([
            'numero_compte' => $numero_compte,
            'idUser' => Auth::id(),
            'iban' => $iban,
            'budget' => 0,
            'statut' => 'ouvert',
            'typeCompte' => 'Courant',
        ]);

        return redirect()->route('compte_bancaire.index')->with('success', 'Compte bancaire créé avec succès!');
    }
    public function show($id)
    {
        $compte = CompteBancaire::find($id);

        if (!$compte) {
            return redirect()->route('compte_bancaire.index')->with('error', 'Compte bancaire non trouvé.');
        }

        if ($compte->idUser != Auth::id()) {
            return redirect()->route('compte_bancaire.index')->with('error', 'Vous n\'avez pas l\'autorisation pour afficher ce compte.');
        }

        return view('Compte.show', compact('compte'));
    }
}
