@extends('layouts.app')

@section('title', 'Dashboard Gerencial')

@section('content')
<!-- Cargamos Chart.js para las gráficas -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-gray-50/50">
    
    <!-- Encabezado -->
    <div class="mb-8 flex justify-between items-end">
        <div>
            <span class="text-xs font-bold tracking-widest uppercase text-teal-600 mb-1 block">Panel de Control Médico</span>
            <h1 class="text-3xl font-serif text-gray-900 font-bold">Métricas de la Clínica</h1>
        </div>
        <a href="/citas/reporte/pdf" class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 font-medium px-4 py-2 rounded-lg transition-colors shadow-sm flex items-center gap-2 text-sm">
            <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9h2v9h-2z"/></svg>
            Exportar Agenda PDF
        </a>
    </div>

    <!-- ========================================================================= -->
    <!-- FILA 1: 4 TARJETAS DE RESUMEN (KPI) - Basado en la imagen -->
    <!-- ========================================================================= -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        
        <!-- Tarjeta 1 -->
        <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] text-center flex flex-col justify-center hover:-translate-y-1 transition-transform">
            <h3 class="text-xs font-bold uppercase tracking-wider text-fisiogreen mb-1">Citas Hoy</h3>
            <p class="text-[10px] text-gray-400 mb-3 uppercase">Pacientes agendados</p>
            <p class="text-4xl font-sans font-light text-gray-800 tracking-tight">{{ $citasHoy }}</p>
        </div>

        <!-- Tarjeta 2 -->
        <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] text-center flex flex-col justify-center hover:-translate-y-1 transition-transform">
            <h3 class="text-xs font-bold uppercase tracking-wider text-orange-500 mb-1">Pendientes</h3>
            <p class="text-[10px] text-gray-400 mb-3 uppercase">Por confirmar</p>
            <p class="text-4xl font-sans font-light text-gray-800 tracking-tight">{{ $pendientes }}</p>
        </div>

        <!-- Tarjeta 3 -->
        <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] text-center flex flex-col justify-center hover:-translate-y-1 transition-transform">
            <h3 class="text-xs font-bold uppercase tracking-wider text-blue-500 mb-1">Confirmadas</h3>
            <p class="text-[10px] text-gray-400 mb-3 uppercase">Listas para consulta</p>
            <p class="text-4xl font-sans font-light text-gray-800 tracking-tight">{{ $confirmadas }}</p>
        </div>

        <!-- Tarjeta 4 -->
        <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] text-center flex flex-col justify-center hover:-translate-y-1 transition-transform">
            <h3 class="text-xs font-bold uppercase tracking-wider text-gray-600 mb-1">Total Histórico</h3>
            <p class="text-[10px] text-gray-400 mb-3 uppercase">Citas en sistema</p>
            <p class="text-4xl font-sans font-light text-gray-800 tracking-tight">{{ $totalCitas }}</p>
        </div>

    </div>

    <!-- ========================================================================= -->
    <!-- FILA 2: GRÁFICA PRINCIPAL Y DONA -->
    <!-- ========================================================================= -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        
        <!-- Gráfica de Líneas (Ocupa 2 columnas) -->
        <div class="lg:col-span-2 bg-white border border-gray-100 rounded-2xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-sm font-bold uppercase tracking-wider text-fisiogreen">Flujo de Pacientes</h3>
                <span class="bg-green-50 text-fisiogreen text-xs px-2 py-1 rounded-md font-medium">Año 2026</span>
            </div>
            <div class="relative flex-grow min-h-[250px] w-full">
                <canvas id="mainLineChart"></canvas>
            </div>
        </div>

        <!-- Gráfica de Dona (Ocupa 1 columna) -->
        <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex flex-col relative">
            <h3 class="text-sm font-bold uppercase tracking-wider text-fisiogreen mb-6 text-center">Especialidades</h3>
            <div class="relative flex-grow flex items-center justify-center min-h-[200px] w-full">
                <canvas id="doughnutChart"></canvas>
                <!-- Texto en el centro de la dona -->
                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none mt-2">
                    <span class="text-3xl font-light text-gray-800">{{ $confirmadas }}</span>
                    <span class="text-[10px] uppercase font-bold text-gray-400">Activas</span>
                </div>
            </div>
        </div>

    </div>

    <!-- ========================================================================= -->
    <!-- FILA 3: 3 MINI-GRÁFICAS DE ÁREA Y 1 WIDGET DE LISTA -->
    <!-- ========================================================================= -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Mini Chart 1 -->
        <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex flex-col">
            <h3 class="text-xs font-bold uppercase tracking-wider text-blue-600 mb-1">Nuevos Ingresos</h3>
            <p class="text-[10px] text-gray-400 mb-4 line-clamp-2">Tendencia de pacientes de primera vez en los últimos 7 días.</p>
            <div class="relative h-24 w-full mt-auto">
                <canvas id="miniChart1"></canvas>
            </div>
        </div>

        <!-- Mini Chart 2 -->
        <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex flex-col">
            <h3 class="text-xs font-bold uppercase tracking-wider text-emerald-500 mb-1">Altas Médicas</h3>
            <p class="text-[10px] text-gray-400 mb-4 line-clamp-2">Pacientes dados de alta con recuperación exitosa.</p>
            <div class="relative h-24 w-full mt-auto">
                <canvas id="miniChart2"></canvas>
            </div>
        </div>

        <!-- Mini Chart 3 -->
        <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex flex-col">
            <h3 class="text-xs font-bold uppercase tracking-wider text-indigo-500 mb-1">Retención</h3>
            <p class="text-[10px] text-gray-400 mb-4 line-clamp-2">Pacientes que completan el 100% de sus sesiones.</p>
            <div class="relative h-24 w-full mt-auto">
                <canvas id="miniChart3"></canvas>
            </div>
        </div>

        <!-- Lista de Progreso -->
        <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] flex flex-col">
            <h3 class="text-xs font-bold uppercase tracking-wider text-gray-700 mb-1">Demanda Semanal</h3>
            <p class="text-[10px] text-gray-400 mb-4">Zonas corporales más tratadas.</p>
            
            <div class="space-y-4 mt-2">
                <!-- Item 1 -->
                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="font-medium text-gray-700">Espalda Baja</span>
                        <span class="text-gray-500 text-[10px]">85%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-1.5">
                        <div class="bg-fisiogreen h-1.5 rounded-full" style="width: 85%"></div>
                    </div>
                </div>
                <!-- Item 2 -->
                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="font-medium text-gray-700">Rodilla / LCA</span>
                        <span class="text-gray-500 text-[10px]">60%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-1.5">
                        <div class="bg-blue-500 h-1.5 rounded-full" style="width: 60%"></div>
                    </div>
                </div>
                <!-- Item 3 -->
                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="font-medium text-gray-700">Hombro</span>
                        <span class="text-gray-500 text-[10px]">40%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-1.5">
                        <div class="bg-indigo-400 h-1.5 rounded-full" style="width: 40%"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    
    // Configuraciones globales para que se vea limpio como en la imagen
    Chart.defaults.font.family = "'Inter', sans-serif";
    Chart.defaults.color = '#9ca3af';
    Chart.defaults.scale.grid.color = '#f3f4f6';

    // ---------------------------------------------------------
    // 1. GRÁFICA PRINCIPAL DE LÍNEAS
    // ---------------------------------------------------------
    const ctxMain = document.getElementById('mainLineChart').getContext('2d');
    new Chart(ctxMain, {
        type: 'line',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago'],
            datasets: [{
                label: 'Citas Atendidas',
                data: [120, 190, 150, 220, 180, 250, 210, 280],
                borderColor: '#1A5B4C', // fisiogreen
                backgroundColor: 'rgba(26, 91, 76, 0.05)',
                borderWidth: 2,
                pointBackgroundColor: '#ffffff',
                pointBorderColor: '#1A5B4C',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6,
                fill: true,
                tension: 0.4 // Hace la línea curva y suave
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, border: { display: false } },
                x: { border: { display: false }, grid: { display: false } }
            }
        }
    });

    // ---------------------------------------------------------
    // 2. GRÁFICA DE DONA
    // ---------------------------------------------------------
    const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
    new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            labels: ['Espalda', 'Rodilla', 'Hombro', 'Otros'],
            datasets: [{
                data: [45, 25, 20, 10],
                backgroundColor: ['#1A5B4C', '#3b82f6', '#6366f1', '#e5e7eb'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%', // Qué tan gruesa es la dona (75% vacío = delgada)
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(context) { return ' ' + context.label + ': ' + context.parsed + '%'; }
                    }
                }
            }
        }
    });

    // ---------------------------------------------------------
    // 3. MINI GRÁFICAS DE ÁREA (Funciones reutilizables)
    // ---------------------------------------------------------
    function createMiniChart(canvasId, dataPoints, colorHex, bgColor) {
        const ctx = document.getElementById(canvasId).getContext('2d');
        
        // Crear gradiente para el relleno del área
        let gradient = ctx.createLinearGradient(0, 0, 0, 100);
        gradient.addColorStop(0, bgColor);
        gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['L', 'M', 'M', 'J', 'V', 'S', 'D'],
                datasets: [{
                    data: dataPoints,
                    borderColor: colorHex,
                    backgroundColor: gradient,
                    borderWidth: 2,
                    pointRadius: 0, // Ocultar los puntos para que se vea minimalista
                    pointHoverRadius: 4,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false }, tooltip: { enabled: false } },
                scales: {
                    x: { display: false }, // Ocultar ejes
                    y: { display: false, min: 0 }
                },
                layout: { padding: 0 }
            }
        });
    }

    // Dibujamos las 3 mini gráficas con datos simulados y colores diferentes
    createMiniChart('miniChart1', [10, 25, 15, 30, 20, 35, 25], '#2563eb', 'rgba(37, 99, 235, 0.2)'); // Azul
    createMiniChart('miniChart2', [5, 15, 10, 25, 15, 30, 20], '#10b981', 'rgba(16, 185, 129, 0.2)'); // Esmeralda
    createMiniChart('miniChart3', [30, 25, 35, 20, 40, 25, 45], '#6366f1', 'rgba(99, 102, 241, 0.2)'); // Indigo

});
</script>
@endsection