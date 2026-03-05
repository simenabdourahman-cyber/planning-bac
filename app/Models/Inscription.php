<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inscription extends Model
{
    protected $table = 'inscription';
    protected $primaryKey = 'id_inscription';
    public $timestamps = false;

    protected $fillable = [
        'annee', 'id_candidat', 'id_classe', 'id_examen',
        'id_serie', 'id_specialite', 'num_examen', 'anonymat',
    ];

    public function candidat(): BelongsTo
    {
        return $this->belongsTo(Candidat::class, 'id_candidat', 'id_candidat');
    }

    public function classe(): BelongsTo
    {
        return $this->belongsTo(Classe::class, 'id_classe', 'id_classe');
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

    public function epreuveCandidats(): HasMany
    {
        return $this->hasMany(EpreuveCandidat::class, 'id_inscription', 'id_inscription');
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class, 'id_inscription', 'id_inscription');
    }

    public function scopeAnnee($query, int $annee)
    {
        return $query->where('annee', $annee);
    }
}