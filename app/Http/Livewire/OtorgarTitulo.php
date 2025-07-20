<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class OtorgarTitulo extends Component
{
    use WithFileUploads;

    public string $sustento = '';
    public $solicitudDecano;
    public $actaSustentacion;
    public $pagoTramite;

    protected $rules = [
        'sustento' => 'required|string|min:5',
        'solicitudDecano' => 'required|file|mimes:pdf|max:2048',
        'actaSustentacion' => 'required|file|mimes:pdf|max:2048',
        'pagoTramite' => 'required|file|mimes:pdf|max:2048',
    ];

    public function enviarSolicitud()
    {
        $this->validate();
        
        // Aquí iría la lógica para guardar los archivos
        // $this->solicitudDecano->store('documentos');
        
        session()->flash('success', '¡Solicitud enviada correctamente!');
        $this->reset(['sustento', 'solicitudDecano', 'actaSustentacion', 'pagoTramite']);
    }

    public function render()
    {
        return view('livewire.otorgar-titulo')
            ->layout('components.layouts.tramite');
    }
}
