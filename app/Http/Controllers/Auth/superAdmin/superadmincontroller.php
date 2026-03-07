<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class superadmincontroller extends Controller
{
    public function dashboard()
    {
        return view('super_admin.dashboard');
    }

    public function utilisateurs()
    {
        $utilisateurs = DB::table('utilisateur')
            ->orderBy('role')
            ->orderBy('nom_utilisateur')
            ->get();

        return view('super_admin.utilisateurs.index', compact('utilisateurs'));
    }

    public function parametres()
    {
        return view('super_admin.parametres');
    }
}