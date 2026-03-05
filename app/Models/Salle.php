<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Salle extends Model
{
    protected $table = 'salle';
    protected $primaryKey = 'id_salle';
    public $timestamps = false;

    protected $fillable = ['code', 'intitule', 'capacite', 'type', 'id_etab'];

    // type : 'Labo' ou 'banalise'

    public function etablissement(): BelongsTo
    {
        return $this->belongsTo(Etablissement::class, 'id_etab', 'id_etab');
    }

    public function epreuves(): HasMany
    {
        return $this->hasMany(Epreuve::class, 'id_salle', 'id_salle');
    }

    /** Vérifie si la salle est libre sur un créneau */
    public function estDisponible(string $date, string $heureDebut, string $heureFin): bool
    {
        return !$this->epreuves()
            ->where('date', $date)
            ->where(function ($q) use ($heureDebut, $heureFin) {
                $q->where('heure_debut', '<', $heureFin)
                  ->where('heure_fin', '>', $heureDebut);
            })->exists();
    }

    public function scopeLabo($query)
    {
        return $query->where('type', 'Labo');
    }

    public function scopeBanalise($query)
    {
        return $query->where('type', 'banalise');
    }
}