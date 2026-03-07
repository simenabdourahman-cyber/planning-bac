<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtablissementController extends Controller
{
    public function index()
    {
        $etablissements = DB::table('etablissement')
            ->orderBy('intitule')
            ->get();

        $centresCount = DB::table('centre')
            ->select('id_etab', DB::raw('COUNT(*) as nb_centres'))
            ->groupBy('id_etab')
            ->pluck('nb_centres', 'id_etab');

        $etablissements = $etablissements->map(function($e) use ($centresCount) {
            $e->nb_centres = $centresCount[$e->id_etab] ?? 0;
            return $e;
        });

        $stats = [
            'total'   => $etablissements->count(),
            'classes' => DB::table('classe')->count(),
            'centres' => DB::table('centre')->count(),
        ];

        return view('super_admin.etablissements.index', compact('etablissements', 'stats'));
    }

    public function create()
    {
        return view('super_admin.etablissements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'      => 'required|string|max:50|unique:etablissement,code',
            'intitule'  => 'required|string|max:50',
            'responsable' => 'required|string|max:50',
            'telephone' => 'required|numeric',
            'id_type_etab' => 'required|integer',
            'id_niveau_ens' => 'required|integer',
            'id_circonscription' => 'required|integer',
        ]);

        DB::table('etablissement')->insert([
            'code'               => strtoupper($request->code),
            'code_matricule'     => $request->code_matricule ?? null,
            'intitule'           => $request->intitule,
            'responsable'        => $request->responsable,
            'email'              => $request->email ?? null,
            'id_type_etab'       => $request->id_type_etab,
            'id_niveau_ens'      => $request->id_niveau_ens,
            'id_circonscription' => $request->id_circonscription,
            'telephone'          => $request->telephone,
            'bp'                 => $request->bp ?? null,
            'masque'             => $request->masque ?? null,
        ]);

        return redirect()->route('super_admin.etablissements.index')
            ->with('success', 'Établissement « ' . $request->intitule . ' » créé avec succès !');
    }

    public function edit($id)
    {
        $etab = DB::table('etablissement')->where('id_etab', $id)->first();

        if (!$etab) {
            return redirect()->route('super_admin.etablissements.index')
                ->with('error', 'Établissement introuvable.');
        }

        $classes = DB::table('classe')->where('id_etab', $id)->get();
        $centres = DB::table('centre')->where('id_etab', $id)->get();

        return view('super_admin.etablissements.edit', compact('etab', 'classes', 'centres'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code'      => 'required|string|max:50|unique:etablissement,code,' . $id . ',id_etab',
            'intitule'  => 'required|string|max:50',
            'responsable' => 'required|string|max:50',
            'telephone' => 'required|numeric',
            'id_type_etab' => 'required|integer',
            'id_niveau_ens' => 'required|integer',
            'id_circonscription' => 'required|integer',
        ]);

        DB::table('etablissement')->where('id_etab', $id)->update([
            'code'               => strtoupper($request->code),
            'code_matricule'     => $request->code_matricule ?? null,
            'intitule'           => $request->intitule,
            'responsable'        => $request->responsable,
            'email'              => $request->email ?? null,
            'id_type_etab'       => $request->id_type_etab,
            'id_niveau_ens'      => $request->id_niveau_ens,
            'id_circonscription' => $request->id_circonscription,
            'telephone'          => $request->telephone,
            'bp'                 => $request->bp ?? null,
            'masque'             => $request->masque ?? null,
        ]);

        return redirect()->route('super_admin.etablissements.index')
            ->with('success', 'Établissement modifié avec succès !');
    }

    public function destroy($id)
    {
        // Vérifier si l'établissement a des classes liées
        $nbClasses = DB::table('classe')->where('id_etab', $id)->count();
        if ($nbClasses > 0) {
            return redirect()->route('super_admin.etablissements.index')
                ->with('error', 'Impossible de supprimer : ' . $nbClasses . ' classe(s) liée(s) à cet établissement.');
        }

        DB::table('centre')->where('id_etab', $id)->delete();
        DB::table('etablissement')->where('id_etab', $id)->delete();

        return redirect()->route('super_admin.etablissements.index')
            ->with('success', 'Établissement supprimé avec succès !');
    }
}