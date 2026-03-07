<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Convocation BAC 2026 — Candidat</title>
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
    --ombre-forte:0 16px 48px rgba(0,0,0,0.13);
}
*{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'DM Sans',sans-serif;background:var(--fond);color:var(--texte);min-height:100vh;}

/* ── TOPBAR ── */
.topbar{
    background:var(--bleu-f);
    padding:0 32px;height:64px;
    display:flex;align-items:center;justify-content:space-between;
    box-shadow:0 4px 20px rgba(15,36,81,0.3);
}
.topbar-left{display:flex;align-items:center;gap:14px;}
.tb-logo{width:42px;height:42px;border-radius:50%;background:#fff;padding:3px;overflow:hidden;}
.tb-logo img{width:100%;height:100%;object-fit:cover;border-radius:50%;}
.tb-brand .name{font-family:'Playfair Display',serif;font-size:14px;font-weight:700;color:#fff;}
.tb-brand .sub{font-size:9.5px;color:rgba(255,255,255,0.4);letter-spacing:0.1em;text-transform:uppercase;}
.topbar-right{display:flex;align-items:center;gap:12px;}
.cand-pill{
    display:flex;align-items:center;gap:8px;
    background:rgba(255,255,255,0.1);
    border:1px solid rgba(255,255,255,0.2);
    padding:7px 14px;border-radius:8px;
}
.cand-av{
    width:28px;height:28px;border-radius:50%;
    background:linear-gradient(135deg,var(--rouge),var(--or-f));
    display:flex;align-items:center;justify-content:center;
    font-weight:700;color:#fff;font-size:11px;
}
.cand-nom{font-size:12px;font-weight:600;color:#fff;}
.logout-btn{
    background:rgba(192,57,43,0.25);border:none;
    border-radius:8px;padding:7px 14px;
    color:rgba(255,255,255,0.7);cursor:pointer;
    font-size:12px;font-family:'DM Sans',sans-serif;
    font-weight:600;transition:all 0.2s;
}
.logout-btn:hover{background:var(--rouge);color:#fff;}

/* ── CONTENT ── */
.content{max-width:900px;margin:0 auto;padding:36px 24px;}

/* WELCOME */
.welcome{
    background:linear-gradient(135deg,var(--bleu-f) 0%,#0D1F4A 60%,#1A3A6C 100%);
    border-radius:18px;padding:28px 32px;
    margin-bottom:28px;
    display:flex;align-items:center;justify-content:space-between;
    position:relative;overflow:hidden;
    box-shadow:0 8px 40px rgba(15,36,81,0.3);
}
.welcome::before{content:'';position:absolute;right:-40px;top:-40px;width:220px;height:220px;border-radius:50%;background:rgba(255,255,255,0.03);}
.welcome::after{content:'';position:absolute;right:60px;bottom:-60px;width:160px;height:160px;border-radius:50%;background:rgba(192,57,43,0.1);}
.welcome-text{z-index:1;}
.welcome-eye{font-size:9.5px;letter-spacing:0.2em;text-transform:uppercase;color:rgba(255,255,255,0.45);font-weight:700;margin-bottom:8px;}
.welcome-title{font-family:'Playfair Display',serif;font-size:26px;font-weight:900;color:#fff;margin-bottom:6px;}
.welcome-title em{color:var(--or);font-style:normal;}
.welcome-sub{font-size:13px;color:rgba(255,255,255,0.55);line-height:1.6;}
.welcome-badge{z-index:1;text-align:center;}
.mat-badge{
    background:rgba(255,255,255,0.1);
    border:2px solid rgba(255,255,255,0.2);
    border-radius:16px;padding:16px 24px;
    text-align:center;
}
.mat-num{
    font-family:'DM Mono',monospace;
    font-size:22px;font-weight:700;color:var(--or);
    letter-spacing:0.1em;margin-bottom:4px;
}
.mat-lbl{font-size:10px;color:rgba(255,255,255,0.45);text-transform:uppercase;letter-spacing:0.12em;}

/* TABS */
.tabs-wrap{display:flex;gap:12px;margin-bottom:24px;}
.tab-btn{
    flex:1;padding:14px 20px;border-radius:14px;
    border:2px solid var(--bordure);background:var(--blanc);
    cursor:pointer;transition:all 0.2s;
    display:flex;align-items:center;gap:12px;
    box-shadow:var(--ombre);
}
.tab-btn:hover{border-color:var(--bleu);transform:translateY(-2px);}
.tab-btn.active{
    border-color:var(--bleu);
    background:linear-gradient(135deg,var(--bleu-f),var(--bleu));
    box-shadow:0 8px 24px rgba(26,58,108,0.3);
}
.tab-ico{
    width:44px;height:44px;border-radius:12px;
    display:flex;align-items:center;justify-content:center;
    font-size:22px;flex-shrink:0;
}
.tab-btn.active .tab-ico{background:rgba(255,255,255,0.15);}
.tab-btn:not(.active) .tab-ico{background:var(--fond);}
.tab-info .tab-titre{font-size:14px;font-weight:700;}
.tab-btn.active .tab-info .tab-titre{color:#fff;}
.tab-btn:not(.active) .tab-info .tab-titre{color:var(--bleu);}
.tab-info .tab-desc{font-size:11px;margin-top:2px;}
.tab-btn.active .tab-info .tab-desc{color:rgba(255,255,255,0.55);}
.tab-btn:not(.active) .tab-info .tab-desc{color:var(--texte-doux);}
.tab-arrow{margin-left:auto;font-size:18px;}
.tab-btn.active .tab-arrow{color:rgba(255,255,255,0.6);}
.tab-btn:not(.active) .tab-arrow{color:var(--bordure);}

/* CONVOCATION PANELS */
.conv-panel{display:none;}
.conv-panel.show{display:block;}

/* CONVOCATION CARD */
.conv-card{
    background:var(--blanc);border-radius:18px;
    box-shadow:var(--ombre-forte);
    border:1px solid var(--bordure);
    overflow:hidden;
    margin-bottom:20px;
}

/* EN-TÊTE OFFICIELLE */
.conv-entete{
    background:linear-gradient(135deg,var(--bleu-f),var(--bleu));
    padding:24px 32px;
    display:flex;align-items:center;justify-content:space-between;
}
.entete-left{display:flex;align-items:center;gap:16px;}
.entete-logo{width:56px;height:56px;border-radius:50%;background:#fff;padding:4px;overflow:hidden;}
.entete-logo img{width:100%;height:100%;object-fit:cover;border-radius:50%;}
.entete-text .e-rep{font-size:9.5px;letter-spacing:0.15em;text-transform:uppercase;color:rgba(255,255,255,0.5);margin-bottom:3px;}
.entete-text .e-min{font-family:'Playfair Display',serif;font-size:13px;font-weight:700;color:#fff;line-height:1.3;}
.entete-right{text-align:right;}
.entete-right .e-exam{font-family:'Playfair Display',serif;font-size:18px;font-weight:900;color:var(--or);}
.entete-right .e-session{font-size:11px;color:rgba(255,255,255,0.5);margin-top:2px;}

/* TITRE CONVOCATION */
.conv-titre{
    text-align:center;padding:20px 32px 16px;
    border-bottom:1px solid var(--bordure);
    background:rgba(26,58,108,0.03);
}
.conv-titre h2{
    font-family:'Playfair Display',serif;
    font-size:22px;font-weight:900;
    color:var(--bleu);letter-spacing:0.05em;
    text-transform:uppercase;margin-bottom:4px;
}
.conv-titre .tour{
    display:inline-block;
    font-size:12px;font-weight:700;
    padding:4px 16px;border-radius:20px;
    background:linear-gradient(135deg,var(--rouge),var(--rouge-f));
    color:#fff;letter-spacing:0.08em;
}
.conv-titre .tour.tour2{
    background:linear-gradient(135deg,var(--or-f),#C9A227);
    color:#1C1C1C;
}

/* INFOS CANDIDAT */
.conv-body{padding:24px 32px;}
.info-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:24px;}
.info-item{background:var(--fond);border-radius:12px;padding:14px 18px;border:1px solid var(--bordure);}
.info-lbl{font-size:10px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:#999;margin-bottom:6px;}
.info-val{font-size:14px;font-weight:700;color:var(--texte);}
.info-val.mono{font-family:'DM Mono',monospace;color:var(--bleu);}
.info-val.serie{color:var(--rouge);}
.info-full{grid-column:1/-1;}

/* EPREUVES TABLE */
.ep-titre{
    font-size:12px;font-weight:700;letter-spacing:0.1em;
    text-transform:uppercase;color:var(--bleu);
    margin-bottom:12px;display:flex;align-items:center;gap:8px;
}
.ep-titre::after{content:'';flex:1;height:1px;background:var(--bordure);}

.ep-table{width:100%;border-collapse:collapse;margin-bottom:20px;}
.ep-table thead tr{background:var(--bleu-f);}
.ep-table th{
    text-align:left;padding:10px 14px;
    font-size:10px;font-weight:700;letter-spacing:0.1em;
    text-transform:uppercase;color:rgba(255,255,255,0.7);
}
.ep-table td{
    padding:11px 14px;font-size:12.5px;
    border-bottom:1px solid var(--bordure);color:var(--texte);
}
.ep-table tr:last-child td{border-bottom:none;}
.ep-table tr:hover td{background:var(--fond);}
.ep-table .coeff{
    font-family:'DM Mono',monospace;font-size:12px;
    font-weight:700;color:var(--bleu);
}
.ep-table .duree{font-size:11.5px;color:var(--texte-doux);}
.ep-table .date-cell{font-weight:700;color:var(--rouge);}
.ep-type-badge{font-size:10px;font-weight:700;padding:2px 8px;border-radius:12px;}
.ep-ecrit{background:rgba(26,58,108,0.1);color:var(--bleu);}
.ep-oral{background:rgba(230,168,23,0.12);color:var(--or-f);}
.ep-prat{background:rgba(39,174,96,0.1);color:var(--vert);}

/* CENTRE INFO */
.centre-box{
    background:linear-gradient(135deg,rgba(26,58,108,0.06),rgba(26,58,108,0.03));
    border:1.5px solid rgba(26,58,108,0.15);
    border-radius:12px;padding:16px 20px;
    display:flex;align-items:center;gap:16px;
    margin-bottom:20px;
}
.centre-ico{font-size:32px;}
.centre-info .c-titre{font-size:13px;font-weight:700;color:var(--bleu);margin-bottom:3px;}
.centre-info .c-adresse{font-size:12px;color:var(--texte-doux);}
.centre-info .c-code{font-family:'DM Mono',monospace;font-size:11px;color:var(--bleu);margin-top:4px;}
.centre-salle{margin-left:auto;text-align:center;}
.cs-val{font-family:'Playfair Display',serif;font-size:26px;font-weight:900;color:var(--rouge);}
.cs-lbl{font-size:10px;color:var(--texte-doux);text-transform:uppercase;letter-spacing:0.08em;}

/* INSTRUCTIONS */
.instructions{
    background:rgba(192,57,43,0.05);
    border:1.5px solid rgba(192,57,43,0.15);
    border-radius:12px;padding:16px 20px;
    margin-bottom:20px;
}
.inst-titre{font-size:12px;font-weight:700;color:var(--rouge);margin-bottom:10px;display:flex;align-items:center;gap:6px;}
.inst-list{list-style:none;display:flex;flex-direction:column;gap:6px;}
.inst-list li{font-size:12px;color:var(--texte);display:flex;align-items:flex-start;gap:8px;line-height:1.5;}
.inst-list li::before{content:'→';color:var(--rouge);font-weight:700;flex-shrink:0;}

/* SIGNATURE */
.signature{
    display:flex;justify-content:space-between;align-items:flex-end;
    padding-top:16px;border-top:1px solid var(--bordure);
}
.sig-left{font-size:11px;color:var(--texte-doux);}
.sig-right{text-align:center;}
.sig-box{
    width:140px;height:60px;border:1.5px dashed var(--bordure);
    border-radius:8px;margin-bottom:6px;
    display:flex;align-items:center;justify-content:center;
    font-size:10px;color:#CCC;
}
.sig-nom{font-size:11px;color:var(--texte-doux);}

/* ACTIONS */
.conv-actions{
    display:flex;gap:12px;justify-content:center;
    padding:20px 32px;
    background:var(--fond);border-top:1px solid var(--bordure);
}
.btn-imprimer{
    padding:12px 28px;border-radius:10px;border:none;
    background:linear-gradient(135deg,var(--bleu),var(--bleu-f));
    color:#fff;font-size:13px;font-weight:700;
    font-family:'DM Sans',sans-serif;cursor:pointer;
    box-shadow:0 4px 16px rgba(26,58,108,0.3);
    transition:all 0.2s;
    display:flex;align-items:center;gap:8px;
}
.btn-imprimer:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(26,58,108,0.4);}
.btn-telecharger{
    padding:12px 28px;border-radius:10px;
    border:2px solid var(--bordure);
    background:var(--blanc);color:var(--texte);
    font-size:13px;font-weight:700;
    font-family:'DM Sans',sans-serif;cursor:pointer;
    transition:all 0.2s;
    display:flex;align-items:center;gap:8px;
}
.btn-telecharger:hover{border-color:var(--bleu);color:var(--bleu);}

/* PAS DE CONVOCATION */
.no-conv{
    text-align:center;padding:60px 32px;
    color:var(--texte-doux);
}
.no-conv .nc-ico{font-size:56px;margin-bottom:16px;}
.no-conv .nc-titre{font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:var(--bleu);margin-bottom:8px;}
.no-conv .nc-desc{font-size:13px;color:var(--texte-doux);line-height:1.7;}

/* FOOTER */
.footer{text-align:center;padding:24px;font-size:11px;color:#BBB;margin-top:8px;}
.footer strong{color:var(--bleu);}

/* FADE */
.fi{opacity:0;transform:translateY(14px);animation:fadeUp 0.45s ease forwards;}
@keyframes fadeUp{to{opacity:1;transform:translateY(0)}}
.d1{animation-delay:0.05s}.d2{animation-delay:0.1s}.d3{animation-delay:0.15s}

@media print{
    .topbar,.tabs-wrap,.conv-actions,.footer{display:none!important;}
    body{background:#fff;}
    .conv-card{box-shadow:none;border:1px solid #ddd;}
    .conv-panel{display:block!important;}
}
</style>
</head>
<body>

{{-- ── TOPBAR ── --}}
<div class="topbar">
    <div class="topbar-left">
        <div class="tb-logo">
            <img src="{{ asset('images/logo-menfop.jpeg') }}" alt="MENFOP">
        </div>
        <div class="tb-brand">
            <div class="name">Système BAC 2026</div>
            <div class="sub">MENFOP · Djibouti</div>
        </div>
    </div>
    <div class="topbar-right">
        <div class="cand-pill">
            <div class="cand-av">{{ strtoupper(substr(session('utilisateur_nom','CA'),0,2)) }}</div>
            <div class="cand-nom">{{ session('utilisateur_nom','Candidat') }}</div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">🚪 Déconnexion</button>
        </form>
    </div>
</div>

<div class="content">

    {{-- WELCOME --}}
    <div class="welcome fi">
        <div class="welcome-text">
            <div class="welcome-eye">Baccalauréat Général 2026 — République de Djibouti</div>
            <div class="welcome-title">Bonjour, <em>{{ session('utilisateur_nom','Candidat') }}</em> 👨‍🎓</div>
            <div class="welcome-sub">
                Bienvenue sur votre espace candidat.<br>
                Consultez vos convocations pour le 1er tour et le 2ème tour (rattrapage).
            </div>
        </div>
        <div class="welcome-badge">
            <div class="mat-badge">
                <div class="mat-num">DJ-2026-0001</div>
                <div class="mat-lbl">Numéro de Matricule</div>
            </div>
        </div>
    </div>

    {{-- TABS --}}
    <div class="tabs-wrap fi d1">
        <div class="tab-btn active" onclick="showTab('tour1',this)">
            <div class="tab-ico">📄</div>
            <div class="tab-info">
                <div class="tab-titre">Convocation 1er Tour</div>
                <div class="tab-desc">Session Principale · Juin 2026</div>
            </div>
            <div class="tab-arrow">→</div>
        </div>
        <div class="tab-btn" onclick="showTab('tour2',this)">
            <div class="tab-ico">📋</div>
            <div class="tab-info">
                <div class="tab-titre">Convocation 2ème Tour</div>
                <div class="tab-desc">Session Rattrapage · Juillet 2026</div>
            </div>
            <div class="tab-arrow">→</div>
        </div>
    </div>

    {{-- ══ CONVOCATION 1ER TOUR ══ --}}
    <div class="conv-panel show fi d2" id="panel-tour1">
        <div class="conv-card">

            {{-- EN-TÊTE --}}
            <div class="conv-entete">
                <div class="entete-left">
                    <div class="entete-logo">
                        <img src="{{ asset('images/logo-menfop.jpeg') }}" alt="MENFOP">
                    </div>
                    <div class="entete-text">
                        <div class="e-rep">République de Djibouti</div>
                        <div class="e-min">Ministère de l'Éducation Nationale<br>et de la Formation Professionnelle</div>
                    </div>
                </div>
                <div class="entete-right">
                    <div class="e-exam">BACCALAURÉAT GÉNÉRAL</div>
                    <div class="e-session">Session Principale · Année 2026</div>
                </div>
            </div>

            {{-- TITRE --}}
            <div class="conv-titre">
                <h2>Convocation</h2>
                <span class="tour">✦ SESSION PRINCIPALE — 1ER TOUR ✦</span>
            </div>

            {{-- CORPS --}}
            <div class="conv-body">

                {{-- INFOS CANDIDAT --}}
                <div class="ep-titre">Informations du Candidat</div>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-lbl">Nom Complet</div>
                        <div class="info-val">Fadumo Hassan Abdi</div>
                    </div>
                    <div class="info-item">
                        <div class="info-lbl">Date de Naissance</div>
                        <div class="info-val">15 Mars 2007</div>
                    </div>
                    <div class="info-item">
                        <div class="info-lbl">Numéro de Matricule</div>
                        <div class="info-val mono">DJ-2026-0001</div>
                    </div>
                    <div class="info-item">
                        <div class="info-lbl">Numéro d'Examen</div>
                        <div class="info-val mono">26LED-001</div>
                    </div>
                    <div class="info-item">
                        <div class="info-lbl">Série</div>
                        <div class="info-val serie">S — Scientifique</div>
                    </div>
                    <div class="info-item">
                        <div class="info-lbl">Établissement</div>
                        <div class="info-val">Lycée d'État de Djibouti</div>
                    </div>
                </div>

                {{-- CENTRE --}}
                <div class="ep-titre">Centre d'Examen</div>
                <div class="centre-box">
                    <div class="centre-ico">🏛️</div>
                    <div class="centre-info">
                        <div class="c-titre">Lycée d'État de Djibouti</div>
                        <div class="c-adresse">Avenue de la République, Djibouti-Ville</div>
                        <div class="c-code">Code Centre : LY-DJ</div>
                    </div>
                    <div class="centre-salle">
                        <div class="cs-val">A131</div>
                        <div class="cs-lbl">Salle affectée</div>
                    </div>
                </div>

                {{-- ÉPREUVES --}}
                <div class="ep-titre">Programme des Épreuves — Série S</div>
                <table class="ep-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Horaire</th>
                            <th>Matière</th>
                            <th>Type</th>
                            <th>Durée</th>
                            <th>Coeff.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="date-cell">Lun 02/06</td>
                            <td><span style="font-family:'DM Mono',monospace;font-size:11.5px">07h30 – 11h30</span></td>
                            <td><strong>Français Écrit</strong></td>
                            <td><span class="ep-type-badge ep-ecrit">Écrit</span></td>
                            <td class="duree">4h00</td>
                            <td class="coeff">4</td>
                        </tr>
                        <tr>
                            <td class="date-cell">Mar 03/06</td>
                            <td><span style="font-family:'DM Mono',monospace;font-size:11.5px">07h30 – 11h30</span></td>
                            <td><strong>Mathématiques</strong></td>
                            <td><span class="ep-type-badge ep-ecrit">Écrit</span></td>
                            <td class="duree">4h00</td>
                            <td class="coeff">7</td>
                        </tr>
                        <tr>
                            <td class="date-cell">Mar 03/06</td>
                            <td><span style="font-family:'DM Mono',monospace;font-size:11.5px">13h00 – 16h00</span></td>
                            <td><strong>Sciences Vie & Terre</strong></td>
                            <td><span class="ep-type-badge ep-ecrit">Écrit</span></td>
                            <td class="duree">3h00</td>
                            <td class="coeff">5</td>
                        </tr>
                        <tr>
                            <td class="date-cell">Mer 04/06</td>
                            <td><span style="font-family:'DM Mono',monospace;font-size:11.5px">07h30 – 11h30</span></td>
                            <td><strong>Philosophie</strong></td>
                            <td><span class="ep-type-badge ep-ecrit">Écrit</span></td>
                            <td class="duree">4h00</td>
                            <td class="coeff">4</td>
                        </tr>
                        <tr>
                            <td class="date-cell">Jeu 05/06</td>
                            <td><span style="font-family:'DM Mono',monospace;font-size:11.5px">07h30 – 10h30</span></td>
                            <td><strong>Histoire-Géographie</strong></td>
                            <td><span class="ep-type-badge ep-ecrit">Écrit</span></td>
                            <td class="duree">3h00</td>
                            <td class="coeff">3</td>
                        </tr>
                        <tr>
                            <td class="date-cell">Ven 06/06</td>
                            <td><span style="font-family:'DM Mono',monospace;font-size:11.5px">07h30 – 11h30</span></td>
                            <td><strong>Physique-Chimie</strong></td>
                            <td><span class="ep-type-badge ep-ecrit">Écrit</span></td>
                            <td class="duree">4h00</td>
                            <td class="coeff">6</td>
                        </tr>
                        <tr>
                            <td class="date-cell">Lun 09/06</td>
                            <td><span style="font-family:'DM Mono',monospace;font-size:11.5px">07h30 – 09h30</span></td>
                            <td><strong>Arabe</strong></td>
                            <td><span class="ep-type-badge ep-ecrit">Écrit</span></td>
                            <td class="duree">2h00</td>
                            <td class="coeff">3</td>
                        </tr>
                        <tr>
                            <td class="date-cell">Mar 10/06</td>
                            <td><span style="font-family:'DM Mono',monospace;font-size:11.5px">07h30 – 09h30</span></td>
                            <td><strong>Anglais LV1 — Écrit</strong></td>
                            <td><span class="ep-type-badge ep-ecrit">Écrit</span></td>
                            <td class="duree">2h00</td>
                            <td class="coeff">3</td>
                        </tr>
                        <tr>
                            <td class="date-cell">Mar 10/06</td>
                            <td><span style="font-family:'DM Mono',monospace;font-size:11.5px">10h00 – 11h00</span></td>
                            <td><strong>Anglais LV1 — Oral</strong></td>
                            <td><span class="ep-type-badge ep-oral">Oral</span></td>
                            <td class="duree">1h00</td>
                            <td class="coeff">2</td>
                        </tr>
                        <tr>
                            <td class="date-cell">Jeu 12/06</td>
                            <td><span style="font-family:'DM Mono',monospace;font-size:11.5px">07h30 – 09h30</span></td>
                            <td><strong>EPS</strong></td>
                            <td><span class="ep-type-badge ep-prat">Pratique</span></td>
                            <td class="duree">2h00</td>
                            <td class="coeff">2</td>
                        </tr>
                    </tbody>
                </table>

                {{-- INSTRUCTIONS --}}
                <div class="instructions">
                    <div class="inst-titre">⚠️ Instructions importantes</div>
                    <ul class="inst-list">
                        <li>Se présenter <strong>30 minutes avant</strong> le début de chaque épreuve.</li>
                        <li>Apporter cette convocation et une <strong>pièce d'identité</strong> (CNI ou passeport).</li>
                        <li>Les téléphones portables et appareils électroniques sont <strong>strictement interdits</strong>.</li>
                        <li>Aucun candidat ne sera admis après le début de l'épreuve.</li>
                        <li>Apporter uniquement le matériel autorisé (stylo bleu/noir, calculatrice autorisée).</li>
                    </ul>
                </div>

                {{-- SIGNATURE --}}
                <div class="signature">
                    <div class="sig-left">
                        Djibouti, le {{ date('d/m/Y') }}<br>
                        <span style="font-size:10px;color:#BBB">Document généré automatiquement par le système BAC 2026</span>
                    </div>
                    <div class="sig-right">
                        <div class="sig-box">Cachet & Signature</div>
                        <div class="sig-nom">Le Directeur des Examens<br>MENFOP — Djibouti</div>
                    </div>
                </div>
            </div>

            {{-- ACTIONS --}}
            <div class="conv-actions">
                <button class="btn-imprimer" onclick="window.print()">🖨️ Imprimer la convocation</button>
                <button class="btn-telecharger">📥 Télécharger PDF</button>
            </div>
        </div>
    </div>

    {{-- ══ CONVOCATION 2ÈME TOUR ══ --}}
    <div class="conv-panel fi d2" id="panel-tour2">
        <div class="conv-card">

            <div class="conv-entete">
                <div class="entete-left">
                    <div class="entete-logo">
                        <img src="{{ asset('images/logo-menfop.jpeg') }}" alt="MENFOP">
                    </div>
                    <div class="entete-text">
                        <div class="e-rep">République de Djibouti</div>
                        <div class="e-min">Ministère de l'Éducation Nationale<br>et de la Formation Professionnelle</div>
                    </div>
                </div>
                <div class="entete-right">
                    <div class="e-exam">BACCALAURÉAT GÉNÉRAL</div>
                    <div class="e-session">Session Rattrapage · Année 2026</div>
                </div>
            </div>

            <div class="conv-titre">
                <h2>Convocation</h2>
                <span class="tour tour2">✦ SESSION RATTRAPAGE — 2ÈME TOUR ✦</span>
            </div>

            <div class="conv-body">
                <div class="ep-titre">Informations du Candidat</div>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-lbl">Nom Complet</div>
                        <div class="info-val">Fadumo Hassan Abdi</div>
                    </div>
                    <div class="info-item">
                        <div class="info-lbl">Date de Naissance</div>
                        <div class="info-val">15 Mars 2007</div>
                    </div>
                    <div class="info-item">
                        <div class="info-lbl">Numéro de Matricule</div>
                        <div class="info-val mono">DJ-2026-0001</div>
                    </div>
                    <div class="info-item">
                        <div class="info-lbl">Numéro d'Anonymat</div>
                        <div class="info-val mono">ANO-2026-0547</div>
                    </div>
                    <div class="info-item">
                        <div class="info-lbl">Série</div>
                        <div class="info-val serie">S — Scientifique</div>
                    </div>
                    <div class="info-item">
                        <div class="info-lbl">Résultat 1er Tour</div>
                        <div class="info-val" style="color:var(--or-f)">⏳ Admis au rattrapage</div>
                    </div>
                </div>

                <div class="ep-titre">Centre d'Examen — Rattrapage</div>
                <div class="centre-box" style="border-color:rgba(230,168,23,0.3);background:rgba(230,168,23,0.05);">
                    <div class="centre-ico">🏛️</div>
                    <div class="centre-info">
                        <div class="c-titre">Lycée d'État de Djibouti</div>
                        <div class="c-adresse">Avenue de la République, Djibouti-Ville</div>
                        <div class="c-code">Code Centre : LY-DJ · Session Rattrapage</div>
                    </div>
                    <div class="centre-salle">
                        <div class="cs-val" style="color:var(--or-f)">B20</div>
                        <div class="cs-lbl">Salle affectée</div>
                    </div>
                </div>

                <div class="ep-titre">Épreuves Orales de Rattrapage</div>
                <table class="ep-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Horaire</th>
                            <th>Matière</th>
                            <th>Type</th>
                            <th>Durée</th>
                            <th>Coeff.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="date-cell" style="color:var(--or-f)">Lun 23/06</td>
                            <td><span style="font-family:'DM Mono',monospace;font-size:11.5px">08h00 – 09h00</span></td>
                            <td><strong>Mathématiques — Oral</strong></td>
                            <td><span class="ep-type-badge ep-oral">Oral</span></td>
                            <td class="duree">1h00</td>
                            <td class="coeff">7</td>
                        </tr>
                        <tr>
                            <td class="date-cell" style="color:var(--or-f)">Lun 23/06</td>
                            <td><span style="font-family:'DM Mono',monospace;font-size:11.5px">10h00 – 11h00</span></td>
                            <td><strong>Physique-Chimie — Oral</strong></td>
                            <td><span class="ep-type-badge ep-oral">Oral</span></td>
                            <td class="duree">1h00</td>
                            <td class="coeff">6</td>
                        </tr>
                        <tr>
                            <td class="date-cell" style="color:var(--or-f)">Mar 24/06</td>
                            <td><span style="font-family:'DM Mono',monospace;font-size:11.5px">08h00 – 09h00</span></td>
                            <td><strong>Français — Oral</strong></td>
                            <td><span class="ep-type-badge ep-oral">Oral</span></td>
                            <td class="duree">1h00</td>
                            <td class="coeff">4</td>
                        </tr>
                    </tbody>
                </table>

                <div class="instructions" style="background:rgba(230,168,23,0.06);border-color:rgba(230,168,23,0.2);">
                    <div class="inst-titre" style="color:var(--or-f)">⚠️ Instructions — Session Rattrapage</div>
                    <ul class="inst-list">
                        <li>Se présenter <strong>20 minutes avant</strong> le début de chaque épreuve orale.</li>
                        <li>Apporter cette convocation et une <strong>pièce d'identité valide</strong>.</li>
                        <li>Les résultats définitifs seront affichés le <strong>30 Juin 2026</strong>.</li>
                        <li>Aucun report d'épreuve ne sera accordé sauf cas de force majeure.</li>
                    </ul>
                </div>

                <div class="signature">
                    <div class="sig-left">
                        Djibouti, le {{ date('d/m/Y') }}<br>
                        <span style="font-size:10px;color:#BBB">Document généré automatiquement par le système BAC 2026</span>
                    </div>
                    <div class="sig-right">
                        <div class="sig-box">Cachet & Signature</div>
                        <div class="sig-nom">Le Directeur des Examens<br>MENFOP — Djibouti</div>
                    </div>
                </div>
            </div>

            <div class="conv-actions">
                <button class="btn-imprimer" onclick="window.print()">🖨️ Imprimer la convocation</button>
                <button class="btn-telecharger">📥 Télécharger PDF</button>
            </div>
        </div>
    </div>

    <div class="footer">
        <strong>MENFOP</strong> · Ministère de l'Éducation Nationale et de la Formation Professionnelle<br>
        République de Djibouti · Système de Planning BAC 2026 · © 2026 Tous droits réservés
    </div>
</div>

<script>
function showTab(tour, btn) {
    document.querySelectorAll('.conv-panel').forEach(function(p){ p.classList.remove('show'); });
    document.querySelectorAll('.tab-btn').forEach(function(b){ b.classList.remove('active'); });
    document.getElementById('panel-' + tour).classList.add('show');
    btn.classList.add('active');
}
</script>

</body>
</html>