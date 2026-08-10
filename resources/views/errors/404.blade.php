<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página no encontrada - FisioWeb MX</title>
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
        
        <!-- Elementos decorativos suaves -->
        <div class="absolute -top-20 -right-20 w-40 h-40 bg-green-50 rounded-full blur-3xl opacity-60"></div>
        <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-blue-50 rounded-full blur-3xl opacity-60"></div>

        <!-- Ícono de Extraviado -->
        <div class="w-24 h-24 bg-gray-50 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-6 relative z-10 shadow-sm border border-gray-100">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
            </svg>
        </div>

        <span class="text-sm font-bold tracking-widest uppercase text-gray-400 mb-2 block relative z-10">Error 404</span>
        
        <h1 class="text-3xl font-serif text-gray-900 font-bold mb-4 relative z-10">Parece que te perdiste</h1>
        
        <p class="text-gray-500 mb-8 relative z-10 leading-relaxed">
            La página que estás buscando no existe, cambió de nombre o está temporalmente fuera de servicio. <br><br>
            No te preocupes, volvamos a un lugar seguro.
        </p>

        <!-- Botones de Acción -->
        <div class="flex justify-center relative z-10">
            <a href="/" class="bg-fisiogreen hover:bg-teal-900 text-white font-medium px-6 py-3 rounded-full transition-colors shadow-md flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Volver a la Clínica
            </a>
        </div>

    </div>

</body>
</html>