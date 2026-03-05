<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Epreuve extends Model
{
    protected $table = 'epreuve';
    protected $primaryKey = 'id_epreuve';
    public $timestamps = false;

    protected $fillable = [
        'id_salle', 'id_enseignant', 'id_parcours_matiere',
        'date', 'heure_debut', 'heure_fin',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function salle(): BelongsTo
    {
        return $this->belongsTo(Salle::class, 'id_salle', 'id_salle');
    }

    public function enseignant(): BelongsTo
    {
        return $this->belongsTo(Enseignant::class, 'id_enseignant', 'id_enseignant');
    }

    public function parcoursMatiere(): BelongsTo
    {
        return $this->belongsTo(ParcoursMatiere::class, 'id_parcours_matiere', 'id_parcours_matiere');
    }

    public function epreuveCandidats(): HasMany
    {
        return $this->hasMany(EpreuveCandidat::class, 'id_epreuve', 'id_epreuve');
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class, 'id_epreuve', 'id_epreuve');
    }

    /** Durée réelle en minutes */
    public function getDureeMinutesAttribute(): int
    {
        return Carbon::parse($this->heure_debut)->diffInMinutes(Carbon::parse($this->heure_fin));
    }

    /** Créneau formaté : "12/06/2025 08:00 → 12:00" */
    public function getCreneauAttribute(): string
    {
        return $this->date->format('d/m/Y') . ' ' . $this->heure_debut . ' → ' . $this->heure_fin;
    }

    public function scopeParDate($query, string $date)
    {
        return $query->where('date', $date);
    }
}