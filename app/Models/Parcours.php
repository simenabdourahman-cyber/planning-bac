<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parcours extends Model
{
    protected $table = 'parcours';
    protected $primaryKey = 'id_parcours';
    public $timestamps = false;

    protected $fillable = ['code', 'intitule', 'actif', 'id_examen', 'id_serie', 'id_specialite'];

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

    public function parcoursMatiere(): HasMany
    {
        return $this->hasMany(ParcoursMatiere::class, 'id_parcours', 'id_parcours');
    }

    /** Uniquement les épreuves écrites (type_epreuve = 1) */
    public function epreuvesEcrites(): HasMany
    {
        return $this->hasMany(ParcoursMatiere::class, 'id_parcours', 'id_parcours')
                    ->where('type_epreuve', 1);
    }

    /** Uniquement les épreuves orales (type_epreuve = 2) */
    public function epreuvesOrales(): HasMany
    {
        return $this->hasMany(ParcoursMatiere::class, 'id_parcours', 'id_parcours')
                    ->where('type_epreuve', 2);
    }

    /** Uniquement les épreuves pratiques (type_epreuve = 3) */
    public function epreuvesPratiques(): HasMany
    {
        return $this->hasMany(ParcoursMatiere::class, 'id_parcours', 'id_parcours')
                    ->where('type_epreuve', 3);
    }

    public function scopeActif($query)
    {
        return $query->where('actif', '1');
    }
}