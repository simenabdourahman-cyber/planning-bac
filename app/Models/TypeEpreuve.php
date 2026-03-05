<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeEpreuve extends Model
{
    protected $table = 'type_epreuve';
    protected $primaryKey = 'id_type_epreuve';
    public $timestamps = false;

    protected $fillable = ['code', 'intitule'];

    // Codes : '1' = Écrit, '2' = Oral, '3' = Pratique
}
