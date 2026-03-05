<?php

namespace App\Http\Controllers\GestionnaireEtab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class GestEtabController extends Controller
{
    public function dashboard() { return view('gest_etab.dashboard'); }
    public function classes() { return view('gest_etab.classes'); }
    public function salles() { return view('gest_etab.salles'); }
    public function inscriptions() { return view('gest_etab.inscriptions'); }
}