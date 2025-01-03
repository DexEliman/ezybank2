<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Localisation extends Model
{
    use HasFactory;

    protected $table = 'localisation';
    protected $fillable = ['loc'];
}
