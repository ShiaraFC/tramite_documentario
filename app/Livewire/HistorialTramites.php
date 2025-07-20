<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class HistorialTramites extends Component
{
    use WithPagination;

    public $search = '';
    public $estadoFilter = 'Todos los estados';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Simulación de datos - En un caso real, esto vendría de la base de datos
        $tramites = [
            [
                'expediente' => '2024-001-IS',
                'tipo_tramite' => 'CONSTANCIA DE EXPEDITO PARA OPTAR TÍTULO PROFESIONAL',
                'estado' => 'En Proceso',
                'fecha_envio' => '14/1/2024',
                'actualizado' => '17/1/2024',
                'funcionario' => [
                    'nombre' => 'Dr. María González',
                    'cargo' => 'Secretaria General'
                ],
                'puede_editar' => false
            ],
            [
                'expediente' => '2024-002-IS',
                'tipo_tramite' => 'CERTIFICADO DE ESTUDIOS DE PREGRADO (FORMATO 1)',
                'estado' => 'Aprobado',
                'fecha_envio' => '9/1/2024',
                'actualizado' => '11/1/2024',
                'funcionario' => [
                    'nombre' => 'Lic. Carlos Mendoza',
                    'cargo' => 'Registro Académico'
                ],
                'puede_editar' => false
            ],
            [
                'expediente' => '2024-003-IS',
                'tipo_tramite' => 'CONSTANCIA DE PRÁCTICAS PREPROFESIONALES/INTERNADO',
                'estado' => 'Pendiente de Revisión',
                'fecha_envio' => '7/1/2024',
                'actualizado' => '7/1/2024',
                'funcionario' => [
                    'nombre' => 'Ing. Ana Rojas',
                    'cargo' => 'Coordinación de Prácticas'
                ],
                'puede_editar' => true
            ],
            [
                'expediente' => '2023-045-IS',
                'tipo_tramite' => 'CONSTANCIA DE ORDEN DE MÉRITO: TERCIO SUPERIOR',
                'estado' => 'Rechazado',
                'fecha_envio' => '19/12/2023',
                'actualizado' => '21/12/2023',
                'funcionario' => [
                    'nombre' => 'Dr. Luis Vásquez',
                    'cargo' => 'Registro Académico'
                ],
                'puede_editar' => false
            ]
        ];

        if ($this->search) {
            $tramites = array_filter($tramites, function($tramite) {
                return str_contains(strtolower($tramite['expediente']), strtolower($this->search)) ||
                       str_contains(strtolower($tramite['tipo_tramite']), strtolower($this->search));
            });
        }

        if ($this->estadoFilter !== 'Todos los estados') {
            $tramites = array_filter($tramites, function($tramite) {
                return $tramite['estado'] === $this->estadoFilter;
            });
        }

        return view('livewire.historial-tramites', [
            'tramites' => $tramites
        ]);
    }

    public function verDetalle($expediente)
    {
        return redirect()->route('tramites.detalle', ['expediente' => $expediente]);
    }

    public function editarTramite($expediente)
    {
        // Aquí iría la lógica para redireccionar a la página de edición
        // return redirect()->route('tramites.editar', ['expediente' => $expediente]);
    }
}
