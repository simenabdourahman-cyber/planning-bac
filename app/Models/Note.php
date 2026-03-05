<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    protected $table = 'note';
    protected $primaryKey = 'id_note';
    public $timestamps = false;

    protected $fillable = ['id_inscription', 'id_epreuve', 'valeur'];

    protected $casts = [
        'valeur' => 'decimal:2',
    ];

    public function inscription(): BelongsTo
    {
        return $this->belongsTo(Inscription::class, 'id_inscription', 'id_inscription');
    }

    public function epreuve(): BelongsTo
    {
        return $this->belongsTo(Epreuve::class, 'id_epreuve', 'id_epreuve');
    }

    /** Note sur 20 */
    public function getNoteFormatAttribute(): string
    {
        return number_format($this->valeur, 2) . '/20';
    }
}