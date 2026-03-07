<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gestion Établissements — BAC 2026</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{
    --rouge:#C0392B;--rouge-f:#96281B;
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
.nav-item.active{background:linear-gradient(135deg,var(--rouge),var(--rouge-f));color:#fff;}
.nav-item .ni{font-size:16px;width:20px;text-align:center;}
.sb-user{padding:14px 16px;border-top:1px solid rgba(255,255,255,0.08);display:flex;align-items:center;gap:10px;}
.user-av{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--or-f),#C9A227);display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;font-size:13px;flex-shrink:0;}
.user-info .uname{color:#fff;font-size:12.5px;font-weight:600;}
.user-info .urole{color:rgba(255,255,255,0.4);font-size:10px;}
.logout-btn{margin-left:auto;background:rgba(192,57,43,0.2);border:none;border-radius:8px;padding:6px 8px;color:rgba(255,255,255,0.6);cursor:pointer;font-size:13px;}
.logout-btn:hover{background:var(--rouge);color:#fff;}
.main{margin-left:255px;flex:1;display:flex;flex-direction:column;}
.topbar{position:sticky;top:0;z-index:50;background:rgba(244,242,237,0.94);backdrop-filter:blur(16px);border-bottom:1px solid var(--bordure);padding:0 28px;height:62px;display:flex;align-items:center;justify-content:space-between;}
.page-title{font-family:'Playfair Display',serif;font-size:19px;font-weight:700;color:var(--bleu);}
.page-title span{color:var(--rouge);}
.breadcrumb{font-size:11.5px;color:var(--texte-doux);margin-top:2px;}
.btn{padding:8px 18px;border-radius:9px;font-size:12.5px;font-weight:700;cursor:pointer;border:none;font-family:'DM Sans',sans-serif;transition:all 0.2s;text-decoration:none;display:inline-flex;align-items:center;gap:6px;}
.btn-primary{background:linear-gradient(135deg,var(--rouge),var(--rouge-f));color:#fff;box-shadow:0 4px 14px rgba(192,57,43,0.3);}
.btn-primary:hover{transform:translateY(-1px);}
.btn-bleu{background:linear-gradient(135deg,var(--bleu),var(--bleu-f));color:#fff;}
.btn-outline{background:transparent;border:1.5px solid var(--bordure);color:var(--texte-doux);}
.btn-outline:hover{border-color:var(--rouge);color:var(--rouge);}
.btn-danger{background:rgba(192,57,43,0.1);color:var(--rouge);border:1.5px solid rgba(192,57,43,0.2);}
.btn-danger:hover{background:var(--rouge);color:#fff;}
.btn-sm{padding:5px 11px;font-size:11.5px;border-radius:7px;}
.content{padding:28px;flex:1;}
.alert{padding:12px 18px;border-radius:10px;font-size:13px;font-weight:500;margin-bottom:20px;display:flex;align-items:center;gap:10px;}
.alert-success{background:rgba(39,174,96,0.1);border:1.5px solid rgba(39,174,96,0.25);color:var(--vert);}
.alert-error{background:rgba(192,57,43,0.1);border:1.5px solid rgba(192,57,43,0.25);color:var(--rouge);}
.stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:24px;}
.stat-card{background:var(--blanc);border-radius:14px;padding:20px;box-shadow:var(--ombre);border:1px solid var(--bordure);position:relative;overflow:hidden;}
.stat-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;}
.sc-rouge::before{background:linear-gradient(90deg,var(--rouge),#E74C3C);}
.sc-bleu::before{background:linear-gradient(90deg,var(--bleu),#2563EB);}
.sc-vert::before{background:linear-gradient(90deg,var(--vert),#2ECC71);}
.stat-ico{font-size:28px;margin-bottom:10px;}
.stat-val{font-family:'Playfair Display',serif;font-size:32px;font-weight:900;line-height:1;margin-bottom:4px;}
.sc-rouge .stat-val{color:var(--rouge);}
.sc-bleu .stat-val{color:var(--bleu);}
.sc-vert .stat-val{color:var(--vert);}
.stat-lbl{font-size:12px;color:var(--texte-doux);}
.card{background:var(--blanc);border-radius:16px;box-shadow:var(--ombre);border:1px solid var(--bordure);overflow:hidden;}
.card-head{padding:16px 22px;border-bottom:1px solid var(--bordure);display:flex;align-items:center;justify-content:space-between;background:rgba(26,58,108,0.02);}
.card-title{font-family:'Playfair Display',serif;font-size:15px;font-weight:700;color:var(--bleu);display:flex;align-items:center;gap:9px;}
.card-title .dot{width:8px;height:8px;border-radius:50%;background:var(--rouge);}
.search-bar{display:flex;gap:10px;padding:14px 18px;border-bottom:1px solid var(--bordure);background:var(--fond);}
.search-wrap{position:relative;flex:1;}
.search-ico{position:absolute;left:11px;top:50%;transform:translateY(-50%);font-size:14px;color:#CCC;pointer-events:none;}
.search-input{width:100%;padding:9px 14px 9px 36px;border:1.5px solid var(--bordure);border-radius:9px;font-size:13px;font-family:'DM Sans',sans-serif;background:#fff;outline:none;transition:border-color 0.2s;}
.search-input:focus{border-color:var(--bleu);}
.tbl-wrap{overflow-x:auto;}
table{width:100%;border-collapse:collapse;}
thead tr{background:var(--bleu-f);}
th{text-align:left;padding:11px 14px;font-size:10px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:rgba(255,255,255,0.7);}
td{padding:12px 14px;font-size:12.5px;border-bottom:1px solid var(--bordure);color:var(--texte);vertical-align:middle;}
tr:last-child td{border-bottom:none;}
tr:hover td{background:rgba(26,58,108,0.02);}
.code-pill{font-family:'DM Mono',monospace;font-size:10.5px;background:var(--fond);padding:2px 8px;border-radius:5px;color:var(--bleu);border:1px solid var(--bordure);}
.etab-cell{display:flex;align-items:center;gap:10px;}
.etab-av{width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,var(--bleu),var(--bleu-f));display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;font-size:13px;flex-shrink:0;}
.badge{display:inline-flex;align-items:center;gap:4px;font-size:10.5px;font-weight:700;padding:3px 10px;border-radius:20px;}
.badge-bleu{background:rgba(26,58,108,0.1);color:var(--bleu);}
.badge-vert{background:rgba(39,174,96,0.1);color:var(--vert);}
.actions{display:flex;gap:5px;}
.modal-overlay{position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:1000;display:none;align-items:center;justify-content:center;}
.modal-overlay.show{display:flex;}
.modal-box{background:#fff;border-radius:16px;padding:32px;max-width:400px;width:90%;box-shadow:var(--ombre-forte);text-align:center;}
.modal-ico{font-size:48px;margin-bottom:16px;}
.modal-titre{font-family:'Playfair Display',serif;font-size:20px;font-weight:700;margin-bottom:8px;}
.modal-desc{font-size:13px;color:var(--texte-doux);line-height:1.6;margin-bottom:24px;}
.modal-actions{display:flex;gap:10px;justify-content:center;}
.fi{opacity:0;transform:translateY(14px);animation:fadeUp 0.45s ease forwards;}
@keyframes fadeUp{to{opacity:1;transform:translateY(0)}}
.d1{animation-delay:0.05s}.d2{animation-delay:0.1s}.d3{animation-delay:0.15s}
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
        <a href="{{ route('super_admin.dashboard') }}" class="nav-item"><span class="ni">🏠</span> Tableau de bord</a>
        <div class="nav-section">Administration</div>
        <a href="{{ route('super_admin.utilisateurs.index') }}" class="nav-item"><span class="ni">👥</span> Utilisateurs</a>
        <a href="{{ route('super_admin.candidats.index') }}" class="nav-item"><span class="ni">👨‍🎓</span> Candidats</a>
        <a href="{{ route('super_admin.etablissements.index') }}" class="nav-item active"><span class="ni">🏫</span> Établissements</a>
        <a href="#" class="nav-item"><span class="ni">🏛️</span> Centres</a>
        <div class="nav-section">Examens</div>
        <a href="#" class="nav-item"><span class="ni">🗂️</span> Séries</a>
        <a href="#" class="nav-item"><span class="ni">📚</span> Épreuves</a>
        <div class="nav-section">Système</div>
        <a href="#" class="nav-item"><span class="ni">⚙️</span> Paramètres</a>
    </nav>
    <div class="sb-user">
        <div class="user-av">{{ strtoupper(substr(session('utilisateur_nom','SA'),0,2)) }}</div>
        <div class="user-info">
            <div class="uname">{{ session('utilisateur_nom','Super Admin') }}</div>
            <div class="urole">Super Administrateur</div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">🚪</button>
        </form>
    </div>
</aside>

<main class="main">
    <div class="topbar">
        <div>
            <div class="page-title">Gestion des <span>Établissements</span></div>
            <div class="breadcrumb">Super Admin · {{ $stats['total'] }} établissements · BAC 2026</div>
        </div>
        <div class="topbar-right" style="display:flex;gap:10px;">
            <a href="{{ route('super_admin.etablissements.create') }}" class="btn btn-primary">+ Nouvel établissement</a>
        </div>
    </div>

    <div class="content">

        @if(session('success'))
            <div class="alert alert-success fi">✅ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error fi">⚠️ {{ session('error') }}</div>
        @endif

        <div class="stats-grid fi">
            <div class="stat-card sc-rouge">
                <div class="stat-ico">🏫</div>
                <div class="stat-val">{{ $stats['total'] }}</div>
                <div class="stat-lbl">Total établissements</div>
            </div>
            <div class="stat-card sc-bleu">
                <div class="stat-ico">🏛️</div>
                <div class="stat-val">{{ $stats['centres'] }}</div>
                <div class="stat-lbl">Centres d'examen</div>
            </div>
            <div class="stat-card sc-vert">
                <div class="stat-ico">📚</div>
                <div class="stat-val">{{ $stats['classes'] }}</div>
                <div class="stat-lbl">Classes total</div>
            </div>
        </div>

        <div class="card fi d2">
            <div class="card-head">
                <div class="card-title"><div class="dot"></div> Liste des Établissements</div>
                <a href="{{ route('super_admin.etablissements.create') }}" class="btn btn-primary btn-sm">+ Ajouter</a>
            </div>

            <div class="search-bar">
                <div class="search-wrap">
                    <span class="search-ico">🔍</span>
                    <input type="text" class="search-input" id="searchInput"
                           placeholder="Rechercher code, intitulé, responsable..."
                           oninput="filtrer()">
                </div>
            </div>

            <div class="tbl-wrap">
                <table id="tableEtab">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Établissement</th>
                            <th>Responsable</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Centres</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($etablissements as $e)
                        <tr data-search="{{ strtolower($e->code . ' ' . $e->intitule . ' ' . $e->responsable) }}">
                            <td><span class="code-pill">{{ $e->code }}</span></td>
                            <td>
                                <div class="etab-cell">
                                    <div class="etab-av">{{ strtoupper(substr($e->intitule, 0, 2)) }}</div>
                                    <div>
                                        <div style="font-weight:600;">{{ $e->intitule }}</div>
                                        @if($e->code_matricule)
                                            <div style="font-size:10.5px;color:var(--texte-doux)">Mat: {{ $e->code_matricule }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>{{ $e->responsable }}</td>
                            <td style="font-family:'DM Mono',monospace;font-size:11.5px;">{{ $e->telephone }}</td>
                            <td style="font-size:11.5px;">{{ $e->email ?: '—' }}</td>
                            <td>
                                <span class="badge badge-bleu">🏛️ {{ $e->nb_centres }}</span>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('super_admin.etablissements.edit', $e->id_etab) }}"
                                       class="btn btn-bleu btn-sm">✏️</a>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="confirmerSupp({{ $e->id_etab }}, '{{ addslashes($e->intitule) }}')">🗑</button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" style="text-align:center;padding:40px;color:var(--texte-doux);">
                                Aucun établissement trouvé.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<div class="modal-overlay" id="modalSupp">
    <div class="modal-box">
        <div class="modal-ico">🗑️</div>
        <div class="modal-titre">Confirmer la suppression</div>
        <div class="modal-desc" id="modalDesc">Supprimer cet établissement ?</div>
        <div class="modal-actions">
            <button class="btn btn-outline" onclick="fermerModal()">Annuler</button>
            <form id="formSupp" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary">Supprimer</button>
            </form>
        </div>
    </div>
</div>

<script>
function filtrer() {
    var search = document.getElementById('searchInput').value.toLowerCase();
    var rows = document.querySelectorAll('#tableEtab tbody tr');
    rows.forEach(function(row) {
        row.style.display = (!search || row.dataset.search.includes(search)) ? '' : 'none';
    });
}
function confirmerSupp(id, nom) {
    document.getElementById('modalDesc').innerHTML = 'Supprimer <strong>' + nom + '</strong> ?<br>Les centres liés seront aussi supprimés.';
    document.getElementById('formSupp').action = '/super-admin/etablissements/' + id;
    document.getElementById('modalSupp').classList.add('show');
}
function fermerModal() {
    document.getElementById('modalSupp').classList.remove('show');
}
document.getElementById('modalSupp').addEventListener('click', function(e) {
    if (e.target === this) fermerModal();
});
</script>
</body>
</html>