<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Etablissement extends Model
{
    protected $table = 'etablissement';
    protected $primaryKey = 'id_etab';
    public $timestamps = false;

    protected $fillable = [
        'code', 'code_matricule', 'intitule', 'responsable',
        'email', 'id_type_etab', 'id_niveau_ens',
        'id_circonscription', 'telephone', 'bp', 'masque',
    ];

    public function centres(): HasMany
    {
        return $this->hasMany(Centre::class, 'id_etab', 'id_etab');
    }

    public function salles(): HasMany
    {
        return $this->hasMany(Salle::class, 'id_etab', 'id_etab');
    }

    public function classes(): HasMany
    {
        return $this->hasMany(Classe::class, 'id_etab', 'id_etab');
    }
}