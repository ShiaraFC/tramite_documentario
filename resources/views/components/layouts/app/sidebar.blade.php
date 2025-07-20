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

    <body class="min-h-screen bg-zinc-200">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-green-800">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard no usar') }}</flux:navlist.item>
                    <flux:navlist.item icon="home" :href="route('ejemplo.dashboard')" :current="request()->routeIs('ejemplo.dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                    <flux:navlist.item icon="document" :href="route('ejemplo')" :current="request()->routeIs('ejemplo')" wire:navigate>{{ __('Ejemplo') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />
<!--
            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist>
-->
            <!-- Desktop User Menu -->
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
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
