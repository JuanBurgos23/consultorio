<?php

namespace App\Http\Controllers;

use App\Models\Condicion;
use App\Models\Consulta;
use App\Models\Diagnostico;
use App\Models\Examen;
use App\Models\IMC;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;

class ConsultaController extends Controller
{
    public function index()
    {
        return view('consulta.consulta');
    }
    public function registro()
    {
        return view('consulta.registro');
    }
    public function mostrarConsultas()
    {
        $consultas = Consulta::with('paciente', 'imc')->get();

        return view('consulta.mostrar_consulta', compact('consultas'));
    }


    public function storeConsulta(Request $request)
    {
        // Crear la consulta
        $consulta = new Consulta();
        $consulta->objetivo = $request->objetivo;
        $consulta->motivo = $request->motivo;
        $consulta->fecha_consulta = $request->fecha_consulta;
        $consulta->save();

        // Redirigir a la siguiente vista pasando el id de la consulta creada
        return redirect()->route('consulta', ['consulta_id' => $consulta->id])
            ->with('success', 'Consulta registrada. Ahora ingresa los datos adicionales.');
    }
    public function getDiagnosis($data)
    {
        // Realiza la solicitud a la API de Google
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.google.api_key'),
            'Content-Type' => 'application/json'
        ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent', [
            "contents" => [
                [
                    "parts" => [
                        [
                            "text" => "Diagnostica a un paciente con motivo: {$data['motivo']}, objetivo: {$data['objetivo']}, peso: {$data['peso']}, altura: {$data['altura']}, alergias: {$data['alergia']}, discapacidades: {$data['discapacidad']}, exámenes: {$data['nombre_examen']}."
                        ]
                    ]
                ]
            ]
        ]);

        // Convertir la respuesta JSON a un arreglo
        $diagnosticoResponse = $response->json();  // Esto convierte la respuesta JSON a un array

        // Verifica que la respuesta contenga los datos esperados
        if (!isset($diagnosticoResponse['candidates'][0]['content']['parts'][0]['text'])) {
            return response()->json(['error' => 'No se pudo obtener un diagnóstico válido.'], 400);
        }

        // Obtener el texto del diagnóstico
        $detalle = $diagnosticoResponse['candidates'][0]['content']['parts'][0]['text'];

        return $detalle;
    }


    public function store(Request $request)
    {
        // Obtener el consulta_id desde los parámetros de la consulta (de la URL)
        $consulta_id = $request->input('consulta_id'); // o $request->consulta_id

        // Verificar que el consulta_id no sea nulo
        if (!$consulta_id) {
            return redirect()->back()->withErrors(['error' => 'Consulta no encontrada.']);
        }

        // Buscar la consulta con el consulta_id
        $consulta = Consulta::find($consulta_id);

        if (!$consulta) {
            return redirect()->back()->withErrors(['error' => 'Consulta no encontrada.']);
        }

        // Crear los registros de IMC, Condición y Examen
        $imc = new IMC();
        $imc->peso = $request->peso;
        $imc->altura = $request->altura;
        $imc->save();

        $condicion = new Condicion();
        $condicion->operaciones = $request->operaciones;
        $condicion->alergia = $request->alergia;
        $condicion->discapacidad = $request->discapacidad;
        $condicion->save();

        $examen = new Examen();

        $examen->nombre = $request->especifica_gastrointestinales;

        $examen->cardiacas = $request->cardiacas;
        $examen->diabetes = $request->diabetes;
        $examen->gastrointestinales = $request->gastrointestinales;
        $examen->tiroides = $request->tiroides;
        $examen->renales = $request->renales;
        $examen->cancer = $request->cancer;

        $examen->save();




        // Asignar los registros de IMC, Condición y Examen a la consulta
        $consulta->id_imc = $imc->id;
        $consulta->id_condicion = $condicion->id;
        $consulta->id_examen = $examen->id;
        //asignar el id del paciente autenticado
        $paciente = Paciente::where('id_user', auth()->user()->id)->first();

        if ($paciente) {
            $consulta->id_paciente = $paciente->id_paciente;
        } else {
            return redirect()->back()->with('error', 'No se encontró el paciente asociado con el usuario.');
        }
        $consulta->save();


        // Obtener los datos de la consulta para enviar a la API
        $data = [
            'motivo' => $request->motivo,
            'objetivo' => $request->objetivo,
            'peso' => $request->peso,
            'altura' => $request->altura,
            'operaciones' => $request->operaciones,
            'alergia' => $request->alergia,
            'discapacidad' => $request->discapacidad,
            'cardiacas' => $request->cardiacas,
            'diabetes' => $request->diabetes,
            'gastrointestinales' => $request->gastrointestinales,
            'tiroides' => $request->tiroides,
            'renales' => $request->renales,
            'cancer' => $request->cancer,
        ];

        // Obtener diagnóstico de la API
        $diagnostico = $this->getDiagnosis($data);

        // Verificar si el diagnóstico es válido
        if ($diagnostico === 'No se pudo obtener un diagnóstico') {
            return redirect()->back()->withErrors(['error' => 'No se pudo obtener un diagnóstico válido.']);
        }

        // Guardar el diagnóstico en la tabla "diagnostico"
        $diagnostico = new Diagnostico();
        $diagnostico->id_consulta = $consulta->id;
        $diagnostico->detalle = $diagnostico; // Almacenar el detalle
        $diagnostico->save();
        // Redirigir a la vista de consulta
        return redirect()->route('mostrar_consulta')->with('success', 'Datos adicionales registrados correctamente.');
    }
}
