<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="min-h-screen bg-white">
        <div class="flex min-h-screen">
            <!-- Panel Lateral -->
            <div class="w-64 bg-[#22572D] min-h-screen fixed left-0 top-0 flex flex-col">
                <!-- Encabezado -->
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <button class="text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <div class="flex items-center gap-2 text-white text-sm">
                            <span>Cerrar Sesión</span>
                            <span>{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                    <div class="text-white mb-2">
                        <h1 class="text-base">Sistema de Trámite Documentario</h1>
                    </div>
                    <div class="text-white">
                        <h2 class="text-lg font-semibold">Mesa de Partes Virtual</h2>
                        <p class="text-sm">UNCP</p>
                    </div>
                </div>

                <!-- Menú -->
                <div class="flex-1 p-4">
                    <div class="space-y-2">
                        <a href="#" class="flex items-center text-white p-2 rounded-lg hover:bg-green-700">
                            <span class="text-sm">Mi Panel</span>
                        </a>
                        <a href="#" class="bg-[#E5C300] text-black p-2 rounded-lg">
                            <span class="text-sm">Nuevo Trámite</span>
                        </a>
                        <div class="ml-4 space-y-2">
                            <a href="{{ route('tramites.otorgar-titulo') }}" class="flex items-center text-white p-2 rounded-lg hover:bg-green-700">
                                <span class="text-sm">Otorgar Título</span>
                            </a>
                            <a href="{{ route('tramites.otorgar-grado') }}" class="flex items-center text-white p-2 rounded-lg hover:bg-green-700">
                                <span class="text-sm">Otorgar Grado</span>
                            </a>
                        </div>
                        <a href="#" class="flex items-center text-white p-2 rounded-lg hover:bg-green-700">
                            <span class="text-sm">Historial de Trámites</span>
                        </a>
                    </div>
                </div>

                <!-- Perfil -->
                <div class="p-4 mt-auto border-t border-green-700">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-[#E5C300] rounded-full flex items-center justify-center text-black font-bold">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="text-white text-sm">
                            <div>{{ auth()->user()->name }}</div>
                            <div class="text-xs text-gray-300">Estudiante</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido Principal -->
            <div class="flex-1 ml-64">
                {{ $slot }}
            </div>
        </div>

        @livewireScripts
    </body>
</html>
