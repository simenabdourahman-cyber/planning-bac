<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Inscription;
use App\Models\Centre;
use App\Models\Epreuve;
use App\Models\Enseignant;
use App\Models\CentreExamen;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $annee = date('Y');

        // Statistiques générales
        $stats = [
            'total_candidats'    => Candidat::count(),
            'total_inscriptions' => Inscription::where('annee', $annee)->count(),
            'total_centres'      => Centre::count(),
            'total_epreuves'     => Epreuve::whereYear('date', $annee)->count(),
            'total_enseignants'  => Enseignant::where('annee', $annee)->count(),
            'total_surveillants' => Enseignant::where('annee', $annee)->where('flagsurv', 'OUI')->count(),
        ];

        // Candidats par série
        $candidatsParSerie = Inscription::where('annee', $annee)
            ->join('serie', 'inscription.id_serie', '=', 'serie.id_serie')
            ->selectRaw('serie.intitule as serie, COUNT(*) as total')
            ->groupBy('serie.intitule')
            ->orderBy('total', 'desc')
            ->get();

        // Prochaines épreuves
        $prochainesEpreuves = Epreuve::with(['parcoursMatiere.matiere', 'parcoursMatiere.parcours.serie', 'salle'])
            ->where('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('heure_debut')
            ->take(5)
            ->get();

        // Centres avec nb candidats
        $centresExamens = CentreExamen::with(['centre', 'serie', 'specialite'])
            ->where('annee', $annee)
            ->where('session', 0)
            ->orderBy('ordre')
            ->get();

        return view('dashboard', compact(
            'stats',
            'candidatsParSerie',
            'prochainesEpreuves',
            'centresExamens',
            'annee'
        ));
    }
}