<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nouveau Candidat — BAC 2026</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
.btn-outline{background:transparent;border:1.5px solid var(--bordure);color:var(--texte-doux);}
.btn-outline:hover{border-color:var(--bleu);color:var(--bleu);}

.content{padding:28px;max-width:750px;}

.form-card{background:var(--blanc);border-radius:18px;box-shadow:var(--ombre-forte);border:1px solid var(--bordure);overflow:hidden;}
.form-head{padding:22px 28px;border-bottom:1px solid var(--bordure);background:rgba(26,58,108,0.03);display:flex;align-items:center;gap:14px;}
.fh-ico{width:48px;height:48px;border-radius:13px;background:rgba(192,57,43,0.1);display:flex;align-items:center;justify-content:center;font-size:22px;}
.fh-titre{font-family:'Playfair Display',serif;font-size:18px;font-weight:700;color:var(--bleu);}
.fh-desc{font-size:12px;color:var(--texte-doux);margin-top:2px;}

.form-body{padding:28px;}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:18px;}
.form-full{margin-bottom:18px;}
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

/* GENRE */
.genre-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:18px;}
.genre-card{border:2px solid var(--bordure);border-radius:12px;padding:14px;text-align:center;cursor:pointer;background:#FAFAFA;transition:all 0.2s;}
.genre-card:hover{border-color:var(--bleu);}
.genre-card.selected-m{border-color:var(--bleu);background:rgba(26,58,108,0.07);}
.genre-card.selected-f{border-color:var(--rouge);background:rgba(192,57,43,0.07);}
.genre-card input{display:none;}
.gc-ico{font-size:26px;margin-bottom:6px;}
.gc-nom{font-size:13px;font-weight:700;}

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
        <a href="{{ route('super_admin.candidats.index') }}" class="nav-item active"><span class="ni">👨‍🎓</span> Candidats</a>
        <a href="#" class="nav-item"><span class="ni">🏫</span> Établissements</a>
        <a href="#" class="nav-item"><span class="ni">🏛️</span> Centres</a>
        <div class="nav-section">Examens</div>
        <a href="#" class="nav-item"><span class="ni">🗂️</span> Séries</a>
        <a href="#" class="nav-item"><span class="ni">📚</span> Épreuves</a>
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
            <div class="page-title">Nouveau <span>Candidat</span></div>
            <div class="breadcrumb">
                <a href="{{ route('super_admin.candidats.index') }}" style="color:var(--rouge);text-decoration:none;">← Retour à la liste</a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="form-card fi-anim">
            <div class="form-head">
                <div class="fh-ico">👨‍🎓</div>
                <div>
                    <div class="fh-titre">Ajouter un nouveau candidat</div>
                    <div class="fh-desc">Remplissez les informations du candidat — BAC 2026</div>
                </div>
            </div>

            <form method="POST" action="{{ route('super_admin.candidats.store') }}">
                @csrf
                <div class="form-body">

                    {{-- IDENTITÉ --}}
                    <div class="section-div">Identité</div>
                    <div class="form-row">
                        <div class="fg">
                            <label class="fl">Nom complet <span>*</span></label>
                            <div class="fw">
                                <span class="fi-ico">👤</span>
                                <input type="text" name="nom" class="fi @error('nom') err @enderror"
                                    value="{{ old('nom') }}" placeholder="Nom Prénom" required>
                            </div>
                            @error('nom')<p class="fe">{{ $message }}</p>@enderror
                        </div>
                        <div class="fg">
                            <label class="fl">Date de naissance <span>*</span></label>
                            <div class="fw">
                                <span class="fi-ico">📅</span>
                                <input type="date" name="date_naissance" class="fi @error('date_naissance') err @enderror"
                                    value="{{ old('date_naissance') }}" required>
                            </div>
                            @error('date_naissance')<p class="fe">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- GENRE --}}
                    <div class="section-div">Genre</div>
                    <div class="genre-grid">
                        <div class="genre-card {{ old('genre') === 'M' ? 'selected-m' : '' }}" onclick="selectGenre(this,'M')">
                            <input type="radio" name="genre" value="M" {{ old('genre') === 'M' ? 'checked' : '' }}>
                            <div class="gc-ico">👦</div>
                            <div class="gc-nom" style="color:var(--bleu)">Masculin</div>
                        </div>
                        <div class="genre-card {{ old('genre') === 'F' ? 'selected-f' : '' }}" onclick="selectGenre(this,'F')">
                            <input type="radio" name="genre" value="F" {{ old('genre') === 'F' ? 'checked' : '' }}>
                            <div class="gc-ico">👧</div>
                            <div class="gc-nom" style="color:var(--rouge)">Féminin</div>
                        </div>
                    </div>
                    @error('genre')<p class="fe" style="margin-bottom:12px">{{ $message }}</p>@enderror

                    {{-- CONTACT --}}
                    <div class="section-div">Contact</div>
                    <div class="form-row">
                        <div class="fg">
                            <label class="fl">Téléphone <span>*</span></label>
                            <div class="fw">
                                <span class="fi-ico">📞</span>
                                <input type="text" name="Telephone" class="fi @error('Telephone') err @enderror"
                                    value="{{ old('Telephone') }}" placeholder="+253 77 XX XX XX" required>
                            </div>
                            @error('Telephone')<p class="fe">{{ $message }}</p>@enderror
                        </div>
                        <div class="fg">
                            <label class="fl">Email <span>*</span></label>
                            <div class="fw">
                                <span class="fi-ico">✉️</span>
                                <input type="email" name="email" class="fi @error('email') err @enderror"
                                    value="{{ old('email') }}" placeholder="email@exemple.dj" required>
                            </div>
                            @error('email')<p class="fe">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- LOCALISATION --}}
                    <div class="section-div">Localisation</div>
                    <div class="form-row">
                        <div class="fg">
                            <label class="fl">Ville <span>*</span></label>
                            <div class="fw">
                                <span class="fi-ico">📍</span>
                                <select name="ville" class="fi" required>
                                    <option value="">— Sélectionner —</option>
                                    @foreach(['Djibouti-Ville','Ali-Sabieh','Dikhil','Tadjourah','Obock','Arta'] as $v)
                                        <option value="{{ $v }}" {{ old('ville') == $v ? 'selected' : '' }}>{{ $v }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('ville')<p class="fe">{{ $message }}</p>@enderror
                        </div>
                        <div class="fg">
                            <label class="fl">Pays <span>*</span></label>
                            <div class="fw">
                                <span class="fi-ico">🌍</span>
                                <input type="text" name="pays" class="fi"
                                    value="{{ old('pays','Djibouti') }}" required>
                            </div>
                        </div>
                    </div>

                    {{-- INSCRIPTION --}}
                    <div class="section-div">Inscription BAC</div>
                    <div class="form-row">
                        <div class="fg">
                            <label class="fl">Série</label>
                            <div class="fw">
                                <span class="fi-ico">🗂️</span>
                                <select name="id_serie" class="fi">
                                    <option value="">— Sélectionner —</option>
                                    @foreach($series as $s)
                                        <option value="{{ $s->id_serie }}" {{ old('id_serie') == $s->id_serie ? 'selected' : '' }}>
                                            {{ $s->code }} — {{ $s->intitule }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="fg">
                            <label class="fl">Examen</label>
                            <div class="fw">
                                <span class="fi-ico">📋</span>
                                <select name="id_examen" class="fi">
                                    <option value="">— Sélectionner —</option>
                                    @foreach($examens as $e)
                                        <option value="{{ $e->id_examen }}" {{ old('id_examen') == $e->id_examen ? 'selected' : '' }}>
                                            {{ $e->code }} — {{ $e->intitule }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="fg">
                            <label class="fl">Classe</label>
                            <div class="fw">
                                <span class="fi-ico">🏫</span>
                                <select name="id_classe" class="fi">
                                    <option value="">— Sélectionner —</option>
                                    @foreach($classes as $cl)
                                        <option value="{{ $cl->id_classe }}" {{ old('id_classe') == $cl->id_classe ? 'selected' : '' }}>
                                            {{ $cl->code }} — {{ $cl->intitule }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="fg">
                            <label class="fl">Spécialité</label>
                            <div class="fw">
                                <span class="fi-ico">📖</span>
                                <select name="id_specialite" class="fi">
                                    <option value="">— Sélectionner —</option>
                                    @foreach($specialites as $sp)
                                        <option value="{{ $sp->id_specialite }}" {{ old('id_specialite') == $sp->id_specialite ? 'selected' : '' }}>
                                            {{ $sp->code }} — {{ $sp->intitule }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-footer">
                    <a href="{{ route('super_admin.candidats.index') }}" class="btn btn-outline">← Annuler</a>
                    <button type="submit" class="btn btn-primary">🚀 Créer le candidat</button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
function selectGenre(el, val) {
    document.querySelectorAll('.genre-card').forEach(function(c){
        c.classList.remove('selected-m','selected-f');
    });
    el.classList.add(val === 'M' ? 'selected-m' : 'selected-f');
    el.querySelector('input').checked = true;
}
</script>

</body>
</html>