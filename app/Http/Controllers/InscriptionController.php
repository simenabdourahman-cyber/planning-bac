<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Candidat;
use App\Models\Examen;
use App\Models\Serie;
use App\Models\Specialite;
use App\Models\Classe;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function index(Request $request)
    {
        $query = Inscription::with(['candidat', 'examen', 'serie', 'specialite', 'classe']);

        if ($request->filled('annee')) {
            $query->where('annee', $request->annee);
        } else {
            $query->where('annee', date('Y'));
        }

        if ($request->filled('id_serie')) {
            $query->where('id_serie', $request->id_serie);
        }

        if ($request->filled('id_examen')) {
            $query->where('id_examen', $request->id_examen);
        }

        $inscriptions = $query->orderBy('id_inscription')->paginate(25);
        $series       = Serie::orderBy('num')->get();
        $examens      = Examen::all();

        return view('inscriptions.index', compact('inscriptions', 'series', 'examens'));
    }

    public function create()
    {
        $candidats   = Candidat::orderBy('nom')->get();
        $examens     = Examen::all();
        $series      = Serie::orderBy('num')->get();
        $specialites = Specialite::all();
        $classes     = Classe::where('annee', date('Y'))->get();

        return view('inscriptions.create', compact('candidats', 'examens', 'series', 'specialites', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'annee'        => 'required|integer|min:2000',
            'id_candidat'  => 'required|exists:candidat,id_candidat',
            'id_examen'    => 'required|exists:examen,id_examen',
            'id_serie'     => 'nullable|exists:serie,id_serie',
            'id_specialite'=> 'nullable|exists:specialite,id_specialite',
            'id_classe'    => 'nullable|exists:classe,id_classe',
            'num_examen'   => 'nullable|string|max:20',
            'anonymat'     => 'nullable|string|max:20',
        ]);

        // Vérifier doublon
        $existe = Inscription::where('id_candidat', $request->id_candidat)
                              ->where('id_examen', $request->id_examen)
                              ->where('annee', $request->annee)
                              ->exists();

        if ($existe) {
            return back()->withErrors(['id_candidat' => 'Ce candidat est déjà inscrit à cet examen pour cette année.'])
                         ->withInput();
        }

        Inscription::create($request->all());

        return redirect()->route('inscriptions.index')
                         ->with('success', 'Inscription créée avec succès.');
    }

    public function show(Inscription $inscription)
    {
        $inscription->load(['candidat', 'examen', 'serie', 'specialite', 'classe', 'epreuveCandidats.epreuve.parcoursMatiere.matiere', 'notes']);

        return view('inscriptions.show', compact('inscription'));
    }

    public function edit(Inscription $inscription)
    {
        $candidats   = Candidat::orderBy('nom')->get();
        $examens     = Examen::all();
        $series      = Serie::orderBy('num')->get();
        $specialites = Specialite::all();
        $classes     = Classe::where('annee', $inscription->annee)->get();

        return view('inscriptions.edit', compact('inscription', 'candidats', 'examens', 'series', 'specialites', 'classes'));
    }

    public function update(Request $request, Inscription $inscription)
    {
        $request->validate([
            'id_serie'      => 'nullable|exists:serie,id_serie',
            'id_specialite' => 'nullable|exists:specialite,id_specialite',
            'id_classe'     => 'nullable|exists:classe,id_classe',
            'num_examen'    => 'nullable|string|max:20',
            'anonymat'      => 'nullable|string|max:20',
        ]);

        $inscription->update($request->only(['id_serie', 'id_specialite', 'id_classe', 'num_examen', 'anonymat']));

        return redirect()->route('inscriptions.index')
                         ->with('success', 'Inscription mise à jour.');
    }

    public function destroy(Inscription $inscription)
    {
        $inscription->delete();

        return redirect()->route('inscriptions.index')
                         ->with('success', 'Inscription supprimée.');
    }
}
