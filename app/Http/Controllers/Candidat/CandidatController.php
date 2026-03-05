<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CandidatController extends Controller
{
    public function convocation() { return view('candidat.convocation'); }
    public function convocationRattrapage() { return view('candidat.convocation_rattrapage'); }
}
