@extends('layouts.app')

@section('title', 'Mi Progreso')

@section('content')
<!-- Cargamos la versión más estable de Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.js"></script>

<div class="max-w-5xl mx-auto px-6 py-10 pb-16">
    <div class="mb-8">
        <span class="text-xs font-bold tracking-widest uppercase text-emerald-600 mb-2 block">Panel personal</span>
        <h1 class="text-3xl font-serif text-gray-900">Mi progreso</h1>
    </div>

    <!-- KPIs -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
            <p class="text-xs text-gray-500 font-medium mb-2">Semanas activo</p>
            <p class="text-3xl font-serif text-gray-900 mb-1">8</p>
            <p class="text-xs text-gray-400">semanas consecutivas</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
            <p class="text-xs text-gray-500 font-medium mb-2">Sesiones completas</p>
            <p class="text-3xl font-serif text-gray-900 mb-1">34</p>
            <p class="text-xs text-gray-400">de 36 asignadas</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
            <p class="text-xs text-gray-500 font-medium mb-2">Cumplimiento</p>
            <p class="text-3xl font-serif text-[#1A5B4C] font-bold mb-1">97%</p>
            <p class="text-xs text-emerald-600 font-medium">↑ Excelente</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
            <p class="text-xs text-gray-500 font-medium mb-2">Dolor actual</p>
            <p class="text-3xl font-serif text-gray-900 mb-1">2<span class="text-lg text-gray-400">/10</span></p>
            <p class="text-xs text-gray-400">vs 8/10 inicial</p>
        </div>
    </div>

    <!-- Gráfica -->
    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <h2 id="chart-title" class="text-lg font-serif text-gray-900">Movilidad — últimas 8 semanas</h2>
                <p id="chart-subtitle" class="text-xs text-gray-500 mt-1">Mejora de <span class="text-emerald-600 font-medium">+58%</span> desde el inicio</p>
            </div>
            <div class="flex gap-2 bg-gray-50 p-1 rounded-lg border border-gray-100">
                <button onclick="window.updateChart('dolor')" id="btn-dolor" class="px-3 py-1.5 rounded-md text-xs font-medium text-gray-500 hover:text-gray-900">Nivel de dolor</button>
                <button onclick="window.updateChart('movilidad')" id="btn-movilidad" class="px-3 py-1.5 rounded-md text-xs font-medium bg-white text-[#1A5B4C] shadow-sm border border-gray-200">Movilidad</button>
                <button onclick="window.updateChart('cumplimiento')" id="btn-cumplimiento" class="px-3 py-1.5 rounded-md text-xs font-medium text-gray-500 hover:text-gray-900">Cumplimiento</button>
            </div>
        </div>
        <div class="relative h-64 w-full">
            <canvas id="progressChart"></canvas>
        </div>
    </div>
</div>

<script>
    window.PROGRESS_DATA = [
        { week: "S1", dolor: 8, movilidad: 30, cumplimiento: 60 },
        { week: "S2", dolor: 7, movilidad: 40, cumplimiento: 70 },
        { week: "S3", dolor: 6, movilidad: 52, cumplimiento: 80 },
        { week: "S4", dolor: 5, movilidad: 60, cumplimiento: 85 },
        { week: "S5", dolor: 4, movilidad: 68, cumplimiento: 90 },
        { week: "S6", dolor: 3, movilidad: 75, cumplimiento: 92 },
        { week: "S7", dolor: 2, movilidad: 82, cumplimiento: 95 },
        { week: "S8", dolor: 2, movilidad: 88, cumplimiento: 97 },
    ];

    window.metricConfig = {
        dolor: { label: "Nivel de dolor", color: "#ef4444", bgColor: "rgba(239, 68, 68, 0.1)" },
        movilidad: { label: "Movilidad", color: "#1A5B4C", bgColor: "rgba(26, 91, 76, 0.1)" },
        cumplimiento: { label: "Cumplimiento", color: "#0ea5e9", bgColor: "rgba(14, 165, 233, 0.1)" }
    };

    window.currentMetric = 'movilidad';
    window.progressChartObj = null;

    window.initChart = function() {
        if (typeof Chart === 'undefined' || !document.getElementById('progressChart')) {
            setTimeout(window.initChart, 100);
            return;
        }

        const ctx = document.getElementById('progressChart').getContext('2d');
        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, window.metricConfig[window.currentMetric].bgColor);
        gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');

        window.progressChartObj = new Chart(ctx, {
            type: 'line',
            data: {
                labels: window.PROGRESS_DATA.map(d => d.week),
                datasets: [{
                    label: window.metricConfig[window.currentMetric].label,
                    data: window.PROGRESS_DATA.map(d => d[window.currentMetric]),
                    borderColor: window.metricConfig[window.currentMetric].color,
                    backgroundColor: gradient,
                    borderWidth: 3,
                    pointBackgroundColor: window.metricConfig[window.currentMetric].color,
                    fill: true, tension: 0.4
                }]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#F3F4F6' } },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    window.updateChart = function(metric) {
        if (!window.progressChartObj) return;

        window.currentMetric = metric;
        const config = window.metricConfig[metric];
        
        window.progressChartObj.data.datasets[0].data = window.PROGRESS_DATA.map(d => d[metric]);
        window.progressChartObj.data.datasets[0].label = config.label;
        window.progressChartObj.data.datasets[0].borderColor = config.color;
        window.progressChartObj.data.datasets[0].pointBackgroundColor = config.color;
        
        const ctx = document.getElementById('progressChart').getContext('2d');
        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, config.bgColor);
        gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');
        window.progressChartObj.data.datasets[0].backgroundColor = gradient;
        
        window.progressChartObj.update();

        ['dolor', 'movilidad', 'cumplimiento'].forEach(m => {
            document.getElementById(`btn-${m}`).className = m === metric 
                ? "px-3 py-1.5 rounded-md text-xs font-medium bg-white text-[#1A5B4C] shadow-sm border border-gray-200"
                : "px-3 py-1.5 rounded-md text-xs font-medium text-gray-500 hover:text-gray-900";
        });
    }

    window.initChart();
</script>
@endsection