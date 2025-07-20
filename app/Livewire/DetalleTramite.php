<?php

namespace App\Livewire;

use Livewire\Component;

class DetalleTramite extends Component
{
    public $expediente;
    public $tramite;

    public function mount($expediente)
    {
        $this->expediente = $expediente;
        // Simulación de datos - En un caso real, esto vendría de la base de datos
        $this->tramite = [
            'numero_expediente' => '2024-001-IS',
            'tipo_tramite' => 'CONSTANCIA DE EXPEDITO PARA OPTAR TÍTULO PROFESIONAL',
            'fecha_envio' => '14 de enero de 2024, 07:00 p.m.',
            'funcionario' => [
                'nombre' => 'Dr. María González Vásquez',
                'cargo' => 'Secretaria General'
            ],
            'oficina' => [
                'nombre' => 'Secretaría General',
                'facultad' => 'Facultad de Ingeniería de Sistemas'
            ],
            'dirigido_a' => 'Decano de la Facultad de Ingeniería de Sistemas',
            'estado' => 'En Proceso',
            'sustento' => 'Solicito la constancia de expedito para optar el título profesional de ingeniero de Sistemas, habiendo cumplido con todos los requisitos académicos establecidos.',
            'documentos' => [
                [
                    'nombre' => 'Solicitud dirigida al Decano.pdf',
                    'tipo' => 'application/pdf'
                ],
                [
                    'nombre' => 'Informe de originalidad Turnitin.pdf',
                    'tipo' => 'application/pdf'
                ],
                [
                    'nombre' => 'Informe de revisores.pdf',
                    'tipo' => 'application/pdf'
                ]
            ]
        ];
    }

    public function render()
    {
        return view('livewire.detalle-tramite', [
            'tramite' => $this->tramite
        ]);
    }

    public function descargarDocumento($nombre)
    {
        // Aquí iría la lógica para descargar el documento
        // return response()->download(storage_path("app/documentos/{$nombre}"));
    }
}
