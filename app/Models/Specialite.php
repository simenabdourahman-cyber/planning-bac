<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialite extends Model
{
    protected $table = 'specialite';
    protected $primaryKey = 'id_specialite';
    public $timestamps = false;

    protected $fillable = ['code', 'intitule', 'id_serie'];

    public function serie(): BelongsTo
    {
        return $this->belongsTo(Serie::class, 'id_serie', 'id_serie');
    }

    public function parcours(): HasMany
    {
        return $this->hasMany(Parcours::class, 'id_specialite', 'id_specialite');
    }

    public function centreExamens(): HasMany
    {
        return $this->hasMany(CentreExamen::class, 'id_specialite', 'id_specialite');
    }

    public function inscriptions(): HasMany
    {
        return $this->hasMany(Inscription::class, 'id_specialite', 'id_specialite');
    }
}