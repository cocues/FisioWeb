@extends('layouts.app')

@section('title', 'Cuestionario')

@section('content')
<div class="pt-10 flex items-center justify-center px-6 pb-16">
    <div id="quiz-container" class="max-w-lg w-full">
        <!-- El contenido interactivo aparecerá aquí -->
    </div>
</div>

<script>
    // Guardamos las variables en "window" para que el navegador no las pierda
    window.QUIZ_STEPS = [
        { q: "¿Qué zona del cuerpo presenta molestia?", options: ["Cuello / Cervical", "Hombro", "Espalda baja", "Rodilla", "Tobillo / Pie", "Otra"] },
        { q: "¿Cómo describirías mejor el dolor?", options: ["Punzante al moverte", "Tensión constante", "Ardor / quemazón", "Rigidez matutina", "Dolor al cargar peso"] },
        { q: "¿Desde cuándo tienes esta molestia?", options: ["Menos de 1 semana", "1–4 semanas", "1–3 meses", "Más de 3 meses"] },
        { q: "Del 1 al 10, ¿cómo calificarías tu nivel de dolor ahora?", options: ["1–3 (leve)", "4–6 (moderado)", "7–8 (intenso)", "9–10 (muy intenso)"] }
    ];

    window.quizStep = 0;
    window.quizAnswers = [];

    window.renderQuiz = function() {
        const container = document.getElementById('quiz-container');
        
        // Si el HTML aún no carga, vuelve a intentar en 50 milisegundos
        if (!container) {
            setTimeout(window.renderQuiz, 50);
            return;
        }

        if (window.quizStep >= window.QUIZ_STEPS.length) {
            let resumen = window.quizAnswers.map((ans, i) => `<div class="flex items-start gap-2 mb-2"><span class="text-xs text-gray-500 mt-0.5 font-bold">P${i + 1}:</span><span class="text-xs text-gray-800">${ans}</span></div>`).join('');
            
            container.innerHTML = `
                <div class="bg-white border border-gray-200 rounded-2xl p-8 text-center shadow-md fade-in">
                    <div class="w-14 h-14 rounded-full bg-green-50 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-[#1A5B4C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <h2 class="text-2xl font-serif text-gray-900 mb-2">Orientación inicial</h2>
                    <p class="text-sm text-gray-500 mb-6">Recomendamos comenzar con ejercicios de movilidad. No sustituye valoración médica.</p>
                    <div class="bg-gray-50 rounded-xl p-4 mb-6 text-left border border-gray-100">${resumen}</div>
                    <div class="flex flex-col gap-3">
                        <a href="/ejercicios" class="w-full block py-3 bg-[#1A5B4C] text-white rounded-xl text-sm font-medium hover:bg-emerald-900 transition-colors">Ver ejercicios</a>
                        <button onclick="window.resetQuiz()" class="w-full py-3 border border-gray-200 text-gray-700 rounded-xl text-sm font-medium hover:bg-gray-50 transition-colors">Repetir cuestionario</button>
                    </div>
                </div>`;
            return;
        }

        const currentData = window.QUIZ_STEPS[window.quizStep];
        let optionsHtml = currentData.options.map(opt => `<button onclick="window.selectOption('${opt}')" class="w-full text-left px-5 py-3.5 rounded-xl border border-gray-200 text-sm hover:border-[#1A5B4C] hover:bg-green-50 text-gray-700 font-medium mb-3 transition-all">${opt}</button>`).join('');
        
        let progressBars = window.QUIZ_STEPS.map((_, i) => `<div class="h-1.5 flex-1 rounded-full transition-all duration-500 ${i <= window.quizStep ? 'bg-[#1A5B4C]' : 'bg-gray-200'}"></div>`).join('');

        container.innerHTML = `
            <div class="mb-8 fade-in">
                <span class="text-xs font-bold tracking-widest uppercase text-emerald-600 mb-2 block">Cuestionario de síntomas</span>
                <div class="flex items-center gap-2 mt-5 mb-2">${progressBars}</div>
                <p class="text-xs text-gray-400 font-medium">Pregunta ${window.quizStep + 1} de ${window.QUIZ_STEPS.length}</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm fade-in">
                <h2 class="text-xl font-serif text-gray-900 mb-6">${currentData.q}</h2>
                <div>${optionsHtml}</div>
            </div>
            ${window.quizStep > 0 ? `<button onclick="window.prevStep()" class="mt-6 text-sm text-gray-400 hover:text-gray-800 flex items-center gap-1 font-medium transition-colors">← Pregunta anterior</button>` : ''}
        `;
    }

    // Funciones globales
    window.selectOption = function(opt) { window.quizAnswers[window.quizStep] = opt; window.quizStep++; window.renderQuiz(); }
    window.prevStep = function() { window.quizStep--; window.renderQuiz(); }
    window.resetQuiz = function() { window.quizStep = 0; window.quizAnswers = []; window.renderQuiz(); }

    // Ejecutamos el cuestionario de forma segura
    document.addEventListener('DOMContentLoaded', window.renderQuiz);
    setTimeout(window.renderQuiz, 200); // Respaldo por si falla el evento
</script>

<style>
    .fade-in { animation: customFade 0.4s ease-out forwards; }
    @keyframes customFade {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection