<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    
    protected $table = 'transaction';

    protected $fillable = [
        'CompteDeb', // Email de l'utilisateur débiteur
        'CompteCre', // Email de l'utilisateur créditeur
        'montant',   // Montant de la transaction
        'typeTransaction', // Type de transaction
    ];
}
