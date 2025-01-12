<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocalisationController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\CompteBancaireController;
use App\Http\Controllers\TransactionController;




//DEBUT
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/launch', function() {
    return view ('launch');
})->name('launch');

Route::get('/launch/Plan', function () {
    return view('plan'); 
})->name('Plan');

Route::get('/about', function () {
    return view('about'); 
})->name('about');
Route::get('/Beta', function () {
    return view('beta'); 
})->name('beta');
Route::get('/Beta-Admin', function () {
    return view('betaAdmin'); 
})->name('betaAdmin');
Route::get('/Assurance/info-assurance', function () {
    return view('/Assurance/info'); 
})->name('info-Assurance')->middleware('auth');;

//AUTH

//   login
Route::get('/login', function () {
    return view ('Auth/connexion');
})->name('connexion');
Route::get('/login2', function () {
    return redirect()->to(route('connexion'));
})->name('login');
Route::post('/login', [ConnexionController::class, 'login'])->name('login.submit');

//  register
Route::get('/register', function () {
    return view ('Auth/inscription');
})->name('inscription');
Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscription.store');

//Poirtaille Admin

Route::get('/Auth/Connexion/verification-DoubleCheck1', [VerificationController::class, 'showAdmin1'
])->name('verificationAdminEmail');

Route::get('/Auth/Connexion/verification-DoubleCheck2', [VerificationController::class, 'showAdmin2'
])->name('verificationAdminSMS');

Route::post('/verifyAdmin1-code', [VerificationController::class, 'verifyAdminByEmail'
])->name('verifyAdmin.Email');

Route::post('/verifyAdmin2-code', [VerificationController::class, 'verifyAdminBySms'
])->name('verifyAdmin.SMS');

// portaille de connexion client (basique)
Route::get('/Auth/Connexion/verification', [VerificationController::class, 'show'
])->name('verification');
Route::post('/verify-code', [VerificationController::class, 'verify'
])->name('verify.code');


//page User Basique
Route::get('/Home', function () {
    return view ('dashboard');
})->name('Home')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/comptes', [CompteBancaireController::class, 'index'])->name('comptes.index');
    Route::get('/comptes/create', [CompteBancaireController::class, 'create'])->name('comptes.create');
    Route::post('/comptes', [CompteBancaireController::class, 'store'])->name('comptes.store');
    Route::post('/comptes/{id}/statut', [CompteBancaireController::class, 'updateStatut'])->name('comptes.updateStatut');
    Route::delete('/comptes/{id}', [CompteBancaireController::class, 'destroy'])->name('comptes.destroy');
});



//Page de l'admin
// -Dashboard

    Route::get('/Admin/Dashboard', function () {
    return view('/Admin/Dashboard'); 
    })->name('AdminHome');
Route::middleware('auth')->group(function () {
    // -Dashboard
    Route::get('/Admin/Dashboard', function () {
        return view('/Admin/Dashboard'); 
        })->name('AdminHome');


    // Afficher 
    Route::get('/admin', [AdminController::class, 'index'])
         ->name('admin.index');

    // Ajouter 
    Route::get('/admin/create', [AdminController::class, 'create'])
         ->name('admin.create');
    Route::post('/admin', [AdminController::class, 'store'])
         ->name('admin.store');

    // Modifier 
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])
         ->name('admin.edit');
    Route::put('/admin/{id}', [AdminController::class, 'update'])
         ->name('admin.update');

    // Supprimer 
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])
         ->name('admin.destroy');
});

Route::resource('localisations', LocalisationController::class);
// -Fonctions Admin
// --Compte Bancaire
Route::delete('/compte-bancaire/{id}', [CompteBancaireController::class, 'destroy'])->name('compte_bancaire.destroy');

//Fonctions:
//Compte Bancaire
Route::get('/compte-bancaire', [CompteBancaireController::class, 'index'])->name('compte_bancaire.index');
Route::get('/compte-bancaire/create', [CompteBancaireController::class, 'create'])->name('compte_bancaire.create');
Route::post('/compte-bancaire', [CompteBancaireController::class, 'store'])->name('compte_bancaire.store');
Route::get('/compte-bancaire/{id}', [CompteBancaireController::class, 'show'])->name('compte_bancaire.show');
Route::get('/compte _bancaire/{id}/edit', [CompteBancaireController::class, 'edit'])->name('compte_bancaire.edit');
Route::put('/compte-bancaire/{id}', [CompteBancaireController::class, 'update'])->name('compte_bancaire.update');

//Transaction
Route::middleware('auth')->group(function () {
    //AJout
    Route::get('/transaction/addmoney', [TransactionController::class, 'addMoney'])
    ->name('transaction.addMoney');
    Route::post('/transaction/addMoney', [TransactionController::class, 'addMoneyPost'])
    ->name('transaction.addMoneyPost');
    // Transaction
    Route::get('/transaction/historique', [TransactionController::class, 'historique'])
    ->name('transaction.historique'); 
    //Virement
    Route::get('/virement', [TransactionController::class, 'showVirementForm'])
    ->name('transaction.showVirementForm');
    Route::post('/virement/process', [TransactionController::class, 'processVirement'])
    ->name('transaction.processVirement');
    Route::post('/virement/execute', [TransactionController::class, 'executeVirement'])
         ->name('transaction.executeVirement');
    //confirmation
    Route::get('/virement/Verification', [TransactionController::class, 'showVerifyPassword'])
    ->name('transaction.showVerifyPassword');
    Route::post('/virement/verify-password', [TransactionController::class, 'verifyPassword'])
    ->name('transaction.verifyPassword');
    Route::get('/virement/confirmation', [TransactionController::class, 'showConfirmation'])
         ->name('transaction.confirmation');
    Route::get('/virement/success', [TransactionController::class, 'showSuccessPage'])
    ->name('transaction.success');

    
});
