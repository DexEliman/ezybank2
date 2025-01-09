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
    public function index(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }
        $comptes = CompteBancaire::where('idUser', Auth::user()->id)->get();
        
        return view('Compte.index', compact('comptes'));
    }
    public function create()
    {
        return view('Compte.create');
    }

    public function store(Request $request)
    {
        // Générer un numéro de compte unique
        do {
            $numero_compte = Str::random(10); // Génère un numéro de compte aléatoire de 10 caractères
        } while (CompteBancaire::where('numero_compte', $numero_compte)->exists());

        // Générer un IBAN unique
        do {
            $iban = 'FR' . Str::random(23); // Génère un IBAN random de 25 caractères (FR + 23 caractères)
        } while (CompteBancaire::where('iban', $iban)->exists());

        // Créer le compte bancaire
        $compte = CompteBancaire::create([
            'numero_compte' => $numero_compte,
            'idUser' => Auth::user()->id,
            'iban' => $iban,
            'budget' => 0,
            'statut' => 'ouvert',
            'typeCompte' => 'Courant',
        ]);

        return redirect()->route('compte_bancaire.index')->with('success', 'Compte bancaire créé avec succès!');
    }
}