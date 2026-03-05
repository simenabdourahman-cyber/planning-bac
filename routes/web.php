<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Administration\AdministrationController;
use App\Http\Controllers\GestionnaireExamen\GestExamenController;
use App\Http\Controllers\GestionnaireEtab\GestEtabController;
use App\Http\Controllers\Candidat\CandidatController;

/*
|--------------------------------------------------------------------------
| ROUTES PUBLIQUES
|--------------------------------------------------------------------------
*/

// Page d'accueil → rediriger vers login
Route::get('/', function () {
    return redirect('/login');
});

// Login
Route::get('/login',  [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

// Déconnexion
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

/*
|--------------------------------------------------------------------------
| 👑 SUPER ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['web', 'checkrole:super_admin'])
    ->prefix('super-admin')
    ->name('super_admin.')
    ->group(function () {
        Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/utilisateurs', [SuperAdminController::class, 'utilisateurs'])->name('utilisateurs');
        Route::get('/parametres', [SuperAdminController::class, 'parametres'])->name('parametres');
    });

/*
|--------------------------------------------------------------------------
| 🏛️ ADMINISTRATION MENFOP
|--------------------------------------------------------------------------
*/
Route::middleware(['web', 'checkrole:administration,super_admin'])
    ->prefix('administration')
    ->name('administration.')
    ->group(function () {
        Route::get('/dashboard', [AdministrationController::class, 'dashboard'])->name('dashboard');
        Route::get('/candidats', [AdministrationController::class, 'candidats'])->name('candidats');
        Route::get('/etablissements', [AdministrationController::class, 'etablissements'])->name('etablissements');
        Route::get('/series', [AdministrationController::class, 'series'])->name('series');
        Route::get('/rapports', [AdministrationController::class, 'rapports'])->name('rapports');
    });

/*
|--------------------------------------------------------------------------
| 📋 GESTIONNAIRE D'EXAMENS
|--------------------------------------------------------------------------
*/
Route::middleware(['web', 'checkrole:gest_examen,super_admin'])
    ->prefix('examens')
    ->name('gest_examen.')
    ->group(function () {
        Route::get('/dashboard', [GestExamenController::class, 'dashboard'])->name('dashboard');
        Route::get('/planning', [GestExamenController::class, 'planning'])->name('planning');
        Route::get('/epreuves', [GestExamenController::class, 'epreuves'])->name('epreuves');
        Route::get('/centres', [GestExamenController::class, 'centres'])->name('centres');
        Route::get('/enseignants', [GestExamenController::class, 'enseignants'])->name('enseignants');
    });

/*
|--------------------------------------------------------------------------
| 🏫 GESTIONNAIRE D'ÉTABLISSEMENT
|--------------------------------------------------------------------------
*/
Route::middleware(['web', 'checkrole:gest_etab,super_admin'])
    ->prefix('etablissement')
    ->name('gest_etab.')
    ->group(function () {
        Route::get('/dashboard', [GestEtabController::class, 'dashboard'])->name('dashboard');
        Route::get('/classes', [GestEtabController::class, 'classes'])->name('classes');
        Route::get('/salles', [GestEtabController::class, 'salles'])->name('salles');
        Route::get('/inscriptions', [GestEtabController::class, 'inscriptions'])->name('inscriptions');
    });

/*
|--------------------------------------------------------------------------
| 👨‍🎓 CANDIDAT — consultation convocation uniquement
|--------------------------------------------------------------------------
*/
Route::middleware(['web', 'checkrole:candidat'])
    ->prefix('candidat')
    ->name('candidat.')
    ->group(function () {
        Route::get('/convocation', [CandidatController::class, 'convocation'])->name('convocation');
        Route::get('/convocation-rattrapage', [CandidatController::class, 'convocationRattrapage'])->name('convocation.rattrapage');
    });