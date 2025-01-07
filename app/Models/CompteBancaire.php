<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompteBancaire extends Model
{
    use HasFactory;

    public $table = "compte_bancaire";

    // Les champs remplissables (mass assignable)
    protected $fillable = [
        'numero_compte',
        'idUser  ',
        'nom_bancaire',
        'budget',
        'statut',
    ];

    // Les valeurs par défaut pour certains champs
    protected $attributes = [
        'budget' => 0, // Budget par défaut à 0
        'statut' => 'ouvert', // Statut par défaut à "ouvert"
    ];

    // Relation avec l'utilisateur (si vous avez un modèle User)
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser  ');
    }
}