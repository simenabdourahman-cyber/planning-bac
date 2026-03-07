<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    /**
     * Liste tous les utilisateurs
     */
    public function index()
    {
        $utilisateurs = DB::table('utilisateur')
            ->orderBy('role')
            ->orderBy('nom_utilisateur')
            ->get();

        return view('super_admin.utilisateurs.index', compact('utilisateurs'));
    }

    /**
     * Formulaire création
     */
    public function create()
    {
        return view('super_admin.utilisateurs.create');
    }

    /**
     * Enregistrer nouvel utilisateur
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_utilisateur' => 'required|string|max:50',
            'email'           => 'required|email|max:100|unique:utilisateur,email',
            'mot_de_passe'    => 'required|string|min:6|confirmed',
            'role'            => 'required|in:super_admin,administration,gest_examen,gest_etab,candidat',
        ], [
            'nom_utilisateur.required' => 'Le nom est obligatoire.',
            'email.required'           => 'L\'email est obligatoire.',
            'email.unique'             => 'Cet email est déjà utilisé.',
            'mot_de_passe.required'    => 'Le mot de passe est obligatoire.',
            'mot_de_passe.min'         => 'Le mot de passe doit contenir au moins 6 caractères.',
            'mot_de_passe.confirmed'   => 'Les mots de passe ne correspondent pas.',
            'role.required'            => 'Le rôle est obligatoire.',
        ]);

        DB::table('utilisateur')->insert([
            'nom_utilisateur' => $request->nom_utilisateur,
            'email'           => $request->email,
            'mot_de_passe'    => Hash::make($request->mot_de_passe),
            'role'            => $request->role,
            'actif'           => 1,
        ]);

        return redirect()->route('super_admin.utilisateurs.index')
            ->with('success', 'Utilisateur créé avec succès !');
    }

    /**
     * Formulaire modification
     */
    public function edit($id)
    {
        $utilisateur = DB::table('utilisateur')
            ->where('id_utilisateur', $id)
            ->first();

        if (!$utilisateur) {
            return redirect()->route('super_admin.utilisateurs.index')
                ->with('error', 'Utilisateur introuvable.');
        }

        return view('super_admin.utilisateurs.edit', compact('utilisateur'));
    }

    /**
     * Mettre à jour un utilisateur
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_utilisateur' => 'required|string|max:50',
            'email'           => 'required|email|max:100|unique:utilisateur,email,' . $id . ',id_utilisateur',
            'role'            => 'required|in:super_admin,administration,gest_examen,gest_etab,candidat',
            'mot_de_passe'    => 'nullable|string|min:6|confirmed',
        ], [
            'email.unique' => 'Cet email est déjà utilisé par un autre utilisateur.',
            'mot_de_passe.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
            'mot_de_passe.confirmed' => 'Les mots de passe ne correspondent pas.',
        ]);

        $data = [
            'nom_utilisateur' => $request->nom_utilisateur,
            'email'           => $request->email,
            'role'            => $request->role,
        ];

        // Changer mot de passe seulement si renseigné
        if ($request->filled('mot_de_passe')) {
            $data['mot_de_passe'] = Hash::make($request->mot_de_passe);
        }

        DB::table('utilisateur')
            ->where('id_utilisateur', $id)
            ->update($data);

        return redirect()->route('super_admin.utilisateurs.index')
            ->with('success', 'Utilisateur modifié avec succès !');
    }

    /**
     * Activer / Désactiver un utilisateur
     */
    public function toggleActif($id)
    {
        $utilisateur = DB::table('utilisateur')
            ->where('id_utilisateur', $id)
            ->first();

        if (!$utilisateur) {
            return redirect()->route('super_admin.utilisateurs.index')
                ->with('error', 'Utilisateur introuvable.');
        }

        // Empêcher de désactiver son propre compte
        if ($utilisateur->id_utilisateur == session('utilisateur_id')) {
            return redirect()->route('super_admin.utilisateurs.index')
                ->with('error', 'Vous ne pouvez pas désactiver votre propre compte.');
        }

        $nouvelEtat = $utilisateur->actif ? 0 : 1;

        DB::table('utilisateur')
            ->where('id_utilisateur', $id)
            ->update(['actif' => $nouvelEtat]);

        $msg = $nouvelEtat ? 'Utilisateur activé avec succès !' : 'Utilisateur désactivé.';
        return redirect()->route('super_admin.utilisateurs.index')
            ->with('success', $msg);
    }

    /**
     * Supprimer un utilisateur
     */
    public function destroy($id)
    {
        // Empêcher de supprimer son propre compte
        if ($id == session('utilisateur_id')) {
            return redirect()->route('super_admin.utilisateurs.index')
                ->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        DB::table('utilisateur')
            ->where('id_utilisateur', $id)
            ->delete();

        return redirect()->route('super_admin.utilisateurs.index')
            ->with('success', 'Utilisateur supprimé avec succès !');
    }
}