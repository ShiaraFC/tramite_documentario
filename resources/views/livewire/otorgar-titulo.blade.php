<?php

use function Livewire\Volt\{state, rules, layout, with};
use Livewire\WithFileUploads;

with(WithFileUploads::class);

layout('components.layouts.app.sidebar');

state(['sustento' => '']);
state(['solicitudDecano' => null]);
state(['actaSustentacion' => null]);
state(['pagoTramite' => null]);

rules([
    'sustento' => 'required|string|min:5',
    'solicitudDecano' => 'required|file|mimes:pdf|max:2048',
    'actaSustentacion' => 'required|file|mimes:pdf|max:2048',
    'pagoTramite' => 'required|file|mimes:pdf|max:2048'
]);

$enviarSolicitud = function() {
    $this->validate();
    
    // Aquí iría la lógica para guardar los archivos
    // $this->solicitudDecano->store('documentos');
    
    session()->flash('success', '¡Solicitud enviada correctamente!');
    $this->reset(['sustento', 'solicitudDecano', 'actaSustentacion', 'pagoTramite']);
};

?>

<div class="min-h-screen">
    <!-- Contenido Principal -->
    <div class="bg-[#E0E0E0] p-6">
        <div class="max-w-6xl mx-auto">
            <!-- Título principal -->
            <h1 class="text-3xl font-bold text-[#E5C300] mb-8" style="text-shadow: 1px 1px 0 #000">
                OTORGAR EL TÍTULO PROFESIONAL
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
                            <p class="text-base text-black">OTORGAR EL TÍTULO PROFESIONAL.</p>
                        </div>
                        <!-- Requisitos -->
                        <div class="bg-white p-4 rounded border border-black">
                            <h2 class="text-lg font-semibold text-black mb-2">Requisitos:</h2>
                            <ol class="list-decimal list-inside space-y-1 text-black">
                                <li>SOLICITUD DIRIGIDA AL DECANO DE LA FACULTAD</li>
                                <li>ACTA DE SUSTENTACIÓN DE TESIS</li>
                                <li>PAGO POR DERECHO DE TRÁMITE DOCUMENTARIO</li>
                            </ol>
                        </div>
                        <!-- Base Legal -->
                        <div>
                            <h2 class="text-xl font-semibold text-black mb-2">Base Legal:</h2>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-black">
                                    <thead class="bg-gray-200">
                                        <tr>
                                            <th class="px-4 py-2 border border-black text-left text-sm font-bold">Artículo</th>
                                            <th class="px-4 py-2 border border-black text-left text-sm font-bold">Denominación</th>
                                            <th class="px-4 py-2 border border-black text-left text-sm font-bold">Tipo</th>
                                            <th class="px-4 py-2 border border-black text-left text-sm font-bold">Número</th>
                                            <th class="px-4 py-2 border border-black text-left text-sm font-bold">Fecha de Publicación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-4 py-2 border border-black">CAPITULO XXVIII</td>
                                            <td class="px-4 py-2 border border-black">Reglamento Académico General (V.2)</td>
                                            <td class="px-4 py-2 border border-black">Otros</td>
                                            <td class="px-4 py-2 border border-black">Resolución N° 1970-CU-2020</td>
                                            <td class="px-4 py-2 border border-black">05/08/2020</td>
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
                        <div>
                            <h2 class="text-xl font-semibold text-black mb-2">Requisitos:</h2>
                            <ul class="list-disc list-inside space-y-1 text-gray-800">
                                <li>SOLICITUD DIRIGIDA AL DECANO DE LA FACULTAD</li>
                                <li>ACTA DE SUSTENTACIÓN DE TESIS</li>
                                <li>PAGO POR DERECHO DE TRÁMITE DOCUMENTARIO - <span class="text-[#22572D] font-bold">Costo: s/ 3.00</span></li>
                            </ul>
                        </div>
                        <!-- Sustento -->
                        <div>
                            <h2 class="text-xl font-semibold text-black mb-2">Sustento:</h2>
                            <textarea wire:model="sustento" rows="4" class="w-full rounded border border-black p-2 bg-white text-black" placeholder="Ingresar sustento..."></textarea>
                            @error('sustento') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                        <!-- Adjuntar Requisitos -->
                        <div>
                            <h2 class="text-xl font-semibold text-black mb-2">Adjuntar Requisitos:</h2>
                            <table class="min-w-full">
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="py-2">SOLICITUD DIRIGIDA AL DECANO DE LA FACULTAD</td>
                                        <td class="py-2">
                                            <div class="flex items-center">
                                                <input type="file" wire:model="solicitudDecano" accept="application/pdf" class="hidden" id="solicitudDecano" />
                                                <input type="text" readonly placeholder="Seleccione un archivo" class="flex-1 p-2 border border-gray-300 rounded-l bg-white">
                                                <label for="solicitudDecano" class="px-4 py-2 bg-[#E5C300] text-black font-semibold rounded-r cursor-pointer hover:bg-[#d4b200]">
                                                    Buscar
                                                </label>
                                            </div>
                                            @error('solicitudDecano') <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span> @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">ACTA DE SUSTENTACIÓN DE TESIS</td>
                                        <td class="py-2">
                                            <div class="flex items-center">
                                                <input type="file" wire:model="actaSustentacion" accept="application/pdf" class="hidden" id="actaSustentacion" />
                                                <input type="text" readonly placeholder="Seleccione un archivo" class="flex-1 p-2 border border-gray-300 rounded-l bg-white">
                                                <label for="actaSustentacion" class="px-4 py-2 bg-[#E5C300] text-black font-semibold rounded-r cursor-pointer hover:bg-[#d4b200]">
                                                    Buscar
                                                </label>
                                            </div>
                                            @error('actaSustentacion') <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span> @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">PAGO POR DERECHO DE TRÁMITE DOCUMENTARIO</td>
                                        <td class="py-2">
                                            <div class="flex items-center">
                                                <input type="file" wire:model="pagoTramite" accept="application/pdf" class="hidden" id="pagoTramite" />
                                                <input type="text" readonly placeholder="Seleccione un archivo" class="flex-1 p-2 border border-gray-300 rounded-l bg-white">
                                                <label for="pagoTramite" class="px-4 py-2 bg-[#E5C300] text-black font-semibold rounded-r cursor-pointer hover:bg-[#d4b200]">
                                                    Buscar
                                                </label>
                                            </div>
                                            @error('pagoTramite') <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span> @enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
    </div>
