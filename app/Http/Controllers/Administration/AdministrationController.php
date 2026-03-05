<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class AdministrationController extends Controller
{
    public function dashboard() { return view('administration.dashboard'); }
    public function candidats() { return view('administration.candidats'); }
    public function etablissements() { return view('administration.etablissements'); }
    public function series() { return view('administration.series'); }
    public function rapports() { return view('administration.rapports'); }
}

