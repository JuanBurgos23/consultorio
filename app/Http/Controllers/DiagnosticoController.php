<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DiagnosticoController extends Controller
{
    public function getDiagnosis($data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.openai.api_key'),
        ])->post('https://api.openai.com/v1/completions', [
            'model' => 'text-davinci-003',  // o el modelo de tu preferencia
            'prompt' => "Diagnostica a un paciente con motivo: {$data['motivo']}, objetivo: {$data['objetivo']}, peso: {$data['peso']}, altura: {$data['altura']}, alergias: {$data['alergia']}, discapacidades: {$data['discapacidad']}, exámenes: {$data['nombre_examen']}.",
            'max_tokens' => 100,
        ]);

        return $response->json();
    }

    public function store(Request $request)
    {
        // Recopilar datos del paciente desde la solicitud
        $data = [
            'motivo' => $request->motivo,
            'objetivo' => $request->objetivo,
            'peso' => $request->peso,
            'altura' => $request->altura,
            'alergia' => $request->alergia,
            'discapacidad' => $request->discapacidad,
            'nombre_examen' => $request->nombre_examen,
        ];

        // Obtener diagnóstico de OpenAI
        $diagnostico = $this->getDiagnosis($data);

        // Guardar el diagnóstico en la base de datos
        // Aquí suponemos que tienes un modelo llamado `Diagnostico`
        Diagnostico::create([
            'detalle' => $diagnostico['choices'][0]['text'] ?? 'Diagnóstico no disponible',
            'consulta_id' => $request->consulta_id,  // ID de la consulta, si aplica
        ]);

        return redirect()->route('mostrar_consulta')->with('success', 'Diagnóstico generado y guardado correctamente.');
    }
}
