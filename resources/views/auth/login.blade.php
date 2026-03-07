<x-guest-layout>
{{--
  MENFOP DJIBOUTI - Page de Connexion BAC 2026
  resources/views/auth/login.blade.php
--}}
<style>
*{box-sizing:border-box;margin:0;padding:0;}
:root{--rouge:#C0392B;--rouge-f:#96281B;--bleu:#1A3A6C;--bleu-f:#0F2451;--or:#F5C842;}

html, body {
    width:100%; min-height:100vh;
    background:#0F2451;
    font-family:'DM Sans',sans-serif;
}

.l-bg{
    position:fixed;inset:0;z-index:0;
    background-size:cover;background-position:center top;
    filter:blur(9px) brightness(0.42) saturate(0.75);
    transform:scale(1.08);
}
.l-ov{
    position:fixed;inset:0;z-index:1;
    background:linear-gradient(135deg,rgba(26,58,108,.82) 0%,rgba(15,36,81,.6) 45%,rgba(192,57,43,.3) 100%);
}
.deco{position:fixed;border-radius:50%;z-index:2;pointer-events:none;}
.d1{top:-120px;right:-120px;width:420px;height:420px;border:1px solid rgba(245,200,66,.13);}
.d2{bottom:-80px;left:-80px;width:300px;height:300px;border:1px solid rgba(255,255,255,.07);}
.d3{top:50%;left:-200px;width:500px;height:500px;transform:translateY(-50%);border:1px solid rgba(192,57,43,.1);}

.l-wrap{
    position:relative;z-index:10;
    min-height:100vh;width:100%;
    display:flex;align-items:center;justify-content:center;
    padding:40px 24px;gap:64px;
}

.branding{flex:1;max-width:400px;color:#fff;display:flex;flex-direction:column;}
.flag-bar{display:flex;height:5px;width:72px;border-radius:3px;overflow:hidden;margin-bottom:28px;}
.flag-b{flex:1;background:#6CB4E4;}
.flag-g{flex:1;background:#4CAF50;}
.b-label{font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:var(--or);font-weight:700;margin-bottom:14px;}
.b-title{font-family:'Playfair Display',serif;font-size:42px;font-weight:900;line-height:1.15;color:#fff;margin-bottom:16px;}
.b-title em{color:var(--or);font-style:normal;display:block;}
.b-desc{font-size:14px;color:rgba(255,255,255,.58);line-height:1.75;max-width:330px;margin-bottom:36px;}
.b-stats{display:flex;gap:28px;align-items:center;}
.bst{text-align:center;}
.bst-n{font-family:'Playfair Display',serif;font-size:30px;font-weight:900;color:var(--or);line-height:1;}
.bst-l{font-size:10px;color:rgba(255,255,255,.4);margin-top:5px;text-transform:uppercase;letter-spacing:.08em;}
.bst-sep{width:1px;background:rgba(255,255,255,.15);align-self:stretch;min-height:36px;}

.l-card{
    width:100%;max-width:440px;background:#fff;
    border-radius:24px;padding:44px 40px 36px;
    box-shadow:0 32px 80px rgba(0,0,0,.4),0 0 0 1px rgba(255,255,255,.06);
}
.c-head{text-align:center;margin-bottom:28px;}
.c-logo{
    width:64px;height:64px;border-radius:50%;
    background:linear-gradient(135deg,var(--bleu),var(--bleu-f));
    display:flex;align-items:center;justify-content:center;
    margin:0 auto 14px;box-shadow:0 8px 24px rgba(26,58,108,.35);font-size:28px;
}
.c-title{font-family:'Playfair Display',serif;font-size:22px;font-weight:800;color:var(--bleu);margin-bottom:4px;}
.c-sub{font-size:12px;color:#aaa;}

.r-lbl{font-size:10.5px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#999;margin-bottom:10px;display:block;}
.r-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-bottom:18px;}
.r-btn{
    display:flex;flex-direction:column;align-items:center;gap:6px;
    padding:12px 6px;border:2px solid #EBEBEB;border-radius:12px;
    cursor:pointer;background:#FAFAFA;
    transition:border-color .2s,background .2s,box-shadow .2s;position:relative;
}
.r-btn:hover{border-color:var(--bleu);background:rgba(26,58,108,.04);}
.r-btn.on{border-color:var(--bleu);background:rgba(26,58,108,.07);box-shadow:0 0 0 3px rgba(26,58,108,.12);}
.r-ico{font-size:22px;}
.r-name{font-size:10.5px;font-weight:600;color:#555;text-align:center;line-height:1.3;}
.r-btn.on .r-name{color:var(--bleu);}
.r-chk{
    position:absolute;top:6px;right:6px;width:16px;height:16px;border-radius:50%;
    background:var(--bleu);color:#fff;font-size:9px;display:none;align-items:center;justify-content:center;
}
.r-btn.on .r-chk{display:flex;}
.r-full{grid-column:1/-1;flex-direction:row;justify-content:center;gap:12px;padding:10px 16px;}
.r-full .r-name{font-size:11.5px;}

.cand-info{
    display:none;background:rgba(26,58,108,.06);
    border:1.5px solid rgba(26,58,108,.15);border-radius:10px;padding:12px 14px;
    font-size:12px;color:var(--bleu);margin-bottom:14px;line-height:1.65;
}
.cand-info.show{display:block;}

.r-alert{
    display:none;background:rgba(192,57,43,.08);
    border:1.5px solid rgba(192,57,43,.2);border-radius:9px;padding:10px 13px;
    font-size:12px;color:var(--rouge);margin-bottom:12px;align-items:center;gap:8px;
}
.r-alert.show{display:flex;}

.fg{margin-bottom:15px;}
.fl{display:block;font-size:11px;font-weight:700;letter-spacing:.06em;color:#666;margin-bottom:6px;}
.fw{position:relative;}
.fi-ico{position:absolute;left:13px;top:50%;transform:translateY(-50%);font-size:15px;color:#CCC;pointer-events:none;}
.fi{
    width:100%;padding:12px 14px 12px 42px;
    border:2px solid #E8E8E8;border-radius:11px;
    font-size:13.5px;font-family:'DM Sans',sans-serif;color:#1C1C1C;
    background:#FAFAFA;outline:none;
    transition:border-color .2s,box-shadow .2s,background .2s;
}
.fi:focus{border-color:var(--bleu);background:#fff;box-shadow:0 0 0 3px rgba(26,58,108,.1);}
.fi::placeholder{color:#CCC;}
.fi.err{border-color:var(--rouge);}
.fe{font-size:11.5px;color:var(--rouge);margin-top:5px;}
.pw-btn{
    position:absolute;right:13px;top:50%;transform:translateY(-50%);
    background:none;border:none;cursor:pointer;color:#CCC;font-size:16px;padding:0;transition:color .2s;
}
.pw-btn:hover{color:var(--bleu);}
.f-row{display:flex;align-items:center;justify-content:space-between;margin-bottom:22px;}
.remember{display:flex;align-items:center;gap:8px;font-size:12.5px;color:#666;cursor:pointer;}
.remember input{width:14px;height:14px;accent-color:var(--bleu);cursor:pointer;}
.forgot{font-size:12.5px;color:var(--rouge);text-decoration:none;font-weight:600;}
.forgot:hover{text-decoration:underline;}

.btn-co{
    width:100%;padding:14px;border:none;border-radius:12px;
    background:linear-gradient(135deg,var(--bleu) 0%,var(--bleu-f) 100%);
    color:#fff;font-size:14px;font-weight:700;
    font-family:'DM Sans',sans-serif;cursor:pointer;
    box-shadow:0 6px 20px rgba(26,58,108,.3);
    display:flex;align-items:center;justify-content:center;gap:10px;transition:all .25s;
}
.btn-co:hover{
    background:linear-gradient(135deg,var(--rouge),var(--rouge-f));
    transform:translateY(-2px);box-shadow:0 10px 28px rgba(192,57,43,.35);
}

/* ── LIEN INSCRIPTION CANDIDAT LIBRE ── */
.insc-link{
    display:flex;align-items:center;justify-content:center;gap:8px;
    margin-top:14px;padding:11px 18px;
    background:rgba(26,58,108,.05);
    border:1.5px solid rgba(26,58,108,.13);
    border-radius:11px;
    font-size:12.5px;font-weight:600;color:var(--bleu);
    text-decoration:none;transition:all .2s;
}
.insc-link:hover{
    background:rgba(26,58,108,.1);
    border-color:rgba(26,58,108,.3);
    transform:translateY(-1px);
    box-shadow:0 4px 12px rgba(26,58,108,.12);
}

.c-foot{text-align:center;margin-top:18px;font-size:10.5px;color:#CCC;line-height:1.8;}
.c-foot strong{color:var(--bleu);}

@media(max-width:768px){
    .branding{display:none;}
    .l-wrap{padding:24px 16px;}
    .l-card{padding:32px 22px 28px;max-width:100%;}
}
</style>

<div class="l-bg" style="background-image:url('{{ asset('images/login-bg.jpg') }}')"></div>
<div class="l-ov"></div>
<div class="deco d1"></div>
<div class="deco d2"></div>
<div class="deco d3"></div>

<div class="l-wrap">

    {{-- BRANDING --}}
    <div class="branding">
        <div class="flag-bar">
            <div class="flag-b"></div>
            <div class="flag-g"></div>
        </div>
        <div class="b-label">République de Djibouti · MENFOP</div>
        <h1 class="b-title">
            Système de Planning
            <em>BAC 2026</em>
        </h1>
        <p class="b-desc">
            Plateforme officielle de gestion et de planification
            des examens du Baccalauréat Général
            de la République de Djibouti.
        </p>
        <div class="b-stats">
            <div class="bst"><div class="bst-n">4 821</div><div class="bst-l">Candidats</div></div>
            <div class="bst-sep"></div>
            <div class="bst"><div class="bst-n">18</div><div class="bst-l">Centres</div></div>
            <div class="bst-sep"></div>
            <div class="bst"><div class="bst-n">10</div><div class="bst-l">Établissements</div></div>
            <div class="bst-sep"></div>
            <div class="bst"><div class="bst-n">4</div><div class="bst-l">Séries</div></div>
        </div>
    </div>

    {{-- CARTE LOGIN --}}
    <div class="l-card">

        <div class="c-head">
            <div class="c-logo">🎓</div>
            <div class="c-title">Connexion</div>
            <div class="c-sub">Plateforme Planning BAC — Djibouti</div>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <span class="r-lbl">Sélectionnez votre profil</span>
        <div class="r-grid">
            <div class="r-btn" onclick="pickRole(this,'super_admin')">
                <div class="r-chk">✓</div>
                <span class="r-ico">👑</span>
                <span class="r-name">Super<br>Utilisateur</span>
            </div>
            <div class="r-btn" onclick="pickRole(this,'administration')">
                <div class="r-chk">✓</div>
                <span class="r-ico">🏛️</span>
                <span class="r-name">Administration<br>MENFOP</span>
            </div>
            <div class="r-btn" onclick="pickRole(this,'gest_examen')">
                <div class="r-chk">✓</div>
                <span class="r-ico">📋</span>
                <span class="r-name">Gestionnaire<br>d'Examens</span>
            </div>
            <div class="r-btn" onclick="pickRole(this,'gest_etab')">
                <div class="r-chk">✓</div>
                <span class="r-ico">🏫</span>
                <span class="r-name">Gestionnaire<br>d'Établissement</span>
            </div>
            <div class="r-btn r-full" onclick="pickRole(this,'candidat')">
                <div class="r-chk">✓</div>
                <span class="r-ico">👨‍🎓</span>
                <span class="r-name">Candidat — Consulter ma convocation</span>
            </div>
        </div>

        <div class="cand-info" id="candInfo">
            📄 En tant que candidat, vous pouvez consulter votre
            <strong>convocation du 1er tour</strong> et
            <strong>convocation du 2ème tour</strong> (rattrapage)
            avec votre numéro de matricule.
        </div>

        <div class="r-alert" id="roleAlert">
            <span>⚠️</span> Veuillez sélectionner votre profil avant de continuer.
        </div>

        <form method="POST" action="{{ route('login') }}" onsubmit="return checkRole()">
            @csrf
            <input type="hidden" name="role" id="roleVal">

            <div class="fg">
                <label class="fl" id="lbl-login" for="email">ADRESSE EMAIL</label>
                <div class="fw">
                    <span class="fi-ico" id="ico-login">✉️</span>
                    <input type="text" id="email" name="email"
                        class="fi @error('email') err @enderror"
                        value="{{ old('email') }}"
                        placeholder="votre@email.com"
                        required autofocus autocomplete="username">
                </div>
                @error('email')
                    <p class="fe">{{ $message }}</p>
                @enderror
            </div>

            <div class="fg">
                <label class="fl" for="password">MOT DE PASSE</label>
                <div class="fw">
                    <span class="fi-ico">🔒</span>
                    <input type="password" id="password" name="password"
                        class="fi @error('password') err @enderror"
                        placeholder="••••••••"
                        required autocomplete="current-password">
                    <button type="button" class="pw-btn" id="pwBtn" onclick="togglePw()">👁</button>
                </div>
                @error('password')
                    <p class="fe">{{ $message }}</p>
                @enderror
            </div>

            <div class="f-row">
                <label class="remember">
                    <input type="checkbox" name="remember" id="remember_me">
                    Se souvenir de moi
                </label>
                @if (Route::has('password.request'))
                    <a class="forgot" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                @endif
            </div>

            <button type="submit" class="btn-co">
                <span id="btnIco">🔑</span>
                <span id="btnTxt">Se connecter</span>
            </button>
        </form>

        {{-- LIEN INSCRIPTION CANDIDAT LIBRE --}}
        <a href="{{ route('inscription.libre') }}" class="insc-link">
            📝 S'inscrire comme candidat libre
        </a>

        <div class="c-foot">
            <strong>MENFOP</strong> · Ministère de l'Éducation Nationale<br>
            et de la Formation Professionnelle — République de Djibouti<br>
            <span style="color:#DDD">© 2026 · Tous droits réservés</span>
        </div>
    </div>

</div>

<script>
var roles = {
    super_admin:    {lbl:'IDENTIFIANT ADMIN',   ico:'👤', ph:'Identifiant admin',  bIco:'👑', bTxt:'Connexion Super Admin'},
    administration: {lbl:'ADRESSE EMAIL',        ico:'✉️', ph:'votre@email.com',   bIco:'🏛️', bTxt:'Connexion Administration'},
    gest_examen:    {lbl:'ADRESSE EMAIL',        ico:'✉️', ph:'votre@email.com',   bIco:'📋', bTxt:'Connexion Gestionnaire Examens'},
    gest_etab:      {lbl:'ADRESSE EMAIL',        ico:'✉️', ph:'votre@email.com',   bIco:'🏫', bTxt:'Connexion Gestionnaire Établissement'},
    candidat:       {lbl:'NUMÉRO DE MATRICULE',  ico:'🪪', ph:'Ex: DJ-2026-0001', bIco:'👨‍🎓', bTxt:'Accéder à ma convocation'}
};

function pickRole(el, role) {
    document.querySelectorAll('.r-btn').forEach(function(b){ b.classList.remove('on'); });
    el.classList.add('on');
    document.getElementById('roleVal').value = role;
    var r = roles[role];
    document.getElementById('lbl-login').textContent = r.lbl;
    document.getElementById('ico-login').textContent = r.ico;
    document.getElementById('email').placeholder = r.ph;
    document.getElementById('btnIco').textContent = r.bIco;
    document.getElementById('btnTxt').textContent = r.bTxt;
    document.getElementById('candInfo').className = 'cand-info' + (role === 'candidat' ? ' show' : '');
    document.getElementById('roleAlert').classList.remove('show');
}

function checkRole() {
    if (!document.getElementById('roleVal').value) {
        document.getElementById('roleAlert').classList.add('show');
        return false;
    }
    return true;
}

function togglePw() {
    var inp = document.getElementById('password');
    var btn = document.getElementById('pwBtn');
    inp.type = inp.type === 'password' ? 'text' : 'password';
    btn.textContent = inp.type === 'password' ? '👁' : '🙈';
}
</script>

</x-guest-layout>