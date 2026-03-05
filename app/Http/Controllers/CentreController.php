<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Etablissement;
use App\Models\CentreExamen;
use App\Models\Salle;
use App\Models\Examen;
use App\Models\Serie;
use App\Models\Specialite;
use Illuminate\Http\Request;

class CentreController extends Controller
{
    public function index()
    {
        $centres = Centre::with('etablissement')
                         ->withCount('centreExamens')
                         ->get();

        return view('centres.index', compact('centres'));
    }

    public function show(Centre $centre)
    {
        $centre->load('etablissement');

        $salles = Salle::where('id_etab', $centre->id_etab)->get();

        $centreExamens = CentreExamen::where('id_centre', $centre->id_centre)
            ->with(['examen', 'serie', 'specialite'])
            ->orderBy('annee', 'desc')
            ->orderBy('session')
            ->orderBy('ordre')
            ->get();

        return view('centres.show', compact('centre', 'salles', 'centreExamens'));
    }

    public function create()
    {
        $etablissements = Etablissement::orderBy('intitule')->get();

        return view('centres.create', compact('etablissements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'     => 'required|string|max:10|unique:centre,code',
            'intitule' => 'required|string|max:100',
            'type'     => 'required|in:Passation,Passation/Oral',
            'id_etab'  => 'required|exists:etablissement,id_etab',
        ]);

        Centre::create($request->all());

        return redirect()->route('centres.index')
                         ->with('success', 'Centre créé avec succès.');
    }

    public function edit(Centre $centre)
    {
        $etablissements = Etablissement::orderBy('intitule')->get();

        return view('centres.edit', compact('centre', 'etablissements'));
    }

    public function update(Request $request, Centre $centre)
    {
        $request->validate([
            'code'     => 'required|string|max:10|unique:centre,code,' . $centre->id_centre . ',id_centre',
            'intitule' => 'required|string|max:100',
            'type'     => 'required|in:Passation,Passation/Oral',
            'id_etab'  => 'required|exists:etablissement,id_etab',
        ]);

        $centre->update($request->all());

        return redirect()->route('centres.index')
                         ->with('success', 'Centre mis à jour.');
    }

    public function destroy(Centre $centre)
    {
        $centre->delete();

        return redirect()->route('centres.index')
                         ->with('success', 'Centre supprimé.');
    }

    /** Affecter un examen/série à un centre */
    public function affecterExamen(Request $request, Centre $centre)
    {
        $request->validate([
            'id_examen'    => 'required|exists:examen,id_examen',
            'id_serie'     => 'nullable|exists:serie,id_serie',
            'id_specialite'=> 'nullable|exists:specialite,id_specialite',
            'nb_candidat'  => 'required|integer|min:0',
            'annee'        => 'required|integer|min:2000',
            'session'      => 'required|in:0,2',
            'ordre'        => 'required|integer|min:1',
        ]);

        CentreExamen::create([
            'id_centre'     => $centre->id_centre,
            'id_examen'     => $request->id_examen,
            'id_serie'      => $request->id_serie,
            'id_specialite' => $request->id_specialite,
            'nb_candidat'   => $request->nb_candidat,
            'repasse_antip' => 0,
            'annee'         => $request->annee,
            'ordre'         => $request->ordre,
            'session'       => $request->session,
        ]);

        return redirect()->route('centres.show', $centre)
                         ->with('success', 'Examen affecté au centre.');
    }
}