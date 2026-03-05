<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Centre extends Model
{
    protected $table = 'centre';
    protected $primaryKey = 'id_centre';
    public $timestamps = false;

    protected $fillable = ['code', 'intitule', 'type', 'id_etab'];

    public function etablissement(): BelongsTo
    {
        return $this->belongsTo(Etablissement::class, 'id_etab', 'id_etab');
    }

    public function centreExamens(): HasMany
    {
        return $this->hasMany(CentreExamen::class, 'id_centre', 'id_centre');
    }

    public function epreuveEnseignants(): HasMany
    {
        return $this->hasMany(EpreuveEnseignant::class, 'id_centre', 'id_centre');
    }

    public function getCapaciteTotaleAttribute(): int
    {
        return Salle::where('id_etab', $this->id_etab)->sum('capacite');
    }

    public function getAccepteOralAttribute(): bool
    {
        return str_contains(strtolower($this->type), 'oral');
    }
}