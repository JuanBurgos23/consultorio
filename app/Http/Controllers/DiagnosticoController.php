<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DiagnosticoController extends Controller
{
    public function getWatsonDiagnosis($data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('6ZpM670iWstc5z_ZaI_P3r8qCTB142r_KggLhSG1fHFm'),
        ])->post('https://api.us-east.assistant.watson.cloud.ibm.com/instances/faf748d4-e4d3-4b3f-b830-f3a95ce23c0b', [
            'input' => [
                'text' => "Diagnostica a un paciente con peso: {$data['peso']}, altura: {$data['altura']}, alergias: {$data['alergia']}, discapacidades: {$data['discapacidad']}, exámenes: {$data['nombre_examen']}",
            ],
        ]);

        return $response->json();
    }
}
