<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Super Admin — Système BAC 2026</title>
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

/* ── SIDEBAR ── */
.sidebar{
    position:fixed;left:0;top:0;bottom:0;width:255px;
    background:var(--bleu-f);
    display:flex;flex-direction:column;z-index:100;
    box-shadow:4px 0 32px rgba(15,36,81,0.35);
}
.sb-top{
    padding:20px 18px 16px;
    border-bottom:1px solid rgba(255,255,255,0.08);
    display:flex;align-items:center;gap:12px;
}
.sb-logo{
    width:48px;height:48px;border-radius:50%;
    background:#fff;padding:3px;flex-shrink:0;
    box-shadow:0 2px 12px rgba(0,0,0,0.2);
    overflow:hidden;
}
.sb-logo img{width:100%;height:100%;object-fit:cover;border-radius:50%;}
.sb-brand .name{
    font-family:'Playfair Display',serif;
    font-size:13px;font-weight:700;color:#fff;line-height:1.3;
}
.sb-brand .sub{font-size:9.5px;color:rgba(255,255,255,0.4);letter-spacing:0.1em;text-transform:uppercase;margin-top:2px;}

.sb-nav{flex:1;padding:12px 10px;overflow-y:auto;}
.nav-section{font-size:9px;letter-spacing:0.2em;text-transform:uppercase;color:rgba(255,255,255,0.3);padding:14px 12px 6px;font-weight:700;}
.nav-item{
    display:flex;align-items:center;gap:10px;
    padding:10px 13px;border-radius:10px;
    cursor:pointer;color:rgba(255,255,255,0.6);
    font-size:13px;font-weight:500;margin-bottom:2px;
    transition:all 0.2s;text-decoration:none;
}
.nav-item:hover{background:rgba(255,255,255,0.08);color:#fff;}
.nav-item.active{background:linear-gradient(135deg,var(--rouge),var(--rouge-f));color:#fff;box-shadow:0 4px 16px rgba(192,57,43,0.4);}
.nav-item .ni{font-size:16px;width:20px;text-align:center;}
.nav-badge{margin-left:auto;background:var(--or);color:#1C1C1C;font-size:9.5px;font-weight:700;padding:2px 7px;border-radius:20px;}

.sb-user{
    padding:14px 16px;border-top:1px solid rgba(255,255,255,0.08);
    display:flex;align-items:center;gap:10px;
}
.user-av{
    width:36px;height:36px;border-radius:50%;
    background:linear-gradient(135deg,var(--rouge),var(--or));
    display:flex;align-items:center;justify-content:center;
    font-weight:700;color:#fff;font-size:13px;flex-shrink:0;
}
.user-info .uname{color:#fff;font-size:12.5px;font-weight:600;}
.user-info .urole{color:rgba(255,255,255,0.4);font-size:10px;}
.logout-btn{
    margin-left:auto;background:rgba(192,57,43,0.2);
    border:none;border-radius:8px;padding:6px 8px;
    color:rgba(255,255,255,0.6);cursor:pointer;font-size:13px;
    transition:all 0.2s;
}
.logout-btn:hover{background:var(--rouge);color:#fff;}

/* ── MAIN ── */
.main{margin-left:255px;flex:1;display:flex;flex-direction:column;min-height:100vh;}

/* TOPBAR */
.topbar{
    position:sticky;top:0;z-index:50;
    background:rgba(244,242,237,0.94);
    backdrop-filter:blur(16px);
    border-bottom:1px solid var(--bordure);
    padding:0 28px;height:62px;
    display:flex;align-items:center;justify-content:space-between;
}
.topbar-left{display:flex;align-items:center;gap:14px;}
.page-title{font-family:'Playfair Display',serif;font-size:19px;font-weight:700;color:var(--bleu);}
.page-title span{color:var(--rouge);}
.breadcrumb{font-size:11.5px;color:var(--texte-doux);}

.topbar-right{display:flex;align-items:center;gap:10px;}
.session-pill{
    display:flex;align-items:center;gap:7px;
    background:var(--bleu-f);color:#fff;
    padding:6px 14px;border-radius:8px;font-size:11.5px;font-weight:600;
}
.s-dot{width:7px;height:7px;border-radius:50%;background:var(--vert);animation:pulse 2s infinite;}
@keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:0.5;transform:scale(1.3)}}
.btn{padding:7px 16px;border-radius:8px;font-size:12px;font-weight:600;cursor:pointer;border:none;font-family:'DM Sans',sans-serif;transition:all 0.2s;}
.btn-primary{background:linear-gradient(135deg,var(--rouge),var(--rouge-f));color:#fff;box-shadow:0 4px 14px rgba(192,57,43,0.3);}
.btn-primary:hover{transform:translateY(-1px);}
.btn-outline{background:transparent;border:1.5px solid var(--bordure);color:var(--texte-doux);}
.btn-outline:hover{border-color:var(--rouge);color:var(--rouge);}

/* CONTENT */
.content{padding:28px;flex:1;}

/* HERO */
.hero{
    background:linear-gradient(135deg,var(--bleu-f) 0%,#0D1F4A 55%,#1A3A6C 100%);
    border-radius:18px;padding:26px 30px;
    margin-bottom:26px;
    display:flex;align-items:center;justify-content:space-between;
    position:relative;overflow:hidden;
    box-shadow:0 8px 40px rgba(15,36,81,0.3);
}
.hero::before{content:'';position:absolute;right:-50px;top:-50px;width:280px;height:280px;border-radius:50%;background:rgba(255,255,255,0.03);}
.hero::after{content:'';position:absolute;right:80px;bottom:-70px;width:200px;height:200px;border-radius:50%;background:rgba(192,57,43,0.1);}
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
.btn-hero-o:hover{background:rgba(255,255,255,0.18);}

/* STATS */
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:24px;}
.stat-card{
    background:var(--blanc);border-radius:16px;
    padding:22px;box-shadow:var(--ombre);
    border:1px solid var(--bordure);
    position:relative;overflow:hidden;
    transition:transform 0.2s,box-shadow 0.2s;cursor:pointer;
}
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

/* MAIN GRID */
.main-grid{display:grid;grid-template-columns:1fr 320px;gap:22px;margin-bottom:22px;}

/* CARD */
.card{background:var(--blanc);border-radius:16px;box-shadow:var(--ombre);border:1px solid var(--bordure);overflow:hidden;}
.card-head{
    padding:18px 22px;border-bottom:1px solid var(--bordure);
    display:flex;align-items:center;justify-content:space-between;
}
.card-title{
    font-family:'Playfair Display',serif;font-size:15px;font-weight:700;color:var(--bleu);
    display:flex;align-items:center;gap:9px;
}
.card-title .dot{width:8px;height:8px;border-radius:50%;background:var(--rouge);}

/* TABLE */
.tbl-wrap{overflow-x:auto;}
table{width:100%;border-collapse:collapse;}
thead tr{background:var(--fond);}
th{text-align:left;padding:10px 16px;font-size:10px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:var(--texte-doux);border-bottom:1px solid var(--bordure);}
td{padding:12px 16px;font-size:12.5px;border-bottom:1px solid var(--bordure);color:var(--texte);}
tr:last-child td{border-bottom:none;}
tr:hover td{background:var(--fond);}
.badge{display:inline-flex;align-items:center;gap:5px;font-size:10.5px;font-weight:700;padding:3px 10px;border-radius:20px;}
.badge-rouge{background:rgba(192,57,43,0.1);color:var(--rouge);}
.badge-bleu{background:rgba(26,58,108,0.1);color:var(--bleu);}
.badge-vert{background:rgba(39,174,96,0.1);color:var(--vert);}
.badge-or{background:rgba(230,168,23,0.12);color:var(--or-f);}
.code-pill{font-family:'DM Mono',monospace;font-size:10.5px;background:var(--fond);padding:2px 8px;border-radius:5px;color:var(--bleu);}

/* UTILISATEURS PANEL */
.user-list{padding:4px 0;}
.user-item{
    display:flex;align-items:center;gap:12px;
    padding:12px 20px;border-bottom:1px solid var(--bordure);
    transition:background 0.15s;cursor:pointer;
}
.user-item:last-child{border-bottom:none;}
.user-item:hover{background:var(--fond);}
.uav{width:36px;height:36px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;font-size:12px;flex-shrink:0;}
.ui-info .uiname{font-size:13px;font-weight:600;color:var(--texte);}
.ui-info .uiemail{font-size:11px;color:var(--texte-doux);margin-top:1px;}
.ui-status{margin-left:auto;}

/* BOTTOM GRID */
.bottom-grid{display:grid;grid-template-columns:1fr 1fr;gap:22px;}

/* ACTIVITE */
.act-list{padding:4px 0;}
.act-item{
    display:flex;gap:13px;align-items:flex-start;
    padding:13px 20px;border-bottom:1px solid var(--bordure);
}
.act-item:last-child{border-bottom:none;}
.act-ico{width:34px;height:34px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:15px;flex-shrink:0;}
.act-info .act-title{font-size:12.5px;font-weight:600;color:var(--texte);}
.act-info .act-time{font-size:11px;color:var(--texte-doux);margin-top:2px;}

/* SERIES */
.serie-list{padding:4px 0;}
.serie-item{
    display:flex;align-items:center;gap:12px;
    padding:12px 20px;border-bottom:1px solid var(--bordure);
}
.serie-item:last-child{border-bottom:none;}
.serie-badge{width:34px;height:34px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:14px;flex-shrink:0;}
.si-info .si-nom{font-size:12.5px;font-weight:600;color:var(--texte);}
.si-info .si-cands{font-size:11px;color:var(--texte-doux);margin-top:1px;}
.si-prog{margin-left:auto;text-align:right;}
.si-pct{font-size:13px;font-weight:700;}
.prog-bar{width:56px;height:4px;background:var(--bordure);border-radius:2px;margin-top:4px;}
.prog-fill{height:100%;border-radius:2px;}

/* FADE IN */
.fi{opacity:0;transform:translateY(14px);animation:fadeUp 0.45s ease forwards;}
@keyframes fadeUp{to{opacity:1;transform:translateY(0)}}
.d1{animation-delay:0.05s}.d2{animation-delay:0.1s}.d3{animation-delay:0.15s}.d4{animation-delay:0.2s}.d5{animation-delay:0.25s}.d6{animation-delay:0.3s}
</style>
</head>
<body>

{{-- ══ SIDEBAR ══ --}}
<aside class="sidebar">
    <div class="sb-top">
        <div class="sb-logo">
            <img src="{{ asset('images/logo-menfop.jpeg') }}" alt="MENFOP">
        </div>
        <div class="sb-brand">
            <div class="name">Système BAC 2026</div>
            <div class="sub">MENFOP · Djibouti</div>
        </div>
    </div>

    <nav class="sb-nav">
        <div class="nav-section">Principal</div>
        <a href="{{ route('super_admin.dashboard') }}" class="nav-item active">
            <span class="ni">🏠</span> Tableau de bord
        </a>
        <a href="#" class="nav-item">
            <span class="ni">📅</span> Planning Examens
            <span class="nav-badge">12</span>
        </a>
        <a href="#" class="nav-item">
            <span class="ni">📋</span> Épreuves
        </a>

        <div class="nav-section">Gestion</div>
        <a href="{{route('super_admin.utilisateurs.index')}}" class="nav-item">
            <span class="ni">👑</span> Utilisateurs
        </a>
        {{-- ✅ APRÈS --}}
        <a href="{{ route('super_admin.candidats.index') }}" class="nav-item">
            <span class="ni">👨‍🎓</span> Candidats
        </a>
        <a href="{{ route('super_admin.etablissements.index') }}" class="nav-item">
            <span class="ni">🏫</span> Établissements
        </a>
        <a href="#" class="nav-item">
            <span class="ni">🏛️</span> Centres d'Examen
        </a>
        <a href="#" class="nav-item">
            <span class="ni">🗂️</span> Séries & Spécialités
        </a>
        <a href="#" class="nav-item">
            <span class="ni">📚</span> Matières & Parcours
        </a>

        <div class="nav-section">Ressources</div>
        <a href="#" class="nav-item">
            <span class="ni">👨‍🏫</span> Enseignants
        </a>
        <a href="#" class="nav-item">
            <span class="ni">🚪</span> Salles
        </a>
        <a href="#" class="nav-item">
            <span class="ni">📝</span> Inscriptions
        </a>

        <div class="nav-section">Rapports</div>
        <a href="#" class="nav-item">
            <span class="ni">📊</span> Statistiques
        </a>
        <a href="#" class="nav-item">
            <span class="ni">🖨️</span> Impressions
        </a>
        <a href="#" class="nav-item">
            <span class="ni">⚙️</span> Paramètres
        </a>
    </nav>

    <div class="sb-user">
        <div class="user-av">{{ strtoupper(substr(session('utilisateur_nom', 'SA'), 0, 2)) }}</div>
        <div class="user-info">
            <div class="uname">{{ session('utilisateur_nom', 'Super Admin') }}</div>
            <div class="urole">Super Utilisateur</div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn" title="Déconnexion">🚪</button>
        </form>
    </div>
</aside>

{{-- ══ MAIN ══ --}}
<main class="main">

    {{-- TOPBAR --}}
    <div class="topbar">
        <div class="topbar-left">
            <div class="page-title">Tableau de <span>Bord</span></div>
            <div class="breadcrumb">Super Admin · Session 2026</div>
        </div>
        <div class="topbar-right">
            <div class="session-pill">
                <div class="s-dot"></div>
                Session Principale 2026
            </div>
            <button class="btn btn-outline">📤 Exporter</button>
            <button class="btn btn-primary">+ Nouvelle Épreuve</button>
        </div>
    </div>

    <div class="content">

        {{-- HERO --}}
        <div class="hero fi">
            <div class="hero-text">
                <div class="hero-eye">Baccalauréat Général — République de Djibouti</div>
                <div class="hero-title">Bienvenue, <em>{{ session('utilisateur_nom', 'Super Admin') }}</em> 👑</div>
                <div class="hero-sub">Vous avez un accès complet à toute la plateforme · Session BAC 2026</div>
            </div>
            <div class="hero-actions">
                <button class="btn-hero btn-hero-p">📅 Voir le Planning</button>
                <button class="btn-hero btn-hero-o">📊 Statistiques</button>
            </div>
        </div>

        {{-- STATS --}}
        <div class="stats-grid">
            <div class="stat-card sc-rouge fi d1">
                <div class="stat-ico">👨‍🎓</div>
                <div class="stat-val">4 821</div>
                <div class="stat-lbl">Candidats inscrits</div>
                <div class="stat-trend">+8.2%</div>
            </div>
            <div class="stat-card sc-bleu fi d2">
                <div class="stat-ico">🏛️</div>
                <div class="stat-val">18</div>
                <div class="stat-lbl">Centres d'examen</div>
                <div class="stat-trend">+2</div>
            </div>
            <div class="stat-card sc-vert fi d3">
                <div class="stat-ico">📋</div>
                <div class="stat-val">127</div>
                <div class="stat-lbl">Épreuves planifiées</div>
                <div class="stat-trend">Actif</div>
            </div>
            <div class="stat-card sc-or fi d4">
                <div class="stat-ico">👥</div>
                <div class="stat-val">7</div>
                <div class="stat-lbl">Utilisateurs actifs</div>
                <div class="stat-trend">En ligne</div>
            </div>
        </div>

        {{-- MAIN GRID --}}
        <div class="main-grid">

            {{-- DERNIERS CANDIDATS --}}
            <div class="card fi d2">
                <div class="card-head">
                    <div class="card-title"><div class="dot"></div> Derniers Candidats inscrits</div>
                    <button class="btn btn-outline" style="padding:5px 12px;font-size:11px;">Voir tout</button>
                </div>
                <div class="tbl-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Nom Complet</th>
                                <th>Genre</th>
                                <th>Série</th>
                                <th>Centre</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="code-pill">DJ-2026-0001</span></td>
                                <td>Fadumo Hassan Abdi</td>
                                <td><span class="badge badge-rouge">F</span></td>
                                <td><span class="badge badge-vert">S</span></td>
                                <td>LED Djibouti</td>
                                <td><span class="badge badge-vert">✓ Inscrit</span></td>
                            </tr>
                            <tr>
                                <td><span class="code-pill">DJ-2026-0002</span></td>
                                <td>Omar Ibrahim Warsame</td>
                                <td><span class="badge badge-bleu">M</span></td>
                                <td><span class="badge badge-rouge">SG</span></td>
                                <td>Nour-Gouled</td>
                                <td><span class="badge badge-vert">✓ Inscrit</span></td>
                            </tr>
                            <tr>
                                <td><span class="code-pill">DJ-2026-0003</span></td>
                                <td>Hodan Ali Ismail</td>
                                <td><span class="badge badge-rouge">F</span></td>
                                <td><span class="badge badge-bleu">L</span></td>
                                <td>Balbala</td>
                                <td><span class="badge badge-or">⏳ En attente</span></td>
                            </tr>
                            <tr>
                                <td><span class="code-pill">DJ-2026-0004</span></td>
                                <td>Abdi Musse Hassan</td>
                                <td><span class="badge badge-bleu">M</span></td>
                                <td><span class="badge badge-or">ES</span></td>
                                <td>Ali-Sabieh</td>
                                <td><span class="badge badge-vert">✓ Inscrit</span></td>
                            </tr>
                            <tr>
                                <td><span class="code-pill">DJ-2026-0005</span></td>
                                <td>Ifrah Dahir Mohamed</td>
                                <td><span class="badge badge-rouge">F</span></td>
                                <td><span class="badge badge-vert">S</span></td>
                                <td>LED Djibouti</td>
                                <td><span class="badge badge-vert">✓ Inscrit</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- UTILISATEURS --}}
            <div class="card fi d3">
                <div class="card-head">
                    <div class="card-title"><div class="dot"></div> Utilisateurs Système</div>
                    <button class="btn btn-primary" style="padding:5px 12px;font-size:11px;">+ Ajouter</button>
                </div>
                <div class="user-list">
                    <div class="user-item">
                        <div class="uav" style="background:linear-gradient(135deg,#C0392B,#96281B)">SA</div>
                        <div class="ui-info">
                            <div class="uiname">Super Admin</div>
                            <div class="uiemail">super@planning.dj</div>
                        </div>
                        <span class="badge badge-rouge">👑 Super Admin</span>
                    </div>
                    <div class="user-item">
                        <div class="uav" style="background:linear-gradient(135deg,#1A3A6C,#0F2451)">AD</div>
                        <div class="ui-info">
                            <div class="uiname">Administration</div>
                            <div class="uiemail">admin@planning.dj</div>
                        </div>
                        <span class="badge badge-bleu">🏛️ Admin</span>
                    </div>
                    <div class="user-item">
                        <div class="uav" style="background:linear-gradient(135deg,#27AE60,#1E8449)">GE</div>
                        <div class="ui-info">
                            <div class="uiname">Gest. Examens</div>
                            <div class="uiemail">examen@planning.dj</div>
                        </div>
                        <span class="badge badge-vert">📋 Examens</span>
                    </div>
                    <div class="user-item">
                        <div class="uav" style="background:linear-gradient(135deg,#E67E22,#D35400)">GÉ</div>
                        <div class="ui-info">
                            <div class="uiname">Gest. Établissement</div>
                            <div class="uiemail">etab@planning.dj</div>
                        </div>
                        <span class="badge badge-or">🏫 Établ.</span>
                    </div>
                    <div class="user-item">
                        <div class="uav" style="background:linear-gradient(135deg,#8E44AD,#6C3483)">CA</div>
                        <div class="ui-info">
                            <div class="uiname">Candidat Test</div>
                            <div class="uiemail">candidat@planning.dj</div>
                        </div>
                        <span class="badge" style="background:rgba(142,68,173,0.1);color:#8E44AD">👨‍🎓 Candidat</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- BOTTOM GRID --}}
        <div class="bottom-grid">

            {{-- ACTIVITÉ RÉCENTE --}}
            <div class="card fi d4">
                <div class="card-head">
                    <div class="card-title"><div class="dot"></div> Activité Récente</div>
                </div>
                <div class="act-list">
                    <div class="act-item">
                        <div class="act-ico" style="background:rgba(39,174,96,0.1)">✅</div>
                        <div class="act-info">
                            <div class="act-title">Nouvel utilisateur créé — GestExamen</div>
                            <div class="act-time">Il y a 2 heures · Super Admin</div>
                        </div>
                    </div>
                    <div class="act-item">
                        <div class="act-ico" style="background:rgba(26,58,108,0.1)">📋</div>
                        <div class="act-info">
                            <div class="act-title">Planning Juin 2026 mis à jour</div>
                            <div class="act-time">Il y a 4 heures · Administration</div>
                        </div>
                    </div>
                    <div class="act-item">
                        <div class="act-ico" style="background:rgba(192,57,43,0.1)">👨‍🎓</div>
                        <div class="act-info">
                            <div class="act-title">124 nouveaux candidats inscrits</div>
                            <div class="act-time">Hier · Gest. Établissement</div>
                        </div>
                    </div>
                    <div class="act-item">
                        <div class="act-ico" style="background:rgba(245,200,66,0.15)">🏛️</div>
                        <div class="act-info">
                            <div class="act-title">Centre Balbala — Salles configurées</div>
                            <div class="act-time">Hier · Gest. Examens</div>
                        </div>
                    </div>
                    <div class="act-item">
                        <div class="act-ico" style="background:rgba(39,174,96,0.1)">📊</div>
                        <div class="act-info">
                            <div class="act-title">Rapport session 2025 exporté</div>
                            <div class="act-time">Il y a 2 jours · Administration</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SÉRIES --}}
            <div class="card fi d5">
                <div class="card-head">
                    <div class="card-title"><div class="dot"></div> Séries BAC 2026</div>
                    <button class="btn btn-outline" style="padding:5px 12px;font-size:11px;">Gérer</button>
                </div>
                <div class="serie-list">
                    <div class="serie-item">
                        <div class="serie-badge" style="background:rgba(192,57,43,0.1);color:var(--rouge)">ES</div>
                        <div class="si-info">
                            <div class="si-nom">Sciences Éco. et Sociales</div>
                            <div class="si-cands">1 204 candidats</div>
                        </div>
                        <div class="si-prog">
                            <div class="si-pct" style="color:var(--rouge)">82%</div>
                            <div class="prog-bar"><div class="prog-fill" style="width:82%;background:var(--rouge)"></div></div>
                        </div>
                    </div>
                    <div class="serie-item">
                        <div class="serie-badge" style="background:rgba(26,58,108,0.1);color:var(--bleu)">L</div>
                        <div class="si-info">
                            <div class="si-nom">Littéraire</div>
                            <div class="si-cands">876 candidats</div>
                        </div>
                        <div class="si-prog">
                            <div class="si-pct" style="color:var(--bleu)">71%</div>
                            <div class="prog-bar"><div class="prog-fill" style="width:71%;background:var(--bleu)"></div></div>
                        </div>
                    </div>
                    <div class="serie-item">
                        <div class="serie-badge" style="background:rgba(39,174,96,0.1);color:var(--vert)">S</div>
                        <div class="si-info">
                            <div class="si-nom">Scientifique</div>
                            <div class="si-cands">1 458 candidats</div>
                        </div>
                        <div class="si-prog">
                            <div class="si-pct" style="color:var(--vert)">95%</div>
                            <div class="prog-bar"><div class="prog-fill" style="width:95%;background:var(--vert)"></div></div>
                        </div>
                    </div>
                    <div class="serie-item">
                        <div class="serie-badge" style="background:rgba(230,168,23,0.12);color:var(--or-f)">SG</div>
                        <div class="si-info">
                            <div class="si-nom">Sciences de Gestion</div>
                            <div class="si-cands">1 283 candidats</div>
                        </div>
                        <div class="si-prog">
                            <div class="si-pct" style="color:var(--or-f)">88%</div>
                            <div class="prog-bar"><div class="prog-fill" style="width:88%;background:var(--or-f)"></div></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

</body>
</html>