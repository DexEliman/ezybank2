<?php

namespace App\Http\Controllers;

use App\Models\CompteBancaire;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // Afficher le formulaire d'ajout d'argent
    public function addMoney()
    {
        return view('transaction.addmoney');
    }

    // Traiter l'ajout d'argent
    public function addMoneyPost(Request $request)
    {
        // Valider le montant
        $request->validate([
            'montant' => 'required|numeric|min:0',
        ]);

        // Récupérer le compte de l'utilisateur connecté
        $compte = CompteBancaire::where('idUser', Auth::id())->first();

        // Vérifier si le compte existe
        if (!$compte) {
            return redirect()->back()->with('error', 'Compte bancaire non trouvé.');
        }

        // Ajouter le montant au budget du compte
        $compte->budget += $request->montant;
        $compte->save();

        // Enregistrer la transaction
        $transaction = new Transaction();
        $transaction->CompteDeb = Auth::user()->Email; // Email de l'utilisateur débiteur
        $transaction->CompteCre = Auth::user()->Email; // Email de l'utilisateur créditeur
        $transaction->montant = $request->montant;
        $transaction->typeTransaction = 'ajout';
        $transaction->save();

        return redirect()->route('compte_bancaire.show',  ['id' => $compte->id])->with('success', 'Montant ajouté avec succès !');
    }

    // Afficher l'historique 
    public function historique()
    {
        // Récupérer l'email de l'utilisateur connecté
        $email = Auth::user()->Email;

        // Récupérer les transactions
        $transactions = Transaction::where('CompteDeb', $email)
            ->orWhere('CompteCre', $email)
            ->get();

        return view('transaction.historique', compact('transactions'));
    }

    public function showVirementForm()
    {
        return view('transaction.virement');
    }
    public function verifyIban(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'iban' => 'required|string',
            'montant' => 'required|numeric|min:0',
        ]);

        // Récupérer l'IBAN et le montant
        $iban = $request->iban;
        $montant = $request->montant;

        // Vérifier si l'IBAN correspond à un compte utilisateur
        $compteDestinataire = CompteBancaire::where('iban', $iban)->first();

        // Préparer les données à afficher
        $destinataire = [
            'iban' => $iban,
            'email' => $compteDestinataire ? $compteDestinataire->user->Email : null,
        ];

        // Stocker les données dans la session pour les utiliser plus tard
        session(['virement_data' => [
            'iban' => $iban,
            'montant' => $montant,
            'destinataire' => $destinataire,
        ]]);

        // Rediriger vers la page de vérification du mot de passe
        return redirect()->route('transaction.verifyPassword');
    }
    public function showPasswordVerification()
    {
        return view('transaction.verify_password');
    }
    public function processVirement(Request $request)
    {
        // Valider le mot de passe
        $request->validate([
            'password' => 'required|string',
        ]);

        // Vérifier si le mot de passe est correct
        if (Auth::attempt(['Email' => Auth::user()->Email, 'password' => $request->password])) {
            // Récupérer les données de virement de la session
            $virementData = session('virement_data');

            // Vérifier si les données de virement existent
            if (!$virementData) {
                return redirect()->back()->withErrors(['error' => 'Données de virement introuvables.']);
            }

            // Récupérer le compte émetteur (compte de l'utilisateur connecté)
            $compteEmetteur = Auth::user()->compteBancaire;

            // Vérifier si le compte émetteur a suffisamment de solde
            if ($compteEmetteur->solde < $virementData['montant']) {
                return redirect()->back()->withErrors(['error' => 'Solde insuffisant pour effectuer le virement.']);
            }

            // Récupérer le compte destinataire
            $compteDestinataire = CompteBancaire::where('iban', $virementData['iban'])->first();

            // Effectuer le virement
            if ($compteDestinataire) {
                // Virement interne
                $compteEmetteur->solde -= $virementData['montant'];
                $compteDestinataire->solde += $virementData['montant'];
            } else {
                // Virement externe
                $compteEmetteur->solde -= $virementData['montant'];
                // Logique pour gérer le virement externe (par exemple, enregistrer dans une table de virements externes)
            }

            // Sauvegarder les modifications
            $compteEmetteur->save();
            if ($compteDestinataire) {
                $compteDestinataire->save();
            }

            // Effacer les données de virement de la session
            session()->forget('virement_data');

            // Rediriger avec un message de succès
            return redirect()->route('transaction.success')->with('success', 'Virement effectué avec succès.');
        }

        // Rediriger avec un message d'erreur si le mot de passe est incorrect
        return redirect()->back()->withErrors(['password' => 'Mot de passe incorrect.']);
    }
    public function showSuccessPage()
    {
        return view('transaction.success');
    }
}
