<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ParcoursMatiere extends Model
{
    protected $table = 'parcours_matiere';
    protected $primaryKey = 'id_parcours_matiere';
    public $timestamps = false;

    protected $fillable = [
        'coefficient',
        'type_epreuve',   // 1=Écrit, 2=Oral, 3=Pratique (référence type_epreuve.code)
        'duree',          // en minutes
        'dispense_cl',
        'id_matiere',
        'id_matiere_mere',
        'id_parcours',
    ];

    public function parcours(): BelongsTo
    {
        return $this->belongsTo(Parcours::class, 'id_parcours', 'id_parcours');
    }

    public function matiere(): BelongsTo
    {
        return $this->belongsTo(Matiere::class, 'id_matiere', 'id_matiere');
    }

    /** Matière mère (ex: Arabe pour Arabe Oral) */
    public function matiereMere(): BelongsTo
    {
        return $this->belongsTo(Matiere::class, 'id_matiere_mere', 'id_matiere');
    }

    public function epreuves(): HasMany
    {
        return $this->hasMany(Epreuve::class, 'id_parcours_matiere', 'id_parcours_matiere');
    }

    public function enseignants(): HasMany
    {
        return $this->hasMany(Enseignant::class, 'id_parcours_matiere', 'id_parcours_matiere');
    }

    public function epreuveEnseignants(): HasMany
    {
        return $this->hasMany(EpreuveEnseignant::class, 'id_parcours_matiere', 'id_parcours_matiere');
    }

    /** Durée formatée ex: "3h00" */
    public function getDureeFormatAttribute(): string
    {
        $h = intdiv($this->duree, 60);
        $m = $this->duree % 60;
        return sprintf('%dh%02d', $h, $m);
    }

    /** Type lisible */
    public function getTypeLibelleAttribute(): string
    {
        return match ((int) $this->type_epreuve) {
            1 => 'Écrit',
            2 => 'Oral',
            3 => 'Pratique',
            default => 'Inconnu',
        };
    }
}