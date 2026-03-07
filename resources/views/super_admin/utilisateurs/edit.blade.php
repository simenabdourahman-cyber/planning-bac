<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ isset($utilisateur) ? 'Modifier' : 'Créer' }} Utilisateur — BAC 2026</title>
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

.content{padding:28px;max-width:700px;}

.form-card{background:var(--blanc);border-radius:18px;box-shadow:var(--ombre-forte);border:1px solid var(--bordure);overflow:hidden;}
.form-head{padding:24px 28px;border-bottom:1px solid var(--bordure);background:rgba(26,58,108,0.03);display:flex;align-items:center;gap:14px;}
.fh-ico{width:48px;height:48px;border-radius:13px;display:flex;align-items:center;justify-content:center;font-size:22px;}
.fh-ico-new{background:rgba(192,57,43,0.1);}
.fh-ico-edit{background:rgba(26,58,108,0.1);}
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
.fi-hint{font-size:10.5px;color:#BBB;margin-top:4px;}
.pw-btn{position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#CCC;font-size:16px;}
.pw-btn:hover{color:var(--bleu);}

.section-div{font-size:11px;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;color:var(--bleu);margin-bottom:16px;margin-top:4px;display:flex;align-items:center;gap:10px;}
.section-div::after{content:'';flex:1;height:1px;background:var(--bordure);}

/* ROLE SELECTOR */
.role-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:10px;margin-bottom:8px;}
.role-card{border:2px solid var(--bordure);border-radius:12px;padding:14px 8px;text-align:center;cursor:pointer;background:#FAFAFA;transition:all 0.2s;}
.role-card:hover{border-color:var(--bleu);background:#fff;}
.role-card.selected{border-color:var(--bleu);background:rgba(26,58,108,0.07);box-shadow:0 0 0 3px rgba(26,58,108,0.1);}
.role-card input[type=radio]{display:none;}
.rc-ico{font-size:22px;margin-bottom:6px;}
.rc-nom{font-size:10.5px;font-weight:700;color:var(--texte);line-height:1.3;}
.role-card.selected .rc-nom{color:var(--bleu);}

.actif-toggle{display:flex;align-items:center;gap:12px;padding:14px 16px;background:var(--fond);border-radius:10px;border:1.5px solid var(--bordure);}
.toggle-label{font-size:13px;font-weight:600;color:var(--texte);}
.toggle-desc{font-size:11px;color:var(--texte-doux);margin-top:2px;}
.toggle-switch{position:relative;width:46px;height:24px;margin-left:auto;flex-shrink:0;}
.toggle-switch input{opacity:0;width:0;height:0;position:absolute;}
.toggle-slider{position:absolute;inset:0;background:#CCC;border-radius:24px;cursor:pointer;transition:background 0.3s;}
.toggle-slider::before{content:'';position:absolute;width:18px;height:18px;left:3px;top:3px;background:#fff;border-radius:50%;transition:transform 0.3s;box-shadow:0 2px 6px rgba(0,0,0,0.2);}
.toggle-switch input:checked + .toggle-slider{background:var(--vert);}
.toggle-switch input:checked + .toggle-slider::before{transform:translateX(22px);}

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
        <a href="{{ route('super_admin.utilisateurs.index') }}" class="nav-item active"><span class="ni">👥</span> Utilisateurs</a>
        <a href="#" class="nav-item"><span class="ni">👨‍🎓</span> Candidats</a>
        <a href="#" class="nav-item"><span class="ni">🏫</span> Établissements</a>
        <a href="#" class="nav-item"><span class="ni">🏛️</span> Centres</a>
        <div class="nav-section">Examens</div>
        <a href="#" class="nav-item"><span class="ni">🗂️</span> Séries</a>
        <a href="#" class="nav-item"><span class="ni">📚</span> Épreuves</a>
        <a href="#" class="nav-item"><span class="ni">📅</span> Planning</a>
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
                {{ isset($utilisateur) ? 'Modifier l\'' : 'Nouvel ' }}<span>Utilisateur</span>
            </div>
            <div class="breadcrumb">
                <a href="{{ route('super_admin.utilisateurs.index') }}" style="color:var(--rouge);text-decoration:none;">← Retour à la liste</a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="form-card fi-anim">
            <div class="form-head">
                <div class="fh-ico {{ isset($utilisateur) ? 'fh-ico-edit' : 'fh-ico-new' }}">
                    {{ isset($utilisateur) ? '✏️' : '👤' }}
                </div>
                <div>
                    <div class="fh-titre">
                        {{ isset($utilisateur) ? 'Modifier : '.$utilisateur->nom_utilisateur : 'Créer un nouvel utilisateur' }}
                    </div>
                    <div class="fh-desc">
                        {{ isset($utilisateur) ? 'Modifiez les informations de cet utilisateur' : 'Remplissez les informations du nouvel utilisateur' }}
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ isset($utilisateur) ? route('super_admin.utilisateurs.update', $utilisateur->id_utilisateur) : route('super_admin.utilisateurs.store') }}">
                @csrf
                @if(isset($utilisateur))
                    @method('PUT')
                @endif

                <div class="form-body">

                    {{-- INFORMATIONS --}}
                    <div class="section-div">Informations</div>
                    <div class="form-row">
                        <div class="fg">
                            <label class="fl">Nom complet <span>*</span></label>
                            <div class="fw">
                                <span class="fi-ico">👤</span>
                                <input type="text" name="nom_utilisateur" class="fi @error('nom_utilisateur') err @enderror"
                                    value="{{ old('nom_utilisateur', $utilisateur->nom_utilisateur ?? '') }}"
                                    placeholder="Nom Prénom" required>
                            </div>
                            @error('nom_utilisateur')<p class="fe">{{ $message }}</p>@enderror
                        </div>
                        <div class="fg">
                            <label class="fl">Adresse Email <span>*</span></label>
                            <div class="fw">
                                <span class="fi-ico">✉️</span>
                                <input type="email" name="email" class="fi @error('email') err @enderror"
                                    value="{{ old('email', $utilisateur->email ?? '') }}"
                                    placeholder="email@exemple.dj" required>
                            </div>
                            @error('email')<p class="fe">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- MOT DE PASSE --}}
                    <div class="section-div">Mot de passe</div>
                    <div class="form-row">
                        <div class="fg">
                            <label class="fl">
                                Mot de passe <span>*</span>
                                @if(isset($utilisateur)) <span style="color:#AAA;font-weight:400;text-transform:none">(laisser vide = inchangé)</span> @endif
                            </label>
                            <div class="fw">
                                <span class="fi-ico">🔒</span>
                                <input type="password" name="mot_de_passe" id="pw1"
                                    class="fi @error('mot_de_passe') err @enderror"
                                    placeholder="••••••••"
                                    {{ isset($utilisateur) ? '' : 'required' }}>
                                <button type="button" class="pw-btn" onclick="togglePw('pw1',this)">👁</button>
                            </div>
                            @error('mot_de_passe')<p class="fe">{{ $message }}</p>@enderror
                        </div>
                        <div class="fg">
                            <label class="fl">Confirmer le mot de passe <span>*</span></label>
                            <div class="fw">
                                <span class="fi-ico">🔒</span>
                                <input type="password" name="mot_de_passe_confirmation" id="pw2"
                                    class="fi" placeholder="••••••••"
                                    {{ isset($utilisateur) ? '' : 'required' }}>
                                <button type="button" class="pw-btn" onclick="togglePw('pw2',this)">👁</button>
                            </div>
                        </div>
                    </div>

                    {{-- RÔLE --}}
                    <div class="section-div">Rôle</div>
                    <div class="role-grid">
                        @php
                            $roles = [
                                'super_admin'    => ['👑', 'Super Admin'],
                                'administration' => ['🏛️', 'Administration'],
                                'gest_examen'    => ['📋', 'Gest. Examens'],
                                'gest_etab'      => ['🏫', 'Gest. Étab.'],
                                'candidat'       => ['👨‍🎓', 'Candidat'],
                            ];
                            $roleActuel = old('role', $utilisateur->role ?? '');
                        @endphp
                        @foreach($roles as $key => $info)
                        <div class="role-card {{ $roleActuel === $key ? 'selected' : '' }}"
                             onclick="selectRole(this, '{{ $key }}')">
                            <input type="radio" name="role" value="{{ $key }}"
                                   {{ $roleActuel === $key ? 'checked' : '' }}>
                            <div class="rc-ico">{{ $info[0] }}</div>
                            <div class="rc-nom">{{ $info[1] }}</div>
                        </div>
                        @endforeach
                    </div>
                    @error('role')<p class="fe" style="margin-bottom:12px;">{{ $message }}</p>@enderror

                    {{-- STATUT --}}
                    <div class="section-div" style="margin-top:20px;">Statut du compte</div>
                    <div class="actif-toggle">
                        <div>
                            <div class="toggle-label">Compte actif</div>
                            <div class="toggle-desc">Un compte inactif ne peut pas se connecter</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" name="actif" value="1"
                                   {{ old('actif', $utilisateur->actif ?? 1) ? 'checked' : '' }}>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                </div>

                <div class="form-footer">
                    <a href="{{ route('super_admin.utilisateurs.index') }}" class="btn btn-outline">← Annuler</a>
                    <button type="submit" class="btn btn-primary">
                        {{ isset($utilisateur) ? '✅ Enregistrer les modifications' : '🚀 Créer l\'utilisateur' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
function selectRole(el, val) {
    document.querySelectorAll('.role-card').forEach(function(c){ c.classList.remove('selected'); });
    el.classList.add('selected');
    el.querySelector('input[type=radio]').checked = true;
}

function togglePw(id, btn) {
    var inp = document.getElementById(id);
    inp.type = inp.type === 'password' ? 'text' : 'password';
    btn.textContent = inp.type === 'password' ? '👁' : '🙈';
}
</script>

</body>
</html>