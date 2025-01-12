<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'user';

    protected $primaryKey = 'idClient';
    public function id_Client()
    {
        return $this->id;
    }

    protected $fillable = [
        'Nom', 'adresse', 'Localisation', 'tel', 'Email', 'Password'
    ];

    protected $hidden = [
        'Password',
    ];

    public function getAuthPassword()
    {
        return $this->Password;
    }
    public function compteBancaire()
    {
        return $this->hasOne(CompteBancaire::class, 'idUser');
    }
    public function isAdmin()
    {
        return $this->role == 'admin';
    }
}
