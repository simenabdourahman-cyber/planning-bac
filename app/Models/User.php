<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'utilisateur';
    protected $primaryKey = 'id_utilisateur';
    public $timestamps = false;

    protected $fillable = [
        'nom_utilisateur',
        'email',
        'mot_de_passe',
        'role',   // 'admin' | 'enseignant' | 'surveillant'
        'actif',
    ];

    protected $hidden = [
        'mot_de_passe',
    ];
    

    protected $casts = [
        'actif' => 'boolean',
    ];

    /**
     * Laravel Auth utilise 'password' par défaut,
     * on redirige vers 'mot_de_passe'
     */
    public function getAuthPassword(): string
    {
        return $this->mot_de_passe;
    }

    public function estAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function estEnseignant(): bool
    {
        return $this->role === 'enseignant';
    }

    public function estSurveillant(): bool
    {
        return $this->role === 'surveillant';
    }

    public function scopeActifs($query)
    {
        return $query->where('actif', 1);
    }

    public function scopeParRole($query, string $role)
    {
        return $query->where('role', $role);
    }
}