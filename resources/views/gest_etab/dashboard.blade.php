<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gestionnaire Établissement — Système BAC 2026</title>
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
.user-av{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#E67E22,#D35400);display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;font-size:13px;flex-shrink:0;}
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
.btn-vert{background:linear-gradient(135deg,var(--vert),#1E8449);color:#fff;}
.btn-or{background:linear-gradient(135deg,var(--or-f),#D4AC0D);color:#fff;}

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

/* MAIN GRID */
.main-grid{display:grid;grid-template-columns:1fr 1fr;gap:22px;margin-bottom:22px;}

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

/* SEARCH */
.search-bar{display:flex;gap:10px;padding:14px 18px;border-bottom:1px solid var(--bordure);background:var(--fond);}
.search-wrap{position:relative;flex:1;}
.search-ico{position:absolute;left:11px;top:50%;transform:translateY(-50%);font-size:14px;color:#CCC;pointer-events:none;}
.search-input{width:100%;padding:9px 14px 9px 36px;border:1.5px solid var(--bordure);border-radius:9px;font-size:13px;font-family:'DM Sans',sans-serif;background:#fff;outline:none;transition:border-color 0.2s;}
.search-input:focus{border-color:var(--bleu);}

/* SALLES GRID */
.salles-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;padding:16px;}
.salle-card{background:var(--fond);border-radius:10px;padding:14px;border:1.5px solid var(--bordure);cursor:pointer;transition:all 0.2s;text-align:center;}
.salle-card:hover{border-color:var(--bleu);background:#fff;box-shadow:var(--ombre);}
.salle-card.occupee{border-color:rgba(192,57,43,0.3);background:rgba(192,57,43,0.04);}
.salle-card.libre{border-color:rgba(39,174,96,0.3);background:rgba(39,174,96,0.04);}
.salle-code{font-family:'DM Mono',monospace;font-size:13px;font-weight:700;color:var(--bleu);margin-bottom:5px;}
.salle-cap{font-size:11px;color:var(--texte-doux);}
.salle-type{font-size:10px;font-weight:700;margin-top:5px;padding:2px 8px;border-radius:20px;display:inline-block;}
.type-labo{background:rgba(26,58,108,0.1);color:var(--bleu);}
.type-ban{background:rgba(39,174,96,0.1);color:var(--vert);}

/* INSCRIPTIONS */
.insc-stats{display:grid;grid-template-columns:repeat(2,1fr);gap:12px;padding:16px;}
.insc-stat{background:var(--fond);border-radius:12px;padding:16px;border:1.5px solid var(--bordure);}
.insc-val{font-family:'Playfair Display',serif;font-size:28px;font-weight:900;line-height:1;margin-bottom:4px;}
.insc-lbl{font-size:11px;color:var(--texte-doux);font-weight:500;}

/* CLASSES */
.classe-list{padding:4px 0;}
.classe-item{display:flex;align-items:center;gap:12px;padding:12px 20px;border-bottom:1px solid var(--bordure);cursor:pointer;transition:background 0.15s;}
.classe-item:last-child{border-bottom:none;}
.classe-item:hover{background:var(--fond);}
.cl-badge{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:12px;flex-shrink:0;}
.cl-info .cl-nom{font-size:13px;font-weight:600;}
.cl-info .cl-code{font-family:'DM Mono',monospace;font-size:10.5px;color:var(--texte-doux);margin-top:1px;}
.cl-eleves{margin-left:auto;text-align:right;}
.cl-nb{font-size:14px;font-weight:700;color:var(--bleu);}
.cl-annee{font-size:10px;color:var(--texte-doux);}

/* BOTTOM GRID */
.bottom-grid{display:grid;grid-template-columns:1fr 1fr;gap:22px;}

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
        <a href="{{ route('gest_etab.dashboard') }}" class="nav-item active">
            <span class="ni">🏠</span> Tableau de bord
        </a>
        <div class="nav-section">Mon Établissement</div>
        <a href="{{ route('gest_etab.classes') }}" class="nav-item">
            <span class="ni">📚</span> Classes
            <span class="nav-badge">4</span>
        </a>
        <a href="{{ route('gest_etab.salles') }}" class="nav-item">
            <span class="ni">🚪</span> Salles
            <span class="nav-badge">20</span>
        </a>
        <a href="{{ route('gest_etab.inscriptions') }}" class="nav-item">
            <span class="ni">📝</span> Inscriptions Candidats
            <span class="nav-badge">790</span>
        </a>
        <div class="nav-section">Informations</div>
        <a href="#" class="nav-item">
            <span class="ni">📅</span> Planning BAC 2026
        </a>
        <a href="#" class="nav-item">
            <span class="ni">👨‍🎓</span> Mes Candidats
        </a>
        <a href="#" class="nav-item">
            <span class="ni">🏛️</span> Centre d'Examen
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
        <div class="user-av">{{ strtoupper(substr(session('utilisateur_nom','GÉ'),0,2)) }}</div>
        <div class="user-info">
            <div class="uname">{{ session('utilisateur_nom','Gest. Établissement') }}</div>
            <div class="urole">Gestionnaire d'Établissement</div>
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
            <div class="page-title">Gestionnaire <span>d'Établissement</span></div>
            <div class="breadcrumb">Lycée d'État de Djibouti · Session BAC 2026</div>
        </div>
        <div class="topbar-right">
            <div class="session-pill"><div class="s-dot"></div>Session Principale 2026</div>
            <button class="btn btn-outline">📤 Exporter</button>
            <button class="btn btn-primary">+ Inscrire Candidat</button>
        </div>
    </div>

    <div class="content">

        {{-- HERO --}}
        <div class="hero fi">
            <div class="hero-text">
                <div class="hero-eye">Lycée d'État de Djibouti — LY-DJ · Code : 26LED</div>
                <div class="hero-title">Bienvenue, <em>{{ session('utilisateur_nom','Gestionnaire') }}</em> 🏫</div>
                <div class="hero-sub">Gestion des classes, salles et inscriptions des candidats · BAC 2026</div>
            </div>
            <div class="hero-actions">
                <button class="btn-hero btn-hero-p">📝 Inscriptions</button>
                <button class="btn-hero btn-hero-o">🚪 Salles</button>
            </div>
        </div>

        {{-- STATS --}}
        <div class="stats-grid">
            <div class="stat-card sc-rouge fi d1">
                <div class="stat-ico">👨‍🎓</div>
                <div class="stat-val">790</div>
                <div class="stat-lbl">Candidats inscrits</div>
                <div class="stat-trend">+5%</div>
            </div>
            <div class="stat-card sc-bleu fi d2">
                <div class="stat-ico">📚</div>
                <div class="stat-val">4</div>
                <div class="stat-lbl">Classes actives</div>
                <div class="stat-trend">2026</div>
            </div>
            <div class="stat-card sc-vert fi d3">
                <div class="stat-ico">🚪</div>
                <div class="stat-val">20</div>
                <div class="stat-lbl">Salles disponibles</div>
                <div class="stat-trend">Prêtes</div>
            </div>
            <div class="stat-card sc-or fi d4">
                <div class="stat-ico">🏛️</div>
                <div class="stat-val">1</div>
                <div class="stat-lbl">Centre d'examen</div>
                <div class="stat-trend">✓ Prêt</div>
            </div>
        </div>

        {{-- MAIN GRID --}}
        <div class="main-grid">

            {{-- INSCRIPTIONS CANDIDATS --}}
            <div class="card fi d2">
                <div class="card-head">
                    <div class="card-title"><div class="dot"></div> Inscriptions Candidats</div>
                    <div style="display:flex;gap:8px;">
                        <button class="btn btn-outline" style="padding:5px 12px;font-size:11px;">🔍 Filtrer</button>
                        <button class="btn btn-primary" style="padding:5px 12px;font-size:11px;">+ Inscrire</button>
                    </div>
                </div>
                <div class="search-bar">
                    <div class="search-wrap">
                        <span class="search-ico">🔍</span>
                        <input type="text" class="search-input" placeholder="Rechercher un candidat...">
                    </div>
                    <select style="padding:9px 12px;border:1.5px solid var(--bordure);border-radius:9px;font-family:'DM Sans',sans-serif;font-size:12px;color:var(--texte);background:#fff;outline:none;">
                        <option>Toutes les séries</option>
                        <option>ES</option><option>L</option><option>S</option><option>SG</option>
                    </select>
                </div>
                <div class="tbl-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Nom Complet</th>
                                <th>G.</th>
                                <th>Série</th>
                                <th>Classe</th>
                                <th>N° Examen</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="code-pill">DJ-2026-0001</span></td>
                                <td><strong>Fadumo Hassan Abdi</strong></td>
                                <td><span class="badge badge-rouge">F</span></td>
                                <td><span class="badge badge-vert">S</span></td>
                                <td>CL-S1</td>
                                <td><span class="code-pill">26LED-001</span></td>
                                <td><span class="badge badge-vert">✓ Validé</span></td>
                            </tr>
                            <tr>
                                <td><span class="code-pill">DJ-2026-0002</span></td>
                                <td><strong>Omar Ibrahim Warsame</strong></td>
                                <td><span class="badge badge-bleu">M</span></td>
                                <td><span class="badge badge-or">SG</span></td>
                                <td>CL-SG1</td>
                                <td><span class="code-pill">26LED-002</span></td>
                                <td><span class="badge badge-vert">✓ Validé</span></td>
                            </tr>
                            <tr>
                                <td><span class="code-pill">DJ-2026-0003</span></td>
                                <td><strong>Hodan Ali Ismail</strong></td>
                                <td><span class="badge badge-rouge">F</span></td>
                                <td><span class="badge badge-bleu">L</span></td>
                                <td>CL-L1</td>
                                <td><span class="code-pill">26LED-003</span></td>
                                <td><span class="badge badge-or">⏳ En attente</span></td>
                            </tr>
                            <tr>
                                <td><span class="code-pill">DJ-2026-0004</span></td>
                                <td><strong>Abdi Musse Hassan</strong></td>
                                <td><span class="badge badge-bleu">M</span></td>
                                <td><span class="badge badge-rouge">ES</span></td>
                                <td>CL-ES1</td>
                                <td><span class="code-pill">26LED-004</span></td>
                                <td><span class="badge badge-vert">✓ Validé</span></td>
                            </tr>
                            <tr>
                                <td><span class="code-pill">DJ-2026-0005</span></td>
                                <td><strong>Ifrah Dahir Mohamed</strong></td>
                                <td><span class="badge badge-rouge">F</span></td>
                                <td><span class="badge badge-vert">S</span></td>
                                <td>CL-S1</td>
                                <td><span class="code-pill">26LED-005</span></td>
                                <td><span class="badge badge-vert">✓ Validé</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="padding:12px 18px;display:flex;align-items:center;justify-content:space-between;border-top:1px solid var(--bordure);background:var(--fond);">
                    <span style="font-size:11.5px;color:var(--texte-doux)">Affichage 1–5 sur 790 candidats</span>
                    <div style="display:flex;gap:6px;">
                        <button class="btn btn-outline" style="padding:4px 10px;font-size:11px;">◀ Préc.</button>
                        <button class="btn btn-primary" style="padding:4px 10px;font-size:11px;">Suiv. ▶</button>
                    </div>
                </div>
            </div>

            {{-- CLASSES --}}
            <div class="card fi d3">
                <div class="card-head">
                    <div class="card-title"><div class="dot"></div> Classes 2026</div>
                    <button class="btn btn-vert" style="padding:5px 12px;font-size:11px;">+ Classe</button>
                </div>
                <div class="classe-list">
                    <div class="classe-item">
                        <div class="cl-badge" style="background:rgba(192,57,43,0.1);color:var(--rouge)">ES</div>
                        <div class="cl-info">
                            <div class="cl-nom">Classe ES 1</div>
                            <div class="cl-code">CL-ES1 · Sciences Éco.</div>
                        </div>
                        <div class="cl-eleves">
                            <div class="cl-nb">215</div>
                            <div class="cl-annee">élèves · 2026</div>
                        </div>
                    </div>
                    <div class="classe-item">
                        <div class="cl-badge" style="background:rgba(26,58,108,0.1);color:var(--bleu)">L</div>
                        <div class="cl-info">
                            <div class="cl-nom">Classe L 1</div>
                            <div class="cl-code">CL-L1 · Littéraire</div>
                        </div>
                        <div class="cl-eleves">
                            <div class="cl-nb">178</div>
                            <div class="cl-annee">élèves · 2026</div>
                        </div>
                    </div>
                    <div class="classe-item">
                        <div class="cl-badge" style="background:rgba(39,174,96,0.1);color:var(--vert)">S</div>
                        <div class="cl-info">
                            <div class="cl-nom">Classe S 1</div>
                            <div class="cl-code">CL-S1 · Scientifique</div>
                        </div>
                        <div class="cl-eleves">
                            <div class="cl-nb">243</div>
                            <div class="cl-annee">élèves · 2026</div>
                        </div>
                    </div>
                    <div class="classe-item">
                        <div class="cl-badge" style="background:rgba(230,168,23,0.12);color:var(--or-f)">SG</div>
                        <div class="cl-info">
                            <div class="cl-nom">Classe SG 1</div>
                            <div class="cl-code">CL-SG1 · Sciences Gestion</div>
                        </div>
                        <div class="cl-eleves">
                            <div class="cl-nb">154</div>
                            <div class="cl-annee">élèves · 2026</div>
                        </div>
                    </div>
                </div>

                {{-- STATS INSCRIPTIONS --}}
                <div style="padding:14px 18px;border-top:1px solid var(--bordure);">
                    <div style="font-size:11px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:#999;margin-bottom:10px;">Inscriptions par statut</div>
                    <div class="insc-stats">
                        <div class="insc-stat">
                            <div class="insc-val" style="color:var(--vert)">742</div>
                            <div class="insc-lbl">✓ Validées</div>
                        </div>
                        <div class="insc-stat">
                            <div class="insc-val" style="color:var(--or-f)">48</div>
                            <div class="insc-lbl">⏳ En attente</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- BOTTOM GRID --}}
        <div class="bottom-grid">

            {{-- SALLES --}}
            <div class="card fi d3">
                <div class="card-head">
                    <div class="card-title"><div class="dot"></div> Salles — Lycée d'État DJ</div>
                    <button class="btn btn-outline" style="padding:5px 12px;font-size:11px;">+ Salle</button>
                </div>
                <div style="padding:12px 16px 0;display:flex;gap:8px;border-bottom:1px solid var(--bordure);">
                    <button class="btn btn-primary" style="padding:5px 14px;font-size:11px;margin-bottom:12px;">Toutes</button>
                    <button class="btn btn-outline" style="padding:5px 14px;font-size:11px;margin-bottom:12px;">Labo</button>
                    <button class="btn btn-outline" style="padding:5px 14px;font-size:11px;margin-bottom:12px;">Banalisée</button>
                </div>
                <div class="salles-grid">
                    <div class="salle-card libre">
                        <div class="salle-code">A112</div>
                        <div class="salle-cap">25 places</div>
                        <div class="salle-type type-labo">Labo</div>
                    </div>
                    <div class="salle-card libre">
                        <div class="salle-code">A114</div>
                        <div class="salle-cap">25 places</div>
                        <div class="salle-type type-labo">Labo</div>
                    </div>
                    <div class="salle-card libre">
                        <div class="salle-code">A121</div>
                        <div class="salle-cap">25 places</div>
                        <div class="salle-type type-labo">Labo</div>
                    </div>
                    <div class="salle-card occupee">
                        <div class="salle-code">A121B</div>
                        <div class="salle-cap">25 places</div>
                        <div class="salle-type type-labo">Labo</div>
                    </div>
                    <div class="salle-card libre">
                        <div class="salle-code">A131</div>
                        <div class="salle-cap">25 places</div>
                        <div class="salle-type type-ban">Banalisée</div>
                    </div>
                    <div class="salle-card libre">
                        <div class="salle-code">A132</div>
                        <div class="salle-cap">25 places</div>
                        <div class="salle-type type-ban">Banalisée</div>
                    </div>
                    <div class="salle-card libre">
                        <div class="salle-code">A133</div>
                        <div class="salle-cap">25 places</div>
                        <div class="salle-type type-ban">Banalisée</div>
                    </div>
                    <div class="salle-card occupee">
                        <div class="salle-code">A134</div>
                        <div class="salle-cap">25 places</div>
                        <div class="salle-type type-ban">Banalisée</div>
                    </div>
                    <div class="salle-card libre">
                        <div class="salle-code">B20</div>
                        <div class="salle-cap">25 places</div>
                        <div class="salle-type type-ban">Banalisée</div>
                    </div>
                    <div class="salle-card libre">
                        <div class="salle-code">B21</div>
                        <div class="salle-cap">25 places</div>
                        <div class="salle-type type-ban">Banalisée</div>
                    </div>
                    <div class="salle-card libre">
                        <div class="salle-code">B22</div>
                        <div class="salle-cap">25 places</div>
                        <div class="salle-type type-ban">Banalisée</div>
                    </div>
                    <div class="salle-card libre">
                        <div class="salle-code">B23</div>
                        <div class="salle-cap">25 places</div>
                        <div class="salle-type type-ban">Banalisée</div>
                    </div>
                </div>
                <div style="padding:12px 18px;border-top:1px solid var(--bordure);display:flex;gap:16px;background:var(--fond);">
                    <div style="display:flex;align-items:center;gap:6px;font-size:11px;color:var(--texte-doux)">
                        <div style="width:10px;height:10px;border-radius:3px;background:rgba(39,174,96,0.3)"></div> Libre (18)
                    </div>
                    <div style="display:flex;align-items:center;gap:6px;font-size:11px;color:var(--texte-doux)">
                        <div style="width:10px;height:10px;border-radius:3px;background:rgba(192,57,43,0.3)"></div> Occupée (2)
                    </div>
                </div>
            </div>

            {{-- PLANNING BAC --}}
            <div class="card fi d4">
                <div class="card-head">
                    <div class="card-title"><div class="dot"></div> Planning BAC — Mon Centre</div>
                    <button class="btn btn-or" style="padding:5px 12px;font-size:11px;">🖨️ Imprimer</button>
                </div>
                <div class="tbl-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Horaire</th>
                                <th>Matière</th>
                                <th>Série</th>
                                <th>Salle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>02/06</strong></td>
                                <td><span class="code-pill">07h30–11h30</span></td>
                                <td>Français Écrit</td>
                                <td><span class="badge badge-bleu">ES/L</span></td>
                                <td>A131–A135</td>
                            </tr>
                            <tr>
                                <td><strong>03/06</strong></td>
                                <td><span class="code-pill">07h30–11h30</span></td>
                                <td>Mathématiques</td>
                                <td><span class="badge badge-vert">S/SG</span></td>
                                <td>A112–A125</td>
                            </tr>
                            <tr>
                                <td><strong>03/06</strong></td>
                                <td><span class="code-pill">13h00–16h00</span></td>
                                <td>SVT</td>
                                <td><span class="badge badge-vert">S</span></td>
                                <td>A112–A121</td>
                            </tr>
                            <tr>
                                <td><strong>04/06</strong></td>
                                <td><span class="code-pill">07h30–11h30</span></td>
                                <td>Philosophie</td>
                                <td><span class="badge badge-or">Toutes</span></td>
                                <td>A131–B25</td>
                            </tr>
                            <tr>
                                <td><strong>05/06</strong></td>
                                <td><span class="code-pill">07h30–10h30</span></td>
                                <td>Histoire-Géo</td>
                                <td><span class="badge badge-bleu">ES/L</span></td>
                                <td>A131–A136</td>
                            </tr>
                            <tr>
                                <td><strong>06/06</strong></td>
                                <td><span class="code-pill">07h30–11h30</span></td>
                                <td>Physique-Chimie</td>
                                <td><span class="badge badge-vert">S</span></td>
                                <td>A112–A125</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="padding:12px 18px;border-top:1px solid var(--bordure);background:var(--fond);display:flex;align-items:center;justify-content:space-between;">
                    <span style="font-size:11.5px;color:var(--texte-doux)">Centre : Lycée d'État de Djibouti · LY-DJ</span>
                    <button class="btn btn-primary" style="padding:5px 12px;font-size:11px;">Voir tout →</button>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>