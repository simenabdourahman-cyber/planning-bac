<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gestionnaire Examens — Système BAC 2026</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{
    --rouge:#C0392B;--rouge-f:#96281B;--rouge-cl:#E74C3C;
    --bleu:#1A3A6C;--bleu-f:#0F2451;--bleu-cl:#2563EB;
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
.sb-logo{width:48px;height:48px;border-radius:50%;background:#fff;padding:3px;flex-shrink:0;box-shadow:0 2px 12px rgba(0,0,0,0.2);overflow:hidden;}
.sb-logo img{width:100%;height:100%;object-fit:cover;border-radius:50%;}
.sb-brand .name{font-family:'Playfair Display',serif;font-size:13px;font-weight:700;color:#fff;line-height:1.3;}
.sb-brand .sub{font-size:9.5px;color:rgba(255,255,255,0.4);letter-spacing:0.1em;text-transform:uppercase;margin-top:2px;}
.sb-nav{flex:1;padding:12px 10px;overflow-y:auto;}
.nav-section{font-size:9px;letter-spacing:0.2em;text-transform:uppercase;color:rgba(255,255,255,0.3);padding:14px 12px 6px;font-weight:700;}
.nav-item{display:flex;align-items:center;gap:10px;padding:10px 13px;border-radius:10px;cursor:pointer;color:rgba(255,255,255,0.6);font-size:13px;font-weight:500;margin-bottom:2px;transition:all 0.2s;text-decoration:none;}
.nav-item:hover{background:rgba(255,255,255,0.08);color:#fff;}
.nav-item.active{background:linear-gradient(135deg,var(--rouge),var(--rouge-f));color:#fff;box-shadow:0 4px 16px rgba(192,57,43,0.4);}
.nav-item .ni{font-size:16px;width:20px;text-align:center;}
.nav-badge{margin-left:auto;background:var(--or);color:#1C1C1C;font-size:9.5px;font-weight:700;padding:2px 7px;border-radius:20px;}
.sb-user{padding:14px 16px;border-top:1px solid rgba(255,255,255,0.08);display:flex;align-items:center;gap:10px;}
.user-av{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--rouge),var(--or));display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;font-size:13px;flex-shrink:0;}
.user-info .uname{color:#fff;font-size:12.5px;font-weight:600;}
.user-info .urole{color:rgba(255,255,255,0.4);font-size:10px;}
.logout-btn{margin-left:auto;background:rgba(192,57,43,0.2);border:none;border-radius:8px;padding:6px 8px;color:rgba(255,255,255,0.6);cursor:pointer;font-size:13px;transition:all 0.2s;}
.logout-btn:hover{background:var(--rouge);color:#fff;}

/* MAIN */
.main{margin-left:255px;flex:1;display:flex;flex-direction:column;min-height:100vh;}

/* TOPBAR */
.topbar{position:sticky;top:0;z-index:50;background:rgba(244,242,237,0.94);backdrop-filter:blur(16px);border-bottom:1px solid var(--bordure);padding:0 28px;height:62px;display:flex;align-items:center;justify-content:space-between;}
.page-title{font-family:'Playfair Display',serif;font-size:19px;font-weight:700;color:var(--bleu);}
.page-title span{color:var(--rouge);}
.breadcrumb{font-size:11.5px;color:var(--texte-doux);margin-top:2px;}
.topbar-right{display:flex;align-items:center;gap:10px;}
.session-pill{display:flex;align-items:center;gap:7px;background:var(--bleu-f);color:#fff;padding:6px 14px;border-radius:8px;font-size:11.5px;font-weight:600;}
.s-dot{width:7px;height:7px;border-radius:50%;background:var(--vert);animation:pulse 2s infinite;}
@keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:0.5;transform:scale(1.3)}}
.btn{padding:7px 16px;border-radius:8px;font-size:12px;font-weight:600;cursor:pointer;border:none;font-family:'DM Sans',sans-serif;transition:all 0.2s;}
.btn-primary{background:linear-gradient(135deg,var(--rouge),var(--rouge-f));color:#fff;box-shadow:0 4px 14px rgba(192,57,43,0.3);}
.btn-primary:hover{transform:translateY(-1px);}
.btn-outline{background:transparent;border:1.5px solid var(--bordure);color:var(--texte-doux);}
.btn-outline:hover{border-color:var(--rouge);color:var(--rouge);}
.btn-vert{background:linear-gradient(135deg,var(--vert),#1E8449);color:#fff;box-shadow:0 4px 14px rgba(39,174,96,0.3);}

/* CONTENT */
.content{padding:28px;flex:1;}

/* HERO */
.hero{background:linear-gradient(135deg,var(--bleu-f) 0%,#0D1F4A 55%,#1A3A6C 100%);border-radius:18px;padding:26px 30px;margin-bottom:26px;display:flex;align-items:center;justify-content:space-between;position:relative;overflow:hidden;box-shadow:0 8px 40px rgba(15,36,81,0.3);}
.hero::before{content:'';position:absolute;right:-50px;top:-50px;width:280px;height:280px;border-radius:50%;background:rgba(255,255,255,0.03);}
.hero-text{z-index:1;}
.hero-eye{font-size:9.5px;letter-spacing:0.2em;text-transform:uppercase;color:rgba(255,255,255,0.45);font-weight:700;margin-bottom:8px;}
.hero-title{font-family:'Playfair Display',serif;font-size:24px;font-weight:900;color:#fff;margin-bottom:5px;}
.hero-title em{color:var(--or);font-style:normal;}
.hero-sub{font-size:12.5px;color:rgba(255,255,255,0.55);}
.hero-actions{display:flex;gap:10px;z-index:1;}
.btn-hero{padding:10px 20px;border-radius:10px;font-size:12.5px;font-weight:700;cursor:pointer;border:none;font-family:'DM Sans',sans-serif;transition:all 0.2s;}
.btn-hero-p{background:linear-gradient(135deg,var(--rouge),var(--rouge-f));color:#fff;box-shadow:0 4px 16px rgba(192,57,43,0.4);}
.btn-hero-p:hover{transform:translateY(-2px);}
.btn-hero-o{background:rgba(255,255,255,0.1);color:#fff;border:1.5px solid rgba(255,255,255,0.2);}

/* STATS */
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:24px;}
.stat-card{background:var(--blanc);border-radius:16px;padding:22px;box-shadow:var(--ombre);border:1px solid var(--bordure);position:relative;overflow:hidden;transition:transform 0.2s,box-shadow 0.2s;cursor:pointer;}
.stat-card:hover{transform:translateY(-3px);box-shadow:var(--ombre-forte);}
.stat-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;}
.sc-rouge::before{background:linear-gradient(90deg,var(--rouge),var(--rouge-cl));}
.sc-bleu::before{background:linear-gradient(90deg,var(--bleu),var(--bleu-cl));}
.sc-vert::before{background:linear-gradient(90deg,var(--vert),#2ECC71);}
.sc-or::before{background:linear-gradient(90deg,var(--or-f),var(--or));}
.stat-ico{width:42px;height:42px;border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:19px;margin-bottom:14px;}
.sc-rouge .stat-ico{background:rgba(192,57,43,0.1);}
.sc-bleu .stat-ico{background:rgba(26,58,108,0.1);}
.sc-vert .stat-ico{background:rgba(39,174,96,0.1);}
.sc-or .stat-ico{background:rgba(245,200,66,0.12);}
.stat-val{font-family:'Playfair Display',serif;font-size:34px;font-weight:900;line-height:1;margin-bottom:5px;}
.sc-rouge .stat-val{color:var(--rouge);}
.sc-bleu .stat-val{color:var(--bleu);}
.sc-vert .stat-val{color:var(--vert);}
.sc-or .stat-val{color:var(--or-f);}
.stat-lbl{font-size:12px;color:var(--texte-doux);font-weight:500;}
.stat-trend{position:absolute;top:20px;right:20px;font-size:10.5px;font-weight:700;padding:3px 8px;border-radius:20px;background:rgba(39,174,96,0.1);color:var(--vert);}

/* CARD */
.card{background:var(--blanc);border-radius:16px;box-shadow:var(--ombre);border:1px solid var(--bordure);overflow:hidden;}
.card-head{padding:18px 22px;border-bottom:1px solid var(--bordure);display:flex;align-items:center;justify-content:space-between;}
.card-title{font-family:'Playfair Display',serif;font-size:15px;font-weight:700;color:var(--bleu);display:flex;align-items:center;gap:9px;}
.card-title .dot{width:8px;height:8px;border-radius:50%;background:var(--rouge);}

/* CALENDRIER */
.cal-header{display:grid;grid-template-columns:repeat(7,1fr);background:var(--bleu);}
.cal-day-lbl{text-align:center;padding:9px 4px;font-size:10px;font-weight:700;letter-spacing:0.08em;color:rgba(255,255,255,0.65);text-transform:uppercase;}
.cal-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:1px;background:var(--bordure);}
.cal-cell{background:var(--blanc);min-height:72px;padding:7px;}
.cal-cell.autre{background:#FAFAF9;}
.cal-cell.today{background:rgba(192,57,43,0.04);}
.cal-num{font-size:11.5px;font-weight:600;color:var(--texte-doux);margin-bottom:3px;}
.cal-cell.today .cal-num{color:var(--rouge);font-weight:800;}
.cal-cell.autre .cal-num{color:#CCC;}
.chip{display:block;font-size:8.5px;font-weight:700;padding:2px 5px;border-radius:4px;margin-bottom:2px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;cursor:pointer;}
.chip-r{background:rgba(192,57,43,0.12);color:var(--rouge);}
.chip-b{background:rgba(26,58,108,0.1);color:var(--bleu);}
.chip-v{background:rgba(39,174,96,0.12);color:var(--vert);}
.chip-o{background:rgba(230,168,23,0.12);color:var(--or-f);}
.cal-legend{padding:12px 18px;display:flex;gap:16px;background:var(--fond);border-top:1px solid var(--bordure);flex-wrap:wrap;}
.leg-item{display:flex;align-items:center;gap:5px;font-size:10.5px;color:var(--texte-doux);}
.leg-dot{width:9px;height:9px;border-radius:2px;}

/* MAIN GRID */
.main-grid{display:grid;grid-template-columns:1fr 310px;gap:22px;margin-bottom:22px;}

/* EPREUVES */
.ep-list{padding:4px 0;}
.ep-item{display:flex;gap:13px;align-items:flex-start;padding:14px 20px;border-bottom:1px solid var(--bordure);cursor:pointer;transition:background 0.15s;}
.ep-item:last-child{border-bottom:none;}
.ep-item:hover{background:var(--fond);}
.ep-time{font-family:'DM Mono',monospace;font-size:10.5px;font-weight:500;color:var(--texte-doux);white-space:nowrap;padding-top:2px;min-width:90px;}
.ep-info .ep-mat{font-size:13px;font-weight:600;color:var(--texte);}
.ep-info .ep-detail{font-size:11px;color:var(--texte-doux);margin-top:3px;}
.ep-type{margin-left:auto;font-size:10px;font-weight:700;padding:3px 8px;border-radius:6px;white-space:nowrap;flex-shrink:0;}

/* CENTRES */
.centre-list{padding:4px 0;}
.centre-item{display:flex;align-items:center;gap:11px;padding:12px 20px;border-bottom:1px solid var(--bordure);cursor:pointer;transition:background 0.15s;}
.centre-item:last-child{border-bottom:none;}
.centre-item:hover{background:var(--fond);}
.c-ico{font-size:20px;}
.c-nom{font-size:13px;font-weight:600;}
.c-detail{font-size:10.5px;color:var(--texte-doux);margin-top:2px;}
.c-status{margin-left:auto;font-size:10px;font-weight:700;padding:3px 9px;border-radius:20px;}
.cs-ok{background:rgba(39,174,96,0.1);color:var(--vert);}
.cs-warn{background:rgba(230,168,23,0.12);color:var(--or-f);}

/* BOTTOM GRID */
.bottom-grid{display:grid;grid-template-columns:1fr 1fr;gap:22px;}

/* ENSEIGNANTS */
.ens-list{padding:4px 0;}
.ens-item{display:flex;align-items:center;gap:12px;padding:12px 20px;border-bottom:1px solid var(--bordure);cursor:pointer;transition:background 0.15s;}
.ens-item:last-child{border-bottom:none;}
.ens-item:hover{background:var(--fond);}
.ens-av{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--bleu),var(--bleu-cl));display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;font-size:12px;flex-shrink:0;}
.ens-info .ens-nom{font-size:13px;font-weight:600;}
.ens-info .ens-mat{font-size:11px;color:var(--texte-doux);margin-top:1px;}
.ens-role{margin-left:auto;}

/* MATIÈRES */
.mat-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px;padding:16px;}
.mat-item{background:var(--fond);border-radius:10px;padding:12px 14px;border:1.5px solid var(--bordure);cursor:pointer;transition:all 0.2s;}
.mat-item:hover{border-color:var(--bleu);background:#fff;}
.mat-code{font-family:'DM Mono',monospace;font-size:10px;font-weight:700;color:var(--bleu);margin-bottom:5px;}
.mat-nom{font-size:11.5px;font-weight:600;color:var(--texte);line-height:1.3;}
.mat-coeff{font-size:10px;color:var(--texte-doux);margin-top:3px;}

/* TABLE */
.tbl-wrap{overflow-x:auto;}
table{width:100%;border-collapse:collapse;}
thead tr{background:var(--fond);}
th{text-align:left;padding:10px 16px;font-size:10px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:var(--texte-doux);border-bottom:1px solid var(--bordure);}
td{padding:11px 16px;font-size:12.5px;border-bottom:1px solid var(--bordure);color:var(--texte);}
tr:last-child td{border-bottom:none;}
tr:hover td{background:var(--fond);}
.badge{display:inline-flex;align-items:center;gap:4px;font-size:10.5px;font-weight:700;padding:3px 10px;border-radius:20px;}
.badge-rouge{background:rgba(192,57,43,0.1);color:var(--rouge);}
.badge-bleu{background:rgba(26,58,108,0.1);color:var(--bleu);}
.badge-vert{background:rgba(39,174,96,0.1);color:var(--vert);}
.badge-or{background:rgba(230,168,23,0.12);color:var(--or-f);}
.code-pill{font-family:'DM Mono',monospace;font-size:10.5px;background:var(--fond);padding:2px 8px;border-radius:5px;color:var(--bleu);}

/* FADE */
.fi{opacity:0;transform:translateY(14px);animation:fadeUp 0.45s ease forwards;}
@keyframes fadeUp{to{opacity:1;transform:translateY(0)}}
.d1{animation-delay:0.05s}.d2{animation-delay:0.1s}.d3{animation-delay:0.15s}.d4{animation-delay:0.2s}.d5{animation-delay:0.25s}
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
        <a href="{{ route('gest_examen.dashboard') }}" class="nav-item active">
            <span class="ni">🏠</span> Tableau de bord
        </a>
        <div class="nav-section">Examens</div>
        <a href="{{ route('gest_examen.planning') }}" class="nav-item">
            <span class="ni">📅</span> Planning Examens
            <span class="nav-badge">12</span>
        </a>
        <a href="{{ route('gest_examen.epreuves') }}" class="nav-item">
            <span class="ni">📋</span> Épreuves
        </a>
        <a href="{{ route('gest_examen.centres') }}" class="nav-item">
            <span class="ni">🏛️</span> Centres d'Examen
        </a>
        <a href="{{ route('gest_examen.enseignants') }}" class="nav-item">
            <span class="ni">👨‍🏫</span> Enseignants Surveillants
        </a>
        <div class="nav-section">Ressources</div>
        <a href="#" class="nav-item">
            <span class="ni">📚</span> Matières & Parcours
        </a>
        <a href="#" class="nav-item">
            <span class="ni">🗂️</span> Séries & Spécialités
        </a>
        <a href="#" class="nav-item">
            <span class="ni">🚪</span> Salles
        </a>
        <div class="nav-section">Rapports</div>
        <a href="#" class="nav-item">
            <span class="ni">📊</span> Statistiques
        </a>
        <a href="#" class="nav-item">
            <span class="ni">🖨️</span> Impressions
        </a>
    </nav>
    <div class="sb-user">
        <div class="user-av">{{ strtoupper(substr(session('utilisateur_nom','GE'),0,2)) }}</div>
        <div class="user-info">
            <div class="uname">{{ session('utilisateur_nom','Gest. Examens') }}</div>
            <div class="urole">Gestionnaire d'Examens</div>
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
            <div class="page-title">Gestionnaire <span>d'Examens</span></div>
            <div class="breadcrumb">Tableau de bord · Session BAC 2026</div>
        </div>
        <div class="topbar-right">
            <div class="session-pill"><div class="s-dot"></div>Session Principale 2026</div>
            <button class="btn btn-outline">📤 Exporter</button>
            <button class="btn btn-primary">+ Nouvelle Épreuve</button>
        </div>
    </div>

    <div class="content">

        {{-- HERO --}}
        <div class="hero fi">
            <div class="hero-text">
                <div class="hero-eye">Gestion des Examens — BAC Général 2026</div>
                <div class="hero-title">Bienvenue, <em>{{ session('utilisateur_nom','Gestionnaire') }}</em> 📋</div>
                <div class="hero-sub">Planification des épreuves, affectation des centres et des enseignants · Session 2026</div>
            </div>
            <div class="hero-actions">
                <button class="btn-hero btn-hero-p">📅 Planning</button>
                <button class="btn-hero btn-hero-o">🏛️ Centres</button>
            </div>
        </div>

        {{-- STATS --}}
        <div class="stats-grid">
            <div class="stat-card sc-rouge fi d1">
                <div class="stat-ico">📋</div>
                <div class="stat-val">127</div>
                <div class="stat-lbl">Épreuves planifiées</div>
                <div class="stat-trend">Actif</div>
            </div>
            <div class="stat-card sc-bleu fi d2">
                <div class="stat-ico">🏛️</div>
                <div class="stat-val">18</div>
                <div class="stat-lbl">Centres d'examen</div>
                <div class="stat-trend">+2</div>
            </div>
            <div class="stat-card sc-vert fi d3">
                <div class="stat-ico">👨‍🏫</div>
                <div class="stat-val">342</div>
                <div class="stat-lbl">Enseignants affectés</div>
                <div class="stat-trend">Complet</div>
            </div>
            <div class="stat-card sc-or fi d4">
                <div class="stat-ico">🚪</div>
                <div class="stat-val">20</div>
                <div class="stat-lbl">Salles disponibles</div>
                <div class="stat-trend">Prêtes</div>
            </div>
        </div>

        {{-- MAIN GRID --}}
        <div class="main-grid">

            {{-- CALENDRIER PLANNING --}}
            <div class="card fi d2">
                <div class="card-head">
                    <div class="card-title"><div class="dot"></div> Planning — Juin 2026</div>
                    <div style="display:flex;gap:8px;">
                        <button class="btn btn-outline" style="padding:5px 12px;font-size:11px;">◀ Mai</button>
                        <button class="btn btn-outline" style="padding:5px 12px;font-size:11px;">Juillet ▶</button>
                    </div>
                </div>
                <div class="cal-header">
                    <div class="cal-day-lbl">Lun</div><div class="cal-day-lbl">Mar</div>
                    <div class="cal-day-lbl">Mer</div><div class="cal-day-lbl">Jeu</div>
                    <div class="cal-day-lbl">Ven</div><div class="cal-day-lbl">Sam</div>
                    <div class="cal-day-lbl">Dim</div>
                </div>
                <div class="cal-grid">
                    <div class="cal-cell autre"><div class="cal-num">26</div></div>
                    <div class="cal-cell autre"><div class="cal-num">27</div></div>
                    <div class="cal-cell autre"><div class="cal-num">28</div></div>
                    <div class="cal-cell autre"><div class="cal-num">29</div></div>
                    <div class="cal-cell autre"><div class="cal-num">30</div></div>
                    <div class="cal-cell autre"><div class="cal-num">31</div></div>
                    <div class="cal-cell"><div class="cal-num">1</div></div>

                    <div class="cal-cell"><div class="cal-num">2</div>
                        <span class="chip chip-b">Français (ES/L)</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">3</div>
                        <span class="chip chip-r">Maths (S/SG)</span>
                        <span class="chip chip-v">SVT (S)</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">4</div>
                        <span class="chip chip-o">Philosophie</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">5</div>
                        <span class="chip chip-b">Hist-Géo</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">6</div>
                        <span class="chip chip-r">Physique (S)</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">7</div></div>
                    <div class="cal-cell"><div class="cal-num">8</div></div>

                    <div class="cal-cell"><div class="cal-num">9</div>
                        <span class="chip chip-v">Arabe</span>
                    </div>
                    <div class="cal-cell today"><div class="cal-num">10</div>
                        <span class="chip chip-r">Anglais LV1</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">11</div>
                        <span class="chip chip-b">Économie (ES)</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">12</div>
                        <span class="chip chip-o">EPS</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">13</div>
                        <span class="chip chip-r">Maths (ES/L)</span>
                        <span class="chip chip-v">Chimie (S)</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">14</div></div>
                    <div class="cal-cell"><div class="cal-num">15</div></div>

                    <div class="cal-cell"><div class="cal-num">16</div>
                        <span class="chip chip-b">Français Écrit</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">17</div>
                        <span class="chip chip-o">Biologie (S)</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">18</div>
                        <span class="chip chip-r">Informatique</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">19</div>
                        <span class="chip chip-v">LV2</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">20</div>
                        <span class="chip chip-b">Management</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">21</div></div>
                    <div class="cal-cell"><div class="cal-num">22</div></div>

                    <div class="cal-cell"><div class="cal-num">23</div>
                        <span class="chip chip-r">Oral Rattrapage</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">24</div>
                        <span class="chip chip-o">Oral Rattrapage</span>
                    </div>
                    <div class="cal-cell"><div class="cal-num">25</div></div>
                    <div class="cal-cell"><div class="cal-num">26</div></div>
                    <div class="cal-cell"><div class="cal-num">27</div></div>
                    <div class="cal-cell"><div class="cal-num">28</div></div>
                    <div class="cal-cell"><div class="cal-num">29</div></div>

                    <div class="cal-cell"><div class="cal-num">30</div>
                        <span class="chip chip-v">Délibérations</span>
                    </div>
                    <div class="cal-cell autre"><div class="cal-num">1</div></div>
                    <div class="cal-cell autre"><div class="cal-num">2</div></div>
                    <div class="cal-cell autre"><div class="cal-num">3</div></div>
                    <div class="cal-cell autre"><div class="cal-num">4</div></div>
                    <div class="cal-cell autre"><div class="cal-num">5</div></div>
                    <div class="cal-cell autre"><div class="cal-num">6</div></div>
                </div>
                <div class="cal-legend">
                    <div class="leg-item"><div class="leg-dot" style="background:rgba(192,57,43,0.4)"></div>Sciences exactes</div>
                    <div class="leg-item"><div class="leg-dot" style="background:rgba(26,58,108,0.4)"></div>Sciences humaines</div>
                    <div class="leg-item"><div class="leg-dot" style="background:rgba(39,174,96,0.4)"></div>Langues / Nat.</div>
                    <div class="leg-item"><div class="leg-dot" style="background:rgba(230,168,23,0.5)"></div>Épreuves orales</div>
                </div>
            </div>

            {{-- CENTRES + ÉPREUVES --}}
            <div style="display:flex;flex-direction:column;gap:22px;">

                {{-- CENTRES --}}
                <div class="card fi d3">
                    <div class="card-head">
                        <div class="card-title"><div class="dot"></div> Centres d'Examen</div>
                        <button class="btn btn-outline" style="padding:5px 12px;font-size:11px;">Gérer</button>
                    </div>
                    <div class="centre-list">
                        <div class="centre-item">
                            <div class="c-ico">🏛️</div>
                            <div>
                                <div class="c-nom">Lycée d'État de Djibouti</div>
                                <div class="c-detail">LY-DJ · 20 salles · 500 candidats</div>
                            </div>
                            <span class="c-status cs-ok">✓ Prêt</span>
                        </div>
                        <div class="centre-item">
                            <div class="c-ico">🏫</div>
                            <div>
                                <div class="c-nom">Lycée Djama Youssouf</div>
                                <div class="c-detail">LY-DMY · 18 salles · 450 candidats</div>
                            </div>
                            <span class="c-status cs-ok">✓ Prêt</span>
                        </div>
                        <div class="centre-item">
                            <div class="c-ico">🏢</div>
                            <div>
                                <div class="c-nom">Univ. Djibouti Balbala</div>
                                <div class="c-detail">UD-BALBALA · 15 salles</div>
                            </div>
                            <span class="c-status cs-warn">⏳ En cours</span>
                        </div>
                        <div class="centre-item">
                            <div class="c-ico">🏫</div>
                            <div>
                                <div class="c-nom">Lycée PK12</div>
                                <div class="c-detail">LY-PK12 · 12 salles · 300 candidats</div>
                            </div>
                            <span class="c-status cs-ok">✓ Prêt</span>
                        </div>
                    </div>
                </div>

                {{-- PROCHAINES ÉPREUVES --}}
                <div class="card fi d4">
                    <div class="card-head">
                        <div class="card-title"><div class="dot"></div> Prochaines Épreuves</div>
                        <button class="btn btn-primary" style="padding:5px 12px;font-size:11px;">+ Planifier</button>
                    </div>
                    <div class="ep-list">
                        <div class="ep-item">
                            <div class="ep-time">02/06 · 07h30</div>
                            <div class="ep-info">
                                <div class="ep-mat">Français — Écrit</div>
                                <div class="ep-detail">Séries ES/L · 4h · Coeff. 4</div>
                            </div>
                            <span class="ep-type" style="background:rgba(26,58,108,0.1);color:var(--bleu)">Écrit</span>
                        </div>
                        <div class="ep-item">
                            <div class="ep-time">03/06 · 07h30</div>
                            <div class="ep-info">
                                <div class="ep-mat">Mathématiques</div>
                                <div class="ep-detail">Séries S/SG · 4h · Coeff. 7</div>
                            </div>
                            <span class="ep-type" style="background:rgba(192,57,43,0.1);color:var(--rouge)">Écrit</span>
                        </div>
                        <div class="ep-item">
                            <div class="ep-time">04/06 · 07h30</div>
                            <div class="ep-info">
                                <div class="ep-mat">Philosophie</div>
                                <div class="ep-detail">Toutes séries · 4h · Coeff. 4</div>
                            </div>
                            <span class="ep-type" style="background:rgba(230,168,23,0.12);color:var(--or-f)">Écrit</span>
                        </div>
                        <div class="ep-item">
                            <div class="ep-time">23/06 · 08h00</div>
                            <div class="ep-info">
                                <div class="ep-mat">Oral — Rattrapage</div>
                                <div class="ep-detail">Toutes séries · 2ème session</div>
                            </div>
                            <span class="ep-type" style="background:rgba(39,174,96,0.1);color:var(--vert)">Oral</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- BOTTOM GRID --}}
        <div class="bottom-grid">

            {{-- ENSEIGNANTS SURVEILLANTS --}}
            <div class="card fi d3">
                <div class="card-head">
                    <div class="card-title"><div class="dot"></div> Enseignants Surveillants</div>
                    <button class="btn btn-vert" style="padding:5px 12px;font-size:11px;">+ Affecter</button>
                </div>
                <div class="tbl-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Nom</th>
                                <th>Rôle</th>
                                <th>Centre</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="code-pill">ENS-001</span></td>
                                <td><strong>Ahmed Hassan Ali</strong></td>
                                <td><span class="badge badge-bleu">Surveillant</span></td>
                                <td>LED Djibouti</td>
                                <td><span class="badge badge-vert">✓ Affecté</span></td>
                            </tr>
                            <tr>
                                <td><span class="code-pill">ENS-002</span></td>
                                <td><strong>Fatima Omar Wais</strong></td>
                                <td><span class="badge badge-rouge">Correcteur</span></td>
                                <td>Nour-Gouled</td>
                                <td><span class="badge badge-vert">✓ Affecté</span></td>
                            </tr>
                            <tr>
                                <td><span class="code-pill">ENS-003</span></td>
                                <td><strong>Mohamoud Ali Dini</strong></td>
                                <td><span class="badge badge-or">Chef Centre</span></td>
                                <td>Balbala</td>
                                <td><span class="badge badge-or">⏳ En attente</span></td>
                            </tr>
                            <tr>
                                <td><span class="code-pill">ENS-004</span></td>
                                <td><strong>Hodan Ismail Robleh</strong></td>
                                <td><span class="badge badge-bleu">Surveillant</span></td>
                                <td>PK12</td>
                                <td><span class="badge badge-vert">✓ Affecté</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- MATIÈRES --}}
            <div class="card fi d4">
                <div class="card-head">
                    <div class="card-title"><div class="dot"></div> Matières BAC 2026</div>
                    <button class="btn btn-outline" style="padding:5px 12px;font-size:11px;">Voir tout</button>
                </div>
                <div class="mat-grid">
                    <div class="mat-item">
                        <div class="mat-code">MATH</div>
                        <div class="mat-nom">Mathématiques</div>
                        <div class="mat-coeff">Coeff. 7 (S) · 4 (ES)</div>
                    </div>
                    <div class="mat-item">
                        <div class="mat-code">PHY</div>
                        <div class="mat-nom">Physique-Chimie</div>
                        <div class="mat-coeff">Coeff. 6 (S)</div>
                    </div>
                    <div class="mat-item">
                        <div class="mat-code">SVT</div>
                        <div class="mat-nom">Sciences Vie & Terre</div>
                        <div class="mat-coeff">Coeff. 5 (S)</div>
                    </div>
                    <div class="mat-item">
                        <div class="mat-code">PHI</div>
                        <div class="mat-nom">Philosophie</div>
                        <div class="mat-coeff">Coeff. 4 (Toutes)</div>
                    </div>
                    <div class="mat-item">
                        <div class="mat-code">HG</div>
                        <div class="mat-nom">Histoire-Géographie</div>
                        <div class="mat-coeff">Coeff. 3 (Toutes)</div>
                    </div>
                    <div class="mat-item">
                        <div class="mat-code">FRE</div>
                        <div class="mat-nom">Français Écrit</div>
                        <div class="mat-coeff">Coeff. 4 (Toutes)</div>
                    </div>
                    <div class="mat-item">
                        <div class="mat-code">LV1</div>
                        <div class="mat-nom">Langue Vivante 1</div>
                        <div class="mat-coeff">Coeff. 3 (Toutes)</div>
                    </div>
                    <div class="mat-item">
                        <div class="mat-code">SES</div>
                        <div class="mat-nom">Sciences Éco. Soc.</div>
                        <div class="mat-coeff">Coeff. 5 (ES)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>