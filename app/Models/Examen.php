<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Examen extends Model
{
    protected $table = 'examen';
    protected $primaryKey = 'id_examen';
    public $timestamps = false;

    protected $fillable = ['code', 'intitule', 'type', 'id_anticipe'];

    /** Examen parent (pour un anticipe) */
    public function examenParent(): BelongsTo
    {
        return $this->belongsTo(Examen::class, 'id_anticipe', 'id_examen');
    }

    /** Examens anticipés liés à cet examen */
    public function examensAnticipes(): HasMany
    {
        return $this->hasMany(Examen::class, 'id_anticipe', 'id_examen');
    }

    public function parcours(): HasMany
    {
        return $this->hasMany(Parcours::class, 'id_examen', 'id_examen');
    }

    public function centreExamens(): HasMany
    {
        return $this->hasMany(CentreExamen::class, 'id_examen', 'id_examen');
    }

    public function inscriptions(): HasMany
    {
        return $this->hasMany(Inscription::class, 'id_examen', 'id_examen');
    }
}
