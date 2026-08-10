@extends('layouts.app')

@section('title', 'Agendar Cita')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-16">
    
    <div class="text-center mb-12 animate-[fadeIn_0.5s_ease-out]">
        <span class="text-xs font-bold tracking-widest uppercase text-emerald-600 mb-2 block">Contacto Clínico</span>
        <h1 class="text-4xl font-serif text-gray-900 font-bold mb-4">Agenda tu recuperación</h1>
        <p class="text-lg text-gray-500 max-w-2xl mx-auto">Para brindarte la mejor atención y evitar tiempos de espera, todas nuestras citas de primer ingreso y seguimiento se agendan vía telefónica o WhatsApp.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Información de Contacto -->
        <div class="bg-white border border-gray-200 rounded-3xl p-8 shadow-sm flex flex-col justify-center">
            <h2 class="text-2xl font-serif text-gray-900 mb-6">Comunícate con nosotros</h2>
            
            <div class="space-y-6">
                <!-- Teléfono -->
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-green-50 rounded-full flex items-center justify-center text-fisiogreen shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">Llamada telefónica</p>
                        <p class="text-gray-500 text-sm mt-1">Lunes a Viernes de 9:00 AM a 7:00 PM</p>
                        <a href="tel:+523312345678" class="text-lg font-bold text-fisiogreen hover:underline mt-1 block">+52 (33) 1234-5678</a>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-green-50 rounded-full flex items-center justify-center text-fisiogreen shrink-0">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">Atención por WhatsApp</p>
                        <p class="text-gray-500 text-sm mt-1">Envíanos un mensaje y te responderemos a la brevedad.</p>
                        <button class="bg-green-100 text-fisiogreen px-4 py-2 rounded-lg text-xs font-bold mt-3 hover:bg-green-200 transition">Enviar Mensaje</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- App Móvil Promo -->
        <div class="bg-fisiogreen rounded-3xl p-8 shadow-sm text-white flex flex-col justify-between relative overflow-hidden">
            <div class="relative z-10">
                <span class="bg-emerald-800 text-white px-3 py-1 rounded-full text-[10px] font-bold tracking-wider uppercase mb-4 inline-block">Próximamente</span>
                <h2 class="text-3xl font-serif font-bold mb-4 leading-tight">¿Ya eres paciente de la clínica?</h2>
                <p class="text-emerald-100 text-sm mb-8 leading-relaxed">Descarga nuestra app móvil oficial. Podrás agendar tus citas directamente desde tu celular, ver tus rutinas de ejercicios asignadas por tu terapeuta y medir tu nivel de recuperación.</p>
                
                <div class="flex items-center gap-3">
                    <button class="bg-white text-fisiogreen px-5 py-2.5 rounded-xl text-sm font-bold opacity-80 cursor-not-allowed flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.523 15.341c-.024-2.83 2.308-4.226 2.414-4.296-1.31-1.921-3.344-2.18-4.067-2.222-1.722-.175-3.366 1.018-4.246 1.018-.885 0-2.235-1.002-3.664-.973-1.859.025-3.57 1.082-4.524 2.748-1.94 3.36-1.503 8.328.4 11.088.927 1.346 2.023 2.846 3.486 2.793 1.418-.057 1.956-.917 3.633-.917 1.666 0 2.164.917 3.655.889 1.52-.027 2.455-1.34 3.37-2.68 1.056-1.543 1.492-3.037 1.514-3.118-.035-.015-2.92-1.121-2.946-4.23M12.062 4.108c.784-.95 1.31-2.274 1.165-3.593-1.124.045-2.51.748-3.315 1.7-.714.84-1.332 2.189-1.163 3.493 1.258.098 2.528-.65 3.313-1.6"/></svg>
                        App Store
                    </button>
                    <button class="bg-white text-fisiogreen px-5 py-2.5 rounded-xl text-sm font-bold opacity-80 cursor-not-allowed flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M1.385 8.163c-.161 1.77.29 4.316 2.052 7.025 1.328 2.04 3.102 4.025 5.378 4.675 2.17.618 4.254-.153 5.422-1.785.807-1.128 1.126-2.593 1.004-3.957-.042-.455-.262-.83-.615-1.042-1.042-.628-2.91-1.637-3.23-1.802-.323-.165-.688-.202-1.018.018-.544.364-1.353 1.144-1.737 1.41-.383.266-.828.293-1.355.034-1.777-.872-3.313-2.196-4.48-3.87-.272-.39-.24-.803.042-1.144.382-.464 1.047-1.156 1.332-1.58.192-.284.185-.66-.02-.958C3.844 4.545 2.94 2.87 2.766 2.54c-.173-.328-.518-.466-.87-.393-1.006.21-2.483.96-2.923 1.635-.457.701-.527 1.545-.386 2.37.14.823.513 1.621.8 2.01z"/></svg>
                        Google Play
                    </button>
                </div>
            </div>
            <!-- Círculos decorativos -->
            <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-emerald-800 rounded-full blur-3xl opacity-50 z-0"></div>
        </div>

    </div>
</div>
@endsection