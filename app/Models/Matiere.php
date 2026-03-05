<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Matiere extends Model
{
    protected $table = 'matiere';
    protected $primaryKey = 'id_matiere';
    public $timestamps = false;

    protected $fillable = ['code', 'intitule'];

    public function parcoursMatiere(): HasMany
    {
        return $this->hasMany(ParcoursMatiere::class, 'id_matiere', 'id_matiere');
    }

    /** Épreuves où cette matière est "matière mère" (ex: Arabe → Arabe Oral + Arabe Écrit) */
    public function parcoursMatiereFilles(): HasMany
    {
        return $this->hasMany(ParcoursMatiere::class, 'id_matiere_mere', 'id_matiere');
    }
}