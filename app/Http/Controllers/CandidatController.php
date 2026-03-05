<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Inscription;
use App\Models\Examen;
use App\Models\Serie;
use App\Models\Specialite;
use App\Models\Classe;
use Illuminate\Http\Request;

class CandidatController extends Controller
{
    public function index(Request $request)
    {
        $query = Candidat::query();

        if ($request->filled('search')) {
            $query->where('nom', 'like', '%' . $request->search . '%')
                  ->orWhere('matricule', 'like', '%' . $request->search . '%');
        }

        $candidats = $query->orderBy('nom')->paginate(20);

        return view('candidats.index', compact('candidats'));
    }

    public function create()
    {
        return view('candidats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'matricule'      => 'required|unique:candidat,matricule',
            'nom'            => 'required|string|max:40',
            'date_naissance' => 'required|date',
            'genre'          => 'required|in:M,F',
            'Telephone'      => 'required|string|max:40',
            'email'          => 'required|email|max:40',
            'ville'          => 'required|string|max:100',
            'pays'           => 'required|string|max:100',
        ]);

        Candidat::create($request->all());

        return redirect()->route('candidats.index')
                         ->with('success', 'Candidat créé avec succès.');
    }

    public function show(Candidat $candidat)
    {
        $inscriptions = $candidat->inscriptions()
            ->with(['examen', 'serie', 'specialite', 'classe'])
            ->get();

        return view('candidats.show', compact('candidat', 'inscriptions'));
    }

    public function edit(Candidat $candidat)
    {
        return view('candidats.edit', compact('candidat'));
    }

    public function update(Request $request, Candidat $candidat)
    {
        $request->validate([
            'matricule'      => 'required|unique:candidat,matricule,' . $candidat->id_candidat . ',id_candidat',
            'nom'            => 'required|string|max:40',
            'date_naissance' => 'required|date',
            'genre'          => 'required|in:M,F',
            'Telephone'      => 'required|string|max:40',
            'email'          => 'required|email|max:40',
            'ville'          => 'required|string|max:100',
            'pays'           => 'required|string|max:100',
        ]);

        $candidat->update($request->all());

        return redirect()->route('candidats.index')
                         ->with('success', 'Candidat mis à jour.');
    }

    public function destroy(Candidat $candidat)
    {
        $candidat->delete();

        return redirect()->route('candidats.index')
                         ->with('success', 'Candidat supprimé.');
    }
}