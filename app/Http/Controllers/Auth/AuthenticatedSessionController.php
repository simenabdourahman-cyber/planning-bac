<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Afficher la page de connexion
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Traiter la connexion
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'email'    => 'required|string',
            'password' => 'required|string',
            'role'     => 'required|string|in:super_admin,administration,gest_examen,gest_etab,candidat',
        ], [
            'email.required'    => 'L\'identifiant est obligatoire.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'role.required'     => 'Veuillez sélectionner votre profil.',
            'role.in'           => 'Profil invalide.',
        ]);

        // Chercher l'utilisateur dans la table `utilisateur`
        $utilisateur = DB::table('utilisateur')
            ->where('email', $request->email)
            ->where('role', $request->role)
            ->where('actif', 1)
            ->first();

        // Vérifier si l'utilisateur existe et le mot de passe est correct
        if (!$utilisateur || !password_verify($request->password, $utilisateur->mot_de_passe)) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Identifiants incorrects ou profil ne correspond pas.',
                ]);
        }

        // Stocker les infos en session
        session([
            'utilisateur_id'   => $utilisateur->id_utilisateur,
            'utilisateur_nom'  => $utilisateur->nom_utilisateur,
            'utilisateur_email'=> $utilisateur->email,
            'utilisateur_role' => $utilisateur->role,
            'connecte'         => true,
        ]);

        // Redirection selon le rôle
        return $this->redirectParRole($utilisateur->role);
    }

    /**
     * Rediriger vers le bon dashboard selon le rôle
     */
    private function redirectParRole(string $role)
    {
        return match($role) {
            'super_admin'    => redirect()->route('super_admin.dashboard'),
            'administration' => redirect()->route('administration.dashboard'),
            'gest_examen'    => redirect()->route('gest_examen.dashboard'),
            'gest_etab'      => redirect()->route('gest_etab.dashboard'),
            'candidat'       => redirect()->route('candidat.convocation'),
            default          => redirect('/login'),
        };
    }

    /**
     * Déconnexion
     */
    public function destroy(Request $request)
    {
        session()->flush();
        return redirect('/login')->with('status', 'Vous avez été déconnecté avec succès.');
    }
}