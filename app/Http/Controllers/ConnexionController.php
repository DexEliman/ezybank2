<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

        // Tentative de connexion
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Connexion réussie
            return redirect()->route('verification')->with('success', 'Connexion réussie !');
        } else {
            // Connexion échouée
            return back()->with('error', 'Email ou mot de passe incorrect.');
        }
    }
}
