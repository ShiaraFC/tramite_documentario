<?php

use function Livewire\Volt\{state, rules, layout, with};
use Livewire\WithFileUploads;

with(WithFileUploads::class);

layout('components.layouts.app.sidebar');

state([
    'sustento' => '',
    'solicitudDirector' => null,
    'formatoAutorizacion' => null,
    'ejemplarDigital' => null,
    'pagoDiploma' => null,
]);

rules([
    'sustento' => 'required|string|min:5',
    'solicitudDirector' => 'required|file|mimes:pdf|max:2048',
    'formatoAutorizacion' => 'required|file|mimes:pdf|max:2048',
    'ejemplarDigital' => 'required|file|mimes:pdf|max:2048',
    'pagoDiploma' => 'required|file|mimes:pdf|max:2048',
]);

$enviarSolicitud = function() {
    $this->validate();
    
    // Aquí iría la lógica para guardar los archivos
    // $this->solicitudDirector->store('documentos');
    
    session()->flash('success', '¡Solicitud enviada correctamente!');
    $this->reset(['sustento', 'solicitudDirector', 'formatoAutorizacion', 'ejemplarDigital', 'pagoDiploma']);
};

?>

<div class="bg-[#E0E0E0] p-6">
    <div class="max-w-6xl mx-auto">
        <!-- Título principal -->
        <h1 class="text-3xl font-bold text-[#E5C300] mb-8" style="text-shadow: 1px 1px 0 #000">
            OTORGAR GRADO ACADÉMICO DE MAESTRO, DOCTOR Y TÍTULO DE SEGUNDA ESPECIALIDAD PROFESIONAL
        </h1>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-600 text-green-800 rounded text-center">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="enviarSolicitud">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Columna Izquierda -->
                <div class="space-y-6">
                    <!-- Descripción -->
                    <div class="bg-white p-4 rounded border border-black">
                        <h2 class="text-lg font-semibold text-black mb-2">Descripción:</h2>
                        <p class="text-base text-black">OTORGAR GRADO ACADÉMICO DE MAESTRO, DOCTOR Y TÍTULO DE SEGUNDA ESPECIALIDAD PROFESIONAL</p>
                    </div>
                    <!-- Requisitos -->
                    <div class="bg-white p-4 rounded border border-black">
                        <h2 class="text-lg font-semibold text-black mb-2">Requisitos:</h2>
                        <ol class="list-decimal list-inside space-y-1 text-black">
                            <li>SOLICITUD DIRIGIDA AL DIRECTOR DE LA UNIDAD DE POSGRADO</li>
                            <li>EJEMPLAR DIGITAL (TESIS SEGÚN FORMATO SUNEDU) CON REPORTE DE ORIGINALIDAD FIRMADO POR EL ASESOR</li>
                            <li>FORMATO DE AUTORIZACIÓN Y/O EMBARGO PARA PUBLICACIÓN DE TESIS</li>
                            <li>5 UNIDADES</li>
                            <li>PAGO POR DERECHO DE DIPLOMA</li>
                            <li>PAGO POR DERECHO DE FICHA ESTADÍSTICA</li>
                            <li>PAGO POR DERECHO DE TRÁMITE DOCUMENTARIO</li>
                        </ol>
                    </div>
                    <!-- Base Legal -->
                    <div class="bg-white p-4 rounded border border-black">
                        <h2 class="text-lg font-semibold text-black mb-2">Base Legal:</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-4 py-2 border border-black text-left text-sm">Artículo</th>
                                        <th class="px-4 py-2 border border-black text-left text-sm">Denominación</th>
                                        <th class="px-4 py-2 border border-black text-left text-sm">Tipo</th>
                                        <th class="px-4 py-2 border border-black text-left text-sm">Número</th>
                                        <th class="px-4 py-2 border border-black text-left text-sm">Fecha de Publicación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-4 py-2 border border-black">Art. 96 y 116</td>
                                        <td class="px-4 py-2 border border-black">Reglamento General de la Escuela de Posgrado (V.2)</td>
                                        <td class="px-4 py-2 border border-black">Otros</td>
                                        <td class="px-4 py-2 border border-black">Resolución N° 6975-CU-2020</td>
                                        <td class="px-4 py-2 border border-black">21/07/2020</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha -->
                <div class="space-y-6">
                    <!-- Detalles -->
                    <div class="bg-white p-4 rounded border border-black">
                        <h2 class="text-lg font-semibold text-black mb-2">Detalles:</h2>
                        <ul class="space-y-1 text-black">
                            <li><span class="font-semibold">Duración:</span> 30 días</li>
                            <li><span class="font-semibold">Área Inicio:</span> Unidad de Administración Documentaria</li>
                            <li><span class="font-semibold">Dependencia:</span> Sin Asignar</li>
                        </ul>
                    </div>
                    <!-- Requisitos con costo -->
                    <div class="bg-white p-4 rounded border border-black">
                        <h2 class="text-lg font-semibold text-black mb-2">Requisitos:</h2>
                        <ul class="list-disc list-inside space-y-1 text-black">
                            <li>SOLICITUD DIRIGIDA AL DIRECTOR DE LA UNIDAD DE POSGRADO</li>
                            <li>EJEMPLAR DIGITAL (TESIS SEGÚN FORMATO SUNEDU) CON REPORTE DE ORIGINALIDAD FIRMADO POR EL ASESOR</li>
                            <li>FORMATO DE AUTORIZACIÓN Y/O EMBARGO PARA PUBLICACIÓN DE TESIS (DESCARGAR DE LA WEB O SOLICITAR EN LAS UNIDADES)</li>
                            <li>PAGO POR DERECHO DE DIPLOMA - <span class="text-[#22572D] font-bold">Costo: s/ 500.00</span></li>
                            <li>PAGO POR DERECHO DE FICHA ESTADÍSTICA - <span class="text-[#22572D] font-bold">Costo: s/ 5.00</span></li>
                            <li>PAGO POR DERECHO DE TRÁMITE DOCUMENTARIO - <span class="text-[#22572D] font-bold">Costo: s/ 3.00</span></li>
                        </ul>
                    </div>
                    <!-- Sustento -->
                    <div class="bg-white p-4 rounded border border-black">
                        <h2 class="text-lg font-semibold text-black mb-2">Sustento:</h2>
                        <textarea wire:model="sustento" rows="4" class="w-full rounded border border-black p-2" placeholder="Ingresar sustento..."></textarea>
                        @error('sustento') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    <!-- Adjuntar Requisitos -->
                    <div class="bg-white p-4 rounded border border-black">
                        <h2 class="text-lg font-semibold text-black mb-2">Adjuntar Requisitos:</h2>
                        <div class="space-y-4">
                            <!-- Solicitud Director -->
                            <div>
                                <p class="mb-2">PAGO POR DERECHO DE DIPLOMA, PAGO POR DERECHO DE TRÁMITE DOCUMENTARIO Y PAGO POR DERECHO DE FICHA</p>
                                <div class="flex">
                                    <input type="text" readonly placeholder="Seleccione un archivo" class="flex-1 p-2 border border-r-0 border-gray-300 rounded-l">
                                    <label class="px-4 py-2 bg-[#E5C300] text-black font-medium rounded-r cursor-pointer">
                                        <input type="file" wire:model="pagoDiploma" class="hidden" accept=".pdf">
                                        Buscar
                                    </label>
                                </div>
                                @error('pagoDiploma') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Solicitud Director -->
                            <div>
                                <p class="mb-2">SOLICITUD DIRIGIDA AL DIRECTOR DE LA UNIDAD DE POSGRADO</p>
                                <div class="flex">
                                    <input type="text" readonly placeholder="Seleccione un archivo" class="flex-1 p-2 border border-r-0 border-gray-300 rounded-l">
                                    <label class="px-4 py-2 bg-[#E5C300] text-black font-medium rounded-r cursor-pointer">
                                        <input type="file" wire:model="solicitudDirector" class="hidden" accept=".pdf">
                                        Buscar
                                    </label>
                                </div>
                                @error('solicitudDirector') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Formato Autorización -->
                            <div>
                                <p class="mb-2">FORMATO DE AUTORIZACIÓN Y/O EMBARGO PARA PUBLICACIÓN DE TESIS</p>
                                <div class="flex">
                                    <input type="text" readonly placeholder="Seleccione un archivo" class="flex-1 p-2 border border-r-0 border-gray-300 rounded-l">
                                    <label class="px-4 py-2 bg-[#E5C300] text-black font-medium rounded-r cursor-pointer">
                                        <input type="file" wire:model="formatoAutorizacion" class="hidden" accept=".pdf">
                                        Buscar
                                    </label>
                                </div>
                                @error('formatoAutorizacion') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Ejemplar Digital -->
                            <div>
                                <p class="mb-2">EJEMPLAR DIGITAL (TESIS SEGÚN FORMATO SUNEDU) CON REPORTE DE ORIGINALIDAD FIRMADO POR EL ASESOR</p>
                                <div class="flex">
                                    <input type="text" readonly placeholder="Seleccione un archivo" class="flex-1 p-2 border border-r-0 border-gray-300 rounded-l">
                                    <label class="px-4 py-2 bg-[#E5C300] text-black font-medium rounded-r cursor-pointer">
                                        <input type="file" wire:model="ejemplarDigital" class="hidden" accept=".pdf">
                                        Buscar
                                    </label>
                                </div>
                                @error('ejemplarDigital') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botón de envío -->
            <div class="mt-6">
                <button type="submit" class="px-6 py-2 bg-white text-[#22572D] text-sm font-semibold rounded border border-[#22572D] hover:bg-[#22572D] hover:text-white transition-colors">
                    + Enviar Solicitud
                </button>
            </div>
        </form>
    </div>
</div>
