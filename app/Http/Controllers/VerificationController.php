<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VerificationController extends Controller
{
    // Afficher du portaille de verification pour les user
    public function show()
    {
        return view('Auth/Verification');
    }


    public function verify(Request $request)
    {
        // Récupérer les 6 chiffres saisis
        $code1 = $request->code1;
        $code2 = $request->code2;
        $code3 = $request->code3;
        $code4 = $request->code4;
        $code5 = $request->code5;
        $code6 = $request->code6;

        $code = $code1 . $code2 . $code3 . $code4 . $code5 . $code6;

        // Vérifier si le code est correct
        if ($code === "123456") {
            // Rediriger vers le tableau de bord ou une autre page
            return redirect()->route('Home')->with('success', 'Code vérifié avec succès !');
        } else {
            // Rediriger vers la page de vérification avec un message d'erreur
            return redirect()->route('verification')->with('error', 'Le code saisi est invalide. Veuillez entrer un code à 6 chiffres.');
        }
    }

    //VERIFICATION ADMIN 
    public function showAdmin1()
    {
        return view('Auth/VerificationAdmin');
    }
    public function showAdmin2()
    {
        return view('Auth/VerificationAdminSMS');
    }
    // Méthode pour vérifier un administrateur par SMS
    public function verifyAdminBySms(Request $request)
    {
       // Récupérer les 6 chiffres saisis
        $code1 = $request->code1;
        $code2 = $request->code2;
        $code3 = $request->code3;
        $code4 = $request->code4;
        $code5 = $request->code5;
        $code6 = $request->code6;

        $code = $code1 . $code2 . $code3 . $code4 . $code5 . $code6;

        // Vérifier si le code est correct
        if ($code === "654321") {
            // Rediriger vers le tableau de bord ou une autre page
            return redirect()->route('AdminHome')->with('success', 'Code vérifié avec succès !');
        } else {
            // Rediriger vers la page de vérification avec un message d'erreur
            return redirect()->route('verificationAdminSMS')->with('error', 'Le code saisi est invalide. Veuillez entrer un code à 6 chiffres.');
        }
    }

    // Méthode pour vérifier un administrateur par email
    public function verifyAdminByEmail(Request $request)
    {
        // Récupérer les 6 chiffres saisis
        $code1 = $request->code1;
        $code2 = $request->code2;
        $code3 = $request->code3;
        $code4 = $request->code4;
        $code5 = $request->code5;
        $code6 = $request->code6;

        $code = $code1 . $code2 . $code3 . $code4 . $code5 . $code6;

        // Vérifier si le code est correct
        if ($code === "123456") {
            // Rediriger vers le tableau de bord ou une autre page
            return redirect()->route('verificationAdminSMS')->with('success', 'Code vérifié avec succès !');
        } else {
            // Rediriger vers la page de vérification avec un message d'erreur
            return redirect()->route('verificationAdmin')->with('error', 'Le code saisi est invalide. Veuillez entrer un code à 6 chiffres.');
        }
    }

    // Méthode pour vérifier un administrateur par email
    
}
