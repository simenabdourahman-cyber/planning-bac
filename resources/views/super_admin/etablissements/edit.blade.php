<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ isset($etab) ? 'Modifier' : 'Nouvel' }} Établissement — BAC 2026</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
:root{
    --rouge:#C0392B;--rouge-f:#96281B;
    --bleu:#1A3A6C;--bleu-f:#0F2451;
    --vert:#27AE60;--or-f:#E6A817;
    --fond:#F4F2ED;--blanc:#FFFFFF;
    --texte:#1C1C1C;--texte-doux:#6B7280;
    --bordure:#E5E0D8;
    --ombre:0 4px 24px rgba(0,0,0,0.07);
    --ombre-forte:0 16px 48px rgba(0,0,0,0.13);
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
.topbar{position:sticky;top:0;z-index:50;background:rgba(244,242,237,0.94);backdrop-filter:blur(16px);border-bottom:1px solid var(--bordure);padding:0 28px;height:62px;display:flex;align-items:center;}
.page-title{font-family:'Playfair Display',serif;font-size:19px;font-weight:700;color:var(--bleu);}
.page-title span{color:var(--rouge);}
.breadcrumb{font-size:11.5px;color:var(--texte-doux);margin-top:2px;}
.btn{padding:8px 18px;border-radius:9px;font-size:12.5px;font-weight:700;cursor:pointer;border:none;font-family:'DM Sans',sans-serif;transition:all 0.2s;text-decoration:none;display:inline-flex;align-items:center;gap:6px;}
.btn-primary{background:linear-gradient(135deg,var(--rouge),var(--rouge-f));color:#fff;box-shadow:0 4px 14px rgba(192,57,43,0.3);}
.btn-primary:hover{transform:translateY(-1px);}
.btn-bleu{background:linear-gradient(135deg,var(--bleu),var(--bleu-f));color:#fff;}
.btn-outline{background:transparent;border:1.5px solid var(--bordure);color:var(--texte-doux);}
.btn-outline:hover{border-color:var(--bleu);color:var(--bleu);}
.content{padding:28px;max-width:780px;}
.form-card{background:var(--blanc);border-radius:18px;box-shadow:var(--ombre-forte);border:1px solid var(--bordure);overflow:hidden;}
.form-head{padding:22px 28px;border-bottom:1px solid var(--bordure);background:rgba(26,58,108,0.03);display:flex;align-items:center;gap:14px;}
.fh-ico{width:48px;height:48px;border-radius:13px;background:rgba(26,58,108,0.1);display:flex;align-items:center;justify-content:center;font-size:22px;}
.fh-titre{font-family:'Playfair Display',serif;font-size:18px;font-weight:700;color:var(--bleu);}
.fh-desc{font-size:12px;color:var(--texte-doux);margin-top:2px;}
.form-body{padding:28px;}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:18px;}
.fg{display:flex;flex-direction:column;gap:6px;}
.fl{font-size:11px;font-weight:700;letter-spacing:0.06em;text-transform:uppercase;color:#777;}
.fl span{color:var(--rouge);}
.fw{position:relative;}
.fi-ico{position:absolute;left:12px;top:50%;transform:translateY(-50%);font-size:15px;color:#CCC;pointer-events:none;}
.fi{padding:11px 14px 11px 40px;border:2px solid var(--bordure);border-radius:10px;font-size:13.5px;font-family:'DM Sans',sans-serif;color:var(--texte);background:#FAFAFA;outline:none;transition:all 0.2s;width:100%;}
.fi:focus{border-color:var(--bleu);background:#fff;box-shadow:0 0 0 3px rgba(26,58,108,0.08);}
.fi.err{border-color:var(--rouge);}
.fe{font-size:11px;color:var(--rouge);margin-top:4px;}
.section-div{font-size:11px;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;color:var(--bleu);margin-bottom:16px;margin-top:4px;display:flex;align-items:center;gap:10px;}
.section-div::after{content:'';flex:1;height:1px;background:var(--bordure);}
.form-footer{padding:20px 28px;border-top:1px solid var(--bordure);background:var(--fond);display:flex;justify-content:space-between;align-items:center;}
.fi-anim{opacity:0;transform:translateY(14px);animation:fadeUp 0.45s ease forwards;}
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
        <a href="{{ route('super_admin.dashboard') }}" class="nav-item"><span class="ni">🏠</span> Tableau de bord</a>
        <div class="nav-section">Administration</div>
        <a href="{{ route('super_admin.utilisateurs.index') }}" class="nav-item"><span class="ni">👥</span> Utilisateurs</a>
        <a href="{{ route('super_admin.candidats.index') }}" class="nav-item"><span class="ni">👨‍🎓</span> Candidats</a>
        <a href="{{ route('super_admin.etablissements.index') }}" class="nav-item active"><span class="ni">🏫</span> Établissements</a>
        <a href="#" class="nav-item"><span class="ni">🏛️</span> Centres</a>
        <div class="nav-section">Examens</div>
        <a href="#" class="nav-item"><span class="ni">🗂️</span> Séries</a>
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
            <div class="page-title">
                {{ isset($etab) ? 'Modifier l\'' : 'Nouvel ' }}<span>Établissement</span>
            </div>
            <div class="breadcrumb">
                <a href="{{ route('super_admin.etablissements.index') }}" style="color:var(--rouge);text-decoration:none;">← Retour à la liste</a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="form-card fi-anim">
            <div class="form-head">
                <div class="fh-ico">🏫</div>
                <div>
                    <div class="fh-titre">{{ isset($etab) ? 'Modifier : ' . $etab->intitule : 'Ajouter un établissement' }}</div>
                    <div class="fh-desc">Remplissez les informations de l'établissement — BAC 2026</div>
                </div>
            </div>

            <form method="POST" action="{{ isset($etab) ? route('super_admin.etablissements.update', $etab->id_etab) : route('super_admin.etablissements.store') }}">
                @csrf
                @if(isset($etab)) @method('PUT') @endif

                <div class="form-body">

                    <div class="section-div">Identification</div>
                    <div class="form-row">
                        <div class="fg">
                            <label class="fl">Code <span>*</span></label>
                            <div class="fw">
                                <span class="fi-ico">🏷️</span>
                                <input type="text" name="code" class="fi @error('code') err @enderror"
                                    value="{{ old('code', $etab->code ?? '') }}"
                                    placeholder="Ex: LED-DJ" required style="text-transform:uppercase">
                            </div>
                            @error('code')<p class="fe">{{ $message }}</p>@enderror
                        </div>
                        <div class="fg">
                            <label class="fl">Code Matricule</label>
                            <div class="fw">
                                <span class="fi-ico">🔢</span>
                                <input type="text" name="code_matricule" class="fi"
                                    value="{{ old('code_matricule', $etab->code_matricule ?? '') }}"
                                    placeholder="Optionnel">
                            </div>
                        </div>
                    </div>

                    <div class="fg" style="margin-bottom:18px">
                        <label class="fl">Intitulé complet <span>*</span></label>
                        <div class="fw">
                            <span class="fi-ico">🏫</span>
                            <input type="text" name="intitule" class="fi @error('intitule') err @enderror"
                                value="{{ old('intitule', $etab->intitule ?? '') }}"
                                placeholder="Nom complet de l'établissement" required>
                        </div>
                        @error('intitule')<p class="fe">{{ $message }}</p>@enderror
                    </div>

                    <div class="section-div">Responsable & Contact</div>
                    <div class="form-row">
                        <div class="fg">
                            <label class="fl">Responsable <span>*</span></label>
                            <div class="fw">
                                <span class="fi-ico">👤</span>
                                <input type="text" name="responsable" class="fi @error('responsable') err @enderror"
                                    value="{{ old('responsable', $etab->responsable ?? '') }}"
                                    placeholder="Nom du directeur" required>
                            </div>
                            @error('responsable')<p class="fe">{{ $message }}</p>@enderror
                        </div>
                        <div class="fg">
                            <label class="fl">Téléphone <span>*</span></label>
                            <div class="fw">
                                <span class="fi-ico">📞</span>
                                <input type="number" name="telephone" class="fi @error('telephone') err @enderror"
                                    value="{{ old('telephone', $etab->telephone ?? '') }}"
                                    placeholder="253771234567" required>
                            </div>
                            @error('telephone')<p class="fe">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="fg">
                            <label class="fl">Email</label>
                            <div class="fw">
                                <span class="fi-ico">✉️</span>
                                <input type="email" name="email" class="fi"
                                    value="{{ old('email', $etab->email ?? '') }}"
                                    placeholder="contact@etab.dj">
                            </div>
                        </div>
                        <div class="fg">
                            <label class="fl">Boîte Postale</label>
                            <div class="fw">
                                <span class="fi-ico">📫</span>
                                <input type="number" name="bp" class="fi"
                                    value="{{ old('bp', $etab->bp ?? '') }}"
                                    placeholder="Optionnel">
                            </div>
                        </div>
                    </div>

                    <div class="section-div">Classification</div>
                    <div class="form-row">
                        <div class="fg">
                            <label class="fl">Type d'établissement <span>*</span></label>
                            <div class="fw">
                                <span class="fi-ico">🏷️</span>
                                <select name="id_type_etab" class="fi" required>
                                    <option value="">— Sélectionner —</option>
                                    <option value="1" {{ old('id_type_etab', $etab->id_type_etab ?? '') == 1 ? 'selected' : '' }}>Public</option>
                                    <option value="2" {{ old('id_type_etab', $etab->id_type_etab ?? '') == 2 ? 'selected' : '' }}>Privé</option>
                                    <option value="3" {{ old('id_type_etab', $etab->id_type_etab ?? '') == 3 ? 'selected' : '' }}>Communautaire</option>
                                </select>
                            </div>
                            @error('id_type_etab')<p class="fe">{{ $message }}</p>@enderror
                        </div>
                        <div class="fg">
                            <label class="fl">Niveau d'enseignement <span>*</span></label>
                            <div class="fw">
                                <span class="fi-ico">📚</span>
                                <select name="id_niveau_ens" class="fi" required>
                                    <option value="">— Sélectionner —</option>
                                    <option value="1" {{ old('id_niveau_ens', $etab->id_niveau_ens ?? '') == 1 ? 'selected' : '' }}>Lycée</option>
                                    <option value="2" {{ old('id_niveau_ens', $etab->id_niveau_ens ?? '') == 2 ? 'selected' : '' }}>Collège-Lycée</option>
                                    <option value="3" {{ old('id_niveau_ens', $etab->id_niveau_ens ?? '') == 3 ? 'selected' : '' }}>Technique</option>
                                </select>
                            </div>
                            @error('id_niveau_ens')<p class="fe">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="fg">
                            <label class="fl">Circonscription <span>*</span></label>
                            <div class="fw">
                                <span class="fi-ico">📍</span>
                                <select name="id_circonscription" class="fi" required>
                                    <option value="">— Sélectionner —</option>
                                    <option value="1" {{ old('id_circonscription', $etab->id_circonscription ?? '') == 1 ? 'selected' : '' }}>Djibouti-Ville</option>
                                    <option value="2" {{ old('id_circonscription', $etab->id_circonscription ?? '') == 2 ? 'selected' : '' }}>Ali-Sabieh</option>
                                    <option value="3" {{ old('id_circonscription', $etab->id_circonscription ?? '') == 3 ? 'selected' : '' }}>Dikhil</option>
                                    <option value="4" {{ old('id_circonscription', $etab->id_circonscription ?? '') == 4 ? 'selected' : '' }}>Tadjourah</option>
                                    <option value="5" {{ old('id_circonscription', $etab->id_circonscription ?? '') == 5 ? 'selected' : '' }}>Obock</option>
                                    <option value="6" {{ old('id_circonscription', $etab->id_circonscription ?? '') == 6 ? 'selected' : '' }}>Arta</option>
                                </select>
                            </div>
                            @error('id_circonscription')<p class="fe">{{ $message }}</p>@enderror
                        </div>
                        <div class="fg">
                            <label class="fl">Masque matricule</label>
                            <div class="fw">
                                <span class="fi-ico">🔣</span>
                                <input type="text" name="masque" class="fi"
                                    value="{{ old('masque', $etab->masque ?? '') }}"
                                    placeholder="Ex: LED-####">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-footer">
                    <a href="{{ route('super_admin.etablissements.index') }}" class="btn btn-outline">← Annuler</a>
                    <button type="submit" class="btn btn-primary">
                        {{ isset($etab) ? '💾 Enregistrer' : '🚀 Créer l\'établissement' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
</body>
</html>