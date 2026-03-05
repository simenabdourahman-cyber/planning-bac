@extends('layouts.app')

@section('title', 'Centres d\'Examen')

@section('content')
<div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">

    {{-- En-tête --}}
    <div class="max-w-7xl mx-auto mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 tracking-tight">
                    Centres d'Examen
                </h1>
                <p class="mt-1 text-sm text-gray-500">
                    {{ $centres->count() }} centre(s) enregistré(s)
                </p>
            </div>
            <a href="{{ route('centres.create') }}"
               class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nouveau Centre
            </a>
        </div>
    </div>

    {{-- Messages flash --}}
    @if(session('success'))
    <div class="max-w-7xl mx-auto mb-6">
        <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl text-sm">
            <svg class="h-5 w-5 text-green-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            {{ session('success') }}
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="max-w-7xl mx-auto mb-6">
        <div class="flex items-center gap-3 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl text-sm">
            <svg class="h-5 w-5 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            {{ session('error') }}
        </div>
    </div>
    @endif

    {{-- Tableau --}}
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            {{-- Barre de recherche --}}
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/60">
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Rechercher par code, intitulé, type ou établissement..."
                    class="w-full sm:w-96 px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white"
                    onkeyup="filtrerTableau()"
                />
            </div>

            @if($centres->isEmpty())
            <div class="flex flex-col items-center justify-center py-20 text-gray-400">
                <svg class="h-12 w-12 mb-3 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <p class="text-sm font-medium">Aucun centre enregistré</p>
                <p class="text-xs mt-1">Commencez par ajouter un centre d'examen.</p>
            </div>
            @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left" id="centresTable">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-xs text-gray-500 uppercase tracking-wider">
                            <th class="px-6 py-3 font-semibold">Code</th>
                            <th class="px-6 py-3 font-semibold">Intitulé</th>
                            <th class="px-6 py-3 font-semibold">Type</th>
                            <th class="px-6 py-3 font-semibold">Établissement</th>
                            <th class="px-6 py-3 font-semibold text-center">Examens</th>
                            <th class="px-6 py-3 font-semibold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($centres as $centre)
                        <tr class="hover:bg-blue-50/40 transition-colors duration-150 group">

                            {{-- Code --}}
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-md bg-blue-100 text-blue-800 font-mono text-xs font-semibold">
                                    {{ $centre->code ?? '—' }}
                                </span>
                            </td>

                            {{-- Intitulé --}}
                            <td class="px-6 py-4">
                                <span class="font-medium text-gray-900">
                                    {{ $centre->intitule ?? '—' }}
                                </span>
                            </td>

                            {{-- Type --}}
                            <td class="px-6 py-4">
                                @php
                                    $type = $centre->type ?? null;
                                    $typeColors = [
                                        'principal'   => 'bg-purple-100 text-purple-800',
                                        'secondaire'  => 'bg-yellow-100 text-yellow-800',
                                        'annexe'      => 'bg-gray-100 text-gray-700',
                                    ];
                                    $colorClass = $typeColors[strtolower($type ?? '')] ?? 'bg-gray-100 text-gray-600';
                                @endphp
                                @if($type)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $colorClass }}">
                                    {{ ucfirst($type) }}
                                </span>
                                @else
                                <span class="text-gray-400">—</span>
                                @endif
                            </td>

                            {{-- Établissement --}}
                            <td class="px-6 py-4 text-gray-700">
                                {{ $centre->etablissement->nom_etab ?? '—' }}
                            </td>

                            {{-- Nb Examens --}}
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full
                                    {{ $centre->centre_examens_count > 0 ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-400' }}
                                    text-xs font-bold">
                                    {{ $centre->centre_examens_count }}
                                </span>
                            </td>

                            {{-- Actions --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-150">

                                    {{-- Voir --}}
                                    <a href="{{ route('centres.show', $centre->id_centre) }}"
                                       class="p-1.5 rounded-lg text-gray-500 hover:text-blue-600 hover:bg-blue-100 transition-colors"
                                       title="Voir">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>

                                    {{-- Modifier --}}
                                    <a href="{{ route('centres.edit', $centre->id_centre) }}"
                                       class="p-1.5 rounded-lg text-gray-500 hover:text-amber-600 hover:bg-amber-100 transition-colors"
                                       title="Modifier">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>

                                    {{-- Supprimer --}}
                                    <form action="{{ route('centres.destroy', $centre->id_centre) }}"
                                          method="POST"
                                          onsubmit="return confirm('Supprimer ce centre ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="p-1.5 rounded-lg text-gray-500 hover:text-red-600 hover:bg-red-100 transition-colors"
                                                title="Supprimer">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pied de tableau --}}
            <div class="px-6 py-3 border-t border-gray-100 bg-gray-50/60 text-xs text-gray-400 text-right">
                Total : {{ $centres->count() }} centre(s)
            </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
function filtrerTableau() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const rows  = document.querySelectorAll('#centresTable tbody tr');

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(input) ? '' : 'none';
    });
}
</script>
@endpush
@endsection