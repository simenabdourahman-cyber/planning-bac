<?php

namespace App\Http\Controllers\GestionnaireExamen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GestExamenController extends Controller
{
    public function dashboard() { return view('gest_examen.dashboard'); }
    public function planning() { return view('gest_examen.planning'); }
    public function epreuves() { return view('gest_examen.epreuves'); }
    public function centres() { return view('gest_examen.centres'); }
    public function enseignants() { return view('gest_examen.enseignants'); }
}
