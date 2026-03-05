<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Vérifier que l'utilisateur est connecté et a le bon rôle
     */
    public function handle(Request $request, Closure $next, string ...$roles)
    {
        // Pas connecté → rediriger vers login
        if (!session('connecte')) {
            return redirect('/login')->with('status', 'Veuillez vous connecter.');
        }

        // Vérifier le rôle
        $roleUtilisateur = session('utilisateur_role');

        if (!in_array($roleUtilisateur, $roles)) {
            abort(403, 'Accès refusé — Vous n\'avez pas les droits pour cette page.');
        }

        return $next($request);
    }
}