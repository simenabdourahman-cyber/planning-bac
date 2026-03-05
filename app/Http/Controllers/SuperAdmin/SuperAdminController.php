<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        return view('super_admin.dashboard');
    }

    public function utilisateurs()
    {
        return view('super_admin.utilisateurs');
    }

    public function parametres()
    {
        return view('super_admin.parametres');
    }
}