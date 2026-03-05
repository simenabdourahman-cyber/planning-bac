<x-app-layout>
    <x-slot name="header">{{ $centre->id_centre ? 'Modifier le centre' : 'Nouveau centre' }}</x-slot>

    <style>
        .form-card { background:#fff; border-radius:16px; padding:28px 32px; box-shadow:0 1px 3px rgba(15,23,42,0.08),0 4px 16px rgba(15,23,42,0.04); max-width:620px; }
        .form-group { margin-bottom:20px; }
        .form-label { display:block; font-size:0.82rem; font-weight:700; color:#374151; margin-bottom:7px; }
        .form-label span { color:#DC2626; }
        .form-input { width:100%; border:1.5px solid #E2E8F0; border-radius:10px; padding:10px 14px; font-size:0.88rem; font-family:inherit; outline:none; background:#F8FAFC; color:#0F172A; transition:border 0.15s,box-shadow 0.15s; }
        .form-input:focus { border-color:#0057A8; background:#fff; box-shadow:0 0 0 3px rgba(0,87,168,0.08); }
        .form-input.is-error { border-color:#DC2626; }
        .form-error { font-size:0.77rem; color:#DC2626; margin-top:5px; }
        .form-hint  { font-size:0.74rem; color:#94A3B8; margin-top:4px; }
        .sec-title { font-size:0.72rem; font-weight:700; color:#0057A8; text-transform:uppercase; letter-spacing:0.1em; border-left:4px solid #009A44; padding-left:10px; margin-bottom:18px; }
        .btn-submit { background:#0057A8; color:#fff; border:none; padding:11px 24px; border-radius:10px; font-weight:700; font-size:0.88rem; cursor:pointer; font-family:inherit; display:inline-flex; align-items:center; gap:8px; transition:background 0.15s; }
        .btn-submit:hover { background:#00408a; }
        .btn-cancel { background:#F1F5F9; color:#475569; border:none; padding:11px 20px; border-radius:10px; font-weight:600; font-size:0.88rem; cursor:pointer; font-family:inherit; text-decoration:none; display:inline-flex; align-items:center; gap:7px; transition:background 0.15s; }
        .btn-cancel:hover { background:#E2E8F0; }
        .type-grid { display:grid; grid-template-columns:1fr 1fr 1fr; gap:10px; }
        .type-opt input[type=radio] { display:none; }
        .type-opt label { display:flex; flex-direction:column; align-items:center; gap:6px; padding:14px 8px; border:2px solid #E2E8F0; border-radius:12px; cursor:pointer; transition:all 0.15s; text-align:center; font-size:0.79rem; font-weight:600; color:#475569; background:#F8FAFC; }
        .type-opt input:checked + label { border-color:#0057A8; background:#EFF6FF; color:#0057A8; box-shadow:0 0 0 3px rgba(0,87,168,0.1); }
        .type-opt label:hover { border-color:#93C5FD; }
        .type-ico { font-size:1.4rem; }
    </style>

    <div class="form-card">
        <div style="margin-bottom:22px;">
            <div style="font-size:1.05rem;font-weight:800;color:#0F172A;">
                {{ $centre->id_centre ? '✏️ Modifier le centre' : '➕ Nouveau centre d\'examen' }}
            </div>
            <div style="font-size:0.8rem;color:#64748B;margin-top:4px;">
                {{ $centre->id_centre ? 'Modifiez les informations ci-dessous' : 'Remplissez les informations du nouveau centre' }}
            </div>
        </div>

        <form method="POST" action="{{ $centre->id_centre ? route('centres.update', $centre->id_centre) : route('centres.store') }}">
            @csrf
            @if($centre->id_centre) @method('PUT') @endif

            <div class="sec-title">Informations du centre</div>

            <div style="display:grid;grid-template-columns:140px 1fr;gap:16px;">
                <div class="form-group">
                    <label class="form-label">Code <span>*</span></label>
                    <input type="text" name="code" value="{{ old('code', $centre->code) }}"
                           class="form-input {{ $errors->has('code') ? 'is-error' : '' }}"
                           placeholder="LY-DJ" maxlength="20">
                    @error('code')<div class="form-error">{{ $message }}</div>@enderror
                    <div class="form-hint">Code unique</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Intitulé <span>*</span></label>
                    <input type="text" name="intitule" value="{{ old('intitule', $centre->intitule) }}"
                           class="form-input {{ $errors->has('intitule') ? 'is-error' : '' }}"
                           placeholder="Lycée d'État de Djibouti">
                    @error('intitule')<div class="form-error">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="form-group" style="max-width:180px;">
                <label class="form-label">N° Établissement <span>*</span></label>
                <input type="number" name="id_etab" value="{{ old('id_etab', $centre->id_etab) }}"
                       class="form-input {{ $errors->has('id_etab') ? 'is-error' : '' }}"
                       placeholder="1" min="1">
                @error('id_etab')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Type de centre <span>*</span></label>
                <div class="type-grid">
                    @foreach([['Passation/Oral','📝🎤','Passation & Oral'],['Passation','📝','Passation seule'],['Délibération','⚖️','Délibération']] as [$val,$ico,$lbl])
                    <div class="type-opt">
                        <input type="radio" name="type" id="t{{ $loop->index }}" value="{{ $val }}"
                               {{ old('type', $centre->type ?? 'Passation/Oral') == $val ? 'checked' : '' }}>
                        <label for="t{{ $loop->index }}">
                            <span class="type-ico">{{ $ico }}</span>{{ $lbl }}
                        </label>
                    </div>
                    @endforeach
                </div>
                @error('type')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div style="display:flex;gap:10px;margin-top:24px;padding-top:20px;border-top:1px solid #F1F5F9;">
                <button type="submit" class="btn-submit">
                    {{ $centre->id_centre ? '💾 Enregistrer' : '➕ Créer le centre' }}
                </button>
                <a href="{{ route('centres.index') }}" class="btn-cancel">✕ Annuler</a>
            </div>
        </form>
    </div>

</x-app-layout>