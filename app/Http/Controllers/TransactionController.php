<?php

namespace App\Http\Controllers;

use App\Models\CompteBancaire;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;



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
    public function processVirement(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'iban' => 'required|string',
            'montant' => 'required|numeric|min:0',
        ]);

        // Récupérer l'IBAN et le montant
        $iban = $request->iban;
        $montant = $request->montant;

        // Vérifier si l'IBAN est interne ou externe
        $compteDestinataire = CompteBancaire::where('iban', $iban)->first();

        // Préparer les données pour la vérification du mot de passe
        session(['virement_data' => [
            'iban' => $iban,
            'montant' => $montant,
            'compte_destinataire' => $compteDestinataire,
        ]]);

        // Rediriger vers la page de vérification du mot de passe
        return redirect()->route('transaction.showVerifyPassword');
    }
    public function showVerifyPassword()
    {
        return view('transaction.verify_password');
    }

    public function verifyPassword(Request $request)
    {
        // Valider le mot de passe
        $request->validate([
            'password' => 'required|string',
        ]);

        // Vérifier le mot de passe de l'utilisateur
        if (Hash::check($request->password, Auth::user()->Password)) {
            // Si le mot de passe est correct, rediriger vers la page de confirmation
            return redirect()->route('transaction.confirmation');
        } else {
            // Si le mot de passe est incorrect, retourner à la page de vérification avec un message d'erreur
            return back()->withErrors(['password' => 'Mot de passe incorrect.']);
        }
    }
    public function showConfirmation()
    {
        $virementData = session('virement_data');
        return view('transaction.confirmation', compact('virementData'));
    }
    public function executeVirement()
    {
        $virementData = session('virement_data');

        // Récupérer le compte émetteur (compte de l'utilisateur connecté)
        $compteEmetteur = CompteBancaire::where('idUser', Auth::id())->first();

        // Récupérer le compte destinataire
        $compteDestinataire = CompteBancaire::where('iban', $virementData['iban'])->first();

        // Effectuer le virement
        if ($compteDestinataire) {
            // Virement interne
            $compteEmetteur->budget -= $virementData['montant'];
            $compteDestinataire->budget += $virementData['montant'];
        } else {
            // Virement externe
            $compteEmetteur->budget -= $virementData['montant'];
            // Logique pour gérer le virement externe 
        }

        // Sauvegarder les modifications
        $compteEmetteur->save();
        if ($compteDestinataire) {
            $compteDestinataire->save();
        }

        // Enregistrer la transaction
        $transaction = new Transaction();
        $transaction->CompteDeb = Auth::user()->Email; // Email de l'utilisateur débiteur
        $transaction->CompteCre = $compteDestinataire ? $compteDestinataire->user->Email : 'externe'; // Email de l'utilisateur créditeur ou 'externe'
        $transaction->montant = $virementData['montant'];
        $transaction->typeTransaction = 'virement';
        $transaction->save();

        // Effacer les données de virement de la session
        session()->forget('virement_data');

        // Rediriger vers la page de succès
        return redirect()->route('transaction.success');
    }
    public function showSuccessPage()
    {
        return view('transaction.success');
    }
}
