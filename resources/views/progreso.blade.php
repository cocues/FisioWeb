<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FisioWeb MX - Mi Progreso</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Chart.js para la gráfica -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        fisiogreen: '#1A5B4C',
                        fisiobg: '#FAFAFA'
                    },
                    fontFamily: {
                        serif: ['Georgia', 'serif'],
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-fisiobg font-sans text-gray-800 antialiased min-h-screen pb-16">

    <!-- Navegación Superior -->
    <nav class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-100">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-fisiogreen text-white rounded flex items-center justify-center font-bold text-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <span class="text-xl font-bold text-gray-900">FisioWeb</span>
        </div>
        <div class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-500">
            <a href="/" class="hover:text-fisiogreen transition">Inicio</a>
            <a href="/ejercicios" class="hover:text-fisiogreen transition">Ejercicios</a>
            <a href="/cuestionario" class="hover:text-fisiogreen transition">Cuestionario</a>
            <!-- Activo -->
            <a href="/progreso" class="flex items-center gap-1 text-fisiogreen bg-green-50 px-3 py-1.5 rounded-full"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg> Mi Progreso</a>
        </div>
        <div class="flex items-center gap-4">
            <a href="#" class="text-sm font-medium text-gray-600 hover:text-fisiogreen">Iniciar sesión</a>
            <a href="#" class="bg-fisiogreen text-white px-5 py-2 rounded-full text-sm font-medium hover:bg-emerald-900 transition">Pedir cita</a>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="max-w-5xl mx-auto px-6 py-10">
        <!-- Encabezado -->
        <div class="mb-8">
            <span class="text-xs font-bold tracking-widest uppercase text-emerald-600 mb-2 block">
                Panel personal
            </span>
            <h1 class="text-3xl font-serif text-gray-900">
                Mi progreso
            </h1>
        </div>

        <!-- Tarjetas de KPIs (Indicadores) -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <!-- KPI 1 -->
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                <div class="flex items-center gap-2 text-gray-500 mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-xs font-medium">Semanas activo</span>
                </div>
                <p class="text-3xl font-serif text-gray-900 mb-1">8</p>
                <p class="text-xs text-gray-400">semanas consecutivas</p>
            </div>
            <!-- KPI 2 -->
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                <div class="flex items-center gap-2 text-gray-500 mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-xs font-medium">Sesiones completas</span>
                </div>
                <p class="text-3xl font-serif text-gray-900 mb-1">34</p>
                <p class="text-xs text-gray-400">de 36 asignadas</p>
            </div>
            <!-- KPI 3 -->
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                <div class="flex items-center gap-2 text-gray-500 mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    <span class="text-xs font-medium">Cumplimiento</span>
                </div>
                <p class="text-3xl font-serif text-fisiogreen font-bold mb-1">97%</p>
                <p class="text-xs text-emerald-600 font-medium">↑ Excelente</p>
            </div>
            <!-- KPI 4 -->
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                <div class="flex items-center gap-2 text-gray-500 mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    <span class="text-xs font-medium">Dolor actual</span>
                </div>
                <p class="text-3xl font-serif text-gray-900 mb-1">2<span class="text-lg text-gray-400">/10</span></p>
                <p class="text-xs text-gray-400">vs 8/10 inicial</p>
            </div>
        </div>

        <!-- Sección de la Gráfica -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div>
                    <h2 id="chart-title" class="text-lg font-serif text-gray-900">Movilidad — últimas 8 semanas</h2>
                    <p id="chart-subtitle" class="text-xs text-gray-500 mt-1">Mejora de <span class="text-emerald-600 font-medium">+58%</span> desde el inicio</p>
                </div>
                <!-- Botones para cambiar la métrica -->
                <div class="flex gap-2 bg-gray-50 p-1 rounded-lg border border-gray-100">
                    <button onclick="updateChart('dolor')" id="btn-dolor" class="px-3 py-1.5 rounded-md text-xs font-medium text-gray-500 hover:text-gray-900 transition-colors">Nivel de dolor</button>
                    <button onclick="updateChart('movilidad')" id="btn-movilidad" class="px-3 py-1.5 rounded-md text-xs font-medium bg-white text-fisiogreen shadow-sm border border-gray-200 transition-colors">Movilidad</button>
                    <button onclick="updateChart('cumplimiento')" id="btn-cumplimiento" class="px-3 py-1.5 rounded-md text-xs font-medium text-gray-500 hover:text-gray-900 transition-colors">Cumplimiento</button>
                </div>
            </div>

            <!-- Contenedor del Canvas de Chart.js -->
            <div class="relative h-64 w-full">
                <canvas id="progressChart"></canvas>
            </div>
        </div>

        <!-- Checklist de la semana -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
            <h2 class="text-lg font-serif text-gray-900 mb-4">Plan de esta semana</h2>
            <div class="space-y-3">
                <!-- Tarea 1 (Completada) -->
                <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50">
                    <div class="w-5 h-5 rounded-full bg-fisiogreen flex items-center justify-center flex-shrink-0">
                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm line-through text-gray-400 font-medium">Estiramiento lumbar en decúbito</p>
                        <p class="text-xs text-gray-400">Lun · Mié · Vie</p>
                    </div>
                </div>
                <!-- Tarea 2 (Completada) -->
                <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50">
                    <div class="w-5 h-5 rounded-full bg-fisiogreen flex items-center justify-center flex-shrink-0">
                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm line-through text-gray-400 font-medium">Activación de glúteo medio</p>
                        <p class="text-xs text-gray-400">Mar · Jue</p>
                    </div>
                </div>
                <!-- Tarea 3 (Pendiente) -->
                <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-200">
                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center flex-shrink-0">
                    </div>
                    <div>
                        <p class="text-sm text-gray-800 font-medium">Propiocepción tobillo</p>
                        <p class="text-xs text-gray-500">Sáb</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script de Configuración de la Gráfica -->
    <script>
        // Datos extraídos del App.tsx
        const PROGRESS_DATA = [
            { week: "S1", dolor: 8, movilidad: 30, cumplimiento: 60 },
            { week: "S2", dolor: 7, movilidad: 40, cumplimiento: 70 },
            { week: "S3", dolor: 6, movilidad: 52, cumplimiento: 80 },
            { week: "S4", dolor: 5, movilidad: 60, cumplimiento: 85 },
            { week: "S5", dolor: 4, movilidad: 68, cumplimiento: 90 },
            { week: "S6", dolor: 3, movilidad: 75, cumplimiento: 92 },
            { week: "S7", dolor: 2, movilidad: 82, cumplimiento: 95 },
            { week: "S8", dolor: 2, movilidad: 88, cumplimiento: 97 },
        ];

        // Configuración de los colores y etiquetas por métrica
        const metricConfig = {
            dolor: { label: "Nivel de dolor", color: "#ef4444", bgColor: "rgba(239, 68, 68, 0.1)", unit: "/10", invert: true },
            movilidad: { label: "Movilidad", color: "#1A5B4C", bgColor: "rgba(26, 91, 76, 0.1)", unit: "%", invert: false },
            cumplimiento: { label: "Cumplimiento", color: "#0ea5e9", bgColor: "rgba(14, 165, 233, 0.1)", unit: "%", invert: false }
        };

        let currentMetric = 'movilidad';
        let progressChart;

        function initChart() {
            const ctx = document.getElementById('progressChart').getContext('2d');
            
            // Creamos el gradiente para el fondo de la gráfica
            let gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, metricConfig[currentMetric].bgColor);
            gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');

            progressChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: PROGRESS_DATA.map(d => d.week),
                    datasets: [{
                        label: metricConfig[currentMetric].label,
                        data: PROGRESS_DATA.map(d => d[currentMetric]),
                        borderColor: metricConfig[currentMetric].color,
                        backgroundColor: gradient,
                        borderWidth: 3,
                        pointBackgroundColor: metricConfig[currentMetric].color,
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        fill: true,
                        tension: 0.4 // Hace que la línea sea curva (smooth)
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#fff',
                            titleColor: '#111827',
                            bodyColor: '#4B5563',
                            borderColor: '#E5E7EB',
                            borderWidth: 1,
                            padding: 10,
                            displayColors: false,
                            callbacks: {
                                label: function(context) {
                                    return context.parsed.y + metricConfig[currentMetric].unit;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: '#F3F4F6', drawBorder: false },
                            border: { dash: [4, 4] }
                        },
                        x: {
                            grid: { display: false, drawBorder: false }
                        }
                    }
                }
            });
        }

        function updateChart(metric) {
            currentMetric = metric;
            const config = metricConfig[metric];

            // 1. Actualizar los datos de la gráfica
            progressChart.data.datasets[0].data = PROGRESS_DATA.map(d => d[metric]);
            progressChart.data.datasets[0].label = config.label;
            progressChart.data.datasets[0].borderColor = config.color;
            progressChart.data.datasets[0].pointBackgroundColor = config.color;
            
            const ctx = document.getElementById('progressChart').getContext('2d');
            let gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, config.bgColor);
            gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');
            progressChart.data.datasets[0].backgroundColor = gradient;
            
            progressChart.update();

            // 2. Actualizar Textos
            const firstVal = PROGRESS_DATA[0][metric];
            const lastVal = PROGRESS_DATA[PROGRESS_DATA.length - 1][metric];
            let diff = config.invert ? (firstVal - lastVal) : (lastVal - firstVal);
            
            document.getElementById('chart-title').innerText = `${config.label} — últimas 8 semanas`;
            document.getElementById('chart-subtitle').innerHTML = `Mejora de <span class="${diff > 0 ? 'text-emerald-600' : 'text-red-500'} font-medium">${diff > 0 ? '+' : ''}${diff}${config.unit}</span> desde el inicio`;

            // 3. Actualizar estilos de los botones
            ['dolor', 'movilidad', 'cumplimiento'].forEach(m => {
                const btn = document.getElementById(`btn-${m}`);
                if(m === metric) {
                    btn.className = "px-3 py-1.5 rounded-md text-xs font-medium bg-white text-fisiogreen shadow-sm border border-gray-200 transition-colors";
                } else {
                    btn.className = "px-3 py-1.5 rounded-md text-xs font-medium text-gray-500 hover:text-gray-900 transition-colors bg-transparent border-transparent shadow-none";
                }
            });
        }

        // Inicializar al cargar la página
        window.onload = initChart;
    </script>
</body>
</html>