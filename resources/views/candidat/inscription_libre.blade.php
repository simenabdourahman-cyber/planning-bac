<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscription Candidat Libre — BAC 2026</title>
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

/* TOPBAR */
.topbar{
    background:var(--bleu-f);padding:0 32px;height:64px;
    display:flex;align-items:center;justify-content:space-between;
    box-shadow:0 4px 20px rgba(15,36,81,0.3);
}
.topbar-left{display:flex;align-items:center;gap:14px;}
.tb-logo{width:42px;height:42px;border-radius:50%;background:#fff;padding:3px;overflow:hidden;}
.tb-logo img{width:100%;height:100%;object-fit:cover;border-radius:50%;}
.tb-brand .name{font-family:'Playfair Display',serif;font-size:14px;font-weight:700;color:#fff;}
.tb-brand .sub{font-size:9.5px;color:rgba(255,255,255,0.4);letter-spacing:0.1em;text-transform:uppercase;}
.btn-retour{
    background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.2);
    color:rgba(255,255,255,0.8);padding:7px 16px;border-radius:8px;
    font-size:12px;font-weight:600;cursor:pointer;
    font-family:'DM Sans',sans-serif;transition:all 0.2s;text-decoration:none;
}
.btn-retour:hover{background:rgba(255,255,255,0.2);color:#fff;}

/* CONTENT */
.content{max-width:820px;margin:0 auto;padding:36px 24px;}

/* HERO */
.hero{
    background:linear-gradient(135deg,var(--bleu-f) 0%,#0D1F4A 60%,#1A3A6C 100%);
    border-radius:18px;padding:28px 32px;margin-bottom:28px;
    position:relative;overflow:hidden;
    box-shadow:0 8px 40px rgba(15,36,81,0.3);
}
.hero::before{content:'';position:absolute;right:-40px;top:-40px;width:220px;height:220px;border-radius:50%;background:rgba(255,255,255,0.03);}
.hero-eye{font-size:9.5px;letter-spacing:0.2em;text-transform:uppercase;color:rgba(255,255,255,0.45);font-weight:700;margin-bottom:8px;}
.hero-title{font-family:'Playfair Display',serif;font-size:26px;font-weight:900;color:#fff;margin-bottom:6px;}
.hero-title em{color:var(--or);font-style:normal;}
.hero-sub{font-size:13px;color:rgba(255,255,255,0.55);line-height:1.6;}

/* STEPS */
.steps{display:flex;gap:0;margin-bottom:28px;}
.step{
    flex:1;display:flex;align-items:center;gap:10px;
    padding:14px 16px;background:var(--blanc);
    border:1px solid var(--bordure);
    cursor:pointer;transition:all 0.2s;
    position:relative;
}
.step:first-child{border-radius:12px 0 0 12px;}
.step:last-child{border-radius:0 12px 12px 0;}
.step:not(:last-child)::after{
    content:'›';position:absolute;right:-10px;top:50%;transform:translateY(-50%);
    font-size:20px;color:var(--bordure);z-index:1;font-weight:300;
}
.step.active{background:linear-gradient(135deg,var(--bleu-f),var(--bleu));border-color:var(--bleu);}
.step.done{background:rgba(39,174,96,0.06);border-color:rgba(39,174,96,0.3);}
.step-num{
    width:30px;height:30px;border-radius:50%;
    display:flex;align-items:center;justify-content:center;
    font-size:12px;font-weight:700;flex-shrink:0;
}
.step.active .step-num{background:rgba(255,255,255,0.2);color:#fff;}
.step:not(.active):not(.done) .step-num{background:var(--fond);color:var(--texte-doux);}
.step.done .step-num{background:var(--vert);color:#fff;}
.step-info .step-titre{font-size:12px;font-weight:700;}
.step.active .step-info .step-titre{color:#fff;}
.step:not(.active):not(.done) .step-info .step-titre{color:var(--texte-doux);}
.step.done .step-info .step-titre{color:var(--vert);}
.step-info .step-desc{font-size:10px;margin-top:1px;}
.step.active .step-info .step-desc{color:rgba(255,255,255,0.55);}
.step:not(.active) .step-info .step-desc{color:#CCC;}

/* FORM CARD */
.form-card{
    background:var(--blanc);border-radius:18px;
    box-shadow:var(--ombre-forte);border:1px solid var(--bordure);
    overflow:hidden;margin-bottom:20px;
}
.form-card-head{
    padding:20px 28px;border-bottom:1px solid var(--bordure);
    background:rgba(26,58,108,0.03);
    display:flex;align-items:center;gap:12px;
}
.fch-ico{font-size:24px;}
.fch-titre{font-family:'Playfair Display',serif;font-size:17px;font-weight:700;color:var(--bleu);}
.fch-desc{font-size:12px;color:var(--texte-doux);margin-top:2px;}

.form-body{padding:28px;}

/* PANELS */
.form-panel{display:none;}
.form-panel.show{display:block;}

/* FORM ELEMENTS */
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:18px;}
.form-row-3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:18px;margin-bottom:18px;}
.form-row-full{margin-bottom:18px;}
.fg{display:flex;flex-direction:column;gap:6px;}
.fl{font-size:11px;font-weight:700;letter-spacing:0.06em;text-transform:uppercase;color:#777;}
.fl span{color:var(--rouge);}
.fi{
    padding:11px 14px;border:2px solid var(--bordure);border-radius:10px;
    font-size:13.5px;font-family:'DM Sans',sans-serif;color:var(--texte);
    background:#FAFAFA;outline:none;transition:all 0.2s;
    width:100%;
}
.fi:focus{border-color:var(--bleu);background:#fff;box-shadow:0 0 0 3px rgba(26,58,108,0.08);}
.fi.err{border-color:var(--rouge);}
.fi-hint{font-size:10.5px;color:#BBB;margin-top:3px;}
select.fi{cursor:pointer;}

/* SECTION DIVIDER */
.section-div{
    font-size:11px;font-weight:700;letter-spacing:0.15em;
    text-transform:uppercase;color:var(--bleu);
    margin-bottom:18px;margin-top:8px;
    display:flex;align-items:center;gap:10px;
}
.section-div::after{content:'';flex:1;height:1px;background:var(--bordure);}

/* SERIE CARDS */
.serie-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:18px;}
.serie-card{
    border:2px solid var(--bordure);border-radius:12px;
    padding:16px 12px;text-align:center;cursor:pointer;
    background:#FAFAFA;transition:all 0.2s;
}
.serie-card:hover{border-color:var(--bleu);background:#fff;}
.serie-card.selected{border-color:var(--bleu);background:rgba(26,58,108,0.07);box-shadow:0 0 0 3px rgba(26,58,108,0.12);}
.serie-card input[type=radio]{display:none;}
.sc-badge{
    width:40px;height:40px;border-radius:10px;
    display:flex;align-items:center;justify-content:center;
    font-weight:800;font-size:16px;margin:0 auto 8px;
}
.sc-nom{font-size:11.5px;font-weight:600;color:var(--texte);line-height:1.3;}
.sc-desc{font-size:10px;color:var(--texte-doux);margin-top:3px;}
.serie-card.selected .sc-nom{color:var(--bleu);}

/* DOCUMENT UPLOAD */
.doc-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:18px;}
.doc-upload{
    border:2px dashed var(--bordure);border-radius:12px;
    padding:20px;text-align:center;cursor:pointer;
    transition:all 0.2s;background:#FAFAFA;
    position:relative;
}
.doc-upload:hover{border-color:var(--bleu);background:#fff;}
.doc-upload input[type=file]{
    position:absolute;inset:0;opacity:0;cursor:pointer;width:100%;height:100%;
}
.du-ico{font-size:28px;margin-bottom:8px;}
.du-titre{font-size:12.5px;font-weight:700;color:var(--texte);margin-bottom:3px;}
.du-desc{font-size:10.5px;color:var(--texte-doux);}
.du-req{font-size:9.5px;color:var(--rouge);margin-top:4px;font-weight:600;}

/* RECAP */
.recap-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:20px;}
.recap-item{background:var(--fond);border-radius:10px;padding:13px 16px;border:1px solid var(--bordure);}
.recap-lbl{font-size:10px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:#999;margin-bottom:5px;}
.recap-val{font-size:13.5px;font-weight:700;color:var(--texte);}
.recap-val.mono{font-family:'DM Mono',monospace;color:var(--bleu);}
.recap-full{grid-column:1/-1;}

/* CONFIRMATION */
.confirm-box{
    background:rgba(39,174,96,0.06);border:1.5px solid rgba(39,174,96,0.2);
    border-radius:12px;padding:16px 20px;margin-bottom:20px;
}
.cb-titre{font-size:13px;font-weight:700;color:var(--vert);margin-bottom:8px;display:flex;align-items:center;gap:8px;}
.cb-list{list-style:none;display:flex;flex-direction:column;gap:6px;}
.cb-list li{font-size:12px;color:var(--texte);display:flex;align-items:flex-start;gap:8px;}
.cb-list li::before{content:'✓';color:var(--vert);font-weight:700;flex-shrink:0;}

/* ALERT */
.alert-info{
    background:rgba(26,58,108,0.06);border:1.5px solid rgba(26,58,108,0.15);
    border-radius:10px;padding:14px 18px;
    font-size:12px;color:var(--bleu);line-height:1.6;
    margin-bottom:18px;display:flex;gap:10px;align-items:flex-start;
}

/* NAVIGATION BTNS */
.form-nav{
    display:flex;justify-content:space-between;align-items:center;
    padding:20px 28px;border-top:1px solid var(--bordure);
    background:var(--fond);
}
.btn{padding:11px 24px;border-radius:10px;font-size:13px;font-weight:700;cursor:pointer;border:none;font-family:'DM Sans',sans-serif;transition:all 0.2s;}
.btn-primary{background:linear-gradient(135deg,var(--bleu),var(--bleu-f));color:#fff;box-shadow:0 4px 14px rgba(26,58,108,0.3);}
.btn-primary:hover{transform:translateY(-1px);box-shadow:0 8px 24px rgba(26,58,108,0.4);}
.btn-rouge{background:linear-gradient(135deg,var(--rouge),var(--rouge-f));color:#fff;box-shadow:0 4px 14px rgba(192,57,43,0.3);}
.btn-rouge:hover{transform:translateY(-1px);}
.btn-outline{background:transparent;border:2px solid var(--bordure);color:var(--texte-doux);}
.btn-outline:hover{border-color:var(--bleu);color:var(--bleu);}
.btn-vert{background:linear-gradient(135deg,var(--vert),#1E8449);color:#fff;box-shadow:0 4px 14px rgba(39,174,96,0.3);}
.btn-vert:hover{transform:translateY(-1px);}

/* SUCCESS PAGE */
.success-page{
    background:var(--blanc);border-radius:18px;
    box-shadow:var(--ombre-forte);border:1px solid var(--bordure);
    padding:60px 40px;text-align:center;
    display:none;
}
.success-page.show{display:block;}
.success-ico{font-size:72px;margin-bottom:20px;}
.success-titre{font-family:'Playfair Display',serif;font-size:28px;font-weight:900;color:var(--vert);margin-bottom:10px;}
.success-sub{font-size:14px;color:var(--texte-doux);line-height:1.7;max-width:480px;margin:0 auto 28px;}
.success-mat{
    display:inline-block;
    font-family:'DM Mono',monospace;font-size:22px;font-weight:700;
    color:var(--bleu);background:rgba(26,58,108,0.08);
    padding:12px 28px;border-radius:12px;
    border:2px solid rgba(26,58,108,0.15);
    margin-bottom:28px;letter-spacing:0.1em;
}
.success-actions{display:flex;gap:12px;justify-content:center;}

/* FOOTER */
.footer{text-align:center;padding:24px;font-size:11px;color:#BBB;margin-top:8px;}
.footer strong{color:var(--bleu);}

/* FADE */
.fi-anim{opacity:0;transform:translateY(14px);animation:fadeUp 0.45s ease forwards;}
@keyframes fadeUp{to{opacity:1;transform:translateY(0)}}
</style>
</head>
<body>

{{-- TOPBAR --}}
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
    <a href="{{ route('login') }}" class="btn-retour">← Retour à l'accueil</a>
</div>

<div class="content">

    {{-- HERO --}}
    <div class="hero fi-anim">
        <div class="hero-eye">Baccalauréat Général 2026 — République de Djibouti</div>
        <div class="hero-title">Inscription <em>Candidat Libre</em> 📝</div>
        <div class="hero-sub">
            Remplissez ce formulaire pour vous inscrire au Baccalauréat 2026 en tant que candidat libre.<br>
            L'inscription est gratuite et doit être complétée avant le <strong style="color:var(--or)">31 Mars 2026</strong>.
        </div>
    </div>

    {{-- STEPS --}}
    <div class="steps fi-anim" id="steps">
        <div class="step active" id="step1">
            <div class="step-num">1</div>
            <div class="step-info">
                <div class="step-titre">Identité</div>
                <div class="step-desc">Infos personnelles</div>
            </div>
        </div>
        <div class="step" id="step2">
            <div class="step-num">2</div>
            <div class="step-info">
                <div class="step-titre">Série & Contact</div>
                <div class="step-desc">Choix & coordonnées</div>
            </div>
        </div>
        <div class="step" id="step3">
            <div class="step-num">3</div>
            <div class="step-info">
                <div class="step-titre">Documents</div>
                <div class="step-desc">Pièces requises</div>
            </div>
        </div>
        <div class="step" id="step4">
            <div class="step-num">4</div>
            <div class="step-info">
                <div class="step-titre">Confirmation</div>
                <div class="step-desc">Vérification finale</div>
            </div>
        </div>
    </div>

    {{-- FORM CARD --}}
    <div class="form-card fi-anim" id="formCard">

        {{-- ══ ÉTAPE 1 : IDENTITÉ ══ --}}
        <div class="form-panel show" id="panel1">
            <div class="form-card-head">
                <div class="fch-ico">👤</div>
                <div>
                    <div class="fch-titre">Informations Personnelles</div>
                    <div class="fch-desc">Renseignez vos informations d'état civil exactement comme sur votre CNI</div>
                </div>
            </div>
            <div class="form-body">
                <div class="alert-info">
                    ℹ️ Les informations doivent correspondre exactement à celles de votre <strong>Carte Nationale d'Identité</strong> ou <strong>Passeport</strong>.
                </div>

                <div class="section-div">Nom & Prénom</div>
                <div class="form-row">
                    <div class="fg">
                        <label class="fl">Nom de famille <span>*</span></label>
                        <input type="text" class="fi" id="nom" placeholder="Ex: HASSAN" oninput="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="fg">
                        <label class="fl">Prénom(s) <span>*</span></label>
                        <input type="text" class="fi" id="prenom" placeholder="Ex: Fadumo">
                    </div>
                </div>

                <div class="section-div">Naissance</div>
                <div class="form-row-3">
                    <div class="fg">
                        <label class="fl">Date de naissance <span>*</span></label>
                        <input type="date" class="fi" id="date_naissance">
                    </div>
                    <div class="fg">
                        <label class="fl">Lieu de naissance <span>*</span></label>
                        <input type="text" class="fi" id="lieu_naissance" placeholder="Ex: Djibouti">
                    </div>
                    <div class="fg">
                        <label class="fl">Genre <span>*</span></label>
                        <select class="fi" id="genre">
                            <option value="">— Sélectionner —</option>
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                    </div>
                </div>

                <div class="section-div">Identité Nationale</div>
                <div class="form-row">
                    <div class="fg">
                        <label class="fl">Nationalité <span>*</span></label>
                        <select class="fi" id="nationalite">
                            <option value="DJ">Djiboutienne</option>
                            <option value="SO">Somalienne</option>
                            <option value="ET">Éthiopienne</option>
                            <option value="ER">Érythréenne</option>
                            <option value="FR">Française</option>
                            <option value="AU">Autre</option>
                        </select>
                    </div>
                    <div class="fg">
                        <label class="fl">Numéro CNI / Passeport <span>*</span></label>
                        <input type="text" class="fi" id="cni" placeholder="Ex: DJ-123456">
                        <span class="fi-hint">Numéro figurant sur votre pièce d'identité</span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="fg">
                        <label class="fl">Ville de résidence <span>*</span></label>
                        <select class="fi" id="ville">
                            <option value="">— Sélectionner —</option>
                            <option>Djibouti-Ville</option>
                            <option>Ali-Sabieh</option>
                            <option>Dikhil</option>
                            <option>Tadjourah</option>
                            <option>Obock</option>
                            <option>Arta</option>
                        </select>
                    </div>
                    <div class="fg">
                        <label class="fl">Pays</label>
                        <input type="text" class="fi" id="pays" value="Djibouti">
                    </div>
                </div>
            </div>
            <div class="form-nav">
                <span style="font-size:12px;color:var(--texte-doux)">Étape 1 sur 4</span>
                <button class="btn btn-primary" onclick="goStep(2)">Suivant → Série & Contact</button>
            </div>
        </div>

        {{-- ══ ÉTAPE 2 : SÉRIE & CONTACT ══ --}}
        <div class="form-panel" id="panel2">
            <div class="form-card-head">
                <div class="fch-ico">🗂️</div>
                <div>
                    <div class="fch-titre">Série & Informations de Contact</div>
                    <div class="fch-desc">Choisissez votre série BAC et renseignez vos coordonnées</div>
                </div>
            </div>
            <div class="form-body">

                <div class="section-div">Série du Baccalauréat</div>
                <div class="serie-grid">
                    <div class="serie-card" onclick="selectSerie(this,'ES')">
                        <input type="radio" name="serie" value="ES">
                        <div class="sc-badge" style="background:rgba(192,57,43,0.1);color:var(--rouge)">ES</div>
                        <div class="sc-nom">Sciences Économiques & Sociales</div>
                        <div class="sc-desc">Éco, Gestion, SES</div>
                    </div>
                    <div class="serie-card" onclick="selectSerie(this,'L')">
                        <input type="radio" name="serie" value="L">
                        <div class="sc-badge" style="background:rgba(26,58,108,0.1);color:var(--bleu)">L</div>
                        <div class="sc-nom">Littéraire</div>
                        <div class="sc-desc">Lettres, Langues, Philo</div>
                    </div>
                    <div class="serie-card" onclick="selectSerie(this,'S')">
                        <input type="radio" name="serie" value="S">
                        <div class="sc-badge" style="background:rgba(39,174,96,0.1);color:var(--vert)">S</div>
                        <div class="sc-nom">Scientifique</div>
                        <div class="sc-desc">Maths, Physique, SVT</div>
                    </div>
                    <div class="serie-card" onclick="selectSerie(this,'SG')">
                        <input type="radio" name="serie" value="SG">
                        <div class="sc-badge" style="background:rgba(230,168,23,0.12);color:var(--or-f)">SG</div>
                        <div class="sc-nom">Sciences de Gestion</div>
                        <div class="sc-desc">Compta, Management</div>
                    </div>
                </div>

                <div class="section-div">Scolarité Antérieure</div>
                <div class="form-row">
                    <div class="fg">
                        <label class="fl">Dernier établissement fréquenté <span>*</span></label>
                        <input type="text" class="fi" id="dernier_etab" placeholder="Ex: Lycée d'État de Djibouti">
                    </div>
                    <div class="fg">
                        <label class="fl">Année scolaire de la Terminale <span>*</span></label>
                        <select class="fi" id="annee_term">
                            <option value="">— Sélectionner —</option>
                            <option>2024-2025</option>
                            <option>2023-2024</option>
                            <option>2022-2023</option>
                            <option>2021-2022</option>
                            <option>Avant 2021</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="fg">
                        <label class="fl">Motif candidature libre <span>*</span></label>
                        <select class="fi" id="motif">
                            <option value="">— Sélectionner —</option>
                            <option>Échec à la session précédente</option>
                            <option>Abandon scolaire</option>
                            <option>Candidat étranger</option>
                            <option>Autre</option>
                        </select>
                    </div>
                    <div class="fg">
                        <label class="fl">Centre d'examen souhaité <span>*</span></label>
                        <select class="fi" id="centre">
                            <option value="">— Sélectionner —</option>
                            <option>Lycée d'État de Djibouti (LY-DJ)</option>
                            <option>Lycée Djama Youssouf (LY-DMY)</option>
                            <option>Lycée de Hodan 4 (LY-HOD4)</option>
                            <option>Univ. Djibouti Balbala (UD-BALBALA)</option>
                            <option>Lycée PK12 (LY-PK12)</option>
                            <option>Lycée d'Ali-Sabieh (LY-AS)</option>
                        </select>
                    </div>
                </div>

                <div class="section-div">Coordonnées</div>
                <div class="form-row">
                    <div class="fg">
                        <label class="fl">Téléphone <span>*</span></label>
                        <input type="tel" class="fi" id="telephone" placeholder="Ex: +253 77 XX XX XX">
                    </div>
                    <div class="fg">
                        <label class="fl">Email</label>
                        <input type="email" class="fi" id="email" placeholder="votre@email.com">
                        <span class="fi-hint">Facultatif — pour recevoir votre convocation par email</span>
                    </div>
                </div>
            </div>
            <div class="form-nav">
                <button class="btn btn-outline" onclick="goStep(1)">← Retour</button>
                <button class="btn btn-primary" onclick="goStep(3)">Suivant → Documents</button>
            </div>
        </div>

        {{-- ══ ÉTAPE 3 : DOCUMENTS ══ --}}
        <div class="form-panel" id="panel3">
            <div class="form-card-head">
                <div class="fch-ico">📁</div>
                <div>
                    <div class="fch-titre">Pièces Justificatives</div>
                    <div class="fch-desc">Joignez les documents requis en format PDF ou image (max 5MB par fichier)</div>
                </div>
            </div>
            <div class="form-body">

                <div class="alert-info">
                    ℹ️ Tous les documents marqués <strong style="color:var(--rouge)">*</strong> sont obligatoires. Les fichiers doivent être lisibles et en bonne qualité.
                </div>

                <div class="section-div">Documents Obligatoires</div>
                <div class="doc-grid">
                    <div class="doc-upload" id="doc-cni">
                        <input type="file" accept=".pdf,.jpg,.jpeg,.png" onchange="docUploaded(this,'doc-cni')">
                        <div class="du-ico">🪪</div>
                        <div class="du-titre">Carte Nationale d'Identité <span style="color:var(--rouge)">*</span></div>
                        <div class="du-desc">Recto et verso</div>
                        <div class="du-req">PDF ou Image · Max 5MB</div>
                    </div>
                    <div class="doc-upload" id="doc-acte">
                        <input type="file" accept=".pdf,.jpg,.jpeg,.png" onchange="docUploaded(this,'doc-acte')">
                        <div class="du-ico">📄</div>
                        <div class="du-titre">Acte de Naissance <span style="color:var(--rouge)">*</span></div>
                        <div class="du-desc">Original ou copie certifiée conforme</div>
                        <div class="du-req">PDF ou Image · Max 5MB</div>
                    </div>
                    <div class="doc-upload" id="doc-releve">
                        <input type="file" accept=".pdf,.jpg,.jpeg,.png" onchange="docUploaded(this,'doc-releve')">
                        <div class="du-ico">📋</div>
                        <div class="du-titre">Relevé de Notes Terminale <span style="color:var(--rouge)">*</span></div>
                        <div class="du-desc">Dernière année de scolarité</div>
                        <div class="du-req">PDF ou Image · Max 5MB</div>
                    </div>
                    <div class="doc-upload" id="doc-photo">
                        <input type="file" accept=".jpg,.jpeg,.png" onchange="docUploaded(this,'doc-photo')">
                        <div class="du-ico">📷</div>
                        <div class="du-titre">Photo d'Identité <span style="color:var(--rouge)">*</span></div>
                        <div class="du-desc">Fond blanc, récente (moins de 3 mois)</div>
                        <div class="du-req">JPG ou PNG · Max 2MB</div>
                    </div>
                </div>

                <div class="section-div">Document Optionnel</div>
                <div class="doc-grid">
                    <div class="doc-upload" id="doc-certif">
                        <input type="file" accept=".pdf,.jpg,.jpeg,.png" onchange="docUploaded(this,'doc-certif')">
                        <div class="du-ico">📜</div>
                        <div class="du-titre">Certificat de Scolarité</div>
                        <div class="du-desc">Si disponible</div>
                        <div class="du-req">Facultatif · PDF ou Image</div>
                    </div>
                    <div class="doc-upload" id="doc-autre">
                        <input type="file" accept=".pdf,.jpg,.jpeg,.png" onchange="docUploaded(this,'doc-autre')">
                        <div class="du-ico">📎</div>
                        <div class="du-titre">Autre Document</div>
                        <div class="du-desc">Tout document complémentaire</div>
                        <div class="du-req">Facultatif · PDF ou Image</div>
                    </div>
                </div>
            </div>
            <div class="form-nav">
                <button class="btn btn-outline" onclick="goStep(2)">← Retour</button>
                <button class="btn btn-primary" onclick="goStep(4)">Suivant → Confirmation</button>
            </div>
        </div>

        {{-- ══ ÉTAPE 4 : CONFIRMATION ══ --}}
        <div class="form-panel" id="panel4">
            <div class="form-card-head">
                <div class="fch-ico">✅</div>
                <div>
                    <div class="fch-titre">Vérification & Confirmation</div>
                    <div class="fch-desc">Vérifiez vos informations avant de soumettre votre dossier</div>
                </div>
            </div>
            <div class="form-body">

                <div class="section-div">Récapitulatif du Dossier</div>
                <div class="recap-grid">
                    <div class="recap-item">
                        <div class="recap-lbl">Nom Complet</div>
                        <div class="recap-val" id="recap-nom">—</div>
                    </div>
                    <div class="recap-item">
                        <div class="recap-lbl">Date de Naissance</div>
                        <div class="recap-val" id="recap-ddn">—</div>
                    </div>
                    <div class="recap-item">
                        <div class="recap-lbl">Genre</div>
                        <div class="recap-val" id="recap-genre">—</div>
                    </div>
                    <div class="recap-item">
                        <div class="recap-lbl">CNI / Passeport</div>
                        <div class="recap-val mono" id="recap-cni">—</div>
                    </div>
                    <div class="recap-item">
                        <div class="recap-lbl">Série BAC</div>
                        <div class="recap-val" id="recap-serie">—</div>
                    </div>
                    <div class="recap-item">
                        <div class="recap-lbl">Centre Souhaité</div>
                        <div class="recap-val" id="recap-centre">—</div>
                    </div>
                    <div class="recap-item">
                        <div class="recap-lbl">Téléphone</div>
                        <div class="recap-val" id="recap-tel">—</div>
                    </div>
                    <div class="recap-item">
                        <div class="recap-lbl">Ville</div>
                        <div class="recap-val" id="recap-ville">—</div>
                    </div>
                    <div class="recap-item recap-full">
                        <div class="recap-lbl">Dernier Établissement</div>
                        <div class="recap-val" id="recap-etab">—</div>
                    </div>
                </div>

                <div class="confirm-box">
                    <div class="cb-titre">✅ Engagements du candidat</div>
                    <ul class="cb-list">
                        <li>Je certifie que toutes les informations fournies sont exactes et conformes à mes documents officiels.</li>
                        <li>Je m'engage à me présenter aux épreuves aux dates et lieux indiqués sur ma convocation.</li>
                        <li>Je reconnais que toute fausse déclaration entraînera l'annulation de mon inscription.</li>
                        <li>J'accepte le règlement intérieur des examens du Baccalauréat 2026.</li>
                    </ul>
                </div>

                <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;">
                    <input type="checkbox" id="acceptCGU" style="width:16px;height:16px;accent-color:var(--bleu);cursor:pointer;">
                    <label for="acceptCGU" style="font-size:13px;color:var(--texte);cursor:pointer;">
                        Je confirme avoir lu et accepté les conditions ci-dessus <span style="color:var(--rouge)">*</span>
                    </label>
                </div>
            </div>
            <div class="form-nav">
                <button class="btn btn-outline" onclick="goStep(3)">← Retour</button>
                <button class="btn btn-rouge" onclick="soumettre()">🚀 Soumettre mon dossier</button>
            </div>
        </div>

    </div>

    {{-- SUCCESS --}}
    <div class="success-page fi-anim" id="successPage">
        <div class="success-ico">🎉</div>
        <div class="success-titre">Dossier soumis avec succès !</div>
        <div class="success-sub">
            Votre dossier d'inscription au Baccalauréat 2026 a été enregistré.<br>
            Votre numéro de matricule provisoire est :
        </div>
        <div class="success-mat" id="matriculeGenere">DJ-2026-XXXX</div>
        <div class="success-sub" style="font-size:12px;">
            ⚠️ Conservez ce numéro précieusement. Votre dossier sera examiné par l'Administration MENFOP.<br>
            Vous recevrez une confirmation définitive dans un délai de <strong>5 jours ouvrables</strong>.
        </div>
        <div class="success-actions">
            <button class="btn btn-primary" onclick="window.print()">🖨️ Imprimer le reçu</button>
            <a href="{{ route('login') }}" class="btn btn-outline" style="text-decoration:none;display:inline-flex;align-items:center;">← Retour à l'accueil</a>
        </div>
    </div>

    <div class="footer">
        <strong>MENFOP</strong> · Ministère de l'Éducation Nationale et de la Formation Professionnelle<br>
        République de Djibouti · Système de Planning BAC 2026 · © 2026 Tous droits réservés
    </div>
</div>

<script>
var currentStep = 1;

function goStep(n) {
    // Validation basique étape 1
    if (n > 1 && currentStep === 1) {
        if (!document.getElementById('nom').value || !document.getElementById('prenom').value || !document.getElementById('date_naissance').value) {
            alert('⚠️ Veuillez remplir tous les champs obligatoires.');
            return;
        }
    }
    // Validation étape 2
    if (n > 2 && currentStep === 2) {
        var serie = document.querySelector('.serie-card.selected');
        if (!serie || !document.getElementById('telephone').value) {
            alert('⚠️ Veuillez sélectionner une série et renseigner votre téléphone.');
            return;
        }
    }

    // Maj récap à l'étape 4
    if (n === 4) majRecap();

    // Panels
    document.querySelectorAll('.form-panel').forEach(function(p){ p.classList.remove('show'); });
    document.getElementById('panel' + n).classList.add('show');

    // Steps
    document.querySelectorAll('.step').forEach(function(s, i) {
        s.classList.remove('active','done');
        if (i + 1 < n) s.classList.add('done');
        if (i + 1 === n) s.classList.add('active');
        // Update numéro
        var num = s.querySelector('.step-num');
        if (i + 1 < n) num.textContent = '✓';
        else num.textContent = i + 1;
    });

    currentStep = n;
    window.scrollTo({top: 0, behavior:'smooth'});
}

function selectSerie(el, val) {
    document.querySelectorAll('.serie-card').forEach(function(c){ c.classList.remove('selected'); });
    el.classList.add('selected');
    el.querySelector('input[type=radio]').checked = true;
}

function docUploaded(input, id) {
    if (input.files && input.files[0]) {
        var box = document.getElementById(id);
        box.style.borderColor = 'var(--vert)';
        box.style.background = 'rgba(39,174,96,0.05)';
        var ico = box.querySelector('.du-ico');
        ico.textContent = '✅';
        var titre = box.querySelector('.du-titre');
        titre.innerHTML = titre.innerHTML.replace(/\s*<span.*<\/span>/, '') + ' <span style="color:var(--vert)">✓</span>';
        var desc = box.querySelector('.du-desc');
        desc.textContent = input.files[0].name;
    }
}

function majRecap() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    document.getElementById('recap-nom').textContent = (prenom + ' ' + nom) || '—';

    var ddn = document.getElementById('date_naissance').value;
    if (ddn) {
        var d = new Date(ddn);
        document.getElementById('recap-ddn').textContent = d.toLocaleDateString('fr-FR');
    }

    var genre = document.getElementById('genre').value;
    document.getElementById('recap-genre').textContent = genre === 'M' ? 'Masculin' : genre === 'F' ? 'Féminin' : '—';
    document.getElementById('recap-cni').textContent = document.getElementById('cni').value || '—';

    var serie = document.querySelector('.serie-card.selected');
    document.getElementById('recap-serie').textContent = serie ? serie.querySelector('input').value + ' — ' + serie.querySelector('.sc-nom').textContent : '—';

    document.getElementById('recap-centre').textContent = document.getElementById('centre').value || '—';
    document.getElementById('recap-tel').textContent = document.getElementById('telephone').value || '—';
    document.getElementById('recap-ville').textContent = document.getElementById('ville').value || '—';
    document.getElementById('recap-etab').textContent = document.getElementById('dernier_etab').value || '—';
}

function soumettre() {
    if (!document.getElementById('acceptCGU').checked) {
        alert('⚠️ Veuillez accepter les conditions avant de soumettre.');
        return;
    }

    // Génération matricule provisoire
    var num = Math.floor(Math.random() * 9000) + 1000;
    document.getElementById('matriculeGenere').textContent = 'DJ-2026-' + num;

    // Afficher succès
    document.getElementById('formCard').style.display = 'none';
    document.getElementById('steps').style.display = 'none';
    document.getElementById('successPage').classList.add('show');
    window.scrollTo({top: 0, behavior:'smooth'});
}
</script>

</body>
</html>