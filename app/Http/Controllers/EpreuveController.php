<?php

namespace App\Http\Controllers;

use App\Models\Epreuve;
use App\Models\Salle;
use App\Models\Enseignant;
use App\Models\ParcoursMatiere;
use App\Models\Parcours;
use Illuminate\Http\Request;

class EpreuveController extends Controller
{
    protected $model = \App\Models\Epreuve::class;
    public function index(Request $request)
    {
        $query = Epreuve::with(['salle', 'enseignant', 'parcoursMatiere.matiere', 'parcoursMatiere.parcours']);

        if ($request->filled('date')) {
            $query->where('date', $request->date);
        }

        if ($request->filled('id_salle')) {
            $query->where('id_salle', $request->id_salle);
        }

        $epreuves = $query->orderBy('date')->orderBy('heure_debut')->paginate(20);
        $salles   = Salle::orderBy('code')->get();

        return view('epreuves.index', compact('epreuves', 'salles'));
    }

    public function create()
    {
        $salles          = Salle::orderBy('code')->get();
        $enseignants     = Enseignant::orderBy('nom_ens')->get();
        $parcoursMatiere = ParcoursMatiere::with(['matiere', 'parcours'])->get();

        return view('epreuves.create', compact('salles', 'enseignants', 'parcoursMatiere'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_salle'           => 'required|exists:salle,id_salle',
            'id_enseignant'      => 'nullable|exists:enseignant,id_enseignant',
            'id_parcours_matiere'=> 'nullable|exists:parcours_matiere,id_parcours_matiere',
            'date'               => 'required|date',
            'heure_debut'        => 'required|date_format:H:i',
            'heure_fin'          => 'required|date_format:H:i|after:heure_debut',
        ]);

        // Vérifier disponibilité de la salle
        $salle = Salle::findOrFail($request->id_salle);
        if (!$salle->estDisponible($request->date, $request->heure_debut, $request->heure_fin)) {
            return back()->withErrors(['id_salle' => 'Cette salle est déjà occupée sur ce créneau.'])
                         ->withInput();
        }

        Epreuve::create($request->all());

        return redirect()->route('epreuves.index')
                         ->with('success', 'Épreuve créée avec succès.');
    }

    public function show(Epreuve $epreuve)
    {
        $epreuve->load([
            'salle.etablissement',
            'enseignant',
            'parcoursMatiere.matiere',
            'parcoursMatiere.parcours.serie',
            'epreuveCandidats.inscription.candidat',
        ]);

        return view('epreuves.show', compact('epreuve'));
    }

    public function edit(Epreuve $epreuve)
    {
        $salles          = Salle::orderBy('code')->get();
        $enseignants     = Enseignant::orderBy('nom_ens')->get();
        $parcoursMatiere = ParcoursMatiere::with(['matiere', 'parcours'])->get();

        return view('epreuves.edit', compact('epreuve', 'salles', 'enseignants', 'parcoursMatiere'));
    }

    public function update(Request $request, Epreuve $epreuve)
    {
        $request->validate([
            'id_salle'           => 'required|exists:salle,id_salle',
            'id_enseignant'      => 'nullable|exists:enseignant,id_enseignant',
            'id_parcours_matiere'=> 'nullable|exists:parcours_matiere,id_parcours_matiere',
            'date'               => 'required|date',
            'heure_debut'        => 'required|date_format:H:i',
            'heure_fin'          => 'required|date_format:H:i|after:heure_debut',
        ]);

        $epreuve->update($request->all());

        return redirect()->route('epreuves.index')
                         ->with('success', 'Épreuve mise à jour.');
    }

    public function destroy(Epreuve $epreuve)
    {
        $epreuve->delete();

        return redirect()->route('epreuves.index')
                         ->with('success', 'Épreuve supprimée.');
    }

    /** Planning par date (vue calendrier) */
    public function planning(Request $request)
    {
        $annee = $request->get('annee', date('Y'));

        $epreuves = Epreuve::with([
            'salle',
            'parcoursMatiere.matiere',
            'parcoursMatiere.parcours.serie',
        ])
        ->whereYear('date', $annee)
        ->orderBy('date')
        ->orderBy('heure_debut')
        ->get()
        ->groupBy(fn($e) => $e->date->format('Y-m-d'));

        return view('epreuves.planning', compact('epreuves', 'annee'));
    }
}