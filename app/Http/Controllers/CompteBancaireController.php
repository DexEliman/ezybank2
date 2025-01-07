<?php

namespace App\Http\Controllers;

use App\Models\CompteBancaire;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CompteBancaireController extends Controller
{
    public function index(Request $request)
    {
        $comptes = CompteBancaire::where("idUser", Auth::user()->idCompte)->get();
        return view('Compte.index', compact('comptes'));
    }

    public function create()
    {
        $compteCourant = CompteBancaire::where("idUser", Auth::user()->idCompte)->where("typeCompte", "Courant")->first();
        if ($compteCourant) {
            return redirect()->route('comptes.index')->with('error', 'Vous avez déjà un compte courant.');
        }
        return view('Compte.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour créer un compte.');
        }
        $compteCourant = CompteBancaire::where("idUser", Auth::user()->idCompte)->where("typeCompte", "Courant")->first();
        if ($compteCourant) {
            return redirect()->route('comptes.index')->with('error', 'Vous avez déjà un compte courant.');
        }
        $request->validate([
            'nom_bancaire' => 'required|string|max:255',
        ]);

        $compte = new CompteBancaire();
        $compte->numero_compte = $this->generateUniqueNumeroCompte();
        $compte->idUser  = Auth::user()->idCompte;
        $compte->nom_bancaire = $request->nom_bancaire;
        $compte->typeCompte = "Courant";
        $compte->save();

        return redirect()->route('comptes.index')->with('success', 'Compte créé avec succès.');
    }

    public function updateStatut($id)
    {
        $compte = CompteBancaire::findOrFail($id);
        $compte->statut = ($compte->statut === 'ouvert') ? 'bloqué' : 'ouvert';
        $compte->save();

        return redirect()->route('comptes.index')->with('success', 'Statut du compte mis à jour.');
    }

    public function destroy($id)
    {
        $compte = CompteBancaire::findOrFail($id);
        $compte->delete();

        return redirect()->route('comptes.index')->with('success', 'Compte supprimé avec succès.');
    }

    private function generateUniqueNumeroCompte()
    {
        do {
            $numeroCompte = Str::random(10);
        } while (CompteBancaire::where('numero_compte', $numeroCompte)->exists());

        return $numeroCompte;
    }
}
