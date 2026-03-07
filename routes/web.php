<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\superAdmin\superadmincontroller;
use App\Http\Controllers\superAdmin\UtilisateurController;
use App\Http\Controllers\superAdmin\CandidatGestionController;
use App\Http\Controllers\Administration\AdministrationController;
use App\Http\Controllers\GestionnaireExamen\GestExamenController;
use App\Http\Controllers\GestionnaireEtab\GestEtabController;
use App\Http\Controllers\Candidat\CandidatController;
use App\Http\Controllers\superAdmin\EtablissementController;

/*
|--------------------------------------------------------------------------
| ROUTES PUBLIQUES
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login',  [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/inscription-libre', function () {
    return view('candidat.inscription_libre');
})->name('inscription.libre');

/*
|--------------------------------------------------------------------------
| 👑 SUPER ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['web', 'checkrole:super_admin'])
    ->prefix('super-admin')
    ->name('super_admin.')
    ->group(function () {

        // Dashboard & Paramètres
        Route::get('/dashboard',  [superadmincontroller::class, 'dashboard'])->name('dashboard');
        Route::get('/parametres', [superadmincontroller::class, 'parametres'])->name('parametres');

        // ── Utilisateurs ──
        Route::get('/utilisateurs',               [UtilisateurController::class, 'index'])->name('utilisateurs.index');
        Route::get('/utilisateurs/create',        [UtilisateurController::class, 'create'])->name('utilisateurs.create');
        Route::post('/utilisateurs',              [UtilisateurController::class, 'store'])->name('utilisateurs.store');
        Route::get('/utilisateurs/{id}/edit',     [UtilisateurController::class, 'edit'])->name('utilisateurs.edit');
        Route::put('/utilisateurs/{id}',          [UtilisateurController::class, 'update'])->name('utilisateurs.update');
        Route::patch('/utilisateurs/{id}/toggle', [UtilisateurController::class, 'toggleActif'])->name('utilisateurs.toggle');
        Route::delete('/utilisateurs/{id}',       [UtilisateurController::class, 'destroy'])->name('utilisateurs.destroy');

        // ── Candidats ──
        Route::get('/candidats',              [CandidatGestionController::class, 'index'])->name('candidats.index');
        Route::get('/candidats/create',       [CandidatGestionController::class, 'create'])->name('candidats.create');
        Route::post('/candidats',             [CandidatGestionController::class, 'store'])->name('candidats.store');
        Route::get('/candidats/{id}/edit',    [CandidatGestionController::class, 'edit'])->name('candidats.edit');
        Route::put('/candidats/{id}',         [CandidatGestionController::class, 'update'])->name('candidats.update');
        Route::delete('/candidats/{id}',      [CandidatGestionController::class, 'destroy'])->name('candidats.destroy');
       
       
        Route::get('/etablissements', [EtablissementController::class, 'index'])->name('etablissements.index');
        Route::get('/etablissements/create', [EtablissementController::class, 'create'])->name('etablissements.create');
        Route::post('/etablissements', [EtablissementController::class, 'store'])->name('etablissements.store');
        Route::get('/etablissements/{id}/edit', [EtablissementController::class, 'edit'])->name('etablissements.edit');
        Route::put('/etablissements/{id}', [EtablissementController::class, 'update'])->name('etablissements.update');
        Route::delete('/etablissements/{id}', [EtablissementController::class, 'destroy'])->name('etablissements.destroy');

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
        Route::get('/dashboard',      [AdministrationController::class, 'dashboard'])->name('dashboard');
        Route::get('/candidats',      [AdministrationController::class, 'candidats'])->name('candidats');
        Route::get('/etablissements', [AdministrationController::class, 'etablissements'])->name('etablissements');
        Route::get('/series',         [AdministrationController::class, 'series'])->name('series');
        Route::get('/rapports',       [AdministrationController::class, 'rapports'])->name('rapports');
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
        Route::get('/dashboard',   [GestExamenController::class, 'dashboard'])->name('dashboard');
        Route::get('/planning',    [GestExamenController::class, 'planning'])->name('planning');
        Route::get('/epreuves',    [GestExamenController::class, 'epreuves'])->name('epreuves');
        Route::get('/centres',     [GestExamenController::class, 'centres'])->name('centres');
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
        Route::get('/dashboard',    [GestEtabController::class, 'dashboard'])->name('dashboard');
        Route::get('/classes',      [GestEtabController::class, 'classes'])->name('classes');
        Route::get('/salles',       [GestEtabController::class, 'salles'])->name('salles');
        Route::get('/inscriptions', [GestEtabController::class, 'inscriptions'])->name('inscriptions');
    });

/*
|--------------------------------------------------------------------------
| 👨‍🎓 CANDIDAT
|--------------------------------------------------------------------------
*/
Route::middleware(['web', 'checkrole:candidat'])
    ->prefix('candidat')
    ->name('candidat.')
    ->group(function () {
        Route::get('/convocation',            [CandidatController::class, 'convocation'])->name('convocation');
        Route::get('/convocation-rattrapage', [CandidatController::class, 'convocationRattrapage'])->name('convocation.rattrapage');
    });