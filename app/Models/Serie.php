<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Serie extends Model
{
    protected $table = 'serie';
    protected $primaryKey = 'id_serie';
    public $timestamps = false;

    protected $fillable = ['code', 'intitule', 'num'];

    public function specialites(): HasMany
    {
        return $this->hasMany(Specialite::class, 'id_serie', 'id_serie');
    }

    public function parcours(): HasMany
    {
        return $this->hasMany(Parcours::class, 'id_serie', 'id_serie');
    }

    public function centreExamens(): HasMany
    {
        return $this->hasMany(CentreExamen::class, 'id_serie', 'id_serie');
    }

    public function inscriptions(): HasMany
    {
        return $this->hasMany(Inscription::class, 'id_serie', 'id_serie');
    }
}