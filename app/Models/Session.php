<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'session';
    protected $primaryKey = 'id_session';
    public $timestamps = false;

    protected $fillable = ['code', 'intitule'];

    // S1 = Session Principale, S2 = Session Rattrapage
}