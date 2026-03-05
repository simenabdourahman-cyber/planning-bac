<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\ParcoursMatiere;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    public function index(Request $request)
    {
        $query = Enseignant::with('parcoursMatiere.matiere');

        if ($request->filled('annee')) {
            $query->where('annee', $request->annee);
        } else {
            $query->where('annee', date('Y'));
        }

        if ($request->filled('flagsurv')) {
            $query->where('flagsurv', $request->flagsurv);
        }

        if ($request->filled('search')) {
            $query->where('nom_ens', 'like', '%' . $request->search . '%')
                  ->orWhere('matricule_ens', 'like', '%' . $request->search . '%');
        }

        $enseignants = $query->orderBy('nom_ens')->paginate(20);

        return view('enseignants.index', compact('enseignants'));
    }

    public function create()
    {
        $parcoursMatiere = ParcoursMatiere::with(['matiere', 'parcours'])->get();

        return view('enseignants.create', compact('parcoursMatiere'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'matricule_ens'       => 'required|string|max:15',
            'nom_ens'             => 'required|string|max:50',
            'role_ens'            => 'required|string|max:50',
            'flagsurv'            => 'required|in:OUI,NON',
            'id_parcours_matiere' => 'required|exists:parcours_matiere,id_parcours_matiere',
            'etab'                => 'required|string|max:35',
            'centre'              => 'required|string|max:35',
            'date_debut'          => 'required|date',
            'date_fin'            => 'required|date|after_or_equal:date_debut',
            'heure_debut'         => 'required|date_format:H:i',
            'heure_fin'           => 'required|date_format:H:i|after:heure_debut',
            'annee'               => 'required|integer|min:2000',
        ]);

        Enseignant::create($request->all());

        return redirect()->route('enseignants.index')
                         ->with('success', 'Enseignant ajouté avec succès.');
    }

    public function show(Enseignant $enseignant)
    {
        $enseignant->load(['parcoursMatiere.matiere', 'epreuves.salle', 'epreuveEnseignants.centre']);

        return view('enseignants.show', compact('enseignant'));
    }

    public function edit(Enseignant $enseignant)
    {
        $parcoursMatiere = ParcoursMatiere::with(['matiere', 'parcours'])->get();

        return view('enseignants.edit', compact('enseignant', 'parcoursMatiere'));
    }

    public function update(Request $request, Enseignant $enseignant)
    {
        $request->validate([
            'nom_ens'             => 'required|string|max:50',
            'role_ens'            => 'required|string|max:50',
            'flagsurv'            => 'required|in:OUI,NON',
            'id_parcours_matiere' => 'required|exists:parcours_matiere,id_parcours_matiere',
            'etab'                => 'required|string|max:35',
            'centre'              => 'required|string|max:35',
            'date_debut'          => 'required|date',
            'date_fin'            => 'required|date|after_or_equal:date_debut',
            'heure_debut'         => 'required|date_format:H:i',
            'heure_fin'           => 'required|date_format:H:i|after:heure_debut',
        ]);

        $enseignant->update($request->all());

        return redirect()->route('enseignants.index')
                         ->with('success', 'Enseignant mis à jour.');
    }

    public function destroy(Enseignant $enseignant)
    {
        $enseignant->delete();

        return redirect()->route('enseignants.index')
                         ->with('success', 'Enseignant supprimé.');
    }
}