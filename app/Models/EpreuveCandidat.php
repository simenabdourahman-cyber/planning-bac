<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EpreuveCandidat extends Model
{
    protected $table = 'epreuve_candidat';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null; // Clé composite : (id_epreuve, id_inscription, repasse_antip)

    protected $fillable = [
        'id_epreuve', 'id_inscription',
        'date', 'heure_debut', 'heure_fin',
        'repasse_antip', // 0 = normal, 1 = repasse anticipé
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function epreuve(): BelongsTo
    {
        return $this->belongsTo(Epreuve::class, 'id_epreuve', 'id_epreuve');
    }

    public function inscription(): BelongsTo
    {
        return $this->belongsTo(Inscription::class, 'id_inscription', 'id_inscription');
    }
}