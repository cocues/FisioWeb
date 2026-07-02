<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FisioWeb MX - Cuestionario</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-fisiobg font-sans text-gray-800 antialiased min-h-screen">

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
            <!-- Activo -->
            <a href="/cuestionario" class="flex items-center gap-1 text-fisiogreen bg-green-50 px-3 py-1.5 rounded-full"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg> Cuestionario</a>
            <a href="#" class="hover:text-fisiogreen transition">Mi Progreso</a>
        </div>
        <div class="flex items-center gap-4">
            <a href="#" class="text-sm font-medium text-gray-600 hover:text-fisiogreen">Iniciar sesión</a>
            <a href="#" class="bg-fisiogreen text-white px-5 py-2 rounded-full text-sm font-medium hover:bg-emerald-900 transition">Pedir cita</a>
        </div>
    </nav>

    <!-- Contenedor Principal donde se inyectará el Cuestionario -->
    <div class="pt-10 flex items-center justify-center px-6 pb-16">
        <div id="quiz-container" class="max-w-lg w-full">
            <!-- El contenido interactivo aparecerá aquí vía JavaScript -->
        </div>
    </div>

    <!-- Lógica del Cuestionario (Imitando a React) -->
    <script>
        // 1. Los datos de las preguntas (Extraídos del App.tsx)
        const QUIZ_STEPS = [
            {
                q: "¿Qué zona del cuerpo presenta molestia?",
                options: ["Cuello / Cervical", "Hombro", "Espalda baja", "Rodilla", "Tobillo / Pie", "Otra"]
            },
            {
                q: "¿Cómo describirías mejor el dolor?",
                options: ["Punzante al moverte", "Tensión constante", "Ardor / quemazón", "Rigidez matutina", "Dolor al cargar peso"]
            },
            {
                q: "¿Desde cuándo tienes esta molestia?",
                options: ["Menos de 1 semana", "1–4 semanas", "1–3 meses", "Más de 3 meses"]
            },
            {
                q: "Del 1 al 10, ¿cómo calificarías tu nivel de dolor ahora?",
                options: ["1–3 (leve)", "4–6 (moderado)", "7–8 (intenso)", "9–10 (muy intenso)"]
            }
        ];

        // 2. Variables de estado
        let step = 0;
        let answers = [];

        // 3. Función principal para dibujar la pantalla
        function renderQuiz() {
            const container = document.getElementById('quiz-container');

            // Si ya terminó todas las preguntas, mostramos el resultado
            if (step >= QUIZ_STEPS.length) {
                let resumenRespuestas = answers.map((ans, i) => `
                    <div class="flex items-start gap-2 mb-2">
                        <span class="text-xs text-gray-500 mt-0.5 font-bold">P${i + 1}:</span>
                        <span class="text-xs text-gray-800">${ans}</span>
                    </div>
                `).join('');

                container.innerHTML = `
                    <div class="bg-white border border-gray-200 rounded-2xl p-8 text-center shadow-md animate-[fadeIn_0.5s_ease-out]">
                        <div class="w-14 h-14 rounded-full bg-green-50 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-fisiogreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <h2 class="text-2xl font-serif text-gray-900 mb-2">Orientación inicial</h2>
                        <p class="text-sm text-gray-500 mb-6">
                            Según tus respuestas, te recomendamos comenzar con ejercicios de movilidad y estiramiento de la zona afectada. 
                            <strong>Recuerda que esta orientación no sustituye la valoración de un fisioterapeuta.</strong>
                        </p>
                        
                        <div class="bg-gray-50 rounded-xl p-4 mb-6 text-left border border-gray-100">
                            ${resumenRespuestas}
                        </div>

                        <div class="flex flex-col gap-3">
                            <a href="/ejercicios" class="w-full py-3 bg-fisiogreen text-white rounded-xl text-sm font-medium hover:bg-emerald-900 transition-colors">
                                Ver ejercicios recomendados
                            </a>
                            <button onclick="resetQuiz()" class="w-full py-3 border border-gray-200 text-gray-700 rounded-xl text-sm font-medium hover:bg-gray-50 transition-colors">
                                Repetir cuestionario
                            </button>
                        </div>
                    </div>
                `;
                return;
            }

            // Si no ha terminado, mostramos la pregunta actual
            const currentData = QUIZ_STEPS[step];
            
            // Generamos los botones de opciones
            let optionsHtml = currentData.options.map(opt => `
                <button onclick="selectOption('${opt}')" class="w-full text-left px-5 py-3.5 rounded-xl border border-gray-200 text-sm transition-all duration-200 hover:border-fisiogreen hover:bg-green-50 text-gray-700 font-medium mb-3">
                    ${opt}
                </button>
            `).join('');

            // Generamos las bolitas de progreso
            let progressBars = QUIZ_STEPS.map((_, i) => `
                <div class="h-1.5 flex-1 rounded-full transition-all duration-500 ${i <= step ? 'bg-fisiogreen' : 'bg-gray-200'}"></div>
            `).join('');

            // Dibujamos el HTML
            container.innerHTML = `
                <div class="mb-8 animate-[fadeIn_0.3s_ease-out]">
                    <span class="text-xs font-bold tracking-widest uppercase text-emerald-600 mb-2 block">Cuestionario de síntomas</span>
                    <p class="text-xs text-gray-500">Esta orientación es informativa y no reemplaza la evaluación profesional.</p>
                    
                    <div class="flex items-center gap-2 mt-5 mb-2">
                        ${progressBars}
                    </div>
                    <p class="text-xs text-gray-400 font-medium">Pregunta ${step + 1} de ${QUIZ_STEPS.length}</p>
                </div>

                <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm animate-[slideIn_0.3s_ease-out]">
                    <h2 class="text-xl font-serif text-gray-900 mb-6">${currentData.q}</h2>
                    <div>
                        ${optionsHtml}
                    </div>
                </div>

                ${step > 0 ? `
                    <button onclick="prevStep()" class="mt-6 text-sm text-gray-400 hover:text-gray-800 transition-colors flex items-center gap-1 font-medium">
                        ← Pregunta anterior
                    </button>
                ` : ''}
            `;
        }

        // 4. Funciones de interacción
        function selectOption(opt) {
            answers[step] = opt; // Guardamos la respuesta
            step++; // Avanzamos de pregunta
            renderQuiz(); // Redibujamos la pantalla
        }

        function prevStep() {
            step--; // Retrocedemos
            renderQuiz(); // Redibujamos
        }

        function resetQuiz() {
            step = 0; // Reiniciamos
            answers = [];
            renderQuiz();
        }

        // 5. Iniciar el cuestionario al cargar la página
        renderQuiz();
    </script>

    <!-- Pequeñas animaciones personalizadas en Tailwind -->
    <style>
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideIn { from { opacity: 0; transform: translateX(20px); } to { opacity: 1; transform: translateX(0); } }
    </style>
</body>
</html>