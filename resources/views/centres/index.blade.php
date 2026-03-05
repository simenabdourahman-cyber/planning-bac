<x-app-layout>
    <x-slot name="header">Centres d'examen</x-slot>

    <style>
        .page-card { background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 1px 3px rgba(15,23,42,0.08),0 4px 16px rgba(15,23,42,0.04); }
        .btn-primary { background:#0057A8; color:#fff; border:none; padding:9px 18px; border-radius:10px; font-weight:700; font-size:0.85rem; cursor:pointer; display:inline-flex; align-items:center; gap:7px; font-family:inherit; transition:background 0.15s,transform 0.15s; text-decoration:none; }
        .btn-primary:hover { background:#00408a; transform:translateY(-1px); }
        .btn-edit { background:#EFF6FF; color:#0057A8; border:none; padding:6px 12px; border-radius:8px; font-size:0.78rem; font-weight:600; cursor:pointer; font-family:inherit; text-decoration:none; display:inline-flex; align-items:center; gap:5px; transition:background 0.15s; }
        .btn-edit:hover { background:#DBEAFE; }
        .btn-del { background:#FEF2F2; color:#DC2626; border:none; padding:6px 12px; border-radius:8px; font-size:0.78rem; font-weight:600; cursor:pointer; font-family:inherit; display:inline-flex; align-items:center; gap:5px; transition:background 0.15s; }
        .btn-del:hover { background:#FEE2E2; }
        .search-input { border:1px solid #E2E8F0; border-radius:10px; padding:8px 14px; font-size:0.85rem; font-family:inherit; outline:none; transition:border 0.15s; background:#F8FAFC; }
        .search-input:focus { border-color:#0057A8; background:#fff; }
        .select-filter { border:1px solid #E2E8F0; border-radius:10px; padding:8px 14px; font-size:0.85rem; font-family:inherit; outline:none; background:#F8FAFC; cursor:pointer; }
        table { width:100%; border-collapse:collapse; }
        thead tr { background:#F8FAFC; }
        thead th { padding:12px 16px; text-align:left; font-size:0.72rem; font-weight:700; color:#64748B; text-transform:uppercase; letter-spacing:0.07em; border-bottom:1px solid #E2E8F0; }
        tbody tr { border-bottom:1px solid #F1F5F9; transition:background 0.12s; }
        tbody tr:last-child { border-bottom:none; }
        tbody tr:hover { background:#F8FBFF; }
        tbody td { padding:13px 16px; font-size:0.87rem; }
        .code-badge { background:#F1F5F9; color:#334155; padding:3px 10px; border-radius:6px; font-size:0.78rem; font-weight:700; font-family:monospace; }
        .badge-type { display:inline-flex; align-items:center; padding:4px 12px; border-radius:20px; font-size:0.72rem; font-weight:700; }
        .badge-po  { background:#EFF6FF; color:#0057A8; }
        .badge-p   { background:#ECFDF5; color:#059669; }
        .badge-d   { background:#F5F3FF; color:#7C3AED; }
        .etab-num { width:28px; height:28px; border-radius:8px; background:linear-gradient(135deg,#0057A8,#009A44); color:#fff; font-size:0.78rem; font-weight:800; display:inline-flex; align-items:center; justify-content:center; }
    </style>

    {{-- Alerte succès --}}
    @if(session('success'))
    <div style="background:#ECFDF5;border:1px solid #A7F3D0;color:#065F46;border-radius:12px;padding:12px 18px;margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:0.87rem;font-weight:600;">
        {{ session('success') }}
    </div>
    @endif

    {{-- Entête --}}
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;flex-wrap:wrap;gap:12px;">
        <div>
            <div style="font-size:1.1rem;font-weight:800;color:#0F172A;">🏫 Centres d'examen</div>
            <div style="font-size:0.8rem;color:#64748B;margin-top:2px;">{{ $centres->count() }} centre(s) enregistré(s)</div>
        </div>
        <a href="{{ route('centres.create') }}" class="btn-primary">＋ Nouveau centre</a>
    </div>

    {{-- Filtres --}}
    <form method="GET" action="{{ route('centres.index') }}" style="display:flex;gap:10px;margin-bottom:18px;flex-wrap:wrap;">
        <input type="text" name="search" value="{{ request('search') }}" class="search-input" placeholder="🔍 Code ou intitulé…" style="min-width:220px;">
        <select name="type" class="select-filter">
            <option value="">Tous les types</option>
            <option value="Passation/Oral" {{ request('type')=='Passation/Oral'?'selected':'' }}>Passation / Oral</option>
            <option value="Passation"      {{ request('type')=='Passation'?'selected':'' }}>Passation</option>
            <option value="Délibération"   {{ request('type')=='Délibération'?'selected':'' }}>Délibération</option>
        </select>
        <button type="submit" class="btn-primary" style="background:#475569;">Filtrer</button>
        @if(request('search') || request('type'))
        <a href="{{ route('centres.index') }}" class="btn-primary" style="background:#E2E8F0;color:#475569;">✕ Reset</a>
        @endif
    </form>

    {{-- Tableau --}}
    <div class="page-card">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Intitulé</th>
                    <th>Type</th>
                    <th>Étab.</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($centres as $c)
                <tr>
                    <td style="color:#94A3B8;font-size:0.8rem;">{{ $c->id_centre }}</td>
                    <td><span class="code-badge">{{ $c->code }}</span></td>
                    <td style="font-weight:600;color:#0F172A;">{{ $c->intitule }}</td>
                    <td>
                        <span class="badge-type {{ $c->type === 'Passation/Oral' ? 'badge-po' : ($c->type === 'Passation' ? 'badge-p' : 'badge-d') }}">
                            {{ $c->type }}
                        </span>
                    </td>
                    <td><span class="etab-num">{{ $c->id_etab }}</span></td>
                    <td style="text-align:right;">
                        <div style="display:flex;gap:6px;justify-content:flex-end;">
                            <a href="{{ route('centres.edit', $c->id_centre) }}" class="btn-edit">✏️ Modifier</a>
                            <form method="POST" action="{{ route('centres.destroy', $c->id_centre) }}" onsubmit="return confirm('Supprimer ce centre ?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-del">🗑️ Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:48px;color:#94A3B8;">
                        <div style="font-size:2.5rem;margin-bottom:8px;">🏫</div>
                        <div style="font-weight:600;">Aucun centre trouvé</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
@if($centres->hasPages())
<div style="padding:14px 18px;border-top:1px solid #F1F5F9;">{{ $centres->links() }}</div>
@endif
    </div>

</x-app-layout>