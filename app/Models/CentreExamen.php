<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CentreExamen extends Model
{
    protected $table = 'centre_examen';
    protected $primaryKey = 'id_centre_examen';
    public $timestamps = false;

    protected $fillable = [
        'id_centre', 'id_examen', 'id_serie', 'id_specialite',
        'nb_candidat', 'repasse_antip', 'annee', 'ordre', 'session',
    ];

    // session : 0 = Session Principale, 2 = Rattrapage

    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class, 'id_centre', 'id_centre');
    }

    public function examen(): BelongsTo
    {
        return $this->belongsTo(Examen::class, 'id_examen', 'id_examen');
    }

    public function serie(): BelongsTo
    {
        return $this->belongsTo(Serie::class, 'id_serie', 'id_serie');
    }

    public function specialite(): BelongsTo
    {
        return $this->belongsTo(Specialite::class, 'id_specialite', 'id_specialite');
    }

    // Scopes
    public function scopeSessionPrincipale($query)
    {
        return $query->where('session', 0);
    }

    public function scopeSessionRattrapage($query)
    {
        return $query->where('session', 2);
    }

    public function scopeAnnee($query, int $annee)
    {
        return $query->where('annee', $annee);
    }

    public function getSessionLibelleAttribute(): string
    {
        return $this->session === 0 ? 'Session Principale' : 'Rattrapage';
    }
}
