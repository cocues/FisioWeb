<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="icon" type="image/png" href="{{ asset('logo-fisio.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FisioWeb MX - @yield('title', 'Recuperación Real')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { fisiogreen: '#1A5B4C', fisiobg: '#FAFAFA' },
                    fontFamily: { serif: ['Georgia', 'serif'], sans: ['Inter', 'sans-serif'] }
                }
            }
        }
    </script>
</head>
<body class="bg-fisiobg font-sans text-gray-800 antialiased min-h-screen flex flex-col">

    <!-- NAVEGACIÓN MAESTRA -->
    <nav class="relative bg-white border-b border-gray-100 z-50">
        <div class="flex items-center justify-between px-6 py-4">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-fisiogreen text-white rounded flex items-center justify-center font-bold text-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <span class="text-xl font-bold text-gray-900">FisioWeb</span>
            </div>

            <!-- ENLACES CORREGIDOS: Ahora todos apuntan a sus rutas reales -->
            <div class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-500">
                <a href="/" class="hover:text-fisiogreen transition {{ request()->is('/') ? 'text-fisiogreen bg-green-50 px-3 py-1.5 rounded-full' : '' }}">Inicio</a>
                <a href="/ejercicios" class="hover:text-fisiogreen transition {{ request()->is('ejercicios') ? 'text-fisiogreen bg-green-50 px-3 py-1.5 rounded-full' : '' }}">Ejercicios</a>
                <a href="/cuestionario" class="hover:text-fisiogreen transition {{ request()->is('cuestionario') ? 'text-fisiogreen bg-green-50 px-3 py-1.5 rounded-full' : '' }}">Cuestionario</a>
                <a href="/progreso" class="hover:text-fisiogreen transition {{ request()->is('progreso') ? 'text-fisiogreen bg-green-50 px-3 py-1.5 rounded-full' : '' }}">Mi Progreso</a>
                
                @if(session('rol') == 'doctor')
                    <a href="/dashboard" class="hover:text-fisiogreen transition {{ request()->is('dashboard') ? 'text-fisiogreen bg-green-50 px-3 py-1.5 rounded-full' : '' }}">Dashboard</a>
                @endif

                @if(session('rol') == 'doctor' || session('rol') == 'recepcionista')
                    <a href="/citas" class="hover:text-fisiogreen transition {{ request()->is('citas') ? 'text-fisiogreen bg-green-50 px-3 py-1.5 rounded-full' : '' }}">Citas</a>
                @endif
            </div>

            <div class="flex items-center gap-4">
                @if(session('rol'))
                    <!-- Si ya inició sesión (Doctor o Paciente) -->
                    <span class="hidden md:block text-xs font-bold text-fisiogreen bg-green-50 px-2 py-1 rounded-md uppercase tracking-wider">
                        {{ session('rol') }}
                    </span>
                    <a href="/logout" class="hidden sm:block text-sm font-medium text-red-500 hover:text-red-700 transition">Cerrar sesión</a>
                @else
                    <!-- Si es un invitado -->
                    <a href="/login" class="hidden sm:block text-sm font-medium text-gray-600 hover:text-fisiogreen transition">Iniciar sesión</a>
                @endif
                
                <!-- Botón Pedir Cita ARREGLADO (Apunta a la página pública) -->
                <a href="/agendar-cita" class="hidden sm:block bg-fisiogreen text-white px-5 py-2 rounded-full text-sm font-medium hover:bg-emerald-900 transition">Pedir cita</a>
                
                <!-- Botón Hamburguesa (Móvil) -->
                <button id="mobile-menu-btn" class="md:hidden text-gray-600 hover:text-fisiogreen transition focus:outline-none">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>

        <!-- Menú Desplegable (Móvil) -->
        <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-white border-b border-gray-100 shadow-2xl z-50">
            <div class="flex flex-col px-6 py-5 gap-4 text-base font-medium text-gray-600">
                <a href="/" class="hover:text-fisiogreen">Inicio</a>
                <a href="/ejercicios" class="hover:text-fisiogreen">Ejercicios</a>
                <a href="/cuestionario" class="hover:text-fisiogreen">Cuestionario</a>
                <a href="/progreso" class="hover:text-fisiogreen">Mi Progreso</a>
                
                @if(session('rol') == 'doctor')
                    <a href="/dashboard" class="hover:text-fisiogreen">Dashboard</a>
                @endif

                @if(session('rol') == 'doctor' || session('rol') == 'recepcionista')
                    <a href="/citas" class="hover:text-fisiogreen">Citas</a>
                @endif
                
                <hr class="border-gray-100 my-1">
                @if(session('rol'))
                    <a href="/logout" class="text-red-500 font-bold">Cerrar sesión</a>
                @else
                    <a href="/login" class="text-fisiogreen font-bold">Iniciar sesión</a>
                @endif
                <!-- Botón Pedir Cita Móvil (Apunta a la página pública) -->
                <a href="/agendar-cita" class="bg-fisiogreen text-white text-center py-3 rounded-full font-bold">Pedir cita</a>
            </div>
        </div>
    </nav>

    <!-- Script para el menú móvil -->
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>

    <!-- ALERTAS FLOTANTES (TOAST) -->
    @if(session('success'))
        <div id="toast-success" class="fixed bottom-6 right-6 bg-white border-l-4 border-green-500 shadow-xl rounded-xl p-4 flex items-center gap-4 z-50 animate-[slideIn_0.4s_ease-out]">
            <div class="text-green-500 bg-green-50 rounded-full p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <div>
                <p class="text-sm font-bold text-gray-800">¡Éxito!</p>
                <p class="text-xs text-gray-500">{{ session('success') }}</p>
            </div>
            <button onclick="document.getElementById('toast-success').remove()" class="ml-4 text-gray-400 hover:text-gray-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        
        <script>
            // JavaScript simple para desaparecer la alerta después de 4 segundos
            setTimeout(() => {
                const toast = document.getElementById('toast-success');
                if (toast) {
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateY(10px)';
                    toast.style.transition = 'all 0.5s ease';
                    setTimeout(() => toast.remove(), 500);
                }
            }, 4000);
        </script>
        
        <style>
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
        </style>
    @endif

    <!-- Contenido -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER DE LA CLÍNICA -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                
                <!-- Columna 1: Marca y Descripción -->
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-fisiogreen text-white rounded flex items-center justify-center font-bold text-xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900">FisioWeb</span>
                    </div>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Tu guía digital hacia una recuperación real. Mejorando tu movilidad y calidad de vida en Guadalajara, un ejercicio a la vez.
                    </p>
                </div>

                <!-- Columna 2: Plataforma -->
                <div>
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4">Plataforma</h3>
                    <ul class="space-y-3 text-sm text-gray-500">
                        <li><a href="/" class="hover:text-fisiogreen transition">Inicio</a></li>
                        <li><a href="/ejercicios" class="hover:text-fisiogreen transition">Biblioteca de Ejercicios</a></li>
                        <li><a href="/cuestionario" class="hover:text-fisiogreen transition">Cuestionario de Síntomas</a></li>
                        <li><a href="/progreso" class="hover:text-fisiogreen transition">Panel de Progreso</a></li>
                    </ul>
                </div>

                <!-- Columna 3: Soporte y Legal -->
                <div>
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4">Soporte</h3>
                    <ul class="space-y-3 text-sm text-gray-500">
                        <li><a href="/citas" class="hover:text-fisiogreen transition">Agendar una Cita</a></li>
                        <li><a href="#" class="hover:text-fisiogreen transition">Preguntas Frecuentes</a></li>
                        <li><a href="#" class="hover:text-fisiogreen transition">Aviso de Privacidad (NOM-004)</a></li>
                        <li><a href="#" class="hover:text-fisiogreen transition">Términos y Condiciones</a></li>
                    </ul>
                </div>

                <!-- Columna 4: Contacto -->
                <div>
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4">Contacto</h3>
                    <ul class="space-y-3 text-sm text-gray-500">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-fisiogreen shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Av. Vallarta 1234, Col. Americana<br>Guadalajara, Jalisco</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-fisiogreen shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>+52 (33) 1234-5678</span>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Fila Inferior: Copyright y Redes -->
            <div class="border-t border-gray-100 mt-12 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm text-gray-400">
                    &copy; 2026 FisioWeb MX. Todos los derechos reservados.
                </p>
                <div class="flex items-center gap-4 text-gray-300">
                    <!-- Icono Facebook -->
                    <a href="#" class="hover:text-fisiogreen transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35C.597 0 0 .597 0 1.325v21.351C0 23.403.597 24 1.325 24h11.495v-9.294H9.691v-3.622h3.129V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116c.73 0 1.323-.597 1.323-1.325v-21.35c0-.728-.593-1.325-1.325-1.325z"/></svg></a>
                    <!-- Icono Instagram -->
                    <a href="#" class="hover:text-fisiogreen transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>