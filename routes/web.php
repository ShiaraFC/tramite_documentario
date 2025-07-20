<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    Volt::route('/otorgar-titulo', 'otorgar-titulo')->name('tramites.otorgar-titulo');
    Volt::route('/otorgar-grado', 'otorgar-grado')->name('tramites.otorgar-grado');

    Volt::route('/historial', 'historial-tramites')->name('tramites.historial');
    Volt::route('/detalle/{expediente}', 'detalle-tramite')->name('tramites.detalle');
    Route::get('/descargar/{documento}', function($documento) {
        // Aquí iría la lógica para descargar el documento
        return response()->download(storage_path("app/documentos/{$documento}"));
    })->name('tramites.descargar');
    });


require __DIR__.'/auth.php';
