<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatGestionController extends Controller
{
    /**
     * Liste tous les candidats avec leur inscription
     */
    public function index()
    {
        $candidats = DB::table('candidat as c')
            ->leftJoin('inscription as i', 'c.id_candidat', '=', 'i.id_candidat')
            ->leftJoin('serie as s', 'i.id_serie', '=', 's.id_serie')
            ->leftJoin('classe as cl', 'i.id_classe', '=', 'cl.id_classe')
            ->leftJoin('etablissement as e', 'cl.id_etab', '=', 'e.id_etab')
            ->select(
                'c.id_candidat', 'c.matricule', 'c.nom', 'c.date_naissance',
                'c.genre', 'c.Telephone', 'c.email', 'c.ville',
                'i.num_examen', 'i.annee', 'i.anonymat',
                's.code as serie_code', 's.intitule as serie_intitule',
                'e.intitule as etab_intitule'
            )
            ->orderBy('c.nom')
            ->get();

        $series = DB::table('serie')->orderBy('code')->get();
        $stats = [
            'total'   => $candidats->count(),
            'garcons' => $candidats->where('genre', 'M')->count(),
            'filles'  => $candidats->where('genre', 'F')->count(),
            'series'  => DB::table('serie')->count(),
        ];

        return view('super_admin.candidats.index', compact('candidats', 'series', 'stats'));
    }

    /**
     * Formulaire création
     */
    public function create()
    {
        $series = DB::table('serie')->orderBy('code')->get();
        $etablissements = DB::table('etablissement')->orderBy('intitule')->get();
        $classes = DB::table('classe')->orderBy('id_classe')->get();
        $examens = DB::table('examen')->orderBy('id_examen')->get();
        $specialites = DB::table('specialite')->orderBy('id_specialite')->get();

        return view('super_admin.candidats.create', compact('series', 'etablissements', 'classes', 'examens', 'specialites'));
    }

    /**
     * Enregistrer nouveau candidat
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'            => 'required|string|max:40',
            'date_naissance' => 'required|date',
            'genre'          => 'required|in:M,F',
            'Telephone'      => 'required|string|max:40',
            'email'          => 'required|email|max:40',
            'ville'          => 'required|string|max:100',
            'pays'           => 'required|string|max:100',
            'id_serie'       => 'nullable|exists:serie,id_serie',
            'id_examen'      => 'nullable|exists:examen,id_examen',
        ]);

        // Générer matricule automatique
        $dernierMatricule = DB::table('candidat')
            ->where('matricule', 'like', 'DJ-2026-%')
            ->orderByDesc('id_candidat')
            ->value('matricule');

        $num = 1;
        if ($dernierMatricule) {
            $parts = explode('-', $dernierMatricule);
            $num = (int) end($parts) + 1;
        }
        $matricule = 'DJ-2026-' . str_pad($num, 4, '0', STR_PAD_LEFT);

        // Insérer candidat
        $idCandidat = DB::table('candidat')->insertGetId([
            'matricule'       => $matricule,
            'nom'             => $request->nom,
            'date_naissance'  => $request->date_naissance,
            'genre'           => $request->genre,
            'Telephone'       => $request->Telephone,
            'email'           => $request->email,
            'ville'           => $request->ville,
            'pays'            => $request->pays,
        ]);

        // Insérer inscription si série et examen fournis
        if ($request->id_serie && $request->id_examen) {
            $numExamen = ($request->id_examen ? 'EX' : '') . str_pad($idCandidat, 5, '0', STR_PAD_LEFT);
            DB::table('inscription')->insert([
                'annee'          => 2026,
                'id_candidat'    => $idCandidat,
                'id_classe'      => $request->id_classe ?? null,
                'id_examen'      => $request->id_examen,
                'id_serie'       => $request->id_serie,
                'id_specialite'  => $request->id_specialite ?? null,
                'num_examen'     => $numExamen,
                'anonymat'       => 'ANO-2026-' . str_pad($idCandidat, 4, '0', STR_PAD_LEFT),
            ]);
        }

        return redirect()->route('super_admin.candidats.index')
            ->with('success', 'Candidat ' . $request->nom . ' créé avec succès ! Matricule : ' . $matricule);
    }

    /**
     * Formulaire modification
     */
    public function edit($id)
    {
        $candidat = DB::table('candidat as c')
            ->leftJoin('inscription as i', 'c.id_candidat', '=', 'i.id_candidat')
            ->leftJoin('serie as s', 'i.id_serie', '=', 's.id_serie')
            ->where('c.id_candidat', $id)
            ->select('c.*', 'i.id_serie', 'i.id_classe', 'i.id_examen',
                     'i.id_specialite', 'i.num_examen', 'i.anonymat', 'i.annee')
            ->first();

        if (!$candidat) {
            return redirect()->route('super_admin.candidats.index')
                ->with('error', 'Candidat introuvable.');
        }

        $series       = DB::table('serie')->orderBy('code')->get();
        $etablissements = DB::table('etablissement')->orderBy('intitule')->get();
        $classes      = DB::table('classe')->orderBy('id_classe')->get();
        $examens      = DB::table('examen')->orderBy('id_examen')->get();
        $specialites  = DB::table('specialite')->orderBy('id_specialite')->get();

        return view('super_admin.candidats.edit', compact(
            'candidat', 'series', 'etablissements', 'classes', 'examens', 'specialites'
        ));
    }

    /**
     * Mettre à jour un candidat
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom'            => 'required|string|max:40',
            'date_naissance' => 'required|date',
            'genre'          => 'required|in:M,F',
            'Telephone'      => 'required|string|max:40',
            'email'          => 'required|email|max:40',
            'ville'          => 'required|string|max:100',
            'pays'           => 'required|string|max:100',
        ]);

        DB::table('candidat')
            ->where('id_candidat', $id)
            ->update([
                'nom'            => $request->nom,
                'date_naissance' => $request->date_naissance,
                'genre'          => $request->genre,
                'Telephone'      => $request->Telephone,
                'email'          => $request->email,
                'ville'          => $request->ville,
                'pays'           => $request->pays,
            ]);

        // Mettre à jour inscription
        $inscription = DB::table('inscription')->where('id_candidat', $id)->first();
        if ($inscription) {
            DB::table('inscription')->where('id_candidat', $id)->update([
                'id_serie'      => $request->id_serie ?? $inscription->id_serie,
                'id_classe'     => $request->id_classe ?? $inscription->id_classe,
                'id_examen'     => $request->id_examen ?? $inscription->id_examen,
                'id_specialite' => $request->id_specialite ?? $inscription->id_specialite,
            ]);
        } elseif ($request->id_serie && $request->id_examen) {
            DB::table('inscription')->insert([
                'annee'       => 2026,
                'id_candidat' => $id,
                'id_examen'   => $request->id_examen,
                'id_serie'    => $request->id_serie,
                'num_examen'  => 'EX' . str_pad($id, 5, '0', STR_PAD_LEFT),
                'anonymat'    => 'ANO-2026-' . str_pad($id, 4, '0', STR_PAD_LEFT),
            ]);
        }

        return redirect()->route('super_admin.candidats.index')
            ->with('success', 'Candidat modifié avec succès !');
    }

    /**
     * Supprimer un candidat
     */
    public function destroy($id)
    {
        // Supprimer d'abord les inscriptions liées
        DB::table('inscription')->where('id_candidat', $id)->delete();

        // Puis le candidat
        DB::table('candidat')->where('id_candidat', $id)->delete();

        return redirect()->route('super_admin.candidats.index')
            ->with('success', 'Candidat supprimé avec succès !');
    }
}