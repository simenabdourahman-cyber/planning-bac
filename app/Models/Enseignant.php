<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enseignant extends Model
{
    protected $table = 'enseignant';
    protected $primaryKey = 'id_enseignant';
    public $timestamps = false;

    protected $fillable = [
        'matricule_ens', 'nom_ens', 'role_ens',
        'flagsurv',           // 'OUI' ou 'NON'
        'id_parcours_matiere',
        'etab', 'centre',
        'date_debut', 'date_fin',
        'heure_debut', 'heure_fin',
        'annee',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin'   => 'date',
    ];

    public function parcoursMatiere(): BelongsTo
    {
        return $this->belongsTo(ParcoursMatiere::class, 'id_parcours_matiere', 'id_parcours_matiere');
    }

    public function epreuves(): HasMany
    {
        return $this->hasMany(Epreuve::class, 'id_enseignant', 'id_enseignant');
    }

    public function epreuveEnseignants(): HasMany
    {
        return $this->hasMany(EpreuveEnseignant::class, 'id_enseignant', 'id_enseignant');
    }

    public function estSurveillant(): bool
    {
        return strtoupper($this->flagsurv) === 'OUI';
    }

    public function scopeSurveillants($query)
    {
        return $query->where('flagsurv', 'OUI');
    }

    public function scopeAnnee($query, int $annee)
    {
        return $query->where('annee', $annee);
    }
}