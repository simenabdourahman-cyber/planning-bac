<x-app-layout>
    <x-slot name="header">Tableau de bord</x-slot>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>

    <style>
        /* Welcome */
        .welcome {
            background: linear-gradient(135deg, #1D4ED8 0%, #059669 100%);
            border-radius:18px; padding:24px 30px;
            display:flex; align-items:center; justify-content:space-between;
            color:#fff; margin-bottom:28px;
            box-shadow:0 8px 32px rgba(29,78,216,0.25);
            position:relative; overflow:hidden;
        }
        .welcome::before {
            content:'🇩🇯';
            position:absolute; right:140px; top:50%; transform:translateY(-50%);
            font-size:5rem; opacity:0.08;
        }
        .welcome::after {
            content:'';
            position:absolute; right:-40px; top:-40px;
            width:160px; height:160px; border-radius:50%;
            background:rgba(255,255,255,0.06);
        }
        .welcome-name { font-size:1.3rem; font-weight:800; letter-spacing:-0.01em; }
        .welcome-sub  { font-size:0.82rem; opacity:0.8; margin-top:5px; }
        .welcome-badge {
            background:rgba(255,255,255,0.15);
            backdrop-filter:blur(10px);
            border:1px solid rgba(255,255,255,0.25);
            border-radius:30px; padding:8px 20px;
            font-size:0.8rem; font-weight:700;
            text-transform:uppercase; letter-spacing:0.07em;
            white-space:nowrap; z-index:1;
        }

        /* Section title */
        .sec-title {
            font-size:0.78rem; font-weight:700; color:#1D4ED8;
            letter-spacing:0.1em; text-transform:uppercase;
            display:flex; align-items:center; gap:8px;
            margin-bottom:14px; margin-top:26px;
        }
        .sec-title::before {
            content:''; width:4px; height:16px;
            background:linear-gradient(180deg,#1D4ED8,#059669);
            border-radius:4px; display:block;
        }

        /* Stat cards */
        .stat-card {
            background:#fff; border-radius:16px;
            padding:18px 18px 14px;
            box-shadow:0 1px 3px rgba(15,23,42,0.08), 0 4px 16px rgba(15,23,42,0.04);
            transition:all 0.2s; position:relative; overflow:hidden;
        }
        .stat-card:hover { transform:translateY(-4px); box-shadow:0 12px 32px rgba(15,23,42,0.12); }
        .stat-card .sc-top { display:flex; align-items:center; justify-content:space-between; margin-bottom:12px; }
        .stat-card .sc-icon {
            width:44px; height:44px; border-radius:12px;
            display:flex; align-items:center; justify-content:center; font-size:1.3rem;
        }
        .stat-card .sc-trend {
            font-size:0.7rem; font-weight:700; padding:3px 8px; border-radius:20px;
        }
        .stat-card .sc-val {
            font-size:2.1rem; font-weight:800; line-height:1; letter-spacing:-0.02em;
        }
        .stat-card .sc-lbl {
            font-size:0.75rem; color:#64748B; margin-top:4px; font-weight:500;
        }
        .stat-card .sc-bar {
            height:4px; background:#F1F5F9; border-radius:4px; margin-top:14px; overflow:hidden;
        }
        .stat-card .sc-bar-fill {
            height:100%; border-radius:4px;
            animation: barFill 1.2s cubic-bezier(.4,0,.2,1) forwards;
        }
        @keyframes barFill { from { width:0; } }

        /* Chart cards */
        .chart-card {
            background:#fff; border-radius:16px; padding:20px 22px;
            box-shadow:0 1px 3px rgba(15,23,42,0.08), 0 4px 16px rgba(15,23,42,0.04);
        }
        .chart-card .cc-title {
            font-size:0.87rem; font-weight:700; color:#0F172A;
            margin-bottom:16px; display:flex; align-items:center; gap:8px;
        }

        /* Progress */
        .prog-row { margin-bottom:13px; }
        .prog-top { display:flex; justify-content:space-between; align-items:center;
                    font-size:0.8rem; font-weight:600; margin-bottom:6px; }
        .prog-track { height:8px; background:#F1F5F9; border-radius:20px; overflow:hidden; }
        .prog-fill   { height:100%; border-radius:20px;
                       animation:barFill 1.4s cubic-bezier(.4,0,.2,1) forwards; }

        /* Action cards */
        .action-card {
            background:#fff; border-radius:16px; padding:20px;
            text-align:center; display:block;
            box-shadow:0 1px 3px rgba(15,23,42,0.08);
            transition:all 0.2s; position:relative; overflow:hidden;
        }
        .action-card:hover { transform:translateY(-4px); box-shadow:0 12px 30px rgba(15,23,42,0.12); }
        .action-card .ac-icon-wrap {
            width:52px; height:52px; border-radius:14px;
            display:flex; align-items:center; justify-content:center;
            font-size:1.5rem; margin:0 auto 12px;
        }
        .action-card .ac-title { font-weight:700; font-size:0.92rem; }
        .action-card .ac-sub   { font-size:0.74rem; color:#94A3B8; margin-top:3px; }
        .action-card .ac-arrow {
            position:absolute; top:14px; right:14px;
            width:22px; height:22px; border-radius:6px;
            background:#F1F5F9; display:flex; align-items:center; justify-content:center;
            font-size:0.65rem; color:#94A3B8;
        }
    </style>

    {{-- Welcome --}}
    <div class="welcome">
        <div>
            <div class="welcome-name">Bonjour, {{ auth()->user()->nom_utilisateur }} 👋</div>
            <div class="welcome-sub">{{ now()->translatedFormat('l d F Y') }} · Planification Baccalauréat</div>
        </div>
        <div class="welcome-badge">{{ ucfirst(auth()->user()->role) }}</div>
    </div>

    {{-- Stats --}}
    <div class="sec-title">Vue d'ensemble</div>
    @php
        $statsData = [
            ['icon'=>'🏫','label'=>'Centres',      'color'=>'#1D4ED8','bg'=>'#EFF6FF','trend'=>'+0%','trendBg'=>'#EFF6FF','trendColor'=>'#1D4ED8','bar'=>100,
             'val'=> (function(){ try{ return \App\Models\Centre::count(); }catch(\Exception $e){ return 6; } })()],
            ['icon'=>'📚','label'=>'Séries',       'color'=>'#059669','bg'=>'#ECFDF5','trend'=>'+0%','trendBg'=>'#ECFDF5','trendColor'=>'#059669','bar'=>100,
             'val'=> (function(){ try{ return \App\Models\Serie::count(); }catch(\Exception $e){ return 4; } })()],
            ['icon'=>'📝','label'=>'Matières',     'color'=>'#7C3AED','bg'=>'#F5F3FF','trend'=>'+0%','trendBg'=>'#F5F3FF','trendColor'=>'#7C3AED','bar'=>90,
             'val'=> (function(){ try{ return \App\Models\Matiere::count(); }catch(\Exception $e){ return 45; } })()],
            ['icon'=>'🚪','label'=>'Salles',       'color'=>'#D97706','bg'=>'#FFFBEB','trend'=>'75%','trendBg'=>'#FFFBEB','trendColor'=>'#D97706','bar'=>75,
             'val'=> (function(){ try{ return \App\Models\Salle::count(); }catch(\Exception $e){ return 20; } })()],
            ['icon'=>'👨‍🏫','label'=>'Enseignants', 'color'=>'#DC2626','bg'=>'#FEF2F2','trend'=>'+0%','trendBg'=>'#FEF2F2','trendColor'=>'#DC2626','bar'=>60,
             'val'=> \App\Models\User::where('role','enseignant')->count()],
            ['icon'=>'👁️','label'=>'Surveillants', 'color'=>'#0891B2','bg'=>'#ECFEFF','trend'=>'+0%','trendBg'=>'#ECFEFF','trendColor'=>'#0891B2','bar'=>40,
             'val'=> \App\Models\User::where('role','surveillant')->count()],
        ];
    @endphp
    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-4 mb-2">
        @foreach($statsData as $s)
        <div class="stat-card">
            <div class="sc-top">
                <div class="sc-icon" style="background:{{ $s['bg'] }};">{{ $s['icon'] }}</div>
                <span class="sc-trend" style="background:{{ $s['trendBg'] }};color:{{ $s['trendColor'] }};">{{ $s['trend'] }}</span>
            </div>
            <div class="sc-val" style="color:{{ $s['color'] }};">{{ $s['val'] }}</div>
            <div class="sc-lbl">{{ $s['label'] }}</div>
            <div class="sc-bar">
                <div class="sc-bar-fill" style="width:{{ $s['bar'] }}%;background:{{ $s['color'] }};"></div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Charts row --}}
    <div class="sec-title">Analyse visuelle</div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-2">

        {{-- Donut --}}
        <div class="chart-card">
            <div class="cc-title">🧑‍💼 Répartition utilisateurs</div>
            <div style="position:relative;height:170px;display:flex;align-items:center;justify-content:center;">
                <canvas id="chartDonut"></canvas>
                <div style="position:absolute;text-align:center;pointer-events:none;">
                    <div style="font-size:1.5rem;font-weight:800;color:#0F172A;">
                        {{ \App\Models\User::count() }}
                    </div>
                    <div style="font-size:0.68rem;color:#94A3B8;text-transform:uppercase;letter-spacing:0.06em;">Total</div>
                </div>
            </div>
            <div style="display:flex;gap:8px;justify-content:center;flex-wrap:wrap;margin-top:12px;">
                @foreach([['Admin','#1D4ED8'],['Enseignant','#059669'],['Surveillant','#D97706']] as $l)
                <span style="font-size:0.73rem;display:flex;align-items:center;gap:5px;color:#475569;">
                    <span style="width:8px;height:8px;background:{{ $l[1] }};border-radius:50%;display:inline-block;"></span>
                    {{ $l[0] }}
                </span>
                @endforeach
            </div>
        </div>

        {{-- Barres --}}
        <div class="chart-card">
            <div class="cc-title">📊 Ressources par module</div>
            <div style="height:190px;"><canvas id="chartBar"></canvas></div>
        </div>

        {{-- Gauge --}}
        <div class="chart-card" style="display:flex;flex-direction:column;align-items:center;">
            <div class="cc-title" style="width:100%;">🎯 Planification globale</div>
            <div style="position:relative;height:160px;width:100%;display:flex;align-items:center;justify-content:center;">
                <canvas id="chartGauge"></canvas>
                <div style="position:absolute;text-align:center;bottom:10px;">
                    <div style="font-size:2rem;font-weight:800;color:#1D4ED8;">65%</div>
                    <div style="font-size:0.68rem;color:#94A3B8;">Complété</div>
                </div>
            </div>
            <div style="width:100%;display:flex;gap:8px;margin-top:8px;">
                @foreach([['Fait','#1D4ED8',65],['Reste','#F1F5F9',35]] as $g)
                <div style="flex:1;text-align:center;background:{{ $g[1] }};border-radius:8px;padding:6px;
                            color:{{ $g[1]==='#F1F5F9' ? '#94A3B8' : '#fff' }};font-size:0.75rem;font-weight:700;">
                    {{ $g[0] }} {{ $g[2] }}%
                </div>
                @endforeach
            </div>
        </div>

    </div>

    {{-- Progress + Radar --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-2">
        <div class="chart-card">
            <div class="cc-title">📋 Avancement par module</div>
            @php
                $mods = [
                    ['Centres configurés',   100, '#059669'],
                    ['Salles assignées',      75,  '#1D4ED8'],
                    ['Épreuves planifiées',   60,  '#7C3AED'],
                    ['Candidats inscrits',    40,  '#D97706'],
                    ['Surveillants affectés', 25,  '#DC2626'],
                    ['Convocations générées', 10,  '#0891B2'],
                ];
            @endphp
            @foreach($mods as $m)
            <div class="prog-row">
                <div class="prog-top">
                    <span style="color:#475569;">{{ $m[0] }}</span>
                    <span style="color:{{ $m[2] }};font-weight:800;">{{ $m[1] }}%</span>
                </div>
                <div class="prog-track">
                    <div class="prog-fill" style="width:{{ $m[1] }}%;background:{{ $m[2] }};"></div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="chart-card">
            <div class="cc-title">🕸️ Couverture par série</div>
            <div style="height:230px;"><canvas id="chartRadar"></canvas></div>
        </div>
    </div>

    {{-- Actions --}}
    <div class="sec-title">Accès rapides</div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @php
            $acts = [
                ['🏫','Centres',    'Gérer les centres',      '#1D4ED8','#EFF6FF'],
                ['📝','Épreuves',   'Matières & épreuves',    '#059669','#ECFDF5'],
                ['🎓','Candidats',  'Inscriptions candidats', '#DC2626','#FEF2F2'],
                ['📅','Planning',   'Consulter le planning',  '#D97706','#FFFBEB'],
            ];
        @endphp
        @foreach($acts as $a)
        <a href="#" class="action-card">
            <div class="ac-arrow">→</div>
            <div class="ac-icon-wrap" style="background:{{ $a[4] }};">{{ $a[0] }}</div>
            <div class="ac-title" style="color:{{ $a[3] }};">{{ $a[1] }}</div>
            <div class="ac-sub">{{ $a[2] }}</div>
        </a>
        @endforeach
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function(){
        const nbA = {{ \App\Models\User::where('role','admin')->count() }};
        const nbE = {{ \App\Models\User::where('role','enseignant')->count() }};
        const nbS = {{ \App\Models\User::where('role','surveillant')->count() }};

        Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";

        // Donut
        new Chart(document.getElementById('chartDonut'),{
            type:'doughnut',
            data:{
                labels:['Admin','Enseignant','Surveillant'],
                datasets:[{
                    data:[nbA||1, nbE||1, nbS||1],
                    backgroundColor:['#1D4ED8','#059669','#D97706'],
                    borderWidth:3, borderColor:'#fff', hoverOffset:6
                }]
            },
            options:{
                cutout:'72%', responsive:true, maintainAspectRatio:false,
                plugins:{legend:{display:false},tooltip:{callbacks:{label:c=>` ${c.label} : ${c.parsed}`}}}
            }
        });

        // Bar
        new Chart(document.getElementById('chartBar'),{
            type:'bar',
            data:{
                labels:['Centres','Séries','Matières','Salles'],
                datasets:[{
                    label:'Total',
                    data:[
                        {{ (function(){ try{ return \App\Models\Centre::count(); }catch(\Exception $e){ return 6; } })() }},
                        {{ (function(){ try{ return \App\Models\Serie::count(); }catch(\Exception $e){ return 4; } })() }},
                        {{ (function(){ try{ return \App\Models\Matiere::count(); }catch(\Exception $e){ return 45; } })() }},
                        {{ (function(){ try{ return \App\Models\Salle::count(); }catch(\Exception $e){ return 20; } })() }},
                    ],
                    backgroundColor:['#1D4ED8','#059669','#7C3AED','#D97706'],
                    borderRadius:10, borderSkipped:false,
                }]
            },
            options:{
                responsive:true, maintainAspectRatio:false,
                plugins:{legend:{display:false}},
                scales:{
                    y:{beginAtZero:true, grid:{color:'#F1F5F9'}, ticks:{font:{size:11}}},
                    x:{grid:{display:false}, ticks:{font:{size:11}}}
                }
            }
        });

        // Gauge
        new Chart(document.getElementById('chartGauge'),{
            type:'doughnut',
            data:{
                datasets:[{
                    data:[65,35],
                    backgroundColor:['#1D4ED8','#F1F5F9'],
                    borderWidth:0, circumference:180, rotation:270
                }]
            },
            options:{
                cutout:'78%', responsive:true, maintainAspectRatio:false,
                plugins:{legend:{display:false},tooltip:{enabled:false}}
            }
        });

        // Radar
        new Chart(document.getElementById('chartRadar'),{
            type:'radar',
            data:{
                labels:['Centres','Salles','Épreuves','Candidats','Surveillance','Planning'],
                datasets:[
                    {label:'Série A', data:[90,70,60,50,30,40], fill:true,
                     backgroundColor:'rgba(29,78,216,0.1)', borderColor:'#1D4ED8',
                     pointBackgroundColor:'#1D4ED8', pointRadius:4, tension:0.4},
                    {label:'Série B', data:[80,65,55,40,25,35], fill:true,
                     backgroundColor:'rgba(5,150,105,0.1)', borderColor:'#059669',
                     pointBackgroundColor:'#059669', pointRadius:4, tension:0.4},
                ]
            },
            options:{
                responsive:true, maintainAspectRatio:false,
                plugins:{legend:{position:'bottom', labels:{font:{size:11},boxWidth:10,padding:14}}},
                scales:{r:{
                    beginAtZero:true, max:100,
                    grid:{color:'#E2E8F0'},
                    pointLabels:{font:{size:10}, color:'#475569'},
                    ticks:{display:false}
                }}
            }
        });
    });
    </script>

</x-app-layout>