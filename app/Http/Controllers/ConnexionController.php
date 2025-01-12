<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;




class ConnexionController extends Controller
{

    // Traiter le formulaire de connexion (POST)
    public function login(Request $request)
    {
        // Validation des données
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // auth pour admin
        // Vérifier si l'utilisateur est un administrateur
        $admin = Admin::where('Email', $request->email)->first();
        if ($admin && Hash::check($request->password, $admin->Password)) {
            // Rediriger vers la page d'administration
            return redirect()->route('verificationAdminEmail');
        } elseif ($admin && !Hash::check($request->password, $admin->password)) {
            // Mot de passe incorrect pour l'administrateur
            return back()->with('error', 'Email ou mot de passe incorrect.');
        }

        // Tentative de connexion
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Connexion réussie
            $user = Auth::user();
            if ($user) {
                // Rediriger vers la page de vérification
                return redirect()->route('verification')->with('success', 'Connexion réussie !');
            }
        } else {
            // Connexion échouée
            return back()->with('error', 'Email ou mot de passe incorrect.');
        }
    }
}
