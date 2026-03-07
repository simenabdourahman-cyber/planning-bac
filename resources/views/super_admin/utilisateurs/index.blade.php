<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gestion Utilisateurs — BAC 2026</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{
    --rouge:#C0392B;--rouge-f:#96281B;--rouge-cl:#E74C3C;
    --bleu:#1A3A6C;--bleu-f:#0F2451;
    --vert:#27AE60;--or:#F5C842;--or-f:#E6A817;
    --fond:#F4F2ED;--blanc:#FFFFFF;
    --texte:#1C1C1C;--texte-doux:#6B7280;
    --bordure:#E5E0D8;
    --ombre:0 4px 24px rgba(0,0,0,0.07);
    --ombre-forte:0 12px 48px rgba(0,0,0,0.13);
}
*{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'DM Sans',sans-serif;background:var(--fond);color:var(--texte);min-height:100vh;display:flex;}

/* SIDEBAR */
.sidebar{position:fixed;left:0;top:0;bottom:0;width:255px;background:var(--bleu-f);display:flex;flex-direction:column;z-index:100;box-shadow:4px 0 32px rgba(15,36,81,0.35);}
.sb-top{padding:20px 18px 16px;border-bottom:1px solid rgba(255,255,255,0.08);display:flex;align-items:center;gap:12px;}
.sb-logo{width:48px;height:48px;border-radius:50%;background:#fff;padding:3px;flex-shrink:0;overflow:hidden;}
.sb-logo img{width:100%;height:100%;object-fit:cover;border-radius:50%;}
.sb-brand .name{font-family:'Playfair Display',serif;font-size:13px;font-weight:700;color:#fff;}
.sb-brand .sub{font-size:9.5px;color:rgba(255,255,255,0.4);letter-spacing:0.1em;text-transform:uppercase;margin-top:2px;}
.sb-nav{flex:1;padding:12px 10px;overflow-y:auto;}
.nav-section{font-size:9px;letter-spacing:0.2em;text-transform:uppercase;color:rgba(255,255,255,0.3);padding:14px 12px 6px;font-weight:700;}
.nav-item{display:flex;align-items:center;gap:10px;padding:10px 13px;border-radius:10px;cursor:pointer;color:rgba(255,255,255,0.6);font-size:13px;font-weight:500;margin-bottom:2px;transition:all 0.2s;text-decoration:none;}
.nav-item:hover{background:rgba(255,255,255,0.08);color:#fff;}
.nav-item.active{background:linear-gradient(135deg,var(--rouge),var(--rouge-f));color:#fff;box-shadow:0 4px 16px rgba(192,57,43,0.4);}
.nav-item .ni{font-size:16px;width:20px;text-align:center;}
.sb-user{padding:14px 16px;border-top:1px solid rgba(255,255,255,0.08);display:flex;align-items:center;gap:10px;}
.user-av{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--or-f),#C9A227);display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;font-size:13px;flex-shrink:0;}
.user-info .uname{color:#fff;font-size:12.5px;font-weight:600;}
.user-info .urole{color:rgba(255,255,255,0.4);font-size:10px;}
.logout-btn{margin-left:auto;background:rgba(192,57,43,0.2);border:none;border-radius:8px;padding:6px 8px;color:rgba(255,255,255,0.6);cursor:pointer;font-size:13px;transition:all 0.2s;}
.logout-btn:hover{background:var(--rouge);color:#fff;}

/* MAIN */
.main{margin-left:255px;flex:1;display:flex;flex-direction:column;min-height:100vh;}
.topbar{position:sticky;top:0;z-index:50;background:rgba(244,242,237,0.94);backdrop-filter:blur(16px);border-bottom:1px solid var(--bordure);padding:0 28px;height:62px;display:flex;align-items:center;justify-content:space-between;}
.page-title{font-family:'Playfair Display',serif;font-size:19px;font-weight:700;color:var(--bleu);}
.page-title span{color:var(--rouge);}
.breadcrumb{font-size:11.5px;color:var(--texte-doux);margin-top:2px;}
.topbar-right{display:flex;align-items:center;gap:10px;}

/* BUTTONS */
.btn{padding:8px 18px;border-radius:9px;font-size:12.5px;font-weight:700;cursor:pointer;border:none;font-family:'DM Sans',sans-serif;transition:all 0.2s;text-decoration:none;display:inline-flex;align-items:center;gap:6px;}
.btn-primary{background:linear-gradient(135deg,var(--rouge),var(--rouge-f));color:#fff;box-shadow:0 4px 14px rgba(192,57,43,0.3);}
.btn-primary:hover{transform:translateY(-1px);}
.btn-bleu{background:linear-gradient(135deg,var(--bleu),var(--bleu-f));color:#fff;box-shadow:0 4px 14px rgba(26,58,108,0.3);}
.btn-bleu:hover{transform:translateY(-1px);}
.btn-vert{background:linear-gradient(135deg,var(--vert),#1E8449);color:#fff;}
.btn-vert:hover{transform:translateY(-1px);}
.btn-outline{background:transparent;border:1.5px solid var(--bordure);color:var(--texte-doux);}
.btn-outline:hover{border-color:var(--rouge);color:var(--rouge);}
.btn-sm{padding:5px 12px;font-size:11.5px;border-radius:7px;}
.btn-danger{background:rgba(192,57,43,0.1);color:var(--rouge);border:1.5px solid rgba(192,57,43,0.2);}
.btn-danger:hover{background:var(--rouge);color:#fff;}

/* CONTENT */
.content{padding:28px;flex:1;}

/* ALERT */
.alert{padding:12px 18px;border-radius:10px;font-size:13px;font-weight:500;margin-bottom:20px;display:flex;align-items:center;gap:10px;}
.alert-success{background:rgba(39,174,96,0.1);border:1.5px solid rgba(39,174,96,0.25);color:var(--vert);}
.alert-error{background:rgba(192,57,43,0.1);border:1.5px solid rgba(192,57,43,0.25);color:var(--rouge);}

/* STATS */
.stats-grid{display:grid;grid-template-columns:repeat(6,1fr);gap:14px;margin-bottom:24px;}
.stat-card{background:var(--blanc);border-radius:13px;padding:16px;box-shadow:var(--ombre);border:1px solid var(--bordure);text-align:center;cursor:pointer;transition:all 0.2s;}
.stat-card:hover{transform:translateY(-2px);box-shadow:var(--ombre-forte);}
.stat-card.active-filter{border-color:var(--bleu);box-shadow:0 0 0 3px rgba(26,58,108,0.1);}
.sc-ico{font-size:22px;margin-bottom:8px;}
.sc-val{font-family:'Playfair Display',serif;font-size:24px;font-weight:900;color:var(--bleu);line-height:1;}
.sc-lbl{font-size:10px;color:var(--texte-doux);margin-top:4px;font-weight:500;}

/* CARD */
.card{background:var(--blanc);border-radius:16px;box-shadow:var(--ombre);border:1px solid var(--bordure);overflow:hidden;}
.card-head{padding:16px 22px;border-bottom:1px solid var(--bordure);display:flex;align-items:center;justify-content:space-between;background:rgba(26,58,108,0.02);}
.card-title{font-family:'Playfair Display',serif;font-size:15px;font-weight:700;color:var(--bleu);display:flex;align-items:center;gap:9px;}
.card-title .dot{width:8px;height:8px;border-radius:50%;background:var(--rouge);}

/* SEARCH */
.search-bar{display:flex;gap:10px;padding:14px 18px;border-bottom:1px solid var(--bordure);background:var(--fond);}
.search-wrap{position:relative;flex:1;}
.search-ico{position:absolute;left:11px;top:50%;transform:translateY(-50%);font-size:14px;color:#CCC;pointer-events:none;}
.search-input{width:100%;padding:9px 14px 9px 36px;border:1.5px solid var(--bordure);border-radius:9px;font-size:13px;font-family:'DM Sans',sans-serif;background:#fff;outline:none;transition:border-color 0.2s;}
.search-input:focus{border-color:var(--bleu);}
.filter-select{padding:9px 14px;border:1.5px solid var(--bordure);border-radius:9px;font-family:'DM Sans',sans-serif;font-size:12.5px;color:var(--texte);background:#fff;outline:none;cursor:pointer;}
.filter-select:focus{border-color:var(--bleu);}

/* TABLE */
.tbl-wrap{overflow-x:auto;}
table{width:100%;border-collapse:collapse;}
thead tr{background:var(--bleu-f);}
th{text-align:left;padding:11px 16px;font-size:10px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:rgba(255,255,255,0.7);}
td{padding:12px 16px;font-size:13px;border-bottom:1px solid var(--bordure);color:var(--texte);vertical-align:middle;}
tr:last-child td{border-bottom:none;}
tr:hover td{background:rgba(26,58,108,0.02);}
.code-pill{font-family:'DM Mono',monospace;font-size:11px;background:var(--fond);padding:2px 8px;border-radius:5px;color:var(--bleu);border:1px solid var(--bordure);}
.user-cell{display:flex;align-items:center;gap:10px;}
.user-av-sm{width:34px;height:34px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;font-size:12px;flex-shrink:0;}

/* BADGES */
.badge{display:inline-flex;align-items:center;gap:4px;font-size:10.5px;font-weight:700;padding:3px 10px;border-radius:20px;}
.role-super{background:rgba(230,168,23,0.15);color:var(--or-f);border:1px solid rgba(230,168,23,0.3);}
.role-admin{background:rgba(26,58,108,0.1);color:var(--bleu);border:1px solid rgba(26,58,108,0.2);}
.role-examen{background:rgba(39,174,96,0.1);color:var(--vert);border:1px solid rgba(39,174,96,0.2);}
.role-etab{background:rgba(192,57,43,0.1);color:var(--rouge);border:1px solid rgba(192,57,43,0.2);}
.role-cand{background:rgba(100,100,100,0.1);color:#555;border:1px solid rgba(100,100,100,0.15);}
.actif-oui{background:rgba(39,174,96,0.1);color:var(--vert);}
.actif-non{background:rgba(192,57,43,0.1);color:var(--rouge);}

/* ACTIONS */
.actions{display:flex;gap:6px;align-items:center;}

/* PAGINATION */
.pagination{display:flex;align-items:center;justify-content:space-between;padding:14px 20px;border-top:1px solid var(--bordure);background:var(--fond);}
.page-info{font-size:12px;color:var(--texte-doux);}

/* MODAL CONFIRM */
.modal-overlay{position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:1000;display:none;align-items:center;justify-content:center;}
.modal-overlay.show{display:flex;}
.modal-box{background:#fff;border-radius:16px;padding:32px;max-width:400px;width:90%;box-shadow:var(--ombre-forte);text-align:center;}
.modal-ico{font-size:48px;margin-bottom:16px;}
.modal-titre{font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:var(--texte);margin-bottom:8px;}
.modal-desc{font-size:13px;color:var(--texte-doux);line-height:1.6;margin-bottom:24px;}
.modal-actions{display:flex;gap:10px;justify-content:center;}

/* FADE */
.fi{opacity:0;transform:translateY(14px);animation:fadeUp 0.45s ease forwards;}
@keyframes fadeUp{to{opacity:1;transform:translateY(0)}}
</style>
</head>
<body>

<aside class="sidebar">
    <div class="sb-top">
        <div class="sb-logo"><img src="{{ asset('images/logo-menfop.jpeg') }}" alt="MENFOP"></div>
        <div class="sb-brand">
            <div class="name">Système BAC 2026</div>
            <div class="sub">MENFOP · Djibouti</div>
        </div>
    </div>
    <nav class="sb-nav">
        <div class="nav-section">Principal</div>
        <a href="{{ route('super_admin.dashboard') }}" class="nav-item">
            <span class="ni">🏠</span> Tableau de bord
        </a>
        <div class="nav-section">Administration</div>
        <a href="{{ route('super_admin.utilisateurs.index') }}" class="nav-item active">
            <span class="ni">👥</span> Utilisateurs
        </a>
        <a href="#" class="nav-item"><span class="ni">👨‍🎓</span> Candidats</a>
        <a href="#" class="nav-item"><span class="ni">🏫</span> Établissements</a>
        <a href="#" class="nav-item"><span class="ni">🏛️</span> Centres</a>
        <div class="nav-section">Examens</div>
        <a href="#" class="nav-item"><span class="ni">🗂️</span> Séries</a>
        <a href="#" class="nav-item"><span class="ni">📚</span> Épreuves</a>
        <a href="#" class="nav-item"><span class="ni">📅</span> Planning</a>
        <div class="nav-section">Système</div>
        <a href="#" class="nav-item"><span class="ni">⚙️</span> Paramètres</a>
        <a href="#" class="nav-item"><span class="ni">📊</span> Rapports</a>
    </nav>
    <div class="sb-user">
        <div class="user-av">{{ strtoupper(substr(session('utilisateur_nom','SA'),0,2)) }}</div>
        <div class="user-info">
            <div class="uname">{{ session('utilisateur_nom','Super Admin') }}</div>
            <div class="urole">Super Administrateur</div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn" title="Déconnexion">🚪</button>
        </form>
    </div>
</aside>

<main class="main">
    <div class="topbar">
        <div>
            <div class="page-title">Gestion des <span>Utilisateurs</span></div>
            <div class="breadcrumb">Super Admin · {{ $utilisateurs->count() }} utilisateurs au total</div>
        </div>
        <div class="topbar-right">
            <a href="{{ route('super_admin.utilisateurs.create') }}" class="btn btn-primary">+ Nouvel utilisateur</a>
        </div>
    </div>

    <div class="content">

        {{-- ALERTES --}}
        @if(session('success'))
            <div class="alert alert-success fi">✅ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error fi">⚠️ {{ session('error') }}</div>
        @endif

        {{-- STATS PAR RÔLE --}}
        <div class="stats-grid fi">
            <div class="stat-card" onclick="filtrerRole('tous')">
                <div class="sc-ico">👥</div>
                <div class="sc-val">{{ $utilisateurs->count() }}</div>
                <div class="sc-lbl">Total</div>
            </div>
            <div class="stat-card" onclick="filtrerRole('super_admin')">
                <div class="sc-ico">👑</div>
                <div class="sc-val">{{ $utilisateurs->where('role','super_admin')->count() }}</div>
                <div class="sc-lbl">Super Admin</div>
            </div>
            <div class="stat-card" onclick="filtrerRole('administration')">
                <div class="sc-ico">🏛️</div>
                <div class="sc-val">{{ $utilisateurs->where('role','administration')->count() }}</div>
                <div class="sc-lbl">Administration</div>
            </div>
            <div class="stat-card" onclick="filtrerRole('gest_examen')">
                <div class="sc-ico">📋</div>
                <div class="sc-val">{{ $utilisateurs->where('role','gest_examen')->count() }}</div>
                <div class="sc-lbl">Gest. Examens</div>
            </div>
            <div class="stat-card" onclick="filtrerRole('gest_etab')">
                <div class="sc-ico">🏫</div>
                <div class="sc-val">{{ $utilisateurs->where('role','gest_etab')->count() }}</div>
                <div class="sc-lbl">Gest. Étab.</div>
            </div>
            <div class="stat-card" onclick="filtrerRole('candidat')">
                <div class="sc-ico">👨‍🎓</div>
                <div class="sc-val">{{ $utilisateurs->where('role','candidat')->count() }}</div>
                <div class="sc-lbl">Candidats</div>
            </div>
        </div>

        {{-- TABLEAU --}}
        <div class="card fi">
            <div class="card-head">
                <div class="card-title"><div class="dot"></div> Liste des Utilisateurs</div>
                <div style="display:flex;gap:8px;">
                    <a href="{{ route('super_admin.utilisateurs.create') }}" class="btn btn-primary btn-sm">+ Ajouter</a>
                </div>
            </div>

            <div class="search-bar">
                <div class="search-wrap">
                    <span class="search-ico">🔍</span>
                    <input type="text" class="search-input" id="searchInput" placeholder="Rechercher par nom ou email..." oninput="filtrerTableau()">
                </div>
                <select class="filter-select" id="roleFilter" onchange="filtrerTableau()">
                    <option value="">Tous les rôles</option>
                    <option value="super_admin">Super Admin</option>
                    <option value="administration">Administration</option>
                    <option value="gest_examen">Gest. Examens</option>
                    <option value="gest_etab">Gest. Établissement</option>
                    <option value="candidat">Candidat</option>
                </select>
                <select class="filter-select" id="actifFilter" onchange="filtrerTableau()">
                    <option value="">Tous les statuts</option>
                    <option value="1">Actifs</option>
                    <option value="0">Inactifs</option>
                </select>
            </div>

            <div class="tbl-wrap">
                <table id="tableUtilisateurs">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Utilisateur</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($utilisateurs as $u)
                        @php
                            $initiales = strtoupper(substr($u->nom_utilisateur, 0, 2));
                            $couleurs = [
                                'super_admin'    => '#E6A817',
                                'administration' => '#1A3A6C',
                                'gest_examen'    => '#27AE60',
                                'gest_etab'      => '#C0392B',
                                'candidat'       => '#666',
                            ];
                            $couleur = $couleurs[$u->role] ?? '#888';
                            $roleLabels = [
                                'super_admin'    => ['👑', 'Super Admin',       'role-super'],
                                'administration' => ['🏛️', 'Administration',   'role-admin'],
                                'gest_examen'    => ['📋', 'Gest. Examens',     'role-examen'],
                                'gest_etab'      => ['🏫', 'Gest. Étab.',       'role-etab'],
                                'candidat'       => ['👨‍🎓', 'Candidat',        'role-cand'],
                            ];
                            $rl = $roleLabels[$u->role] ?? ['❓', $u->role, 'role-cand'];
                        @endphp
                        <tr data-role="{{ $u->role }}" data-actif="{{ $u->actif }}" data-nom="{{ strtolower($u->nom_utilisateur) }}" data-email="{{ strtolower($u->email) }}">
                            <td><span class="code-pill">{{ $u->id_utilisateur }}</span></td>
                            <td>
                                <div class="user-cell">
                                    <div class="user-av-sm" style="background:{{ $couleur }}">{{ $initiales }}</div>
                                    <div>
                                        <div style="font-weight:600;font-size:13px;">{{ $u->nom_utilisateur }}</div>
                                        <div style="font-size:10.5px;color:var(--texte-doux)">ID: {{ $u->id_utilisateur }}</div>
                                    </div>
                                </div>
                            </td>
                            <td style="font-family:'DM Mono',monospace;font-size:12px;">{{ $u->email }}</td>
                            <td><span class="badge {{ $rl[2] }}">{{ $rl[0] }} {{ $rl[1] }}</span></td>
                            <td>
                                @if($u->actif)
                                    <span class="badge actif-oui">● Actif</span>
                                @else
                                    <span class="badge actif-non">○ Inactif</span>
                                @endif
                            </td>
                            <td>
                                <div class="actions">
                                    {{-- Modifier --}}
                                    <a href="{{ route('super_admin.utilisateurs.edit', $u->id_utilisateur) }}"
                                       class="btn btn-bleu btn-sm" title="Modifier">✏️ Modifier</a>

                                    {{-- Activer/Désactiver --}}
                                    <form method="POST" action="{{ route('super_admin.utilisateurs.toggle', $u->id_utilisateur) }}" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        @if($u->actif)
                                            <button type="submit" class="btn btn-outline btn-sm" title="Désactiver"
                                                onclick="return confirm('Désactiver cet utilisateur ?')">⏸ Désact.</button>
                                        @else
                                            <button type="submit" class="btn btn-vert btn-sm" title="Activer"
                                                onclick="return confirm('Activer cet utilisateur ?')">▶ Activer</button>
                                        @endif
                                    </form>

                                    {{-- Supprimer --}}
                                    @if($u->id_utilisateur != session('utilisateur_id'))
                                    <button class="btn btn-danger btn-sm" title="Supprimer"
                                        onclick="confirmerSupp({{ $u->id_utilisateur }}, '{{ addslashes($u->nom_utilisateur) }}')">🗑</button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="text-align:center;padding:40px;color:var(--texte-doux);">
                                Aucun utilisateur trouvé.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                <span class="page-info" id="pageInfo">{{ $utilisateurs->count() }} utilisateur(s) affiché(s)</span>
                <div style="font-size:11.5px;color:var(--texte-doux)">Système BAC 2026 · MENFOP</div>
            </div>
        </div>
    </div>
</main>

{{-- MODAL SUPPRESSION --}}
<div class="modal-overlay" id="modalSupp">
    <div class="modal-box">
        <div class="modal-ico">🗑️</div>
        <div class="modal-titre">Confirmer la suppression</div>
        <div class="modal-desc" id="modalDesc">Êtes-vous sûr de vouloir supprimer cet utilisateur ?<br>Cette action est irréversible.</div>
        <div class="modal-actions">
            <button class="btn btn-outline" onclick="fermerModal()">Annuler</button>
            <form id="formSupp" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary">Supprimer définitivement</button>
            </form>
        </div>
    </div>
</div>

<script>
function filtrerTableau() {
    var search = document.getElementById('searchInput').value.toLowerCase();
    var role   = document.getElementById('roleFilter').value;
    var actif  = document.getElementById('actifFilter').value;
    var rows   = document.querySelectorAll('#tableUtilisateurs tbody tr');
    var count  = 0;

    rows.forEach(function(row) {
        var nom   = row.dataset.nom || '';
        var email = row.dataset.email || '';
        var r     = row.dataset.role || '';
        var a     = row.dataset.actif || '';

        var ok = true;
        if (search && !nom.includes(search) && !email.includes(search)) ok = false;
        if (role && r !== role) ok = false;
        if (actif !== '' && a !== actif) ok = false;

        row.style.display = ok ? '' : 'none';
        if (ok) count++;
    });

    document.getElementById('pageInfo').textContent = count + ' utilisateur(s) affiché(s)';
}

function filtrerRole(role) {
    document.getElementById('roleFilter').value = role === 'tous' ? '' : role;
    filtrerTableau();
    document.querySelectorAll('.stat-card').forEach(function(c){ c.classList.remove('active-filter'); });
    event.currentTarget.classList.add('active-filter');
}

function confirmerSupp(id, nom) {
    document.getElementById('modalDesc').innerHTML =
        'Êtes-vous sûr de vouloir supprimer <strong>' + nom + '</strong> ?<br>Cette action est irréversible.';
    document.getElementById('formSupp').action = '/super-admin/utilisateurs/' + id;
    document.getElementById('modalSupp').classList.add('show');
}

function fermerModal() {
    document.getElementById('modalSupp').classList.remove('show');
}

// Fermer modal en cliquant dehors
document.getElementById('modalSupp').addEventListener('click', function(e) {
    if (e.target === this) fermerModal();
});

// Auto-hide alertes après 4s
setTimeout(function() {
    document.querySelectorAll('.alert').forEach(function(a) {
        a.style.transition = 'opacity 0.5s';
        a.style.opacity = '0';
        setTimeout(function(){ a.style.display = 'none'; }, 500);
    });
}, 4000);
</script>

</body>
</html>