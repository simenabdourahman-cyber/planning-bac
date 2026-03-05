<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidat extends Model
{
    protected $table = 'candidat';
    protected $primaryKey = 'id_candidat';
    public $timestamps = false;

    protected $fillable = [
        'matricule', 'nom', 'date_naissance', 'genre',
        'Telephone', 'email', 'ville', 'pays',
    ];

    protected $casts = [
        'date_naissance' => 'date',
    ];

    public function inscriptions(): HasMany
    {
        return $this->hasMany(Inscription::class, 'id_candidat', 'id_candidat');
    }

    /** Accès aux épreuves via les inscriptions */
    public function epreuveCandidats(): HasMany
    {
        return $this->hasManyThrough(
            EpreuveCandidat::class,
            Inscription::class,
            'id_candidat',   // FK sur inscription
            'id_inscription', // FK sur epreuve_candidat
            'id_candidat',
            'id_inscription'
        );
    }

    public function getGenreLibelleAttribute(): string
    {
        return $this->genre === 'M' ? 'Masculin' : 'Féminin';
    }
}