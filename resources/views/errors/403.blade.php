<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Denegado - FisioWeb MX</title>
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
<body class="bg-fisiobg font-sans text-gray-800 antialiased min-h-screen flex items-center justify-center p-6">

    <div class="max-w-lg w-full bg-white rounded-3xl shadow-xl border border-gray-100 p-10 text-center relative overflow-hidden">
        
        <!-- Elemento decorativo de fondo -->
        <div class="absolute -top-20 -right-20 w-40 h-40 bg-green-50 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-red-50 rounded-full blur-3xl opacity-50"></div>

        <!-- Ícono de Seguridad -->
        <div class="w-24 h-24 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6 relative z-10 shadow-sm border border-red-100">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
        </div>

        <span class="text-sm font-bold tracking-widest uppercase text-red-500 mb-2 block relative z-10">Error 403</span>
        
        <h1 class="text-3xl font-serif text-gray-900 font-bold mb-4 relative z-10">Zona Restringida</h1>
        
        <p class="text-gray-500 mb-8 relative z-10 leading-relaxed">
            Lo sentimos, el área a la que intentas acceder es exclusiva para el personal médico y fisioterapeutas de la clínica. <br><br>
            Si eres un paciente, por favor regresa al portal principal para ver tus ejercicios y cuestionarios.
        </p>

        <!-- Botones de Acción -->
        <div class="flex flex-col sm:flex-row gap-3 justify-center relative z-10">
            <a href="/" class="bg-fisiogreen hover:bg-teal-900 text-white font-medium px-6 py-3 rounded-full transition-colors shadow-md flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Volver al Inicio
            </a>
        </div>

    </div>

</body>
</html>